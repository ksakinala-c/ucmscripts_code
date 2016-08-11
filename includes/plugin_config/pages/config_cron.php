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
print_heading('CRON Job / Scheduled Task');

?>
<p>
    <?php _e('The CRON Job/Scheduled Task should run at least once a day to process any background tasks for the system (like sending out newsletters). Idealy the CRON job should be setup to run every 15 minutes if you have the option, but once a day should do the trick for most people.'); ?>
</p>
<p>
   <?php _e('Please contact your hosting provider for instructions on how to set the CRON job. Here are the details you need:'); ?>
</p>

<table class="tableclass">
    <tbody>
    <tr>
        <th>Command/Script to execute:</th>
        <td>
            <?php
            echo 'php '.getcwd().'/cron.php';?>
            <br/>
            (or try <?php echo '/usr/bin/php '.getcwd().'/cron.php';?> if the above doesn't work)
        </td>
    </tr>
    <tr>
        <th>Run every:</th>
        <td>
            15 minutes
        </td>
    </tr>
    <tr>
        <th>
            Minute:
        </th>
        <td>
            */15
        </td>
    </tr>
    <tr>
        <th>
            Hour:
        </th>
        <td>
            *
        </td>
    </tr>
    <tr>
        <th>
            Day of month:
        </th>
        <td>
            *
        </td>
    </tr>
    <tr>
        <th>
            Month:
        </th>
        <td>
            *
        </td>
    </tr>
    <tr>
        <th>
            Day of week:
        </th>
        <td>
            *
        </td>
    </tr>
    </tbody>
</table>


    <em><?php _e('Or - if you cannot setup a CRON job through your hosting provider you can use one of the many <a href="http://www.google.com.au/search?q=free+web+based+cron+job" target="_blank">free web based cron job</a> services to process the CRON job at this special URL: <br> %s <br>(or just click that special CRON job URL every now and then).',full_link('cron.php?hash='.md5(_UCM_SECRET.' secret hash '))); ?></em>