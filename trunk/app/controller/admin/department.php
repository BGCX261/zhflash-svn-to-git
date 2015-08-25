<?php
class DepartmentController extends AdminController{
	public function __construct(){
		parent::__construct();
		$departmentList = DepartmentModel::getList();
		$tree = array();
		if ($this->userInfo['group']['permission']['type']=='super'){
			$this->mkTree($departmentList, $tree);
		}else{
			$this->mkTree($departmentList, $tree, $this->userInfo['department_id']);
		}
		$this->departmentList = $tree;
		$this->assign('departmentList', $tree);
	}
	
	public function _default(){
		$this->display();
	}
	
	public function add(){
		if (isset($_POST['name'])){
			$data['pid'] = request('pid');
			$data['name'] = request('name');
			$data['url'] = request('url');
			$data['memo'] = request('memo');
			if ($this->userInfo['group']['permission']['type']!='super' && !$data['pid']){
				$this->error('请选择上级单位');
			}
			if (DepartmentModel::add($data)){
				$this->success('/admin/department');
			}else{
				$this->error();
			}
			
		}else{
			$this->display('department_edit');
		}
	}
	
	public function edit(){
		$id = request('id');
		if (isset($_POST['id'])){
			$data['pid'] = request('pid');
			if ($this->userInfo['group']['permission']['type']!='super' && !$data['pid']){
				$this->error('请选择上级单位');
			}
			$data['name'] = request('name');
			$data['url'] = request('url');
			$data['memo'] = request('memo');
			
			if (DepartmentModel::update($id, $data)){
				$this->success('/admin/department');
			}else{
				$this->error();
			}
			
		}else{
			$department = DepartmentModel::get($id);
			$this->assign('department', $department);
			$this->display('department_edit');
		}
	}
	
	public function delete(){
		$id = request('id');
		if (DepartmentModel::delete($id)){
			$this->success($this->reffer());
		}else{
			$this->error();
		}
	}
}