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

if(!module_config::can_i('view','Settings') || !module_security::can_i('view','Security Roles','Security')){
    redirect_browser(_BASE_HREF);
}
$search = (isset($_REQUEST['search']) && is_array($_REQUEST['search'])) ? $_REQUEST['search'] : array();
$roles = $module->get_roles($search);

$header = array(
    'type' => 'h2',
    'title' => _l('Security Roles'),
    'main' => true,
    'button' => array(
        'title' => 'Add New Role',
        'type' => 'add',
        'url' => module_security::link_open_role('new'),
    )
);
print_heading($header);
?>


<form action="" method="post">


<?php

/** START TABLE LAYOUT **/
    $table_manager = module_theme::new_table_manager();
    $columns = array();
    $columns['name'] = array(
            'title' => 'Name',
            'callback' => function($role) use (&$module){
                echo $module->link_open_role($role['security_role_id'],true);
            },
            'cell_class' => 'row_action',
        );
    $table_manager->set_columns($columns);
    $table_manager->set_rows($roles);
    $table_manager->pagination = true;
    $table_manager->print_table();

?>
</form>