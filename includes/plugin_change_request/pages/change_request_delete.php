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
if(!module_change_request::can_i('delete','Change Requests'))die('no perms');
$change_request_id = (int)$_REQUEST['change_request_id'];
$change_request = module_change_request::get_change_request($change_request_id);
if(!$change_request['website_id'])die('no linked website');
$website_data = module_website::get_website($change_request['website_id']);

if(module_form::confirm_delete('change_request_id',"Really delete Change Request?",module_website::link_open($change_request['website_id']))){
    module_change_request::delete_change_request($_REQUEST['change_request_id']);
    set_message("Change request deleted successfully");
    redirect_browser(module_website::link_open($change_request['website_id']));
}