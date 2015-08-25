<?php
if (!class_exists('Gloft_Core_Controller', false)) {
	require_once GLOFT_PATH . 'core/controller.php';
}
class ApiController extends Gloft_Core_Controller{
	protected $userInfo = array();
	function __construct(){
	}
	
	function success($data){
		$ret = array(
			'code'	=> 200,
			'data'	=> $data
		);
		$this->reMsg($ret);
	}
	
	function error($code, $msg=''){
		$ret = array(
			'code'	=> $code,
			'msg'	=> $msg ? $msg : L($code)
		);
		$this->reMsg($ret);
	}
	
	function reMsg($data){
		$dataType = strtolower(request('dataType'));
		if ('jsonp'==$dataType){
			$func = request('func');
			$func = $func ? $func : '_callback_';
			echo $func, '(', json_encode($data), ');';
		}elseif ('array'==$dataType){
			dump($data);
		}else{
			echo json_encode($data);
		}
		exit(0);
	}
}