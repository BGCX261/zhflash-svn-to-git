<?php
class SurveylogController extends AdminController{
	
	protected $departmentList;
	
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
		$department_id = request('department_id');
		if ($department_id){
			$where = "`department_id`='{$department_id}'";
		}else{
			if ($this->userInfo['group']['permission']['type']=='surper'){
				$where = '1';
			}else{
				$department_ids = array_keys($this->departmentList);
				if ($department_ids){
					$where = "`department_id` in (".implode(',', $department_ids).")";
				}else{
					$where = '0';
				}
			}
		}
		$page = $this->page(SurveylogModel::getCount($where));
		$logList = SurveylogModel::getList($where, $this->start, $this->perpage);
		$this->assign('logList', $logList);
		$this->assign('page', $page);
		$this->display();
	}
	
	public function export(){
		if (isset($_REQUEST['department_id']) && $_REQUEST['department_id']){
			$department_id = request('department_id');
			$where = "`department_id`='{$department_id}'";
			$logList = SurveylogModel::getList($where, 0, 0);
			$this->assign('logList', $logList);
			$this->display();
		}else{
			$this->display('surveylog_export_check');
		}
		
	}
	
	public function delete(){
		$id = request('id');
		
		if (SurveylogModel::delete($id)){
			$this->success($this->reffer());
		}else{
			$this->error();
		}
	}
	
	public function edit(){
		$id = request('id');
		if (isset($_POST['id'])){
			$data['r_01'] = request('r_1');
			$data['r_02'] = request('r_2');
			$data['r_03'] = request('r_3');
			$data['r_04'] = request('r_4');
			$data['r_05'] = request('r_5');
			$data['r_06'] = request('r_6');
			$data['r_07'] = request('r_7');
			$data['r_08'] = request('r_8');
			if (SurveylogModel::update($id, $data)){
				$this->success(request('reffer'));
			}else{
				$this->error();
			}
		}else{
			$surveylog = SurveylogModel::get($id);
			$this->assign('surveylog', $surveylog);
			$this->display();
		}
	}
}