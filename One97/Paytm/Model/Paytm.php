<?php

namespace One97\Paytm\Model;

use One97\Paytm\Helper\Data as DataHelper;

class Paytm extends \Magento\Payment\Model\Method\AbstractMethod
{
    const CODE = 'paytm';
    protected $_code = self::CODE;
    protected $_isInitializeNeeded = true;
    protected $_isGateway = true;
    protected $_isOffline = true;
    protected $helper;
    protected $_minAmount = null;
    protected $_maxAmount = null;
    protected $_supportedCurrencyCodes = array('NPR');
    protected $_formBlockType = 'One97\Paytm\Block\Form\Paytm';
    protected $_infoBlockType = 'One97\Paytm\Block\Info\Paytm';
    protected $urlBuilder;
    protected $_storeManager;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory,
        \Magento\Framework\Api\AttributeValueFactory $customAttributeFactory,
        \Magento\Payment\Helper\Data $paymentData,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Payment\Model\Method\Logger $logger,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \One97\Paytm\Helper\Data $helper
    ) {
        $this->helper = $helper;
        $this->orderFactory = $orderFactory;
        parent::__construct(
            $context,
            $registry,
            $extensionFactory,
            $customAttributeFactory,
            $paymentData,
            $scopeConfig,
            $logger
        );

        $this->_minAmount = "0.50";
        $this->_maxAmount = "1000000000000";
        $this->urlBuilder = $urlBuilder;
        $this->_storeManager = $storeManager;
    }

    /**
     * Instantiate state and set it to state object.
     *
     * @param string                        $paymentAction
     * @param \Magento\Framework\DataObject $stateObject
     */
    public function initialize($paymentAction, $stateObject)
    {
        $payment = $this->getInfoInstance();
        $order = $payment->getOrder();
        $order->setCanSendNewEmailFlag(false);      
    
        $stateObject->setState(\Magento\Sales\Model\Order::STATE_PENDING_PAYMENT);
        $stateObject->setStatus('pending_payment');
        $stateObject->setIsNotified(false);
    }

    public function isAvailable(\Magento\Quote\Api\Data\CartInterface $quote = null)
    {
        if ($quote && (
                $quote->getBaseGrandTotal() < $this->_minAmount
                || ($this->_maxAmount && $quote->getBaseGrandTotal() > $this->_maxAmount))
        ) {
            return false;
        }

        return parent::isAvailable($quote);
    }

    public function canUseForCurrency($currencyCode)
    {
        if (!in_array($currencyCode, $this->_supportedCurrencyCodes)) {
            return false;
        }
        return true;
    }

    public function buildPaytmRequest($order)
    {
        $callBackUrl=$this->urlBuilder->getUrl('paytm/Standard/Response', ['_secure' => true]);
        if($this->getConfigData("custom_callbackurl")=='1'){
            $callBackUrl=$this->getConfigData("callback_url")!=''?$this->getConfigData("callback_url"):$callBackUrl;
        } 
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/custom.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $orderId = $order->getId();
                // $connection = $this->_resource->getConnection(\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION);
                // $tablename = $connection->getTableName('marketplace_mpsplitorder');
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
                $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
                $connection = $resource->getConnection();
                // $tableName = $connection->getTableName("marketplace_mpsplitorder");

                // $select = $connection->select()->from($tableName, 'index_id')->where('sku = :sku');
                $result = $connection->fetchAll("SELECT * FROM `marketplace_mpsplitorder` 
                WHERE `last_order_id` like '%$orderId%'");
                $vendorids = array_pop($result);
                $orderidss = json_encode($vendorids["order_ids"]); 
                $orderidssww = json_decode($orderidss);
                $orderIdsNew = explode (',',  $orderidssww);               
                /* Esewa Customization */
                // $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/custom.log');
                // $logger = new \Zend\Log\Logger();
                // $logger->addWriter($writer);
                //echo "<pre>"; print_r($orderIdsNew); echo "<br>";
                // $logger->info('save status '.$orderIdsNew);
       
                        if ($orderIdsNew[0] > 0) 
                        {
                            $sum = 0;
                        foreach ($orderIdsNew as $orderId) 
                            {
                        $order = $this->getOrderDataById($orderId);  echo $orderId;  echo "</br>";          
                        $sum += $order->getGrandTotal();  echo "</br>"; 
                            }
                        }
                        else
                        {
                            
                                $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                                $order = $objectManager->create('\Magento\Sales\Model\Order')->load($orderId);
                                $sum = round($order->getGrandTotal(), 2);
                                $orderidss = $order->getRealOrderId(); 
                                $logger->info('sahnaaa'.$sum  .$orderidss);
                        }
                      

          
 $url = $this->getConfigData("initial_url");
        $data =[
            'amt'=>  $sum,
            'pdc'=>'0',
            'psc'=> '0',
            'txAmt'=> '0',
            'tAmt'=>  $sum,
            'pid'=> $orderidss,
            'scd'=> $this->getConfigData("scd_code"),
            'su'=>$this->getConfigData("transaction_success_status_url"),
            'fu'=>$this->getConfigData("transaction_failure_status_url"),
        ];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

        curl_close($curl);
        $postString = http_build_query($data, '', '&');  
        $url = $url . $postString;
        return $url;
    }

   
    public function autoInvoiceGen()
    {
        $result = $this->getConfigData("payment_action");            
        return $result;
    }

    public function getRedirectUrl()
    {
        $url = $this->getConfigData('transaction_url');
        return $url;
    }
    
    public function getStatusQueryUrl()
    {
        $url = $this->getConfigData('transaction_status_url');
        return $url;
    }
    
    public function getNewStatusQueryUrl()
    {
        $url = $this->getConfigData('transaction_status_url');
        return $url;
    }

    public function getReturnUrl()
    {
        
    }

    public function getCancelUrl()
    {
        
    }

    public function getOrderDataById($orderId = null)
    {
        $order=$this->orderFactory->create()->load($orderId);
        return $order;
    }
}

