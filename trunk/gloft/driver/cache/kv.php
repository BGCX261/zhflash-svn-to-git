<?php
/**
 * KV数据缓存
 * ==============================================
 * 适用于SAE平台
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
class Gloft_Driver_Cache_Kv implements Gloft_Driver_Cache{
	private $kv = null;
	
	public function __construct(){
		$this->kv = new SaeKV();
		if (true!=$this->kv->init()) {
			throw new Gloft_Driver_Cache_Exception('KvDb init fail');
		}
	}
	
	/* (non-PHPdoc)
	 * @see Gloft_Driver_Cache::del()
	 */
	public function del($key) {
		// TODO Auto-generated method stub
		return $this->kv->delete($key);
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Cache::get()
	 */
	public function get($key) {
		// TODO Auto-generated method stub
		return $this->kv->get($key);
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Cache::getKeys()
	 */
	public function getKeys($keys) {
		// TODO Auto-generated method stub
		$ret = array();
		
		$keyLen = count($keys);
		
		for ($i = 0; $i < $keyLen; $i+=MAX_MGET_SIZE) {
			$tmpKeys = array_slice($keys, $i, MAX_MGET_SIZE);
			$tmpData = $this->kv->mget($tmpKeys);
			$ret = array_merge($ret, $tmpData);
		}
		return $ret;
		
	}
	
	public function getPre($pre, $count, $start_key=null){
		$data = $this->kv->pkrget($pre, $count, $start_key);
		if ($data){
			$data = array_values($data);
		}
		return $data;
	}

	/* (non-PHPdoc)
	 * @see Gloft_Driver_Cache::set()
	 */
	public function set($key, $value, $expir=0) {
		//expire不可用
		// TODO Auto-generated method stub
		return $this->kv->set($key, $value);
	}

	
}