<?php
class SurveystatModel extends CommonModel{
	protected static  $_table = 'survey_stat';
	
	protected static  $_fields = array('id', 'department_id', 'data', 'stattime');
	
	public static function getList(){
		return self::querySelect(self::$_table, self::$_fields, '1');
	}
	
	public static function get($id){
		$data = self::querySelectOne(self::$_table, self::$_fields, "`id`='{$id}'");
		if (isset($data['data'])) $data['data'] = json_decode($data['data'], true);
		return $data;
	}
	
	public static function getLast($department_id){
		$data = self::querySelectOne(self::$_table, self::$_fields, "`department_id`='{$department_id}'", '`id` desc');
		if (isset($data['data'])) $data['data'] = json_decode($data['data'], true);
		
		return $data;
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
		if (isset($insert['data'])) $insert['data'] = json_encode($insert['data']);
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
		if (isset($update['data'])) $update['data'] = json_encode($update['data']);
		return self::queryUpdate(self::$_table, $update, $where);
	}
}