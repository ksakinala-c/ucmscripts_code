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

$start_search_time = microtime(true);
print_heading(array(
    'title' => 'Search Results',
    'main' => true,
    'type' => 'h2',
    'icon_name' => 'search',
));


if(module_security::is_logged_in()){
    if(!isset($_SESSION['previous_search'])){
        $_SESSION['previous_search'] = array();
    }
    $search_text = isset($_REQUEST['quicksearch']) ? trim(urldecode($_REQUEST['quicksearch'])) : false;
	if($search_text){
		$search_results = array();
		foreach($plugins as $plugin_name => &$plugin){
            // we work out if we bother searching this plugin for results or not.
            if(strlen($search_text)>module_config::c('search_ajax_min_length',2)){
                if(
                    // skip searching this plugin if the last search "foo" didn't return anything and the new search is "foob"
                    isset($_SESSION['previous_search'][$plugin_name]) &&
                    $_SESSION['previous_search'][$plugin_name]['c'] == 0 &&
                    strlen($search_text)>=strlen($_SESSION['previous_search'][$plugin_name]['l']) &&
                    strpos($search_text,$_SESSION['previous_search'][$plugin_name]['l']) === 0
                ){
                    $_SESSION['previous_search'][$plugin_name]['l']=$search_text; // not really needed. but when you backspace a failed search it will force refresh all which might be good.
                    //$this_plugin_results=array('skipping ' . $search_text.' in '.$plugin_name.' last search was '.$_SESSION['previous_search'][$plugin_name]['l'],);
                    continue;
                }else{
                  $this_plugin_results = $plugin->ajax_search($search_text);
                    $_SESSION['previous_search'][$plugin_name] = array(
                        'l'=>$search_text,
                        'c' => count($this_plugin_results),
                    );
                }

                $search_results = array_merge( $search_results , $this_plugin_results );
            }
		}
        if(count($search_results)){
            ?>
<div class="list-group">
    <?php foreach($search_results as $r){ ?>
    <div class="list-group-item">
        <?php echo $r;?>
    </div>
    <?php } ?>
</div>
<?php

        }else{
            //_e('No results');
        }
	}else{
		echo '';
	}
    if(module_config::c('search_ajax_show_time',0)){
        echo '<br>';
        echo 'Search took: '.round(microtime(true)-$start_search_time,5);
    }

}