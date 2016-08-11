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

// todo: _DEMO_MODE - dont allow access to setup wizard.

if(_UCM_INSTALLED && !module_security::is_logged_in()){
    ob_end_clean();
    echo 'Sorry the system is already installed. You need to be logged in to run the setup again.';
    exit;
}

print_heading('Step #5: Complete');?>

      <p>Congratulations. The Ultimate Client Manager is now installed! You can find more settings under the "settings" menu.</p>

    <p>Have fun exploring the system and configuring it to suit your needs. Be sure to follow me on twitter (<a href="http://twitter.com/dtbaker" target="_blank">@dtbaker</a>) to hear about UCM updates. </p>

    <p>If you have any support requests or find a bug please send it to this website: <a href="http://ultimateclientmanager.com/" target="_blank">ultimateclientmanager.com</a> - you can submit a support ticket or search the community forum. </p>

    <p>I've spent a long time building this system so I hope it will fit into your business needs nicely. If you like this little package please leave a review from your <a href="http://codecanyon.net/downloads" target="_blank">CodeCanyon downloads page</a>. Enjoy! <br><br>
        Cheers,<br>
        dtbaker

    </p>

    
    <p align="center">
        <a href="<?php echo _BASE_HREF;?>?m[0]=config&p[0]=config_admin&m[1]=config&p[1]=config_basic_settings" class="submit_button btn btn-success">Show me to more settings!</a>
    </p>
