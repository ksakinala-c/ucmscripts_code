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

if(!module_social::can_i('edit','Twitter','Social','social')){
    die('No access to Twitter accounts');
}

$social_twitter_id = isset($_REQUEST['social_twitter_id']) ? (int)$_REQUEST['social_twitter_id'] : 0;
$twitter_account = new ucm_twitter_account($social_twitter_id);


?>
Manually refreshing twitter data...
<?php

$twitter_account->import_data(true);
