<?php
return array(
// 	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'if43',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'if43_',    // 数据库表前缀
    
	/*线上数据库设置 */
// 	'DB_TYPE'               =>  'mysql',     // 数据库类型
// 	'DB_HOST'               =>  'localhost', // 服务器地址
// 	'DB_NAME'               =>  'a0730223258',          // 数据库名
// 	'DB_USER'               =>  'a0730223258',      // 用户名
// 	'DB_PWD'                =>  '38103481',          // 密码
// 	'DB_PORT'               =>  '3306',        // 端口
// 	'DB_PREFIX'             =>  'if43_',    // 数据库表前缀
    
	'SHOW_PAGE_TRACE'    =>  true,//配置调试
	'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
	// 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
);