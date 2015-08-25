<?php
class UserModel extends CommonModel{
	protected static  $_table = 'user';
	protected static  $_fields = array('id', 'group_id', 'department_id', 'uname', 'passwd', 'alias', 'phone');
	
	public static  function get($id='', $uname=''){
		if (!$id && !$uname){
			return false;
		}
		if ($id){
			$where = "`id`='{$id}'";
		}
		if ($uname) {
			$where = "`uname`='{$uname}'";
		}
		return self::querySelectOne(self::$_table, self::$_fields, $where);
	}
	
	public static function getByUids($uids){
		$uids = array_unique($uids);
		$where = "`id` in (" .implode(',', $uids). ")";
		$data = self::querySelect(self::$_table, self::$_fields, $where);
		$ret = array();
		foreach ($data as $item){
			$ret[$item['id']] = $item;
		}
		return $ret;
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
	
	public static function getList($offset, $limit, $where='1', $order="`id` desc"){
		return self::querySelect(self::$_table, self::$_fields, $where, $offset, $limit, $order);
	}
	
	public static function getCount($where='1'){
		return self::queryCount(self::$_table, $where);
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
	
public static function delete($id){
		$where = "`id`='{$id}'";
		return self::queryDelete(self::$_table, $where);
	}
}