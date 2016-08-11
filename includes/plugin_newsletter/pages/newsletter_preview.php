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
$module->page_title = _l('Preview');
//print_heading('Newsletter Editor');

$newsletter_id = isset($_REQUEST['newsletter_id']) ? (int)$_REQUEST['newsletter_id'] : false;
if(!$newsletter_id){
    redirect_browser(module_newsletter::link_list(false));
}
//$newsletter = module_newsletter::get_newsletter($newsletter_id);

if(isset($_REQUEST['show'])){
    // render the newsletter and display it on screen with nothing else.

    echo module_newsletter::render($newsletter_id,false,false,'preview');
    exit;
}

?>


<table width="100%" cellpadding="5">
    <tbody>
    <tr>
        <td width="50%" valign="top">

            <?php
            print_heading(array(
                  'type' => 'h2',
                  'title' => 'Preview Newsletter',
                  'button' => array(
                      'url' => module_newsletter::link_open($newsletter_id),
                      'title' => 'Return to Editor',
                  ),
              ));
            ?>

<iframe src="<?php echo module_newsletter::link_preview($newsletter_id);?>&show=true" frameborder="0" style="width:100%; height:700px; border:0;" background="transparent"></iframe>


    </td></tr></tbody></table>