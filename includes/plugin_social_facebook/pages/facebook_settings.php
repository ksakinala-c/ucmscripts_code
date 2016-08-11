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


if(_DEMO_MODE){
	?>
	<p>Demo Mode Notice: <strong>This is a public demo. Please only use TEST accounts here as others will see them.</strong></p>
	<?php
}


if(isset($_REQUEST['social_facebook_id']) && !empty($_REQUEST['social_facebook_id'])){
    $social_facebook_id = (int)$_REQUEST['social_facebook_id'];
	$social_facebook = module_social_facebook::get($social_facebook_id);
    include('facebook_account_edit.php');
}else{
	include('facebook_account_list.php');
}
