<?php
$config = array(
	// index.php的绝对路径
	'absolute_address' => "/webdata/miniphp/",
	
	//数据库配置(不需要可不配置)
	//库名
	'db_name' => 'db_name',
	//地址
	'db_ip' => 'localhost',
	//用户
	'db_user' => 'root',
	//密码
	'db_password' => 'root_password'
	);

//由于define不能存数组 先字符化 在用的时候数组化
//调用CONFIG示例 :  $config=unserialize(CONFIG);
define("CONFIG",serialize($config));