<?php
class IndexController extends DefaultController{
	function _default(){
		
		//每个栏目取十个文章
		$catalogIds = array_keys($this->catalogList);
		$where = "`catalog_id` in (".implode(',', $catalogIds).") and `status`='normal'";
		$archives = ArchiveModel::catalogTop($where, 20);
		$archives = $this->_formatArchive($archives);
		
		//取推荐的带图片的文章
		$where = "`image`!='' and `recommend`=1 and `status`='normal'";
		$recommendArchives = $this->_formatArchive(ArchiveModel::getList($where, 0, 20));
		
		$this->assign('recommendArchives', $recommendArchives);
		$this->assign('archives', $archives);
		$this->display();
	}
}