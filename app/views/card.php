<?php
require_once dirname(__FILE__).'/payu.php';
$params = array ('key' => 'gtKFFx', 'txnid' => uniqid( 'animesh_' ), 'amount' => rand( 0, 100 ),
			'firstname' => 'Test', 'email' => 'test@payu.in', 'phone' => '1234567890',
			'productinfo' => 'Product Info', 'surl' => 'payment_success', 'furl' => 'payment_failure');


$payment = new Payment('eCwWELxi', 'test');
print_r($result = $payment->pay($params));
echo $result['data'];
if($result['status'] == 1)
{
	header('Location:https://test.payu.in/_payment_options?mihpayid=2fb0ee2114924c11d16710eb59a9d905e76a0c11ac1797b194d03b4cf2682762');
}


/*pay_page( array (	'key' => 'gtKFFx', 'txnid' => uniqid( 'animesh_' ), 'amount' => rand( 0, 100 ),
			'firstname' => 'Test', 'email' => 'test@payu.in', 'phone' => '1234567890',
			'productinfo' => 'Product Info', 'surl' => 'payment_success', 'furl' => 'payment_failure'), 'eCwWELxi' );

*/
?>