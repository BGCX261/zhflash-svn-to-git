<?php
class IpModel extends CommonModel{
	protected static $_table = 'ip';
	protected static $_fields = array('id', 'department_id', 's_01', 's_02', 's_03', 's_04', 'e_01', 'e_02', 'e_03', 'e_04');
	public static function getList(){
		return self::querySelect(self::$_table, self::$_fields, '1');
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