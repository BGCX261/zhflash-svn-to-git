<?php
class MenuController extends AdminController{
	public function _default(){
		$this->display();
	}
	
	public function add(){
		if (isset($_POST['name'])){
			$data['name'] = request('name');
			$data['pid'] = request('pid');
			$data['url'] = request('url');
			$data['hidden'] = intval(request('hidden'));
			
			if (MenuModel::add($data)){
				$this->success('/admin/menu');
			}else{
				$this->error();
			}
		}else{
			$this->display('menu_edit');
		}
	}
	
	public function edit(){
		$id = request('id');
		if (isset($_POST['id'])) {
			$data['name'] = request('name');
			$data['pid'] = request('pid');
			$data['url'] = request('url');
			$data['hidden'] = intval(request('hidden'));
			
			if (MenuModel::update($id, $data)){
				$this->success('/admin/menu');
			}else{
				$this->error();
			}
		}else{
			$menu = MenuModel::get($id);
			$this->assign('menu', $menu);
			$this->display();
		}
	}
	
	public function delete(){
		$id = request('id');
		if (MenuModel::delete($id)){
			$this->success('/admin/menu');
		}else{
			$this->error();
		}
	}
}