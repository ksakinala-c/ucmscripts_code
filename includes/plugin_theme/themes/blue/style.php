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

if(get_display_mode() !== 'mobile'){
    //todo-change main styles, don't overwrite?
    $styles['body'] = array(
        'd' => 'Overall page settings',
        'v'=>array(
            'color' => '#000000',
            'background-image' => 'none',
            'font-family' => 'Arial, Helvetica, sans-serif',
            'font-size' => '12px',
        ),
    );
    /*$styles['#header,body,#page_middle,.nav,.content'] = array(
        'd' => 'Page Background',
        'v'=>array(
            'background-color' => '#414141',
        ),
    );*/
    $styles['.final_content_wrap,.final_content_wrap .content'] = array(
        'd' => 'Content Background',
        'v'=>array(
            'background-color' => '#FFF',
        ),
    );
    $styles ['#main_menu .nav'] = array(
        'd' => 'Main Menu Navigation',
        'v'=>array(
            'margin' => '0 auto',
            'width' => '1294px',
        ),
    );
    /*$styles ['#header'] = array(
        'd' => 'Header settings',
        'v'=>array(
            'background-color' => '#414141',
        ),
    );*/
    unset($styles ['body,#profile_info a']);
    $styles['#profile_info,#profile_info a'] = array(
        'd' => 'Header font color',
        'v'=>array(
            'color' => '#0079C2',
        ),
    );
    // changing:
    unset($styles ['#page_middle>.content,.nav>ul>li>a,#page_middle .nav,#quick_search_box']);
    $styles ['.nav > ul > li.link_current a, .nav > ul > li.link_current a:link, .nav > ul > li.link_current a:visited'] = array(
        'd' => 'Current menu color',
        'v'=>array(
            'background-color' => '#FFF',
        ),
    );

    $styles ['.nav>ul>li>a,#quick_search_box']['v']['color'] = '#0079C2';
    $styles ['.nav>ul>li>a,#quick_search_box']['v']['background-color'] = '#DBEFF5';

    $styles ['h2']['v']['color'] = '#0079C2';
    $styles ['h2']['v']['background-color'] = '#F3F3F3';
    $styles ['h2']['v']['border'] = '1px solid #cbcbcb';
    $styles ['h3']['v']['color'] = '#0079C2';
    $styles ['h3']['v']['background-color'] = '#DFDFDF';
    $styles ['.search_bar'] = array(
        'd' => 'Search bar',
        'v'=>array(
            'background-color' => '#F3F3F3',
        ),
    );
    $styles ['#header']['v']['height'] = '90px';

}