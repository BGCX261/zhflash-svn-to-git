<?php
class SurveystatController extends AdminController{
	public function __construct(){
		$survey = require_once GLOFT_PATH . 'conf/survey.php';
		$this->assign('survey', $survey);
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
	
	public function stat(){
		$department_id = request('department_id');
		if (!$department_id) $this->error('缺少部门编号');
		$where = "`department_id`='{$department_id}'";
		$logList = SurveylogModel::getList($where, 0, 0);
		if ($logList){
			$count = count($logList);
			
			$statData = array();
			
			foreach ($logList as $item){
				for ($i=1; $i<=8; $i++){
					$index = sprintf('r_%02d', $i);
					if (!isset($statData[$index][$item[$index]])) $statData[$index][$item[$index]] = 0;
					$statData[$index][$item[$index]] ++ ;
				}
			}
			
			$data['department_id'] = $department_id;
			$data['data']['count'] = $count;
			$data['data']['detail']	= $statData;
			$data['stattime']	= time();
			
			if (SurveystatModel::add($data)){
				$this->success($this->reffer());
			}else{
				$this->error();
			}
		}else{
			$this->error('没有找到数据');
		}
	}
	
	public function edit(){
		$department_id = request('department_id');
		if (!$department_id){
			$this->error('缺少部门编号');
		}
		if (isset($_POST['department_id'])){
			$data['department_id'] = $department_id;
			$data['data'] = request('data');
			$data['stattime'] = time();
			if (SurveystatModel::add($data)){
				$this->success(request('reffer'));
			}else{
				$this->error();
			}
		}else{
			$stat = SurveystatModel::getLast($department_id);
			$this->assign('stat', $stat);
			$this->display();
		}
	}
}