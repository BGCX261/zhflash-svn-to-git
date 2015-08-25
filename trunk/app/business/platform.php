<?php
/**
 * 平台接口
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-5-10
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
class PlatformBusiness{
	
	private static function getAdapter(){
		//线上测试环境
		$access_token = $_SESSION['access_token'];
		if ('weibo'==PLATFORM){
			$platform = Gloft_Library_Platform_Factory::getInstance(PLATFORM, array('access_token'=>$access_token));
		}else{
			$platform = Gloft_Library_Platform_Factory::getInstance(PLATFORM, array());
		}
		return $platform;
	}
	
	private static function send(){
		
	}
	
	static function showUserInfo($uid){
		$platform = self::getAdapter();
		if ('weiyouxi'==PLATFORM){
			return $platform->get('user/me');
		}else{
			return $platform->show_user_by_id($uid);
		}
	}
	
	static function getMid($id){
		$platform = self::getAdapter();
		if ('weiyouxi'==PLATFORM){
			return $platform->get('user/me');
		}else{
			return $platform->querymid($id);
		}
	}
	
	static function sendStatus($weibo, $img){
		$platform = self::getAdapter();
		$img = file_get_contents($img);
		return $platform->upload($weibo, $img);
	}
	
	static function sendComment($id, $comment){
		$platform = self::getAdapter();
		return $platform->send_comment($id, $comment);
	}
	
	static function repostStatues($id, $comment){
		$platform = self::getAdapter();
		return $platform->repost($id, $comment, 1);//转发加评论
	}
	
	static function repostComment($sid, $cid, $comment){
		$platform = self::getAdapter();
		return $platform->reply($sid, $comment, $cid, 1);
	}
	
	static function replyComment($id, $comment){
		$platform = self::getAdapter();
		return $platform->send_comment($id, $comment, 1);
	}
	
	static function replyStatues($id, $comment){
		$platform = self::getAdapter();
	}
	
	static function follows($uid){
		$platform = self::getAdapter();
		return $platform->friends_ids_by_id($uid);
	}
	
	static function unfollow($uid){
		$platform = self::getAdapter();
		return $platform->unfollow_by_id($uid);
	}
	
	static function refreshToken(){
		require_once GLOFT_PATH . 'library/platform/weibo.php';
		$oauth = new SaeTOAuthV2(WB_KEY, WB_SKEY);
		
		$ret = $oauth->getAccessToken('token', array('refresh_token'=>$_SESSION['access_token']));
		return $ret;
	}
}