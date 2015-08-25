<?php
class ErrorConf{
	const ERROR			= 202;//系统错误
	const SUCCESS 		= 200;//返回正常
	
	//-------------用户相关----------------------------
	const NOT_LOGIN					= 10101;//未登陆或登陆过期
	
	const API_LOSE_PARAM			= 10201; //接口访问缺少参数
	const API_RETURN_EMPTY			= 10202; //接口返回数为空
	
	const WEIBO_OK_INSERT_ERROR 	= 20101;//微博发送成功，存储失败
	
	const GAME_ANSWER_ERROR			= 21101; //答案猜错
	
	const WORD_CACHE_ERROR			= 21201; //缓存词失败
	const WORD_LIB_EMPTY			= 21202; //词库为空
	const WORD_NOT_FOUND			= 21203; //所选词不存在
	const WORD_CACHE_EMPTY			= 21204; //缓存词库获取失败
	
	const PIC_UPLOAD_ERROR			= 21301; //图片保存失败
}