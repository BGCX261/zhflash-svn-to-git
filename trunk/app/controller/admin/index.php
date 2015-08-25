<?php
class IndexController extends AdminController{
	protected $checkLogin = false;
	
	function __construct(){
		parent::__construct();
	}
	
	function _default(){
		if ($this->isLogin()){
			//var_dump($this->isLogin());
			$this->init();
			$this->display('index');
		}else{
			$this->display('login');
		}
	}
	
	
	function login(){
		$uname = request('uname');
		$passwd = request('passwd');
		
		if (false == ($uname && $passwd)){
			$this->ajaxError('用户名或者密码没有填写');
		}
		//echo mymd5($passwd);
		$user = UserModel::get('', $uname);
		
		if (!$user){
			$this->ajaxError('用户不存在');
		}
		
		if ($user['passwd']!=mymd5($passwd)){
			$this->ajaxError('密码不正确');
		}
		
		$_SESSION['user'] = $user;
		
		$this->ajaxSuccess($user);
	}
	
	function show(){
		$this->display('page');
	}
	
	function logout(){
		if (isset($_SESSION['user'])){
			unset($_SESSION['user']);
		}
		echo "<script type='text/javascript'>parent.location.href='/admin';</script>";
	}
}