<?php
class CommentController extends AdminController{
	
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
		$whereArr = array();
		$department_id = request('department_id');
		if ($department_id){
			$whereArr[] = "`department_id`='{$department_id}'";
		}else{
			if ($this->userInfo['group']['permission']['type']=='surper'){
				$whereArr[] = '1';
			}else{
				$department_ids = array_keys($this->departmentList);
				if ($department_ids){
					$whereArr[] = "`department_id` in (".implode(',', $department_ids).")";
				}
			}
		}
		$status = request('status');
		if ($status){
			$whereArr[] = "`status`='{$status}'";
		}
		$where = $whereArr ? implode(' and ', $whereArr) : '0';
		$page = $this->page(CommentModel::getCount($where));
		$commentList = CommentModel::getList($where, $this->start, $this->perpage);
		$this->assign('page', $page);
		$this->assign('commentList', $commentList);
		$this->display();
	}
	
	public function edit(){
		$this->assign('userInfo', $this->userInfo);
		$id = request('id');
		if (isset($_POST['id'])) {
			$content = request('content');
			$reply = request('reply');
			if (mb_strlen($content, 'utf8')>200){
				$this->error('留言的长度不能超过200字符');
			}
			if (mb_strlen($reply, 'utf8')>200){
				$this->error('回复的长度不能超过200字符');
			}
			$data['content'] = $content;
			$data['reply'] = $reply;
			$data['replytime'] = time();
			$data['status'] = 'replied';
			if (CommentModel::update($id, $data)){
				$this->success(request('reffer'));
			}else{
				$this->error();
			}
		}else{
			$comment = CommentModel::get($id);
			$this->assign('comment', $comment);
			$this->assign('reffer', $this->reffer());
			$this->display();
		}
	}
}