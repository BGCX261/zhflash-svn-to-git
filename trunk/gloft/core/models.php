<?php
/**
 * 基础Model模块
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-4-24
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
class Gloft_Core_Models{
	/*
	 * 数据结构
	 */
	protected $structure;
	/*
	 * 待操作数据
	 */
	protected $data;
	/*
	 * 查询条件
	 */
	protected $where;
	/*
	 * Hash种子
	 */
	protected $seed;
	/*
	 * 限制查询条数
	 */
	protected $limit;
	/*
	 * 查询偏移量
	 */
	protected $offset;
	/*
	 * 数据库操作对象
	 */
	protected $db;
	/*
	 * 缓存对象
	 */
	protected $cache;
	/*
	 * 排序规则
	 */
	protected $order;
	/*
	 * 服务器类型 
	 */
	protected $server;
	/*
	 * 操作类型
	 */
	protected $act;
	/*
	 * 查询域
	 */
	protected $find_fields;
	/*
	 * 操作表名
	 */
	protected $table;
	/*
	 * 错误代码
	 */
	protected $errno;
	/*
	 * 错误消息
	 */
	protected $error;
	/*
	 * 返回数据库连接资源
	 */
	private function getDb($server){
		$this->db = Gloft_Driver_Db_Factory::getInstance($server);
		return $this->db;
	}
	
	private function getCache($type){
		$this->cache = Gloft_Driver_Cache_Factory::getInstance($type);
		return $this->cache;
	}
	/*
	 * 执行更新/插入操作
	 */
	function save(){
		$table = $this->hashTable();
		
		$insert = array();
		$fields = array();
		
		$server = $this->server ? $this->server : 'master';
		
		$db = $this->getDb($server);
		
		foreach ($this->data as $k=>$v){
			if (in_array($k, $this->structure['db']['fields'])){
				$insert[] = '\'' . $db->escape($v) . '\'';
				$fields[] = '`' . $k . '`';
			}
		}
		
		$sql = "INSERT INTO `{$table}` (" . implode(',', $fields) . ")VALUES(". implode(',', $insert) .")";
		
		$db->query($sql);
		
		return $this;
	}
	/*
	 * 查询多条数据
	 */
	function find($fields=array()){
		$table = $this->hashTable();
		
		if (!$fields) $fields = $this->structure['db']['fields'];
		$fields = $this->_parseFields($fields);
		$sql = "SELECT $fields FROM $table";
		if ($this->where){
			$sql .= " WHERE {$this->where}";
		}
		if ($this->order) {
			$sql .= " ORDER BY {$this->order}";
		}
		if ($this->limit) {
			$sql .= " LIMIT {$this->offset}, {$this->limit}";
		}
		
		$server = $this->server ? $this->server : 'slave';
		
		$db = $this->getDb($server);
		
		$db->query($sql);
		
		return $this;
	}
	/*
	 * 查询一条数据
	 */
	function findOne($fields=array()){
		$table = $this->hashTable();
		
		if (!$fields) $fields = $this->structure['db']['fields'];
		$fields = $this->_parseFields($fields);
		$sql = "SELECT $fields FROM $table";
		if ($this->where){
			$sql .= " WHERE {$this->where}";
		}
		if ($this->order) {
			$sql .= " ORDER BY {$this->order}";
		}
		
		$sql .= " LIMIT 0,1";
		
		$server = $this->server ? $this->server : 'slave';
		
		$db = $this->getDb($server);
		
		$db->query($sql);
		
		return $this;
	}
	/*
	 * 统计数据
	 */
	function count(){
		$table = $this->table($this->structure['db']['table'])->table;
		
		$sql = "SELECT COUNT(*) `num` FROM `{$table}`";
		
		if ($this->where){
			$sql .= " WHERE {$this->where}";
		}
		
		$server = $this->server ? $this->server : 'slave';
		
		$db = $this->getDb($server);
		
		$ret = $db->query($sql)->fetchOne('assoc');
		
		if ($ret && isset($ret['num'])){
			return intval($ret['num']);
		}
		return 0;
	}
	/*
	 * 删除一条数据
	 */
	function remove(){
		$table = $this->hashTable();
		
		$sql = "DELETE FROM `{$table}`";
		
		if ($this->where){
			$sql .= " WHERE {$this->where}";
		}
		
		if ($this->limit){
			$sql .= " LIMIT {$this->limit}";
		}else{
			$sql .= " LIMIT 1";
		}
		
		$server = $this->server ? $this->server : 'master';
		
		$db = $this->getDb($server);
		
		$db->query($sql);
		
		return $this;
	}
	/*
	 * 更新数据
	 */
	function edit(){
		$table = $this->hashTable();
		
		$update = array();
		
		$server = $this->server ? $this->server : 'master';
		$db = $this->getDb($server);
		
		foreach ($this->data as $k=>$v){
			if (in_array($k, $this->structure['db']['fields'])){
				$update[] = '`' . $k . '` = \'' . $db->escape($v) . '\'' ;
			}
		}
		
		$sql = "UPDATE `{$table}` SET " . implode(',', $update);
		if ($this->where){
			$sql .= " WHERE {$this->where}";
		}
		if ($this->limit){
			$sql .= " LIMIT {$this->limit}";
		}else{
			$sql .= " LIMIT 1";
		}
		$db->query($sql);
		
		return $this;
	}

	/*
	 * 返回最后执行的SQL
	 */
	function sql(){
		return $this->db->sql();
	}
	/*
	 * 返回查询所影响的行数
	 */
	function affectRows(){
		return $this->db->affectRows();
	}
	/*
	 * 将查询返回的资源文件转为数组
	 */
	function fetch($type='assoc'){
		return $this->db->fetch($type);
	}
	/*
	 * 将查询资源的第一行转为数据
	 */
	function fetchOne($type='assoc'){
		return $this->db->fetchOne($type);
	}
	/*
	 * 插入操作最后ID
	 */
	function lastId(){
		return $this->db->lastId();
	}
	private function _parseFields($fields){
		foreach ($fields as $k=>$item){
			$fields[$k] = '`' . $item . '`';
		}
		return implode(',', $fields);
	}
	
	protected function hashTable(){
		if ($this->table) return $this->table;
		if (isset($this->structure['db']['hash'])){
			$seed = $this->seed;
			if(!$seed) $seed = $this->data;
			return sprintf($this->structure['db']['hash']['format'], 
				myHash($seed[$this->structure['db']['hash']['by']], $this->structure['db']['hash']['num'])	
			);
		}else{
			return $this->structure['db']['table'];
		}
	}
	
	function where($where){
		$this->where = $where;
		return $this;
	}
	
	function seed($seed){
		$this->seed = $seed;
		return $this;
	}
	
	function data($data){
		$this->data = $data;
		return $this;
	}
	
	function limit($offset, $limit){
		$this->offset = intval($offset);
		$this->limit = intval($limit);
		return $this;
	}
	
	function order($order){
		$this->order = $order;
		return $this;
	}
	
	function server($server){
		$this->server = $server;
		return $this;
	}
	
	function table($table){
		$this->table = $table;
		return $this;
	}
}