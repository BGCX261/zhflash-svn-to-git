<?php
/**
 * 实例化数据库操作类的工厂类
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-3-28
 * @copyright blog.mrjiang.com
 * ==============================================
 */
class Gloft_Driver_Db_Factory{
	static $instance = NULL;
	static function getInstance($server=null, $type=null){
		if (!$type) $type = DB_ENGIN;
		$type = strtolower($type);
		
		if('mysql'==$type){
			
		}elseif ('mysqli'==$type){
			if (!class_exists('Gloft_Dirver_Db_Mysqli')){
				require_once 'mysqli.php';
			}
			if (!isset(self::$instance[$server]) || !self::$instance[$server]){
				$config = $GLOBALS['db']['mysqli'][$server];
				self::$instance[$server] = new Gloft_Driver_Db_Mysqli(
					$config['host'], 
					$config['port'], 
					$config['uname'], 
					$config['passwd'], 
					$config['dbname'], 
					CHAR_SET);
			}
			return self::$instance[$server];
		}
	}
}