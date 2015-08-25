<?php
if (!class_exists('Gloft_Core_Controller', false)) {
	require_once GLOFT_PATH . 'core/controller.php';
}
/**
 * 管理员模块基础控制器
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-3-30
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
class AdminController extends Gloft_Core_Controller{
	protected $checkLogin = true;
	protected $uid;
	protected $userInfo = array();
	function __construct(){
		if ($this->checkLogin){
			$this->init();
		}

		$this->assign('reffer', $this->reffer());
	}
	
	public function init(){
		$userInfo = $this->isLogin();
		if (!$userInfo){
			$this->error('没有登陆');
		}else{
			$userInfo['department'] = DepartmentModel::get($userInfo['department_id']);
			$userInfo['group'] = UsergroupModel::get($userInfo['group_id']);
			$this->userInfo = $userInfo;
		}
			
		if (!$this->checkPermission()){
			$this->error('没有权限');
		}
		$this->_menuList();
	}
	
	function checkPermission(){
		if ($this->userInfo['group']['permission']['type']=='super'){
			return true;
		}
		$permissionList = is_array($this->userInfo['group']['permission']['list'])
						? $this->userInfo['group']['permission']['list']
						: array();
		foreach ($permissionList as $permission){
			$permission = trim($permission, "/");
			$permissionArr = explode('/', $permission);
			
			$method = isset($permissionArr[2]) ? $permissionArr[2] : '_default';
			if ($GLOBALS['ctrl']!=$permissionArr[1] || $GLOBALS['method']!=$method) continue;
			return true;
		}
		return false;
	}
	
	function _menuList(){
		$menuLit = MenuModel::getList();
		$tree = array();
		$this->mkTree($menuLit, $tree);
		$menus = array();
		if ($this->userInfo['group']['permission']['type']=='super'){
			$menus = $tree;
		}else{
			$permissionList = is_array($this->userInfo['group']['permission']['list'])
						? $this->userInfo['group']['permission']['list']
						: array();
			foreach ($tree as $item){
				if (in_array($item['url'], $permissionList)){
					if ($item['pid'] && !isset($menus[$item['pid']])){
						$menus[$item['pid']] = $tree[$item['pid']];
					}
					if (!isset($menus[$item['id']])){
						$menus[$item['id']] = $item;
					}
				}
			}
		}
		$this->assign('menuList', $menus);
	}
	
	function display($tpl=''){
		if (!$tpl){
			$tpl = strtolower($GLOBALS['ctrl']) . strtolower($GLOBALS['method']=='_default' ? '' : '_' . $GLOBALS['method']);
		}
		parent::display('admin/' . $tpl);
	}
	
	function success($url){
		if (isset($_REQUEST['ajax']) && $_REQUEST['ajax']=='true'){
			$this->ajaxSuccess($url);
		}else{
			$html[] = "<script type='text/javascript'>";
			$html[] = "document.write('操作成功');";
			$html[] = "setTimeout(\"window.location.href='$url'\", 2000);";
			$html[] = "</script>";
			echo implode("\n\r", $html);
			exit();
		}
	}
	
	function reffer(){
		return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
	}
	
	function error($msg='操作失败', $url='-1'){
		if (isset($_REQUEST['ajax']) && $_REQUEST['ajax']=='true'){
			$this->ajaxError($msg);
		}else{
			$html[] = "<script type='text/javascript'>";
			$html[] = "document.write('$msg');";
			if ($url=='-1'){
				$html[] = "setTimeout(\"history.back()\", 3000);";
			}else{
				$html[] = "setTimeout(\"window.location.href='$url'\", 3000);";
			}
			$html[] = "</script>";
			echo implode("\n\r", $html);
			exit();
		}
	}
	
	function isLogin(){
		if (isset($_SESSION['user'])){
			return $_SESSION['user'];
		}else{
			return false;
		}
	}
	
	function ajaxError($msg){
		echo json_encode(array(
			'code'	=> 202,
			'msg'	=> $msg
		));
		exit();
	}
	
	function ajaxSuccess($data=array()){
		echo json_encode(array(
			'code'	=> 200,
			'data'	=> $data
		));
		exit();
	}
	
	function clearLogin(){
		$_SESSION['user'] = null;
		
		unset($_SESSION['user']);
		
		return true;
	}
	
	function login(){
		$uname = request('uname');
		$passwd = request('passwd');
		
		if (false == ($uname && $passwd)){
			$this->error('用户名或者密码不能为空');
		}
		
		
	}
	
	function mkTree($data, &$tree, $pid=0, $level=0){
		if ($data){
			$level++;
			foreach ($data as $item){
				if ($item['id']==$pid){
					if (!isset($tree[$pid])) $tree[$pid] = $item;
				}
				if ($item['pid']==$pid){
					$item['level'] = $level;
					$tree[$item['id']] = $item;
					$this->mkTree($data, $tree, $item['id'], $level);
				}
			}
		}
	}
}