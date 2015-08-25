<?php
/**
 * 数据库操作类
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-3-26
 * @copyright blog.mrjiang.com
 * ==============================================
 */
if (!class_exists('Gloft_Driver_Db_Exception')) {
	require_once 'exception.php';
}
interface Gloft_Driver_Db{
	/**
	 * 单例接口，反回类实例
	 */
	public function getDb();
	/**
	 * 联接数据库
	 * @param unknown_type $host
	 * @param unknown_type $port
	 * @param unknown_type $uname
	 * @param unknown_type $passwd
	 * @param unknown_type $charset
	 * @param unknown_type $persistent
	 */
	public function connect($host, $port, $uname, $passwd, $dbname, $charset, $persistent=false);
	
	/**
	 * 执行查询
	 * @param unknown_type $sql
	 */
	public function query($sql);
	
	/**
	 * 释放资源
	 */
	public function free();
	
	/**
	 * 关闭联接
	 */
	public function close();
}