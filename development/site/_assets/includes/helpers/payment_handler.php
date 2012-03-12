<?php
require_once "Paypal.php";
//Our request parameters
$requestParams = array(
   'RETURNURL' => 'http://www.compressorbot.com',
   'CANCELURL' => 'http://www.compressorbot.com'
);

$orderParams = array(
   'PAYMENTREQUEST_0_AMT' => '19.99'
);

$item = array(
   'L_PAYMENTREQUEST_0_NAME0' => 'Monthly subscription',
   'L_PAYMENTREQUEST_0_QTY0' => '1'
);

$paypal = new Paypal();

$response = $paypal -> request('SetExpressCheckout',$requestParams + $orderParams + $item);
var_dump($response);
if(is_array($response) && $response['ACK'] == 'Success') { //Request successful
      $token = $response['TOKEN'];
      header( 'Location: https://www.paypal.com/webscr?cmd=_express-checkout&token=' . urlencode($token) );
}

if( isset($_GET['token']) && !empty($_GET['token']) ) { // Token parameter exists
   // Get checkout details, including buyer information.
   // We can save it for future reference or cross-check with the data we have
   $paypal = new Paypal();
   $checkoutDetails = $paypal -> request('GetExpressCheckoutDetails', array('TOKEN' => $_GET['token']));

   // Complete the checkout transaction
   $requestParams = array(
       'TOKEN' => $_GET['token'],
       'PAYMENTACTION' => 'Sale',
       'PAYERID' => $_GET['PayerID'],
       'PAYMENTREQUEST_0_AMT' => '19.99', // Same amount as in the original request
       'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD' // Same currency as the original request
   );

   $response = $paypal -> request('DoExpressCheckoutPayment',$requestParams);
   if( is_array($response) && $response['ACK'] == 'Success') { // Payment successful
       // We'll fetch the transaction ID for internal bookkeeping
       $transactionId = $response['PAYMENTINFO_0_TRANSACTIONID'];
   }
}
