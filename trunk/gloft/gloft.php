<?php
/**
 * 系统核心类，应用加载控制器
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-3-28
 * @copyright blog.mrjiang.com
 * ==============================================
 */

session_start();
header('P3P: CP=CAO PSA OUR');
class Gloft{
	
	private $_package = '';
	private $_ctrl = null;
	private $_method = null;
	
	/**
	 * 实例化
	 * @param string $package	包名
	 */
	function __construct($package='default'){
		
		if ($package)
			$this->_package = $package;
		$this->_init();
	}
	
	/**
	 * 启动程序
	 */
	function run(){
		$ctrlname = ucfirst($this->_ctrl) . 'Controller';
		$ctrl = new $ctrlname();
		$ctrl->plugin_before();
		$method = $this->_method;
		$ctrl->plugin_after();
		$ctrl->$method();
	}
	
	/**
	 * 路由器
	 */
	private function _router(){
		$router = isset($_REQUEST['_router_']) ? trim($_REQUEST['_router_']) : '';
		$router = trim($router, '/');
		$routerArr = $router ? explode('/', $router) : array();
		if (!isset($routerArr[0]) || !$routerArr[0]) array_unshift($routerArr, 'default');
		if ($routerArr[0]){
			if (!file_exists(CONTROLLER_HOME . $routerArr[0])){
				array_unshift($routerArr, 'default');
			}
			$this->_package = $routerArr[0];
		}
		$this->_ctrl = isset($routerArr[1]) ? $routerArr[1] : 'index';
		$this->_method = isset($routerArr[2]) ? $routerArr[2] : '_default';
		$GLOBALS['ctrl'] = $this->_ctrl;
		$GLOBALS['method'] = $this->_method;
	}
	
	/**
	 * 初始化行为
	 */
	private function _init(){
		$this->_define();
		$this->_autoload();
		$this->_router();
		$this->_loadController();
	}
	
	/**
	 * 常量定义
	 */
	private function _define(){
		$root = dirname( dirname(__FILE__) );
		$root = rtrim($root, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
		define('ROOT_PATH', $root);
		
		define('GLOFT_PATH', $root . 'gloft/');
	}
	
	/**
	 * 自动加载系统文件
	 */
	private function _autoload(){
		$require = require_once GLOFT_PATH . 'conf/autoload.php';
		
		foreach ($require as $path){
			if(!file_exists($path)){
				exit('file not exist:' . $path);
			}
			require_once $path;
		}
	}
	
	/**
	 * 控制器加载
	 */
	private function _loadController(){
		$filename = CONTROLLER_HOME . $this->_package . DIRECTORY_SEPARATOR . $this->_package . '.php';
		if (!file_exists($filename)){
			exit('file not exist:' . $filename);
		}
		require_once $filename;
		$filename = CONTROLLER_HOME . $this->_package . DIRECTORY_SEPARATOR . $this->_ctrl . '.php';
		if (!file_exists($filename)){
			exit('file not exist:' . $filename);
		}
		require_once $filename;
	}
}