<?php
//框架全局设置
define("__CONFIG__", array(
		//加密Salt
		'crypt_salt' => "yourCryptSalt",

		//数据库配置
		'db' => array(
			//地址
			'ip' => 'localhost',
			//用户名
			'user' => 'root',
			//用户密码
			'password' => 'password',
			//连接的库名
			'name' => 'db_name'
		)
	));

//自定义路由
define('__ROUTE__', array(
		'/register/' => "/Index/register",
		'/loginxxx/' => "/Index/login/xxx",
		'/archive/2/' => "/Archive/list/2",
	));