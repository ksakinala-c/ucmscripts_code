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

if(!module_customer::can_i('edit','Customer Settings','Config')){
	redirect_browser(_BASE_HREF);
}

$module->page_title = 'Customer Settings';

$links = array(
	array(
		"name"=>'Settings',
		'm' => 'customer',
		'p' => 'customer_settings_basic',
		'force_current_check' => true,
		'order' => 1, // at start.
		'menu_include_parent' => 1,
		'allow_nesting' => 1,
		'args'=>array('customer_id'=>false,'customer_type_id'=>false),
	),
	array(
		"name"=>'Customer Types',
		'm' => 'customer',
		'p' => 'customer_settings_types',
		'force_current_check' => true,
		'order' => 2, // at start.
		'menu_include_parent' => 1,
		'allow_nesting' => 1,
		'args'=>array('customer_id'=>false,'customer_type_id'=>false),
	),
);


if(file_exists(dirname(__FILE__).'/customer_signup.php')){
	$links[] = array(
		"name"=>'Signup Settings',
		'm' => 'customer',
		'p' => 'customer_signup',
		'force_current_check' => true,
		'order' => 3, // at start.
		'menu_include_parent' => 1,
		'allow_nesting' => 1,
		'args'=>array('customer_id'=>false),
	);
}

