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

print_heading('Step #2: Database Installation');

// check for existing database tables.
// upgrade if neccessary.
// check with each plugin to get a list of SQL to install / upgrade.

//$current_db_version = _UCM_VERSION;

// check if db is installed
//$sql = "SHOW TABLES LIKE '"._DB_PREFIX."config'";
//$res = qa1($sql);
/*
if(count($res)){
    // something is installed, find out what version.
    $sql = "SELECT * FROM `"._DB_PREFIX."config` WHERE `key` = 'db_version'";
    $res = qa1($sql);
    if(count($res)){
        // found a version.
        $current_db_version = $res['val'];
    }
    $do_upgrade = true;
}else{
    $do_upgrade = false;
}*/

// start running all the hooks to install plugins.
$fail = false;
$set_versions = array();
foreach($plugins as $plugin_name => &$p){
    echo "Installing <span style='text-decoration:underline;'>$plugin_name</span> plugin version ".$p->get_plugin_version().".... ";
    if($version = $p->install_upgrade()){ //$do_upgrade,$current_db_version
        echo '<span class="success_text">success</span>';
        $set_versions[$plugin_name] = $version;
    }else{
        $fail = true;
        echo '<span class="error_text">fail</span> ';
    }
    echo '<br>';
}
// all done?

if(isset($set_versions['config'])){
    // config db worked.
    foreach($plugins as $plugin_name => &$p){
        if(isset($set_versions[$plugin_name])){
            $p->init();
            // lol typo - oh well. 
            $p->set_insatlled_plugin_version($set_versions[$plugin_name]);
        }
    }
}


if($fail){
    print_header_message();
    ?>
        <br/>
        Some things failed. Would you like to retry? <br/>
    <a href="?m=setup&amp;step=2" class="uibutton">Retry</a>
    <?php
}else{
    ?>

    <p>Database Installation Success!</p>

    <p><a href="?m=setup&amp;step=3" class="submit_button btn btn-success">Continue to Step 3 &raquo;</a></p>

    <?php
}

?>