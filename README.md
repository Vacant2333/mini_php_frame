# Mini_PHP 网页MVC框架
<br>
演示地址: <a href="http://miniphp.vacant.mobi">[点我]</a>
<br>
注: 需要PHP7+ 否则config文件会报错(php7+ 才支持define的内容为数组)
<br><br>
<h2>最最最 轻 的PHP WEB框架</h2>
<h3>代码仅9 KB!</h3>
<br>
<h3>文件结构</h3>
<br>
<pre>
app                      |页面内容
  controller             |控制器
    IndexController.php  |默认控制器
  model                  |模型
    userModel.php        |默认模型
  view                   |页面内容
    page                 |页面文件
      index.php          |index页面内容
    header.php           |index头部内容
    footer.php           |index底部内容
miniphp                  |框架文件
  config                 |设置
    config.php           |设置文件
  core                   |核心
    Psr4AutoLoad.php     |自动加载(Psr4)
  tool                   |工具
    Safe.php             |安全(加密,过滤)
  Controller.php         |控制器(父类)
  Model.php              |模型(父类)
  Route.php              |自定义路由
index.php                |框架入口
.htaccess                |Rerite
</pre>
<p>
默认控制器: Index  默认方法: index
所以: 访问 xxx.com 等同于访问  xxx.com/Index/index
可在入口文件/index.php 中修改默认控制器和默认方法
url结构: xxx.com/控制器/方法/参数1/参数2/参数3/参数+
获取参数: $url[3]为参数1  $url[4]为参数2
首次使用请在/miniphp/config/config.php
修改 'absolute_address' 为你的index的根目录
</p>
<h3>初次使用:</h3>
安装php7
<br>
clone本框架放入web服务器根目录
<br>
修改config.php中的'absolute_address'
<br>
内容为你的入口文件根目录
<br>
进入http://localhost
<br>
<h3>自定义路由(ROUTE)</h3>
路由设置在/miniphp/config/config.php
<br>
路由提供了一个示例
<br>
直接访问 xxx.com/register
<br>
则相当于访问
<br>
xxx.com/Index/register
<br>
路由参数必须按照示例修改
<br>
<h3>规范</h3>
MySQL的表名需小写或小写加下划线，如：item，car_orders
<br>
控制器(Controller)需用大驼峰命名法，即首字母大写，并在名称后添加Controller，如：IndexController
<br>
方法名(Action)需用小驼峰命名法，即首字母小写，如：index，indexPost
<br>
模型名(Model)需用小骆驼峰命名法，首字母小写，userModel(父类用大骆驼峰命名法)
