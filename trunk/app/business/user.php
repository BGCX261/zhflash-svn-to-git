<?php
class UserBusiness{
	
	static $userType = array(
		0	=>'名人',
		1	=> '政府',
		2	=> '企业',
		3	=> '媒体',
		4	=> '校园',
		5	=> '网站',
		6	=> '应用',
		7	=> '团体（机构）',
		8	=> '待审企业（企业注册）',
		200	=> '初级达人',
		220	=> '通过审核的达人',
		400	=> '已故V用户',
		-1	=> '普通用户'
	);
	
	static function isLogin(){
		if (isset($_SESSION['user'])){
			if (!isset($_SESSION['access_token'])){
				return false;
			}
			if (!isset($_SESSION['token_expire'])){
				return false;
			}
			if (time()-43200>=$_SESSION['token_expire']){
				return false;
			}
			if (!isset($_SESSION['user'])){
				return false;
			}
			return $_SESSION['user'];
		}else{
			return false;
		}
	}
	
	static function setLogin($userInfo){
		if (!$userInfo) return false;
		$uid = $userInfo['uid'];
		$_SESSION['user'] = $userInfo;
		
		//$userInfo = PlatformBusiness::showUserInfo($uid);
		
		if ($userInfo){
			//$userInfo = self::format($userInfo);
			$userInfo['token'] = $_SESSION['access_token'];
			$userInfo['expire'] = $_SESSION['token_expire'];
			return UserModel::add($userInfo);
		}

		return true;
	}
	
	static function clearLogin(){
		session_destroy();
	}
	
	static function showUser($uid){
		$userInfo = PlatformBusiness::showUserInfo($uid);
		if (isset($userInfo['error'])){
			return false;
		}
		$userInfo = self::format($userInfo);
		return $userInfo;
	}
	
	static function publicShow($uid){
		return self::format(UserModel::get($uid), 'public');
	}
	
	static function format($user, $type='platform'){
		$ret = array();
		if ($type=='platform'){
			$ret = array(
				'uid'	=> $user['idstr'],
				'alias'	=> $user['name'],
				'avatar'	=> $user['profile_image_url'],
				'verify'	=> $user['verified_type'],
				'url'		=> $user['profile_url'],
				'gender'	=> $user['gender'],
				'followers'	=> $user['followers_count'],
				'friends'	=> $user['friends_count'],
				'statuses'	=> $user['statuses_count'],
			);
		}elseif ($type == 'public'){
			$ret = array(
				'uid'	=> $user['uid'],
				'alias'	=> $user['alias'],
				'avatar'	=> $user['avatar'],
				'verify'	=> $user['verify'],
				'url'		=> $user['url'],
				'gender'	=> $user['gender'],
				'followers'	=> $user['followers'],
				'friends'	=> $user['friends'],
				'statuses'	=> $user['statuses']
			);
		}
		return $ret;
	}
}