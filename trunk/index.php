<?php
header('Content-type:text/html; charset=utf-8');
include 'gloft/gloft.php';

$reffer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$host = '';
if ($reffer){
	$queryArr = parse_url($reffer);
	$host = $queryArr['host'];
}else{
	$host = $_SERVER['HTTP_HOST'];
}
$package = 'default';

switch ($host){
	case 'game.weibo.com':
		$package = 'weiyouxi';
		break;
	case 'game.weibo.cn':
		$package = 'html5';
		break;
	case 'caicaikan.9173.com':
	case 'gloft.sinaapp.com':
	case 'wohua.sinaapp.com':
		$package = 'html5';
		break;
	default:
		$package = 'default';
}

if (isset($_REQUEST['debug'])){
	define('DEBUG', true);
}

$gloft = new Gloft($package);

$gloft->run();