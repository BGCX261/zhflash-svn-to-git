<?php
if (!defined('GLOFT_PATH')){
	exit('gloft path not defined');
}

define('APP_HOME', ROOT_PATH . 'app/');

define('CONTROLLER_HOME', APP_HOME . 'controller/');

define('MODEL_HOME', APP_HOME . 'model/');

define('BUSINESS_HOME', APP_HOME . 'business/');

define('TPL_HOME', ROOT_PATH . 'template/');

define('CHAR_SET', 'UTF8');

define('CACHE_MEM', false);

define('CACHE_KV', false);