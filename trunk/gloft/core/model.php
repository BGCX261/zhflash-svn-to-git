<?php
/**
 * 数据库基类封装
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-5-3
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
class Gloft_Core_Model{
	private static $handle = null;
	private static $server = 'master';
	private static $adapter = 'mysqli';
	const CACHE_TYPE_KV 	= 'kv';//缓存类型kv
	const CACHE_TYPE_MEM	= 'mem';//缓存类型mem
	const CACHE_TYPE_BOTH	= 'both';//缓存类型kv+mem
	
	const _SQL_INSERT_ 			= "INSERT INTO `%s` (%s) VALUES (%s);";
	const _SQL_INSERT_BATCH_	= "INSERT INTO `%s` (%s) VALUES %s;";
	const _SQL_INSERT_UPDATE_	= "INSERT INTO `%s` (%s) VALUES (%s) ON DUPLICATE KEY UPDATE %s;";
	const _SQL_SELECT_ONE_		= "SELECT %s FROM `%s` WHERE %s %s LIMIT 0,1;";
	const _SQL_SELECT_			= "SELECT %s FROM `%s` WHERE %s %s";
	const _SQL_COUNT_			= "SELECT COUNT(*) AS `count` FROM `%s` WHERE %s;";
	const _SQL_UPDATE_ONE_		= "UPDATE `%s` SET %s WHERE %s LIMIT 1;";
	const _SQL_UPDATE_			= "UPDATE `%s` SET %s WHERE %s;";
	const _SQL_DELETE_			= "DELETE FROM `%s` WHERE %s;";
	const _SQL_DELETE_ONE_		= "DELETE FROM `%s` WHERE %s LIMIT 1;";
	
	/**
	 * 获取一个数据库写资源
	 */
	private static function getDb($server){
		self::$handle = Gloft_Driver_Db_Factory::getInstance($server);
		return self::$handle;
	}
	
	/**
	 * 执行一个插入操作
	 * @param string $table	表名
	 * @param array	 $data	插入的值
	 */
	public static function queryInsert($table, $data){
		$server = self::$server ? self::$server : 'master';
		$db = self::getDb($server);
		
		$sql = sprintf(self::_SQL_INSERT_, $table, self::_buildFields(array_keys($data)), self::_buildValues($data));
		$db->query($sql);
		return $db->affectRows();
	}
	
	/**
	 * 批量插入数据
	 * @param string	 $table	表名
	 * @param array		 $data	数据
	 */
	public static function queryInsertBatch($table, $data){
		$server = self::$server ? self::$server : 'master';
		$db = self::getDb($server);
		$fields = self::_buildFields(array_keys($data[0]));
		foreach ($data as &$row){
			$row = '(' . self::_buildValues($row) . ')';
		}
		$values = implode(',', $data);
		$sql = sprintf(self::_SQL_INSERT_BATCH_, $table, $fields, $values);
		$db->query($sql);
		return $db->affectRows();
	}
	
	/**
	 * 插入同时更新
	 * ****************************************
	 * 插入并更新重复的值
	 * ****************************************
	 * @param string $table	表名
	 * @param array	 $data	数据
	 */
	public static function queryInsertUpdate($table, $data){
		$server = self::$server ? self::$server : 'master';
		$db = self::getDb($server);
		$keys = array_keys($data);
		$fields = self::_buildFields($keys);
		$values = self::_buildValues($data);
		foreach ($keys as &$key){
			$key = "`$key`=VALUES(`$key`)";
		}
		$sql = sprintf(self::_SQL_INSERT_UPDATE_, $table, $fields, $values, implode(',', $keys));//echo $sql;
		$db->query($sql);
		return $db->affectRows();
	}
	
	/**
	 * 读取一条数据
	 * @param string	 $table		表名
	 * @param multi		 $fields	查询的字段，数组或者字符串
	 * @param string	 $where		查询的条件
	 * @param string	 $order		排序的条件
	 */
	public static function querySelectOne($table, $fields, $where, $order=''){
		$server = self::$server ? self::$server : 'slave';
		$db = self::getDb($server);
		$fields = is_array($fields) ? implode(',', $fields) : $fields; 
		$order = $order ? 'ORDER BY ' . $order : '';
		$sql = sprintf(self::_SQL_SELECT_ONE_, $fields, $table, $where, $order);
		$db->query($sql);
		return $db->fetchOne();
	}
	
	/**
	 * 读取一批数据
	 * @param string	 $table		表名
	 * @param multi		 $fields	字段，数组或字符串
	 * @param string	 $where		查询的条件
	 * @param int		 $start		查询游标
	 * @param int		 $limit		查询记录数
	 * @param string	 $order		排序条件
	 */
	public static function querySelect($table, $fields, $where, $start=0, $limit=0, $order=''){
		$server = self::$server ? self::$server : 'slave';
		$db = self::getDb($server);
		$fields = is_array($fields) ? self::_buildFields($fields) : $fields;
		$queryStr = '';
		if ($order){
			$queryStr .= " ORDER BY $order ";
		}
		if ($limit){
			$queryStr .= " LIMIT $start, $limit";
		}
		$sql = sprintf(self::_SQL_SELECT_, $fields, $table, $where, $queryStr);//echo $sql;
		$db->query($sql);
		return $db->fetch();
	}
	
	/**
	 * 返回插入所影响的最后一条记录
	 */
	public static function lastId(){
		$server = self::$server ? self::$server : 'slave';
		$db = self::getDb($server);
		return $db->lastId();
	}
	
	public static function lastSql(){
		return self::$handle->sql();
	}
	
	/**
	 * 执行SQL并返回处理后的关联数组
	 * @param string $sql	SQL
	 */
	public static function getData($sql){
		$server = self::$server ? self::$server : 'slave';
		$db = self::getDb($server);
		$db->query($sql);
		return $db->fetch();
	}
	
	/**
	 * 返回写操作所影响的行数
	 */
	public static function affectRows(){
		$server = self::$server ? self::$server : 'master';
		$db = self::getDb($server);
		return $db->getAffectRows();
	}
	
	/**
	 * 统计记录数
	 * @param string	 $table	表名
	 * @param string	 $where	统计条件
	 */
	public static function queryCount($table, $where){
		$server = self::$server ? self::$server : 'slave';
		$db = self::getDb($server);
		$sql = sprintf(self::_SQL_COUNT_, $table, $where);
		$db->query($sql);
		$data = $db->fetchOne();
		if (isset($data['count'])){
			return intval($data['count']);
		}else{
			return 0;
		}
	}
	
	/**
	 * 执行数据库更新操作
	 * @param string	$table	表名
	 * @param array	 	$data	数据
	 * @param string 	$where	更新的条件
	 */
	public static function queryUpdate($table, $data, $where){
		$values = array();
		$server = self::$server ? self::$server : 'master';
		$db = self::getDb($server);
		foreach ($data as $key=>$val){
			$values[] = "`{$key}`='" . self::_escape($val) . "'";
		}
		$sql = sprintf(self::_SQL_UPDATE_, $table, implode(',', $values), $where);
		$db->query($sql);
		return $db->affectRows();
		//return $db->getAffectRows();
	}
	
	/**
	 * 执行删除条件
	 * @param string $table	表名
	 * @param string $where	删除的条件
	 */
	public static function queryDelete($table, $where){
		$sql = sprintf(self::_SQL_DELETE_, $table, $where);
		$server = self::$server ? self::$server : 'master';
		$db = self::getDb($server);
		$db->query($sql);
		return $db->affectRows();
	}
	
	/**
	 * 直接执行一条SQL
	 * @param string $sql SQL
	 */
	public static function query($sql){
		$server = self::$server ? self::$server : 'master';
		$db = self::getDb($server);
		return $db->query($sql);
	}
	
	/**
	 * 构建字段数组
	 * @param array $keys	字段数组	
	 */
	private static function _buildFields($keys){
		foreach ($keys as &$key){
			$key = '*'==$key ? $key : "`$key`";
		}
		return implode(',', $keys);
	}
	
	private static function _buildValues($data){
		foreach ($data as &$val){
			$val = '\'' . self::_escape($val) . '\'';
		}
		return implode(',', $data);
	}
	
	private static function _escape($string){
		return self::$handle->escape($string);
	}
	
	protected static function cacheSet($key, $value, $type=self::CACHE_TYPE_KV){
		$flag = true;
		if (self::CACHE_TYPE_KV==$type || self::CACHE_TYPE_BOTH==$type){
			$kv = Gloft_Driver_Cache_Factory::getInstance(Gloft_Driver_Cache_Factory::TYPE_KV);
			$flag = $kv->set($key, $value);
		}
		if (false === $flag) return $flag;
		if (self::CACHE_TYPE_MEM==$type || self::CACHE_TYPE_BOTH==$type) {
			$mem = Gloft_Driver_Cache_Factory::getInstance(Gloft_Driver_Cache_Factory::TYPE_MEM);
			$flag = $mem->set($key, $value);
		}
		return $flag;
	}
	
	protected static function cacheGet($key, $type=self::CACHE_TYPE_KV){
		$data = false;
		if (self::CACHE_TYPE_MEM==$type || self::CACHE_TYPE_BOTH==$type){
			$mem = Gloft_Driver_Cache_Factory::getInstance(Gloft_Driver_Cache_Factory::TYPE_MEM);
			$data = $mem->get($key);
		}
		
		if (false === $data){
			if (self::CACHE_TYPE_KV==$type || self::CACHE_TYPE_BOTH==$type){
				$kv = Gloft_Driver_Cache_Factory::getInstance(Gloft_Driver_Cache_Factory::TYPE_KV);
				$data = $kv->get($key);
				if ($data && self::CACHE_TYPE_BOTH==$type){
					self::cacheSet($key, $data, self::CACHE_TYPE_MEM);
				}
			}
		}
		return $data;
	}
	
	protected static function cacheGetKeys($keys, $type='kv'){
		$data = false;
		foreach ($keys as $key){
			$data[$key] = self::cacheGet($key, $type);
		}
		
		return $data;
	}
	
	protected static function cacheGetPre($pre, $count, $start_key=null){
		$kv = Gloft_Driver_Cache_Factory::getInstance(Gloft_Driver_Cache_Factory::TYPE_KV);
		$data = $kv->getPre($pre, $count, $start_key);
		return $data;
	}
	
	protected static function cacheDel($key, $type='kv'){
		$flag = true;
		if ('kv'==$type || 'both'==$type){
			$kv = Gloft_Driver_Cache_Factory::getInstance(Gloft_Driver_Cache_Factory::TYPE_KV);
			$flag = $flag && $kv->del($key);
		}
		if (false === $flag) return $flag;
		if ('mem'==$type || 'mem'==$type) {
			$mem = Gloft_Driver_Cache_Factory::getInstance(Gloft_Driver_Cache_Factory::TYPE_MEM);
			$flag = $flag && $mem->del($key);
		}
		return $flag;
	}
	
	/**
	 * Hash找到表
	 * @param mixed $base	基值
	 * @param int $count	hash的数量
	 */
	protected static function hashTable($base, $count){
		$crc = sprintf('%u', $base);
		return $crc % $count;
	}
}