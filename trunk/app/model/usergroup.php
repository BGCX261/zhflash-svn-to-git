<?php
class UsergroupModel extends CommonModel{
	protected static  $_table = 'user_group';
	protected static  $_fields = array('id', 'name', 'permission');
	
	public static function getList($where='1'){
		$data = self::querySelect(self::$_table, self::$_fields, $where);
		if ($data) {
			foreach ($data as $key=>$item){
				$data[$key]['permission'] = $item['permission'] ? json_decode($item['permission'], true) : array();
			}
		}
		return $data;
	}
	
	public static function get($id){
		$where = "`id`='{$id}'";
		$data = self::querySelectOne(self::$_table, self::$_fields, $where);
		if ($data) {
			$data['permission'] = json_decode($data['permission'], true);
		}
		return $data;
	}
	
	public static function update($id, $data){
		$where = "`id`='{$id}'";
		$update = array();
		foreach ($data as $key=>$item){
			if (in_array($key, self::$_fields)){
				$update[$key] = $item;
			}
		}
		if (isset($update['permission'])) $update['permission'] = json_encode($update['permission']);
		return self::queryUpdate(self::$_table, $update, $where);
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
		$insert['permission'] = json_encode($insert['permission']);
		return self::queryInsert(self::$_table, $insert);
	}
}