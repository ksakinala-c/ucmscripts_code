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


if(!module_config::can_i('view','Settings')){
    redirect_browser(_BASE_HREF);
}

print_heading('Bank Transfer Settings');
module_config::print_settings_form(
    array(
         array(
            'key'=>'payment_method_banktransfer_enabled',
            'default'=>1,
             'type'=>'checkbox',
             'description'=>'Enable Payment Method',
         ),
         array(
            'key'=>'payment_method_banktransfer_enabled_default',
            'default'=>1,
             'type'=>'checkbox',
             'description'=>'Available By Default On Invoices',
	         'help' => 'If this option is enabled, all new invoices will have this payment method available. If this option is disabled, it will have to be enabled on individual invoices.'
         ),
         array(
            'key'=>'payment_method_banktransfer_label',
            'default'=>'Bank Transfer',
             'type'=>'text',
             'description'=>'Name this payment method',
         ),
    )
);

print_heading('Bank Transfer Templates');
echo module_template::link_open_popup('paymethod_banktransfer');
echo module_template::link_open_popup('paymethod_banktransfer_details');
?>
