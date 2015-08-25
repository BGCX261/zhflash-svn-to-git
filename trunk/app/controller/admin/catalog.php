<?php
class CatalogController extends AdminController{
	public function __construct(){
		parent::__construct();
		$catalogList = CatalogModel::getList();
		$tree = array();
		$this->mkTree($catalogList, $tree);
		$this->assign('catalogList', $tree);
		$this->assign('types', CatalogModel::$TYPES);
	}
	
	public function _default(){
		$this->display();
	}
	
	public function add(){
		if (isset($_POST['name'])){
			$data['name'] = request('name');
			$data['pid'] = intval(request('pid'));
			$data['type'] = request('type');
			$data['url'] = request('url');
			$data['isnavi'] = intval(request('isnavi'));
			$data['memo'] = request('memo');
			$data['priority'] = request('priority');
			
			if (CatalogModel::add($data)) {
				$this->success('/admin/catalog');
			}else{
				$this->error();
			}
		}else{
			$this->display('catalog_edit');
		}
	}
	
	public function edit(){
		$id = request('id');
		if (isset($_POST['id'])){
			$data['name'] = request('name');
			$data['pid'] = intval(request('pid'));
			$data['type'] = request('type');
			$data['url'] = request('url');
			$data['isnavi'] = intval(request('isnavi'));
			$data['memo'] = request('memo');
			$data['priority'] = request('priority');
			
			if (CatalogModel::update($id, $data)) {
				$this->success('/admin/catalog');
			}else{
				$this->error();
			}
		}else{
			$catalog = CatalogModel::get($id);
			$this->assign('catalog', $catalog);
			$this->display();
		}
	}
	
	public function delete(){
		$id = request('id');
		$catalogList = CatalogModel::getList();
		$subs = array();
		
		mkTree($catalogList, $subs, $id);
		
		$ids = array_keys($subs);
		
		if (CatalogModel::deleteBatch($ids)){
			$this->success($this->reffer());
		}else{
			$this->error();
		}
	}
}