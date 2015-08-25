<?php
class ArchiveController extends AdminController{
	public function __construct(){
		$catalogList = CatalogModel::getList();
		$tree = array();
		$this->mkTree($catalogList, $tree);
		$this->assign('catalogList', $tree);
		$this->assign('status', ArchiveModel::$STATUS);
		parent::__construct();
	}
	
	public function _default(){
		
		$catalog_id = request('catalog_id');
		$status = request('status');
		$key = request('key');
		
		$whereArr = array();
		if ($catalog_id) $whereArr[] = "`catalog_id`='{$catalog_id}'";
		if ($status) $whereArr[]  = "`status`='{$status}'";
		if ($key) $whereArr[] = "(`title` like '%{$key}%' or `memo` like '%{$key}%')";
		
		if ($this->userInfo['group']['permission']['type']!='super'){
			$whereArr[] = "`author`='{$this->userInfo['id']}'";
		}
		
		$where = $whereArr ? implode(' and ', $whereArr) : '1';
		
		$page = $this->page(ArchiveModel::getCount($where));
		
		$archives = ArchiveModel::getList($where, $this->start, $this->perpage);
		$uids = array();
		if ($archives){
			foreach ($archives as $item){
				$uids[] = $item['author'];
			}
			
			$authors = UserModel::getByUids($uids);
			$this->assign('authors', $authors);
		}
		$this->assign('page', $page);
		$this->assign('archiveList', $archives);
		$this->display();
	}
	
	public function add(){
		if (isset($_POST['catalog_id'])){
			$data['catalog_id'] = request('catalog_id');
			$data['title']	= request('title');
			$data['image']	= request('image');
			$data['memo']	= request('memo');
			$data['status'] = 'notaudit';
			$data['author'] = $this->userInfo['id'];
			$data['pubtime'] = time();
			$data['url'] = request('url');
			if (ArchiveModel::add($data)){
				$this->success('/admin/archive');
			}else{
				$this->error();
			}
			
		}else{
			$this->display('archive_edit');
		}
	}
	
	public function edit(){
		$id = request('id');
		if (isset($_POST['id'])){
			$data['catalog_id'] = request('catalog_id');
			$data['title']	= request('title');
			$data['image']	= request('image');
			$data['memo']	= request('memo');
			$data['url'] = request('url');
			if (ArchiveModel::update($id, $data)){
				$this->success(request('reffer'));
			}else{
				$this->error();
			}
			
		}else{
			$archive = ArchiveModel::get($id);
			if ($this->userInfo['group']['permission']['type']!='super'){
				if ($this->userInfo['id']!=$archive['id']){
					$this->error('您无权修改非自己创建的文章');
				}
			}
			$this->assign('archive', $archive);
			$this->display('archive_edit');
		}
	}
	
	public function audit(){
		$id = request('id');
		$data['status'] = 'normal';
		if (ArchiveModel::update($id, $data)){
			$this->success($this->reffer());
		}else{
			$this->error();
		}
	}
	
	public function recommend(){
		$id = request('id');
		$archive = ArchiveModel::get($id);
		if ($archive['recommend']){
			$data['recommend'] = '0';
		}else{
			$data['recommend'] = '1';
		}
		if (ArchiveModel::update($id, $data)){
			$this->success($this->reffer());
		}else{
			$this->error();
		}
	}
	
	public function revoke(){
		$id = request('id');
		$archive = ArchiveModel::get($id);
		if ($this->userInfo['group']['permission']['type']!='super'){
			if ($this->userInfo['id']!=$archive['id']){
				$this->error('您无权限恢复非自己创建的文章');
			}
		}
		if (ArchiveModel::update($id, array('status'=>'normal'))){
			$this->reffer();
			$this->success($this->reffer());
		}else{
			$this->error();
		}
	}
	
	public function delete(){
		$id = request('id');
		$archive = ArchiveModel::get($id);
		if ($this->userInfo['group']['permission']['type']!='super'){
			if ($this->userInfo['id']!=$archive['id']){
				$this->error('您无权删除非自己创建的文章');
			}
		}
		if (ArchiveModel::update($id, array('status'=>'deleted'))){
			$this->success($this->reffer());
		}else{
			$this->error();
		}
	}
}