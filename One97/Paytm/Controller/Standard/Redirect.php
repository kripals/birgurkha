<?php

namespace One97\Paytm\Controller\Standard;


use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;

class Redirect extends \One97\Paytm\Controller\Paytm 
{
   

    public function execute()
    {
        
      
        $order = $this->getOrder();
     
 if ($order->getBillingAddress())
        {
            $order->setState("pending")->setStatus("pending");
            $order->addStatusToHistory($order->getStatus(), "Customer was redirected to E-sewa.");
            $order->save();
            
         
            $this->getResponse()->setRedirect(
                $this->getPaytmModel()->buildPaytmRequest($order)
            );
        }
        else
        {
            $this->_cancelPayment();
            $this->_checkoutSession->restoreQuote();
            $this->getResponse()->setRedirect(
                $this->getPaytmHelper()->getUrl('checkout')
            );
        }
    }
}
