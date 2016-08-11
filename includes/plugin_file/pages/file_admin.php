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

$file_safe = true;
$file_id = isset($_REQUEST['file_id']) ? (int)$_REQUEST['file_id'] : false;

if($file_id && isset($_REQUEST['email'])){

    include(module_theme::include_ucm('includes/plugin_file/pages/file_admin_email.php'));

}else if(isset($_REQUEST['file_id'])){


	$ucm_file = new ucm_file( $file_id );
	$ucm_file->check_page_permissions();
	$file    = $ucm_file->get_data();
	$file_id = (int) $file['file_id']; // sanatisation/permission check

	if(isset($_REQUEST['bucket']) || (isset($file['bucket']) && $file['bucket'])){
	    include(module_theme::include_ucm('includes/plugin_file/pages/file_admin_bucket.php'));
	}else{
		include(module_theme::include_ucm('includes/plugin_file/pages/file_admin_edit.php'));
	}


}else{
	
    include(module_theme::include_ucm('includes/plugin_file/pages/file_admin_list.php'));
	
} 

