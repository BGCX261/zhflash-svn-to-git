<?php
class ArchiveModel extends CommonModel{
	protected static  $_table = 'archive';
	protected static  $_fields = array('id', 'catalog_id', 'title', 'author', 'pubtime', 'image', 'memo', 'status', 'url', 'recommend');
	
	public static $STATUS = array(
		'notaudit'	=> '待审核',
		'normal'	=> '正常',
		'deleted'	=> '已删除'
	);
	
	public static function getList($where, $offset, $limit){
		return self::querySelect(self::$_table, self::$_fields, $where, $offset, $limit);
	}
	
	public static function getCount($where){
		return self::queryCount(self::$_table, $where);
	}
	
	public static function catalogTop($where, $num, $order='`id` desc'){
		$sql = "select substring_index(group_concat(`id` order by `id` desc), ',', $num) as `idarr` from `".self::$_table."` where {$where} group by `catalog_id`";
		$data = self::getData($sql);
		$idArr = array();
		if ($data){
			foreach ($data as $item) {
				$idArr[] = $item['idarr'];
			}
		}else{
			return array();
		}
		
		$where = "`id` in (".implode(',', $idArr).")";
		return self::querySelect(self::$_table, self::$_fields, $where);
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