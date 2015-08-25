<?php
/**
 * 自动加载文件配置
 * ------------------------------
 * gloft目录结构不得进行修改
 * ------------------------------
 * @author ChunYang.Jiang<chunyang#mrjiang.com>
 * @since 1
 * @date 2012-03-28
 */
if (!defined('GLOFT_PATH')){
	exit('gloft not defined'); 
}
return array(
	'_define_'		=> GLOFT_PATH . 'conf/define.php',
	'_path_'		=> GLOFT_PATH . 'conf/path.php',
	'_core_'		=> GLOFT_PATH . 'conf/core.php',
	'_mysqli_'		=> GLOFT_PATH . 'conf/mysqli.php',
	'_card_'		=> GLOFT_PATH . 'conf/card.php',
	'_function_'	=> GLOFT_PATH . 'library/function.php',
	'_img_class_'	=> GLOFT_PATH . 'library/image/sae.php',
	'_db_factory_'	=> GLOFT_PATH . 'driver/db/factory.php',
	'_exception_'	=> GLOFT_PATH . 'core/exception.php',
	'_base_model_'	=> GLOFT_PATH . 'core/model.php',
	'_base_controller_' => GLOFT_PATH . 'core/controller.php',
	'_cache_factory_'	=> GLOFT_PATH . 'driver/cache/factory.php',
	'_platform_factory_'=> GLOFT_PATH . 'library/platform/factory.php',
	//'_lang_'		=> GLOFT_PATH . 'conf/lang/zh.php',
	
);