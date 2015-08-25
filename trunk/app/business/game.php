<?php
class GameBusiness{
	static function getText($word, $url){
		$len = mb_strlen($word['word'], 'utf-8');
		$type = $word['type'];
		$text = '#奇思妙想大画家#我刚设计了一幅精美的画作，大家快来猜一猜我画的是什么？记得在评论里留下你的答案！【提示：%d个字，打一%s】，点击链接进入就可以参加游戏噢！' . $url;
		return sprintf($text, $len, $type['name']);
	}
	
	static function disturb($word){
		$len = mb_strlen($word['word'], 'utf-8');
		$disturbNum = 16 - $len;
		$text = require GLOFT_PATH . 'conf/char.php';
		$disturb = array_slice($text, mt_rand(0, 1000), $disturbNum);
		for ($i=0; $i<$len; $i++){
			$disturb[] = mb_substr($word['word'], $i, 1, 'utf-8');
		}
		shuffle($disturb);
		return $disturb;
	}
	
	static function mkUrl($id){
		return APP_HOST . '?gid=' . $id;
	}
	
	static function formatGame($game){
		
	}
}