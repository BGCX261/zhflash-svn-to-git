<?php
/**
 * 实例化缓存接口
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-3-29
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
class Gloft_Driver_Cache_Factory{
	private static $instance;
	
	const TYPE_KV = 'kv';
	const TYPE_MEM = 'memcache';
	
	public static function getInstance($type='kv'){
		$type = strtolower($type);
		$filename = $type . '.php';
		$classname = 'Gloft_Driver_Cache_' . ucfirst($type);
		if (!class_exists($classname)) {
			require $filename;
		}
		if(!isset(self::$instance[$type]) || !self::$instance[$type]){
			self::$instance[$type] = new $classname();
		}
		return self::$instance[$type];
	}
}