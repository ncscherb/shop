<?php
return array(
	//'配置项'=>'配置值'
    //设置显示调试信息
    'SHOW_PAGE_TRACE'=>false,
    'DEFAULT_MODULE'=>'Home',
    "MODULE_ALLOW_LIST"=>array("Home","Admin"),
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'shop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'deng3124731',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sw_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'TMPL_ENGINE_TYPE'      =>  'Smarty',  //设置Smarty模板引擎
);
