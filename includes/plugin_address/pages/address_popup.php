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

// load the address they're trying to access.
$address_id = (isset($_REQUEST['address_id']) && (int)$_REQUEST['address_id']) ? (int)$_REQUEST['address_id'] : false;
if($address_id){
	$address_data = module_address::get_address_by_id($address_id);
	// load the form using the normal module callback.
	// todo - move this into a static method call instead of all the complicated hooks with optional parameters.
	//module_address::print_address_form($address_id);
	// do a form as well.
	?>
	<form action="<?php echo $module->link();?>" method="post">
	<input type="hidden" name="_process" value="save_from_popup">
	<input type="hidden" name="_redirect" class="redirect" value="">
	<?php
	handle_hook("address_block",$module,$address_data['address_type'],$address_data['owner_table'],false,$address_data['owner_id']);
	?>
	</form>
	<?php
}
// exit so ajax load doesn't do everything
exit;

