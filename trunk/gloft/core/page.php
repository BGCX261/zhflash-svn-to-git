<?php
class Gloft_Core_Page{
	private $page;
	private $curpage;
	private $nextpage;
	private $records;
	private $perpage;
	private $pagenum;
	private $prepage;
	private $router;
	private $query=array();
	
	function __construct($records, $perpage){
		$this->records = $records>0 ? $records : 0;
		$this->perpage = $perpage>0 ? $perpage : 30;
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		$this->curpage = $page;
		
		$router = '/' . (isset($_GET['_router_']) ? trim($_GET['_router_'], "/") : '');
		$this->router = $router;
		unset($_GET['page'], $_GET['_router_']);
		foreach ($_GET as $var=>$val){
			$this->query[$var] = $val;
		}
		$this->pagenum = ceil($this->records / $this->perpage);
		$this->prepage = $this->page > 1 ? $this->page-1 : $this->page;
		$this->nextpage = $this->page < $this->pagenum ? $this->page+1 : $this->page;
	}
	
	function format(){
		$base = $_REQUEST['_router_'];
		if ($this->curpage>1) $html[] = "<a href='{$this->router}'>首页</a>";
		$pages = array();
		for ($i=1; $i<=$this->pagenum; $i++){
			if ($i<=3 || abs($this->curpage - $i)<3 || ($this->pagenum-$i<=3)){
				$pages[] = $i;
				continue;
			}
		}
		$html = array();
		foreach ($pages as $i=>$p){
			if ($i>1 && $p-$pages[$i-1]>1){
				$html[] = '...';
			}else{
				$this->query['page'] = $p;
				$url = $this->router;
				$url .= strpos($url, '?') ? '&' : '?';
				$url .=  http_build_query($this->query);
				//echo $url;
				$html[] = "<a href='$url'>$p</a>";
			}
		}
		return "共{$this->records}记录，第{$this->curpage}/{$this->pagenum}页&nbsp;" 
			. implode('', $html);
		
	}
}