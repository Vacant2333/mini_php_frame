<?php
//设置时区
date_default_timezone_set('PRC');

//设置
include('config/config.php');

//SQL模型
include('app/model/MainModel.php');
//控制器主类
include('app/controller/MainController.php');

//自动加载
include('app/core/AutoLoad.php');
//安全
include('app/core/Safe.php');


$safe = new \core\Safe();

if(isset($_POST) || isset($_GET))
{
	if(isset($_POST))
	{
		foreach($_POST as $p)
		{
			$fp = $safe->filter($p);
			if($fp != $p || $fp==FALSE)
				die('POST信息不合法');
		}
	}
	if(isset($_GET))
	{
		foreach($_GET as $g)
		{
			$fg = $safe->filter($g);
			if($fg != $g || $fg==FALSE)
				die('GET信息不合法');
		}
	}
	
	unset($p,$g,$fg,$fp);
}

//自动加载
$psr = new \core\Psr4AutoLoad();
//url : xxx.com/controller/action/array[0]/array[1]
//从url中获取要执行的哪个控制器中的哪个方法
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//处理index 分割/
$url = explode('/', $url);

//如果没有就默认index
//m转换为全小写 首字母大写
$m = isset($url[1]) && strlen($url[1]) > 0 ? ucfirst(strtolower($url[1])) : 'Index';
$a = isset($url[2]) && strlen($url[2]) > 0 ? $url[2] : 'index';

//拼接带有命名空间的类名
$controller = '\\controller\\' . $m . 'Controller';

//添加命名空间映射
$psr->addMaps('controller', 'app/controller');
$psr->addMaps('model', 'app/model');

$obj = new $controller($conf);
call_user_func([$obj, $a]);