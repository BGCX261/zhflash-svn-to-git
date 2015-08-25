<?php
class MenuModel extends CommonModel{
	protected static  $_table = 'menu';
	
	protected static  $_fields = array('id', 'pid', 'name', 'url', 'hidden');
	
	public static function getList(){
		return self::querySelect(self::$_table, self::$_fields, '1');
	}
	
	public static function get($id){
		return self::querySelectOne(self::$_table, self::$_fields, "`id`='{$id}'");
	}
	
	public static function delete($id){
		$where = "`id`='{$id}' or `pid`='{$id}'";
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