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

$module->page_title = 'Ticket Settings';

if(!isset($links))$links=array();

$links[] = array(
    "name"=>"Ticket Settings",
    'm' => 'ticket',
    'p' => 'ticket_settings_basic',
    'force_current_check' => true,
    'order' => 1, // at start.
    'menu_include_parent' => 1,
    'allow_nesting' => 1,
);
$links[] = array(
    "name"=>"Embed Ticket Form",
    'm' => 'ticket',
    'p' => 'ticket_settings_embed',
    'force_current_check' => true,
    'order' => 2, // at start.
    'menu_include_parent' => 1,
    'allow_nesting' => 1,
);
if(module_config::c('ticket_allow_extra_data',1)){
    $links[] = array(
        "name"=>"Additional Fields",
        'm' => 'ticket',
        'p' => 'ticket_settings_fields',
        'force_current_check' => true,
        'order' => 3, // at start.
        'menu_include_parent' => 1,
        'allow_nesting' => 1,
        'args'=>array(
            'ticket_data_key_id'=>false,
        )
    );
}
$links[] = array(
    "name"=>"Ticket Types",
    'm' => 'ticket',
    'p' => 'ticket_settings_types',
    'force_current_check' => true,
    'order' => 4,
    'menu_include_parent' => 1,
    'allow_nesting' => 1,
    'args'=>array(
        'ticket_type_id'=>false,
    )
);
if(class_exists('module_group',false)){
    $links[] = array(
        "name"=>"Bulk Actions",
        'm' => 'ticket',
        'p' => 'ticket_settings_bulk',
        'force_current_check' => true,
        'order' => 5,
        'menu_include_parent' => 1,
        'allow_nesting' => 1,
        'args'=>array(
            'ticket_type_id'=>false,
        )
    );
}
if(is_file('includes/plugin_ticket/pages/ticket_settings_accounts.php')){
    $links[] =  array(
        "name"=>"Ticket POP3/IMAP Accounts",
        'm' => 'ticket',
        'p' => 'ticket_settings_accounts',
        'force_current_check' => true,
        'order' => 10,
        'menu_include_parent' => 1,
        'allow_nesting' => 1,
        'args'=>array(
            'ticket_account_id'=>false,
        )
    );
}
