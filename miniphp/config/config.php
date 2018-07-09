<?php
//PHP7后才支持define的内容为数组

//框架全局设置
define("__CONFIG__",
	array(
		// index.php的绝对路径
		'absolute_address' => '/root/http/miniphp/',

		//加密salt
		'crypt_salt' => '我永远喜欢Angelic47',

		//数据库配置(不需要可不配置)
		'db' => array(
			//库名
			'name' => 'db_name',
			//地址
			'ip' => 'localhost',
			//用户
			'user' => 'root',
			//密码
			'password' => 'root_password'
		)
	));

//自定义路由参数(一定要按照示例修改)
define('__ROUTE__',
	array(
		'/register/' => "/Index/register",
		'/loginxxx/' => "/Index/login/xxx",
		'/archive/2/' => "/Archive/list/2"
	));
