<?php
//设置时区
date_default_timezone_set('PRC');

//全局设置
include_once('miniphp/config/config.php');

//MODEL主类
include_once('miniphp/Model.php');
//控制器主类
include_once('miniphp/Controller.php');
//自定义路由
include_once('miniphp/Route.php');
//自动加载
include_once('miniphp/core/Psr4AutoLoad.php');
//安全
include_once('miniphp/tool/Safe.php');

$route = new \miniphp\Route();
$Safe = new \miniphp\tool\Safe();
$psr = new \miniphp\core\Psr4AutoLoad();

if(isset($_POST) || isset($_GET))
{
	if(isset($_POST))
	{
		foreach($_POST as $p)
		{
			$fp = $Safe->filter($p);
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
			$fg = $Safe->filter($g);
			if($fg != $g || $fg==FALSE)
			{
				die('GET信息不合法 :)');
			}
		}
	}
	unset($p , $g , $fg , $fp);
}

//url: xxx.com/controller/action/array[3]/array[4]
//从url中获取要执行的控制器及方法
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//执行自定义路由
$url = $route->run($url);

//处理URL
$url = explode('/' , $url);
//如果没有则默认值为 Index
//m转换为全小写 首字母大写
//c代表controller a代表action
$c = $url[1] ? ucfirst(strtolower($url[1])) : 'Index';
$a = $url[2] ? $url[2] : 'index';

//拼接带有命名空间的类名
$controller = '\\controller\\' . $c . 'Controller';

//添加命名空间映射
$psr->addMap('controller', 'app/controller');
$psr->addMap('model', 'app/model');

$class = new $controller();

if(method_exists($class , $a))
{
	call_user_func([$class , $a]);
}
else
{
	die($c . '/' . $a . ' 方法不存在');
}