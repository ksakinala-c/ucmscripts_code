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

$newsletter_id = (isset($_REQUEST['n'])) ? (int)$_REQUEST['n'] : false;
$newsletter_member_id = (isset($_REQUEST['nm'])) ? (int)$_REQUEST['nm'] : 0;
$send_id = (isset($_REQUEST['s'])) ? (int)$_REQUEST['s'] : 0;
$hash = (isset($_REQUEST['hash'])) ? trim($_REQUEST['hash']) : false;
if($newsletter_id && $newsletter_member_id && $hash){
    if(isset($_REQUEST[_MEMBER_HASH_URL_REDIRECT_BITS])){
        $correct_hash = module_newsletter::newsletter_redirect_hash($newsletter_member_id,$send_id);
    }else{
        $correct_hash = module_newsletter::unsubscribe_url($newsletter_id,$newsletter_member_id,$send_id,true);
    }
    if($correct_hash == $hash){
        $member = module_newsletter::get_newsletter_member($newsletter_member_id);

        if(isset($_REQUEST['email']) && $_REQUEST['email']) {

            if(strtolower($member['email']) == strtolower($_REQUEST['email'])){
                module_newsletter::unsubscribe_member($newsletter_id,$newsletter_member_id,$send_id);
            }else{
                if(!module_newsletter::unsubscribe_member_via_email($_REQUEST['email'])){
                    echo 'Unsubscribe failed... Please enter a valid email address.';
                }
            }

            // is the newsletter module giving us a subscription redirection?
            if(module_config::c('newsletter_unsubscribe_redirect','')){
                redirect_browser(module_config::c('newsletter_unsubscribe_redirect',''));
            }
            // or display a message.

            $template = module_template::get_template_by_key('newsletter_unsubscribe_done');
            $data = $member;
            $template->page_title = htmlspecialchars(_l('Unsubscribe'));
            $template->assign_values($data);
            echo $template->render('pretty_html');
            exit;
        }else{

            // correct!
            // load up the receipt template.
            $template = module_template::get_template_by_key('newsletter_unsubscribe');
            $data = $member;
            $data['email'] = htmlspecialchars($data['email']); // to be sure to be sure
            $template->page_title = htmlspecialchars(_l('Unsubscribe'));

            $template->assign_values($data);
            echo $template->render('pretty_html');
            exit;
        }
    }
}else{
    // show normal unsubscribe form. asking for their email address.

    if(isset($_REQUEST['email']) && trim($_REQUEST['email'])) {

        $email = htmlspecialchars(strtolower(trim($_REQUEST['email'])));
        if(!module_newsletter::unsubscribe_member_via_email($email)){
            echo 'Unsubscribe failed... Please enter a valid email address.';
            exit;
        }

        // is the newsletter module giving us a subscription redirection?
        if(module_config::c('newsletter_unsubscribe_redirect','')){
            redirect_browser(module_config::c('newsletter_unsubscribe_redirect',''));
        }
        // or display a message.

        $template = module_template::get_template_by_key('newsletter_unsubscribe_done');
        $data['email'] = $email;
        $template->page_title = htmlspecialchars(_l('Unsubscribe'));
        $template->assign_values($data);
        echo $template->render('pretty_html');
        exit;


    }
    $template = module_template::get_template_by_key('newsletter_unsubscribe');
    $data['email'] = ''; // to be sure to be sure
    $template->page_title = htmlspecialchars(_l('Unsubscribe'));

    $template->assign_values($data);
    echo $template->render('pretty_html');
    exit;
}
// show different templates.