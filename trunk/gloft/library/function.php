<?php
/**
 * 过滤安全字符串
 * @param string $string 待过滤字符串
 */
function filter($string){
	if ($string){
		$string = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $string);
		$string = htmlspecialchars($string);
	}
	return $string;
}

function mymd5($str){
	return md5('&^%$(07hg6`ZK8' . $str);
}

/**
 * request
 * @param string $key
 * @param false $require 
 * @param char $type
 */
function request($key, $require=true, $type='r'){
	switch (strtolower($type)){
		case 'p':
			$a = $_POST;
			break;
		case 'g':
			$a = $_GET;
			break;
		case 'f':
			$a = $_FILES;
			break;
		default:
			$a = $_REQUEST;
	}
	$val = isset($a[$key]) ? $a[$key] : NULL;
	if (true === $require){//必选参数
		if (NULL === $val){
			return false;
		}
	}else{
		if (NULL === $val){
			return $require;
		}
	}
	return $val;
}

/**
 * 获取客户端ip
 */
function get_client_ip(){
	if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]) && preg_match_all('/(\d{1,3}\.){3}\d{1,3}/s', $_SERVER['HTTP_X_FORWARDED_FOR'], $mat)) {
            foreach ( $mat[0] as $ip ) {
                //得到第一个非内网的IP地址
                if (!preg_match("/^(?:10|172\.16|192\.168)\./", $ip)) {
                    return $ip;
                }
            }
            return $ip;
        }
        elseif (isset($_SERVER["HTTP_X_REAL_IP"]) && preg_match_all('/(\d{1,3}\.){3}\d{1,3}/s', $_SERVER['HTTP_X_REAL_IP'], $mat)) {
            foreach ( $mat[0] as $ip ) {
                //得到第一个非内网的IP地址
                if (!preg_match("/^(?:10|172\.16|192\.168)\./", $ip)) {
                    return $ip;
                }
            }
            return $ip;
        }
        elseif (isset($_SERVER["HTTP_FROM"]) && preg_match('/(?:\d{1,3}\.){3}\d{1,3}/', $_SERVER["HTTP_FROM"])) {
            return $_SERVER["HTTP_FROM"];
        }
        else
            return $_SERVER['REMOTE_ADDR'];
}

/**
 * 获取ip对应的地址位置信息
 * @param string|int $ip IP地址
 */
function get_ip_info($ip){
	$ip = is_numeric($ip) ? long2ip($ip) : $ip;
	
	$i = 0;
	$fetchUrl = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip={$ip}&charset=utf-8&type=0&format=json";
	//最多尝试三次
	while (true){
		$i++;
		$data = @file_get_contents($fetchUrl);
		if ($data || $i>2) break;
	}
	if ($data){
		return json_decode($data, true);
	}
	return false;
}

/**
 * 字符串验证
 * @param string $string	待验证字符串
 * @param string $rule		验证规则，可用内置规则或自定义规则
 */
function validate($string, $rule){
	$validate = array(
		'require'=> '/.+/',
		'email' => '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
		'url' => '/^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/',
		'currency' => '/^\d+(\.\d+)?$/',
		'number' => '/^\d+$/',
		'zip' => '/^[1-9]\d{5}$/',
		'integer' => '/^[-\+]?\d+$/',
		'double' => '/^[-\+]?\d+(\.\d+)?$/',
		'english' => '/^[A-Za-z]+$/',
		'ip'	=> '/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/',
		'time'		=>	'/[0-9]{4}-[0-9]{2}-[0-9]{2}(\s[0-9]{2}\:[0-9]{2}\:[0-9]{2})?/',
		'symbol'	=> '/^[a-zA-Z_]+\w?$/',
	);
	if ($rule=='date'){
		return (bool)strtotime($string);
	}
        // 检查是否有内置的正则表达式
	if(isset($validate[strtolower($rule)]))
		$rule   =   $validate[strtolower($rule)];
	return preg_match($rule,$string)===1;
}

function myHash($var, $base){
	$hash = ord(md5($var)) % $base;
	return $hash;
}

function set_cookie($name, $value){
	return setcookie($name, $value, 86400, '/', '/');
}

function L($code){
	global $_LANG;
	if (isset($_LANG[$code])){
		return $_LANG[$code];
	}else{
		return '未定义错误';
	}
}

/**
 * dump变量
 * @param multi $val 要打印的变量
 */
function dump($val){
	echo "<pre>";
	var_dump($val);
	echo "</pre>";
}
/**
 * 执出数组
 * @param array $array	要抛出的数组
 */
function export($array){
	echo "<pre>";
	var_export($array);
	echo "<pre>";
}

/**
 * 自动加载
 * @param unknown_type $className
 */
function __autoload($className)
{
	$typeArr = array(
		'Model','Lib','Class','Business','Conf','Class'
	);
	$regex = '/([A-Za-z]+\w?)(' . implode('|', $typeArr) . ')$/i';
	$matches = array();
	preg_match($regex, $className, $matches);
	if (!$matches || !isset($matches[2]) || !in_array($matches[2], $typeArr)){
		//exit($className . ' load error');
	}else{
		switch ($matches[2]) {
			case 'Model':
				require_once MODEL_HOME . strtolower($matches[1]) . '.php';
				break;
			case 'Business':
				require_once BUSINESS_HOME . strtolower($matches[1]) . '.php';
				break;
		}
	}
}

function mkTree($data, &$tree, $pid=0, $level=0){
	if ($data){
		$level++;
		foreach ($data as $item){
			if ($item['id']==$pid){
				if (!isset($tree[$pid])) $tree[$pid] = $item;
			}
			if ($item['pid']==$pid){
				$item['level'] = $level;
				$tree[$item['id']] = $item;
				mkTree($data, $tree, $item['id'], $level);
			}
		}
	}
}