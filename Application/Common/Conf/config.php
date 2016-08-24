<?php
return array(
	//'配置项'=>'配置值'
	'READ_DATA_MAP'=>true,
	'MODULE_ALLOW_LIST'     =>  array(
		'Home',
		'Admin',


	),
	'DEFAULT_MODULE'        =>  'Home',

	//数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址

	'DB_NAME'   => 'year-meeting', // 阿里云数据库名
    //'DB_NAME'   => 'bank', // 本地数据库名
	'DB_USER'   => 'admin', // 用户名
	'DB_PWD'    => 'admin', // 阿里云密码
    //'DB_PWD'    => '', // 本地密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
	'SESSION_AUTO_START'    =>  TRUE,  //SESSION自动开启
	'URL_DENY_SUFFIX'       =>  'ico|png|gif|jpg',// URL禁止访问的后缀设置

	/* 跳转页面模板 */
    'TMPL_ACTION_ERROR'     =>  'Public:error', // 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS'   =>  'Public:success', // 默认成功跳转对应的模板文件

	//七牛存储
	'UPLOAD_SITEIMG_QINIU' => array (
		'maxSize' => 4000 * 1024,//文件大小
		'rootPath' => './',
		'saveName' => array ('uniqid', ''),
		'driver' => 'Qiniu',
		'driverConfig' => array (
			'secrectKey' => '', //
			'accessKey' => '',
			'domain' => '',
			'bucket' => '',
		)
	)




);