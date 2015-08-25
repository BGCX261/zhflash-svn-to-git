<?php
class CommentModel extends CommonModel{
	protected static $_table = 'comment';
	protected static $_fields = array('id', 'department_id', 'author', 'content', 'pubtime', 'reply', 'replytime', 'status');
	public static function getList($where, $start, $limit){
		return self::querySelect(self::$_table, self::$_fields, $where, $start, $limit);
	}
	
	public static function getCount($where){
		return self::queryCount(self::$_table, $where);
	}
	
	public static function get($id){
		return self::querySelectOne(self::$_table, self::$_fields, "`id`='{$id}'");
	}
	
	public static function delete($id){
		$where = "`id`='{$id}'";
		return self::queryDelete(self::$_table, $where);
	}
	
	public static function add($data){
		$insert = array();
		foreach ($data as $key=>$val){
			if (in_array($key, self::$_fields)){
				$insert[$key] = $val;
			}
		}
		return self::queryInsert(self::$_table, $insert);
	}
	
	public static function getFromIp($ip){
		$ipArray = explode('.', $ip);
		
	}
	
	public static function getByDepartmentId($department_id){
		$where = "`department_id`='{$department_id}'";
		return self::querySelect(self::$_table, self::$_fields, $where);
	}
	
	
	public static function update($id, $data){
		$where = "`id`='{$id}'";
		$update = array();
		foreach ($data as $key=>$item){
			if (in_array($key, self::$_fields)){
				$update[$key] = $item;
			}
		}
		return self::queryUpdate(self::$_table, $update, $where);
	}
}