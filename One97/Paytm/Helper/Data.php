<?php

namespace One97\Paytm\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Sales\Model\Order;
use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    protected $session;
	
    public function __construct(Context $context, \Magento\Checkout\Model\Session $session) {
        $this->session = $session;
        parent::__construct($context);
    }

    public function cancelCurrentOrder($comment) {
        $order = $this->session->getLastRealOrder();
        if ($order->getId() && $order->getState() != Order::STATE_CANCELED) {
            $order->registerCancellation($comment)->save();
            return true;
        }
        return false;
    }

    public function restoreQuote() {
        return $this->session->restoreQuote();
    }

    public function getUrl($route, $params = []) {
        return $this->_getUrl($route, $params);
    }

    function callAPI($apiURL, $requestParamList)
	{
	    $jsonResponse      = "";
	    $responseParamList = array();
	    $JsonData          = json_encode($requestParamList);
	    $postData          = 'JsonData=' . urlencode($JsonData);
	    $ch                = curl_init($apiURL);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($postData)
	    ));
	    $jsonResponse      = curl_exec($ch);
	    $responseParamList = json_decode($jsonResponse, true);
	    return $responseParamList;
	}
	
    function callNewAPI($apiURL, $requestParamList)
	{
	    $jsonResponse      = "";
	    $responseParamList = array();
	    $JsonData          = json_encode($requestParamList);
	    $postData          = 'JsonData=' . urlencode($JsonData);
	    $ch                = curl_init($apiURL);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($postData)
	    ));
	    $jsonResponse      = curl_exec($ch);
	    $responseParamList = json_decode($jsonResponse, true);
	    return $responseParamList;
	}	
    
}
