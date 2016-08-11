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
if(isset($_REQUEST['go'])){
    ob_end_clean();
    echo '<pre>';
    _e("Checking for bounces, please wait...");
    echo "\n\n";
    module_newsletter::check_bounces(true);
    echo "\n\n";
    _e("done.");
    echo '</pre>';

    exit;
}

$module->page_title = _l('Newsletter Bounce Checking');
print_heading('Newsletter Bounce Checking');

?>
<p><?php _e('Bounces are checked automatically using the CRON job, however if you want to check for bounces manually (ie: to see any error) please click the button below.');?></p>
<form action="" method="post">
<input type="submit" name="go" value="<?php _e('Check for bounces');?>">
</form>