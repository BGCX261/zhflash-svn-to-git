<?php
/**
 * 管理员模块
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-4-9
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
class AdminModel extends CommonModel{
	protected static  $_table = 'admin';
	protected static  $_fields = array('id', 'uname', 'passwd', 'alias');
	
	public  function get($uid='', $uname=''){
		$where = '';
		
		if (empty($uid) && empty($uname)){
			return false;
		}
		
		if ($uid){
			$where = "`id`='{$uid}'";
		}
		
		if ($uname){
			$where = "`uname`='{$uname}'";
		}
		
		return $this->querySelectOne($this->$_table, $this->$_fields, $where);
	}
}