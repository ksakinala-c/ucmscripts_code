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


$ticket_safe = true;
$limit_time = strtotime('-'.module_config::c('ticket_turn_around_days',5).' days',time());


if(isset($_REQUEST['ticket_id'])){

    if(isset($_REQUEST['notify'])&&$_REQUEST['notify']){
        include(module_theme::include_ucm("includes/plugin_ticket/pages/ticket_admin_notify.php"));
    }else{
        include(module_theme::include_ucm("includes/plugin_ticket/pages/ticket_admin_edit.php"));
    }
    //include('ticket_admin_edit.php');


    /*if(module_security::getlevel() > 1){
        ob_end_clean();
        $_REQUEST['i'] = $_REQUEST['ticket_id'];
        $_REQUEST['hash'] = module_ticket::link_public($_REQUEST['ticket_id'],true);
        $module->external_hook('public');
        exit;
        //include('includes/plugin_ticket/public/ticket_customer_view.php');
    }else{*/
    //include("ticket_admin_edit.php");
    //}

}else{



    //include("ticket_admin_list.php");
    include(module_theme::include_ucm("includes/plugin_ticket/pages/ticket_admin_list.php"));

}
