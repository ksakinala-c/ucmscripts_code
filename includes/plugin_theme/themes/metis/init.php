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

//module_config::register_css('theme','metis_style.css',full_link('/includes/plugin_theme/themes/metis/css/metis_style.css'));

if(!isset($_REQUEST['display_mode']) || (isset($_REQUEST['display_mode']) && $_REQUEST['display_mode']!='iframe' && $_REQUEST['display_mode']!='ajax')){
    $_REQUEST['display_mode'] = 'metis';
}
require_once(module_theme::include_ucm('includes/plugin_theme/themes/metis/metis_functions.php'));


// include core bootstrap and fontawesome libraries
module_config::register_css('theme','jquery-ui.min.css',full_link('/includes/plugin_theme/jquery-ui/jquery-ui.min.css'),1.1);
module_config::register_css('theme','bootstrap.min.css',full_link('/includes/plugin_theme/bootstrap/css/bootstrap.min.css'),1.2);
module_config::register_css('theme','font-awesome.min.css',full_link('/includes/plugin_theme/fontawesome/css/font-awesome.min.css'),1.2);
module_config::register_css('theme','core.css',full_link('/includes/plugin_theme/css/core.css'),1.3);
// core jquery, bootstrap and jquery ui
module_config::register_js('theme','jquery.js',full_link('/includes/plugin_theme/js/jquery.js'),1);
module_config::register_js('theme','bootstrap.js',full_link('/includes/plugin_theme/bootstrap/js/bootstrap.min.js'), 1.1);
module_config::register_js('theme','jquery-ui.min.js',full_link('/includes/plugin_theme/jquery-ui/jquery-ui.min.js'),1.2);
// core cookies / js
module_config::register_js('theme','cookie.js',full_link('/js/cookie.js'),1.4);
module_config::register_js('theme','javascript.js',full_link('/js/javascript.js'),1.5);


// theme overrides and styles:
module_config::register_css('theme','main.css',full_link('/includes/plugin_theme/themes/metis/css/main.css'),16);
//module_config::register_css('theme','metisMenu.css',full_link('/includes/plugin_theme/themes/metis/css/metisMenu.css'),17);
module_config::register_css('theme','theme.css',full_link('/includes/plugin_theme/themes/metis/css/theme.css'),18);
if(isset($_SERVER['REQUEST_URI']) && (strpos($_SERVER['REQUEST_URI'],_EXTERNAL_TUNNEL) || strpos($_SERVER['REQUEST_URI'],_EXTERNAL_TUNNEL_REWRITE))){
    module_config::register_css('theme','external.css',full_link('/includes/plugin_theme/themes/metis/css/external.css'),100);
}

module_config::register_js('theme','main.js',full_link('/includes/plugin_theme/themes/metis/js/main.js'), 16);
//module_config::register_js('theme','metisMenu.js',full_link('/includes/plugin_theme/themes/metis/js/metisMenu.js'), 17);
module_config::register_js('theme','metis.js',full_link('/includes/plugin_theme/themes/metis/js/metis.js'), 18);