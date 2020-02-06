<?php

ini_set('display_errors', 1);

define('ABSPATH',__DIR__);
define('ADMIN_PATH', ABSPATH.'/admin');
define('ADMIN_SCRIPTS_PATH', ADMIN_PATH.'/scripts');

require_once ABSPATH.'/config/database.php';
require_once ADMIN_SCRIPTS_PATH.'/read.php';
require_once ADMIN_SCRIPTS_PATH.'/login.php';

