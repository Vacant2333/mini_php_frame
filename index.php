<?php
//设置时区
date_default_timezone_set('PRC');

//全局设置
include('config/config.php');

//SQL主类
include('app/model/MainModel.php');
//控制器主类
include('app/controller/MainController.php');
//自动加载
include('app/core/Psr4AutoLoad.php');
//安全
include('app/core/Safe.php');


new \core\Safe();

if(isset($_POST) || isset($_GET))
{
	if(isset($_POST))
	{
		foreach($_POST as $p)
		{
			$fp = \core\Safe::filter($p);
			if($fp != $p || $fp==FALSE)
			{
				die('POST信息不合法 :)');
			}
		}
	}
	if(isset($_GET))
	{
		foreach($_GET as $g)
		{
			$fg = \core\Safe::filter($g);
			if($fg != $g || $fg==FALSE)
			{
				die('GET信息不合法 :)');
			}
		}
	}
	unset($p,$g,$fg,$fp);
}

//url : xxx.com/controller/action/array[3]/array[4]
//从url中获取要执行的控制器及方法
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = explode('/', $url);

//如果没有则默认值为 Index
//m转换为全小写 首字母大写
$c = $url[1] ? ucfirst(strtolower($url[1])) : 'Index';
$a = $url[2] ? $url[2] : 'index';

//拼接带有命名空间的类名
$controller = '\\controller\\' . $c . 'Controller';

$psr = new \core\Psr4AutoLoad();

//添加命名空间映射
$psr->addMaps('controller', 'app/controller');
$psr->addMaps('model', 'app/model');

call_user_func([(new $controller()), $a]);