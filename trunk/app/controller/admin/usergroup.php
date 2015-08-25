<?php
class UsergroupController extends  AdminController{
	
	public function __construct(){
		$groupList = UsergroupModel::getList();
		$this->assign('groupList', $groupList);
		parent::__construct();
	}
	
	public function _default(){
		$groupList = UsergroupModel::getList();
		$this->assign('groupList', $groupList);
		$this->display();
	}
	
	public function edit(){
		$id = request('id');
		if (isset($_POST['id'])){
			$name = request('name');
			$permission = request('permission');
			$data['name'] = $name;
			$data['permission'] = $permission;
			if (UsergroupModel::update($id, $data)){
				$this->success('/admin/usergroup');
			}else{
				$this->error();
			}
		}else{
			$group = UsergroupModel::get($id);
			$this->assign('group', $group);
			$this->display();
		}
	}
	
	public function add(){
		if (isset($_POST['name'])){
			$name = request('name');
			$permission = request('permission');
			$data['name'] = $name;
			$data['permission'] = $permission;
			
			if (UsergroupModel::add($data)){
				$this->success('/admin/usergroup');
			}else{
				$this->error();
			}
		}else{
			$this->display('usergroup_edit');
		}
	}
	
	public function delete(){
		$id = request('id');
		if (UsergroupModel::delete($id)){
			$this->success('/admin/usergroup');
		}else{
			$this->error();
		}
	}
}