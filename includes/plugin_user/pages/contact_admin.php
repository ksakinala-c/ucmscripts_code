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


if(isset($_REQUEST['user_id'])){


    $user_safe = true;
    include(module_theme::include_ucm("includes/plugin_user/pages/contact_admin_edit.php"));
    //include("contact_admin_edit.php");

}else{ 
	
    include(module_theme::include_ucm("includes/plugin_user/pages/contact_admin_list.php"));
    //include("contact_admin_list.php");

} 

