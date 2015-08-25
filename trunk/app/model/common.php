<?php
if (!class_exists('Gloft_Core_Models')) {
	require_once GLOFT_PATH . 'core/models.php';
}
/**
 * 数据层抽像
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-3-30
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
class CommonModel extends Gloft_Core_Model{
	protected static  $_table = '';
	protected static  $_fields = array();
	protected static  function tableData($data, $fields){
		$ret = array();
		foreach ($data as $key=>$val){
			if (in_array($key, $fields)){
				$ret[$key] = $val;
			}
		}
		return $ret;
	}
}