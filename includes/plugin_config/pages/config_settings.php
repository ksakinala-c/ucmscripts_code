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

if(class_exists('module_security',false)){
    // if they are not allowed to "edit" a page, but the "view" permission exists
    // then we automatically grab the page and regex all the crap out of it that they are not allowed to change
    // eg: form elements, submit buttons, etc..
    module_security::check_page(array(
        'category' => 'Config',
        'page_name' => 'Settings',
        'module' => 'config',
        'feature' => 'Edit',
    ));
}
$module->page_title = 'Settings';

?>


<form action="" method="post">

    <?php
module_form::prevent_exit(array(
    'valid_exits' => array(
        // selectors for the valid ways to exit this form.
        '.submit_button',
    ))
);
?>
    <input type="hidden" name="_process" value="save_config">

    <style type="text/css">
        .config_variable{
            border:1px solid #EFEFEF;
            padding:2px;
            min-width: 50px;
            display: inline-block;
            cursor: pointer;
        }
    </style>
       
        <p><?php _e('Advanced Configuration area below. This contains every configurable value in the system. Change at own risk :)');?>
        <br/>Please <strong>click</strong> on an item to change it.</p>

    <table class="tableclass tableclass_rows">
        <thead>
        <tr>
            <th>
                <?php echo _l('Configuration Key');?>
            </th>
            <th>
                <?php echo _l('Configuration Value');?>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach(get_multiple('config',false,'key','exact','`key`') as $config){
            if(isset($config['key']) && isset($config['key'][0]) && $config['key'][0]=='_')continue;
            ?>
        <tr>
            <th>
                <?php echo $config['key']; ?>
            </th>
            <td>
                <span data-name="config[<?php echo htmlspecialchars($config['key']);?>]" class="config_variable"><?php echo htmlspecialchars($config['val']);?></span>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <th></th>
            <td>
                <input type="submit" name="save" value="Save" class="submit_button">
            </td>
        </tr>
        </tbody>
    </table>
</form>

<script type="text/javascript">
    $(function(){
        $('.config_variable').click(function(){
            var txt = $('<input type="text" name="'+$(this).attr('data-name')+'" value="">');
            $(this).after(txt.val($(this).html()));
            $(this).remove();
            txt[0].focus();
            txt[0].select();
        });
    });
</script>
