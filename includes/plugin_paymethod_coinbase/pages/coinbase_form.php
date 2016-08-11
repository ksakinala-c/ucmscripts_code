<?php 
/** 
  * Copyright: dtbaker 2012
  * Licence: Please check CodeCanyon.net for licence details. 
  * More licence clarification available here:  http://codecanyon.net/wiki/support/legal-terms/licensing-terms/ 
  * Deploy: 8355 2b2c359eb59e7773b80f07b9b4ee60fe
  * Envato: 9c900e67-0d83-4654-a65d-64710ffc8468
  * Package Date: 2016-07-19 00:42:15 
  * IP Address: 192.168.1.161
  */

require_once('includes/plugin_paymethod_coinbase/lib/Coinbase.php');

$coinbase = array(
  "secret_key"      => module_config::c('payment_method_coinbase_api_key'),
  "publishable_key" => module_config::c('payment_method_coinbase_secret_key')
);

$coinbase = Coinbase::withApiKey(module_config::c('payment_method_coinbase_api_key'), module_config::c('payment_method_coinbase_secret_key'));

if(isset($invoice_id) && $invoice_id && isset($payment_amount) && $payment_amount > 0 && isset($description)){

	$button_options = 		array(
            "description" => $description,
            "custom_secure" => true,
            "variable_price" => true,
            "auto_redirect" => true,
			'success_url' => module_invoice::link_public_payment_complete($invoice_id),
			'cancel_url' => module_invoice::link_public($invoice_id),
			'callback_url' => full_link(_EXTERNAL_TUNNEL.'?m=paymethod_coinbase&h=event_ipn&method=coinbase'),
        );
	$custom_code = module_paymethod_coinbase::get_payment_key($invoice_id,$invoice_payment_id);

	if(isset($is_subscription) && isset($invoice_payment_subscription_id) && $invoice_payment_subscription_id && $is_subscription && isset($is_subscription['coinbase_period'])){
		$button_options['type'] = 'subscription';
		$button_options['repeat'] = $is_subscription['coinbase_period'];
		$custom_code = module_paymethod_coinbase::get_payment_key($invoice_id,$invoice_payment_id,$invoice_payment_subscription_id);
	}

	$response = $coinbase->createButton(
		$description,
		$payment_amount,
		$currency_code,
		$custom_code,
		$button_options	);
	if(isset($response->button->code) && strlen($response->button->code)){
		redirect_browser('https://coinbase.com/checkouts/'.$response->button->code);
	}
	//echo $response->embedHtml;
}
?>

Error paying via coinbase. Please try again.

<a href="<?php echo module_invoice::link_public($invoice_id);?>"><?php _e("Cancel");?></a>