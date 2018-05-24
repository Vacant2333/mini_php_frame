<?php
//PHP7后才支持define的内容为数组

//框架全局设置
define("CONFIG",
	array(
		// index.php的绝对路径
		'absolute_address' => "/root/webdata/miniphp/",
		
		//数据库配置(不需要可不配置)
		//库名
		'db_name' => 'db_name',
		//地址
		'db_ip' => 'localhost',
		//用户
		'db_user' => 'root',
		//密码
		'db_password' => 'root_password'
	));
	
//路由参数(参数中的斜杠一定要按照示例修改)
define('ROUTE',
	array(
		'/register/' => "/Index/register",
		'/loginxxx/' => "/Index/login/xxx",
		'/archive/2/' => "/Archive/list/2"
	));