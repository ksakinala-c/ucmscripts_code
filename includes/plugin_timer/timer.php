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



class module_timer extends module_base{


    public $version = 2.131;
    //2.11 - first Task Timer version
    //2.12 - one active timer at a time
    //2.13 - 2014-02-18 - timer js update
    //2.131 - 2014-07-14 - only show timer on hourly tasks
    //2.132 - 2016-02-02 - timer theme overriding support

    public static function can_i($actions,$name=false,$category=false,$module=false){
        if(!$module)$module=__CLASS__;
        return parent::can_i($actions,$name,$category,$module);
    }
	public static function get_class() {
        return __CLASS__;
    }
	public function init(){
		$this->module_name = "timer";
		$this->module_position = 0;

        if(module_security::is_logged_in() && module_config::c('timer_enabled',1) && self::can_i('view','Task Timer') && get_display_mode() != 'mobile'){

            module_config::register_css('timer','timer.css');
            module_config::register_js('timer','timer.js');
            hook_add('job_task_after','module_timer::hook_job_task_after');


            hook_add('header_print_js','module_timer::hook_header_print_js');
        }
    }

    public static function hook_header_print_js(){
        ?>
        <script type="text/javascript">
           $(function(){
               ucm.timer.mode = <?php echo (int)module_config::c('timer_mode',1);?>;
           });
        </script>
        <?php
    }

    public function handle_hook($hook_name){
        if($hook_name=='top_menu_end' && module_config::c('timer_enabled',1) && module_security::is_logged_in() && self::can_i('view','Task Timer') && get_display_mode() != 'mobile'){

	        include module_theme::include_ucm('includes/plugin_timer/inc/timer_menu.php');
        }
    }

    public static function hook_job_task_after($hook,$job_id,$task_id,$job_data,$task_data){
        if($task_data['manual_task_type'] == _TASK_TYPE_HOURS_AMOUNT){
            ?>
                <a href="#" class="timer_task ui-state-default ui-corner-all ui-icon ui-icon-clock" data-jobid="<?php echo (int)$job_id;?>" data-taskid="<?php echo (int)$task_id;?>" data-completed="<?php echo (int)$task_data['fully_completed'];?>" <?php echo $task_data['fully_completed'] ? ' style="display:none;"':'';?> title="<?php _e('Task Timer');?>">Timer</a>
            <?php
        }
    }
}