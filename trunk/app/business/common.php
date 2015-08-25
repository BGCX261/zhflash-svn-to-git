<?php
class CommonBusiness{
	static function init(){
		$init['user'] = $_SESSION['user'];
		$host = $_SERVER['HTTP_HOST'];
		if(substr($host, 0, 7)!='http://'){
			$host = 'http://' . $host;
		}
		$init['app'] = array(
			'host'	=> $host,
		);
		
		$query = self::_reffer();
		
		if (isset($query['gid'])){
			$gid = $query['gid'];
			$game = GameModel::get($gid);
			$game['user'] = UserBusiness::publicShow($game['uid']);
			$game['createtime'] = date('Y-m-d H:i:s', $game['createtime']);
			
			$init['game'] = $game;
		}
		
		return $init;
	}
	
	private static function _reffer(){
		$query = array();
		//父框架参数传递
		$reffer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		if ($reffer){
			$queryArr = parse_url($reffer);
			$access_url = $queryArr['scheme'] . '://' . $queryArr['host'] . $queryArr['path'];
			$query = array();
			if (isset($queryArr['query'])){
				parse_str($queryArr['query'], $query);
			}
		}
		return $query;
	}
}