# Mini_PHP_Frame MVC框架
环境要求: PHP7+, Linux, Apache/Nginx
<br>
<h2>超级轻的PHP Web框架</h2>
代码仅10 KB!
<br>
演示地址: <a href="http://39.96.4.47:81/Index/index">[点我]</a>

<h3>文件结构</h3>
<pre>
app                      |项目文件
  controller             |控制器
    IndexController.php  |默认控制器
  model                  |数据库模型
    userModel.php        |默认模型
  view                   |页面文件
    page                 |page页面
      index.php          |index页面内容
    header.php           |index头部内容
    footer.php           |index底部内容
miniphp                  |框架文件
  config                 |设置
    Config.php           |设置文件
  core                   |核心
    Psr4AutoLoad.php     |自动加载(Psr4)
  utils                  |工具
    Safe.php             |安全(加密,过滤)
  Controller.php         |控制器(父类)
  Model.php              |模型(父类)
  Route.php              |自定义路由
index.php                |框架入口
</pre>

<h3>初次使用</h3>
下载项目文件,放在网页根目录
<br>
配置重定向(所有不存在的访问重定向到 /index.php)
<br>
Nginx配置:
<pre>
location /
{
    try_files $uri $uri/ /index.php?$query_string;
}
</pre>
Apache请自行设置
<br>
访问以下任意地址
<br>
http://localhost
<br>
http://localhost/Index/index
<br>
http://localhost/register

<h3>自定义路由(Route)</h3>
路由设置在miniphp/config/Config.php
<br>
访问 xxx.com/register
<br>
相当于访问
<br>
xxx.com/Index/register
<br>

<h3>命名规范</h3>
MySQL的库/表名需小写或小写加下划线,如:item，car_orders
<br>
控制器(Controller)需用大驼峰命名法,即首字母大写,并在名称后添加Controller，如:IndexController
<br>
方法名(Action)需用小驼峰命名法,即首字母小写,如:index，indexPost
<br>
模型名(Model)需用小骆驼峰命名法,首字母小写,userModel(父类用大骆驼峰命名法)
<br>

<h3>已定义常量</h3>
<pre>
__URL__      (string)   用户访问的URL
__ROUTE__    (array)    自定义路由配置
__CONFIG__   (array)    全局配置
__APP_PATH__ (string)   App路径
</pre>

<h3>其他</h3>
默认控制器: Index  默认方法: index
<br>
所以: 访问 xxx.com 等同于访问  xxx.com/Index/index
<br>
可在入口文件/index.php 中修改默认控制器和默认方法
<br>
URL结构: xxx.com/控制器/方法/参数1/参数2/参数3/参数+
<br>
获取URL参数: $url[3]为参数1  $url[4]为参数2
<br>
<br>
最后更新时间:2021/3/24