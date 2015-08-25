<?php
class DefaultController extends Gloft_Core_Controller{
	
	protected $catalogList = array();
	
	protected $departmentList = array();
	
	public function __construct(){
		$catalogList = CatalogModel::getList();
		$tree = array();
		mkTree($catalogList, $tree);
		$this->catalogList = $tree;
		$this->_initNavi();
	}
	
	protected function _initNavi(){
		$tree = $this->_childNote(0);
		$this->assign('catalogList', $tree);
	}
	
	protected function _childNote($pid){
		$tree = array();
		mkTree($this->catalogList, $tree, $pid);
		if (isset($tree[$pid])){
			unset($tree[$pid]);
		}
		return $tree;
	}
	
	protected function _location($catalog_id){
		$ret = array();
		$topId = $catalog_id;
		while (isset($this->catalogList[$topId]) && $this->catalogList[$topId]['pid']){
			array_unshift($ret, $this->catalogList[$topId]);
			$topId = $this->catalogList[$topId]['pid'];
		}
		array_unshift($ret, $this->catalogList[$topId]);
		$this->assign('location', $ret);
		return $ret;
	}
	
	protected function _404($error='页面不存在或者已删除'){
		$this->assign('error', $error);
		$this->display('404');
	}
	
	protected function _departmentList(){
		if (!$this->departmentList){
			$departmentList = DepartmentModel::getList();
			$tree = array();
			mkTree($departmentList, $tree);
			$this->departmentList = $tree;
		}
		return $this->departmentList;
	}
	
	public function display($tpl=''){
		if (!$tpl){
			$tpl = strtolower($GLOBALS['ctrl']) . strtolower($GLOBALS['method']=='_default' ? '' : '_' . $GLOBALS['method']);
		}
		parent::display('default/' . $tpl);
	}
	
	protected function _formatArchive($archives){
		$ret = array();
		if ($archives){
			$departmentList = $this->_departmentList();
			if (isset($archives[0]) && is_array($archives[0])){
				$authorIds = array();
				foreach ($archives as $archive){
					$authorIds[] = $archive['author'];
				}
				$authors = UserModel::getByUids($authorIds);
				foreach ($archives as $key=>$archive){
					$author = $authors[$archive['author']];
					$archive['author'] = $author;
					$archive['department'] = $departmentList[$author['department_id']];
					$archive['catalog'] = $this->catalogList[$archive['catalog_id']];
					$ret[] = $archive;
				}
			}else{
				$author = UserModel::get($archives['author']);
				$archives['author'] = $author;
				$archives['department'] = $departmentList[$author['department_id']];
				
				$archives['catalog'] = $this->catalogList[$archives['catalog_id']];
				$ret = $archives;
			}
		}
		return $ret;
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
	
	
}