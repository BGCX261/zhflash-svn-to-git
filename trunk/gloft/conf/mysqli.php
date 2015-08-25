<?php
if (ENV=='dev'){
	$GLOBALS['db']['mysqli'] = array(
		'master'	=> array(
			'host'	=> 'localhost',
			'port'	=> '3306',
			'uname'	=> 'root',
			'passwd'	=> '123456',
			'dbname'	=> 'flash2',
			'charset'	=> 'utf8'
		),
		'slave'	=> array(
			'host'	=> 'localhost',
			'port'	=> '3306',
			'uname'	=> 'root',
			'passwd'	=> '123456',
			'dbname'	=> 'flash2',
			'charset'	=> 'utf8'
		),
	);
}else{
	$GLOBALS['db']['mysqli'] = array(
		'master'	=> array(
			'host'	=> SAE_MYSQL_HOST_M,
			'port'	=> SAE_MYSQL_PORT,
			'uname'	=> SAE_MYSQL_USER,
			'passwd'	=> SAE_MYSQL_PASS,
			'dbname'	=> SAE_MYSQL_DB,
			'charset'	=> 'utf8'
		),
		'slave'	=> array(
			'host'	=> SAE_MYSQL_HOST_S,
			'port'	=> SAE_MYSQL_PORT,
			'uname'	=> SAE_MYSQL_USER,
			'passwd'	=> SAE_MYSQL_PASS,
			'dbname'	=> SAE_MYSQL_DB,
			'charset'	=> 'utf8'
		),
	);
}
