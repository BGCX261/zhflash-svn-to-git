<?php
/**
 * 缓存接口
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-3-29
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
interface Gloft_Driver_Cache{
	public function set($key, $value, $expir);
	
	public function get($key);
	
	public function del($key);
	
	public function getKeys($keys);
}