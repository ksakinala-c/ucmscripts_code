<?php

//Ultimate Client Manager - config file

define('_DB_SERVER','localhost');
define('_DB_NAME','steven');
define('_DB_USER','root');
define('_DB_PASS','Welcome#324');
define('_DB_PREFIX','ucm_');

define('_UCM_VERSION',2);
define('_UCM_FOLDER',preg_replace('#includes$#','',dirname(__FILE__)));
define('_UCM_SECRET','15c8333d35c9bc39c65993445a198aa7'); // change this to something unique

define('_EXTERNAL_TUNNEL','ext.php');
define('_EXTERNAL_TUNNEL_REWRITE','external/');
define('_ENABLE_CACHE',true);
define('_DEBUG_MODE',false);
define('_DEMO_MODE',false);
if(!defined('_REWRITE_LINKS'))define('_REWRITE_LINKS',false);

ini_set('display_errors',false);
ini_set('error_reporting',0);

