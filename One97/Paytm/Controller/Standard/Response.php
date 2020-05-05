<?php

namespace One97\Paytm\Controller\Standard;


use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;

class Response extends \One97\Paytm\Controller\Paytm
{

    // protected $_checkoutSession;
    // protected $_customerSession;
    // protected $_orderHistoryFactory;
    // protected $_paytmModel;
    // protected $_logger;
    // protected $_paytmHelper;

    // public function __construct(
    // 	\Magento\Framework\App\Action\Context $context,
    // 	\Magento\Checkout\Model\Session $checkoutSession,
    // 	\Magento\Customer\Model\Session $customerSession,
    // 	\One97\Paytm\Model\Paytm $paytmModel,
    // 	\One97\Paytm\Helper\Data $paytmHelper,
    // 	\Psr\Log\LoggerInterface $logger,
    // 	\Magento\Sales\Model\Order\Status\HistoryFactory $orderHistoryFactory,
    // 	\Magento\Framework\DB\Adapter\AdapterInterface  $connection = null
    // ) {

    // 	$this->_customerSession = $customerSession;
    // 	$this->_orderHistoryFactory = $orderHistoryFactory;
    // 	$this->checkoutSession = $checkoutSession;
    // 	$this->_paytmModel = $paytmModel;
    // 	$this->_paytmHelper = $paytmHelper;
    // 	$this->_logger = $logger;
    // 	parent::__construct($context,$customerSession,$orderHistoryFactory,$checkoutSession,$paytmModel,$paytmHelper,$logger);
    // }

    public function execute()
    {


        $comment    = "";
        $successmsg = "";
        $errorMsg   = "";

        $orderID     = $this->getRequest()->getParam('oid');
        $responsemsg = $this->getRequest()->getParam('q');
        // $order = $this->getOrderById($orderID);


        $amt        = $this->getRequest()->getParam('amt');
        $refID      = $this->getRequest()->getParam('refId');
        $successmsg = $this->transactionverification($orderID, $amt, $refID);


        // $returnUrl = $this->getPaytmHelper()->getUrl('checkout/onepage/success');
        // 	$this->getResponse()->setRedirect($returnUrl);

        if ($responsemsg == 'su')
        {
            $orderID     = $this->getRequest()->getParam('oid');
            $returnUrl   = $this->getPaytmHelper()->getUrl('checkout/onepage/success');
            $orderidssww = json_decode($orderID);
            $orderIdsNew = explode(',', $orderidssww);
            if (count($orderIdsNew) > 1)
            {
                foreach ($orderIdsNew as $orderId)
                {
                    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                    $orderInfo     = $objectManager->create('Magento\Sales\Model\Order')->load($orderId);
                    $orderInfo->setStatus('prepaid_authorized');
                    $orderInfo->setState('new');
                    $orderInfo->addStatusToHistory($orderInfo->getStatus(), 'Order processed successfully placed');
                    $orderInfo->save();
                }
                $this->getResponse()->setRedirect($returnUrl);
            }
            else
            {
                //echo $orderIdsNew[0]; exit;
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                $order         = $objectManager->create('Magento\Sales\Model\Order')->loadByIncrementId($orderIdsNew[0]);
                $order->setState('new')->save();
                $order->setStatus('prepaid_authorized')->save();
                $order->addStatusToHistory($order->getStatus(), 'Order processed successfully placed');
                $order->save();


                $this->getResponse()->setRedirect($returnUrl);

            }
            // $returnUrl = $this->getPaytmHelper()->getUrl('checkout/cart');
            // $this->getResponse()->setRedirect($returnUrl);


        }
        else
        {
            if ($responsemsg == 'fu')
            {
                {
                    $cartsession = $this->retainCart($order);
                    // $returnUrl = $this->getPaytmHelper()->getUrl('checkout/onepage/failure');
                    // $this->getResponse()->setRedirect($returnUrl);
                }
            }
        }


    }


    public function retainCart(\Magento\Sales\Model\Order $order)
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $quoteFactory  = $objectManager->create('\Magento\Quote\Model\QuoteFactory');
        echo $order->getQuoteId();

        // $quote = $quoteFactory->create()->load($order->getQuoteId());
        // $quote->setIsActive(true)->save();
        $objectManager   = \Magento\Framework\App\ObjectManager::getInstance();
        $checkoutSession = $objectManager->create('\Magento\Checkout\Model\Session');
        $order           = $checkoutSession->getLastRealOrder();

        $quote = $quoteFactory->create()->loadByIdWithoutStore($order->getQuoteId());

        echo $quote->getId();

        if ($quote->getId())
        {
            $quote->setIsActive(1)->setReservedOrderId(null)->save();
            $checkoutSession->replaceQuote($quote);
            $this->_eventManager->dispatch('restore_quote', [ 'order' => $order, 'quote' => $quote ]);
            $returnUrl = $this->getPaytmHelper()->getUrl('checkout/cart');


            $this->messageManager->addWarningMessage('Payment Failed.');
            $this->getResponse()->setRedirect($returnUrl);

        }

        // $checkoutSession->replaceQuote($quote)->unsLastRealOrderId();
        // 	 $quotesession = $this->_eventManager->dispatch('restore_quote', ['order' => $order, 'quote' => $quote]);
        //  return $quotesession;

    }


    public function transactionverification()
    {

        $orderID = $this->getRequest()->getParam('oid');
        $amt     = $this->getRequest()->getParam('amt');
        $refID   = $this->getRequest()->getParam('refId');

        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/custom.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);


        $url  = "https://rc.esewa.com.np/epay/transrec";
        $data = [
            'amt' => $amt,
            'rid' => $refID,
            'pid' => $orderID,
            'scd' => "epay_payment"
        ];


        $postString = http_build_query($data, '', '&');
        $newurl     = $url . $postString;


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL            => $newurl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_CUSTOMREQUEST  => "GET",


        ]);

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);


        return $response;

    }
}



