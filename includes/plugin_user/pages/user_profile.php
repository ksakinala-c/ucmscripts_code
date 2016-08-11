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

$user_id = (int)$_SESSION['_user_id'];
	
if($user_id){ 
	$user = $module->get_user($user_id);
	//$user_notes = $module->get_user_notes($user_id);
	?>
	
	<h2><?php echo _l('Your Details'); ?></h2>
	
	
	<table width="100%" border="0" cellspacing="0" cellpadding="2" class="tableclass">
	  <tr>
	  	<td width="13%"><?php echo _l('Full Name'); ?></td>
	    <td width="37%"><?php echo ($user['name']); ?></td>
	     <td width="13%">
	     
	     </td>
	    <td width="37%"> </td>
	  </tr>
	  <tr>
	    <td><?php echo _l('Email Address'); ?></td>
	    <td><?php echo ($user['email']); ?></td>
	    <td></td>
	    <td></td>
	  </tr>
	  
	 
	  <tr>
	    <td><?php echo _l('Phone'); ?></td>
	    <td><?php echo ($user['phone']); ?></td>
	  </tr>
	  <tr>
	    <td><?php echo _l('Fax'); ?></td>
	    <td><?php echo ($user['fax']); ?></td>
	  </tr>
	  <tr>
	    <td><?php echo _l('Mobile'); ?></td>
	    <td><?php echo ($user['mobile']); ?></td>
	  </tr>
	 
	</table>
	
<?php  }  ?>