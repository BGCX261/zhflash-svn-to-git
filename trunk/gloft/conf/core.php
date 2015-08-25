<?php
if ($_SERVER['REMOTE_ADDR']=='127.0.0.1'){
	define('ENV', 'dev');//1线下环境
}else{
	define('ENV', 'pub');//2线上环境
}
//定义当前应用平台
define('PLATFORM', 'weibo');
//开启测试开关
define('DEBUG', true);
//数据库引擎
define('DB_ENGIN', 'mysqli');

//加载错误配置表
require_once GLOFT_PATH . 'conf/error.php';
//加载语言包
$_LANG = require_once GLOFT_PATH . 'conf/lang/zh.php';
if (ENV=='dev'){//本地开发环境
	error_reporting(E_ALL);
}else{//线上环境
	error_reporting(0);
}