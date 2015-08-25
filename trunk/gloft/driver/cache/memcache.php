<?php
/**
 * Memcache模块引擎
 * ==============================================
 * 适应SAE平台
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-3-29
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
if (!interface_exists('Gloft_Cache_Cache')) {
	require_once 'cache.php';
}
class Gloft_Driver_Cache_Memcache implements Gloft_Driver_Cache{
	private $mem = null;
	
	public function __construct(){
		$this->mem = memcache_init();
		if (false === $this->mem){
			throw new Gloft_Driver_Cache_Exception("memcached server init error");
		}
	}
	/* (non-PHPdoc)
	 * @see Gloft_Driver_Cache::del()
	 */
	public function del($key) {
		// TODO Auto-generated method stub
		return memcache_set($this->mem, $key, null, time()-1);
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Cache::get()
	 */
	public function get($key) {
		// TODO Auto-generated method stub
		return memcache_get($this->mem, $key);
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Cache::getKeys()
	 */
	public function getKeys($keys) {
		// TODO Auto-generated method stub
		$ret = array();
		foreach ($keys as $key){
			$ret[] = $this->get($key);
		}
		return $ret;
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Cache::set()
	 */
	public function set($key, $value, $expir=86400) {
		// TODO Auto-generated method stub
		return memcache_set($this->mem, $key, $value, time()+$expir);
	}

	
	
}