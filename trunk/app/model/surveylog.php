<?php
class SurveylogModel extends CommonModel{
	protected static $_table = 'survey_log';
	protected static $_fields = array('id', 'department_id', 'r_01', 'r_02', 'r_03', 'r_04', 'r_05', 'r_06', 'r_07', 'r_08', 'pubtime', 'ip');

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