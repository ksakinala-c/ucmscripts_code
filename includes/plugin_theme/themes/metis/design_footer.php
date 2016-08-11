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
switch($display_mode){
    case 'iframe':
        ?>
         </div> <!-- end .inner -->
         </div> <!-- end .outer -->
         </div> <!-- end .content -->
        </body>
        </html>
        <?php
        module_debug::push_to_parent();
        break;
    case 'ajax':

        break;
    case 'normal':
    default:


		if(function_exists('hook_handle_callback')){
			hook_handle_callback('content_footer');
		}
        ?>

         </div> <!-- end .inner -->
         </div> <!-- end .outer -->
         </div> <!-- end .content -->

        </div>
        <!-- /#wrap -->


        <div id="footer">
            <p>&copy; <?php echo module_config::s('admin_system_name','Ultimate Client Manager'); ?>
              - <?php echo date("Y"); ?>
              - Version: <?php echo module_config::current_version(); ?>
              - Time: <?php echo round(microtime(true)-$start_time,5);?>
            </p>
        </div>

        </body>
        </html>
        <?php
        break;
}