<?php
class IpController extends AdminController{
	public function __construct(){
		$departmentList = DepartmentModel::getList();
		$tree = array();
		$this->mkTree($departmentList, $tree);
		$this->assign('departmentList', $tree);
		parent::__construct();
	}
	
	public function _default(){
		
	}
	
	public function edit(){
		$department_id = request('department_id');
		if (isset($_POST['ipstart'])){
			$ipstart = request('ipstart');
			$ipend = request('ipend');
			if (!validate($ipstart, 'ip') || !validate($ipend, 'ip')){
				$this->error('请输入正确的IP格式');
			}
			$ipStartArray = explode('.', $ipstart);
			$ipEndArray = explode('.', $ipend);
			$data = array(
				'department_id' => $department_id,
				's_01'			=> $ipStartArray[0],
				's_02'			=> $ipStartArray[1],
				's_03'			=> $ipStartArray[2],
				's_04'			=> $ipStartArray[3],
				'e_01'			=> $ipEndArray[0],
				'e_02'			=> $ipEndArray[1],
				'e_03'			=> $ipEndArray[2],
				'e_04'			=> $ipEndArray[3],
			);
			if (IpModel::add($data)){
				$this->success($this->reffer());
			}else{
				$this->error();
			}
		}else{
			$this->assign('department_id', $department_id);
			$ipList = IpModel::getByDepartmentId($department_id);
			$this->assign('ipList', $ipList);
			$this->display();
		}
	}
	
	public function delete(){
		$id = request('id');
		if (IpModel::delete($id)) {
			$this->success($this->reffer());
		}else{
			$this->error();
		}
	}
}