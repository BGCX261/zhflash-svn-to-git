<?php
require_once 'weibo.php';
/**
 * 平台接口
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-3-30
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
class Gloft_Library_Platform_Factory{
	private static $_instance;
	
	public static function getInstance($type, $params){
		if ('wb_auth' == $type){
			return new SaeTOAuthV2(WB_KEY, WB_SKEY);
		}elseif ('weibo'==$type){
			return new SaeTClientV2(WB_KEY, WB_SKEY, $params['access_token']);
		}elseif ('weiyouxi'==$type){
			if (!class_exists('WeiyouxiClient')){
				require_once 'weiyouxi.php';
			}
			return new WeiyouxiClient(WYX_SOURCE, WYX_SECRET);
		}
	}
}