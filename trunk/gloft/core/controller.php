<?php
/**
 * 核心控制器类
 * ==============================================
 * @auther ChunYang.Jiang<chunyang#mrjiang.com>
 * @date 2012-5-3
 * @copyright blog.mrjiang.com
 * @since 1
 * ==============================================
 */
class Gloft_Core_Controller{
	private $_values = array();
	
	protected $fields = array();
	
	protected $plugins = array();
	
	protected $page = 1;
	protected $perpage = 40;
	protected $count = 0;
	protected $start = 0;
	
	/**
	 * 模板赋值
	 * ====================================
	 * @param string $var	变量名
	 * @param string $val	变量值
	 */
	function assign($var, $val){
		$this->_values[$var] = $val;
	}
	
	/**
	 * 显示页面
	 * ====================================
	 * @param string $tpl	模板地址
	 */
	function display($tpl){
		extract($this->_values);
		$filename = TPL_HOME . $tpl . '.php';
		if (!file_exists($filename)){
			exit('TPL not exist:' . $filename);
		}
		error_reporting(0);
		require_once $filename;
		exit();
	}
	
	/**
	 * 实例化一个类
	 * ====================================
	 */
	function model(){
		$args = func_num_args();
		if ($args){
			for($i=0; $i<$args; $i++){
				$model = func_get_arg($i);
				$modelname = ucfirst($model) . 'Model';
				if (!class_exists($modelname)){
					require_once MODEL_HOME . $model . '.php';
				}
			}
		}
	}
	
	/**
	 * 执行预处理插件
	 * ====================================
	 */
	function plugin_before(){
		if (isset($this->plugins['before']) &&
			$this->plugins['before'] &&
			is_array($this->plugins['before'])){
			foreach ($this->plugins['before'] as $plugin) {
				$plugin($this);
			}
		}
	}
	
	/**
	 * 执行后处理插件
	 * ====================================
	 */
	function plugin_after(){
		if (isset($this->plugins['after']) &&
			$this->plugins['after'] &&
			is_array($this->plugins['after'])){
			foreach ($this->plugins['after'] as $plugin) {
				$plugin($this);
			}
		}
	}
	
	/**
	 * 处理分页
	 * @date 2012-6-9 下午12:38:56
	 * @param unknown_type $count
	 */
	function page($count){
		$page = request('page');
		$this->page = $page>0 ? $page : 1;
		$this->count = $count;
		$this->start = ($this->page-1) * $this->perpage;
		require_once GLOFT_PATH . 'core/page.php';
		$p = new Gloft_Core_Page($this->count, $this->perpage);
		return $p->format();
	}
}