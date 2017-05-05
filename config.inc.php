<?php
return array(

	//数据库相关配置
	'DB_TYPE'=>'mysql', //使用数据库类型
	'DB_HOST'=>'127.0.0.1', //数据库服务器地址
	'DB_NAME'=>'audit', //数据库名称
	'DB_USER'=>'root', //数据库用户名
	'DB_PWD'=>'123456', //数据库密码
//	'DB_HOST'=>'127.0.0.1',
//    'DB_USER'=>'root',
//    'DB_PWD'=>'8995454*',
	'DB_PORT'=>3306, //数据库端口
	'DB_PREFIX'=>'sj_', //数据库默认表前缀
	'DB_CHARSET'=>'utf8', //数据库编码
    'VAR_PAGE'=>'page',
    'URL_HTML_SUFFIX'=>'html',
	'SHOW_PAGE_TRACE'  => False,
	'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js', 
		'../Public'=> __ROOT__ . '/Public/static/audit0/'.MODULE_NAME.'/View/Public'
    ),
    'APP_SUB_DOMAIN_RULES'    =>  array(
        '106.14.38.204'=>'Home/Index/login.html',
    ),
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login', // 默认操作名称
	
	 'VIEW_PATH'     =>  APP_PATH . 'TPL/' . MODULE_NAME .'/',
    'URL'=>'http://27.126.144.113'
);
?>
