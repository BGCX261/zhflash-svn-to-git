<?php
class UserController extends AdminController{
	
	public function __construct(){
		$groupList = UsergroupModel::getList();
		$tmp = array();
		if($groupList){
			foreach ($groupList as $group){
				$tmp[$group['id']] = $group;
			}
		}
		$groupList = $tmp;
		
		$departmentList = DepartmentModel::getList();
		
		$tmp = array();
		
		$this->mkTree($departmentList, $tmp);
		
		$this->assign('groupList', $groupList);
		$this->assign('departmentList', $tmp);
		
		parent::__construct();
	}
	
	public function _default(){
		
		$department_id = request('department_id');
		$group_id = request('group_id');
		
		$wheres = array();
		if ($department_id) $wheres[] = "`department_id`='{$department_id}'";
		if ($group_id) $wheres[] = "`group_id`='{$group_id}'";
		
		$where = $wheres ?  implode(' and ', $wheres) : '1';
		$pageBreak = $this->page(UserModel::getCount($where));
		
		$userList = UserModel::getList($this->start, $this->perpage, $where);
		
		$this->assign('pageBreak', $pageBreak);
		$this->assign('userList', $userList);
		
		$this->display();
	}
	
	public function add(){
		if (isset($_POST['uname'])){
			$data['uname'] = request('uname');
			if (UserModel::get('', $data['uname'])){
				$this->error('用户名重复');
			}
			if (request('passwd')!=request('passwd2')){
				$this->error('两次输入的密码不一致');
			}
			$data['passwd'] = mymd5(request('passwd'));
			
			$data['group_id'] = request('group_id');
			$data['department_id'] = request('department_id');
			$data['alias'] = request('alias');
			$data['phone'] = request('phone');
			if (UserModel::add($data)){
				$this->success('/admin/user');
			}else{
				$this->error('操作失败');
			}
			
		}else{
			$this->display('user_edit');
		}
	}
	
	public function delete(){
		$id = request('id');
		if (!$id) {
			$this->error('缺少ID');
		}
		
		if (UserModel::delete($id)){
			$this->success('/admin/user');
		}else{
			$this->error('操作失败');
		}
	}
	
	public function my(){
		$this->assign('reffer', '/admin/user/my');
		$id = $this->edit($this->userInfo['id']);
	}
	
	public function edit($id=''){
		if (!$id){
			$id = request('id');
		}
		if (isset($_POST['id'])){
			
			$uname = request('uname');
			
			$user = UserModel::get('', $uname);
			if ($user && $user['id']!=$id){
				$this->error('用户名重复');
			}
			
			$passwd = request('passwd');
			if ($passwd){
				if ($passwd!=request('passwd2')){
					$this->error('两次输入的密码不一致');
				}
				$data['passwd'] = mymd5($passwd);				
			}
			
			if ($GLOBALS['method']!='my'){
				$data['group_id'] = request('group_id');
				$data['department_id'] = request('department_id');
			}
			$data['alias']	= request('alias');
			$data['uname'] = request('uname');
			$data['phone'] =request('phone');
			
			if (UserModel::update($id, $data)){
				$this->success(request('reffer'));
			}else{
				$this->error('更新失败');
			}
			
			
		}else{
			$user = UserModel::get($id);
			
			if (!$user){
				$this->error('用户不存在');
			}
			
			$this->assign('user', $user);
			
			$this->display('user_edit');
		}
	}
}
