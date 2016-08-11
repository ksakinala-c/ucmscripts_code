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


$settings = array(
     array(
        'key'=>'enable_customer_maps',
        'default'=>'1',
         'type'=>'checkbox',
         'description'=>'Enable Customer Maps',
     ),
     array(
        'key'=>'google_maps_api_key',
        'default'=>'AIzaSyDFYt1ozmTn34lp96W0AakC-tSJVzEdXjk',
         'type'=>'text',
         'description'=>'Google Maps API Key',
         'help' => 'This is required to get markers displaying on the map. If markers are not displaying please sign up for your own Google Maps/Geocoding API key and put it here.'
     ),
);
module_config::print_settings_form(
    array(
        'heading' => array(
            'title' => 'Map Settings',
            'type' => 'h2',
            'main' => true,
        ),
        'settings' => $settings,
    )
);
