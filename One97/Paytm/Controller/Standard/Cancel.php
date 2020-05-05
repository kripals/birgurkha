<?php
namespace One97\Paytm\Controller\Standard;

use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;

class Cancel extends \One97\Paytm\Controller\Paytm {
	

    public function execute()
    {
        $this->_cancelPayment();
        $this->_checkoutSession->restoreQuote();
        $this->getResponse()->setRedirect(
            $this->getPaytmHelper()->getUrl('checkout')
        );
    }

}
