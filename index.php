<?php
//设置时区
date_default_timezone_set('PRC');

//全局设置
include_once('miniphp/config/Config.php');
//Model主类
include_once('miniphp/Model.php');
//控制器主类
include_once('miniphp/Controller.php');
//自定义路由
include_once('miniphp/Route.php');
//自动加载
include_once('miniphp/core/Psr4AutoLoad.php');

include_once('miniphp/utils/Safe.php');

$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
define('__URL__' , $url);

$route = new \miniphp\Route();
$psr = new \miniphp\core\Psr4AutoLoad();

//执行自定义路由
$url = $route->run();
//处理URL
$url = explode('/', $url);
//c(Controller)转换为全小写 首字母大写,默认值为index
$c = $url[1] ? ucfirst(strtolower($url[1])) : 'Index';
$a = $url[2] ? $url[2] : 'index';
//拼接带有命名空间的类名
$controller = '\\controller\\' . $c . 'Controller';

//添加命名空间映射
$psr->addMap('controller', 'app/controller');
$psr->addMap('model', 'app/model');

$class = new $controller();

//判断方法是否存在
if(method_exists($class, $a))
{
	call_user_func([$class, $a]);
}
else
{
	die($c . '/' . $a . ' 方法不存在');
}
