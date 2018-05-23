# Mini_PHP
<br>
(≧ω≦)/(≧ω≦)/(≧ω≦)/
<br>
演示地址: <a href="http://miniphp.vacant.mobi">[戳我](服务器被我误操作格盘了 暂未恢复)</a>
<br><br>
<h2>最最最 轻 的PHP WEB框架</h2>
<h3>代码仅10 KB</h3>
<br>
访问   xxx.com 等同于访问  xxx.com/Index/index
默认控制器: Index  默认方法: index
可在/index.php 中修改默认值
<br>
url结构: xxx.com/控制器/方法/参数1/参数2/参数x
<br>
获取参数: $url[3]为参数1  $url[4]为参数2
<br>
首次使用请在config/config.php修改配置
<br>
<h3>文件结构</h3>
<br>
<pre>
app                      |框架核心部分
  controller             |控制器
    IndexController.php  |Index 默认控制器
    MainController.php   |所有控制器的父类
  core                   |框架核心部分
    Psr4AutoLoad.php     |自动加载(Psr4AutoLoad)
    Safe.php             |核心安全部分
  model                  |数据库层
    MainModel.php        |所有库的父类
    userModel.php        |user表 的专用class(自行更改)
  view                   |view层
    Index                |Index控制器的view层
      page               |Index控制器中各页面的view
        index.php        |Index控制器中index页面的内容
      footer.php         |Index控制器中的footer
      header.php         |Index控制器中的header
config                   |设置文件内容
  config.php             |设置文件
index.php                |框架入口
.htaccess                |Rerite
</pre>
<br>
<h3>规范</h3>
MySQL的表名需小写或小写加下划线，如：item，car_orders
<br>
控制器（Controller）需用大驼峰命名法，即首字母大写，并在名称后添加Controller，如：IndexController
<br>
方法名（Action）需用小驼峰命名法，即首字母小写，如：index，indexPost
<br>
模型名(Model)需用小骆驼峰命名法，首字母小写，userModel(父类用大骆驼峰命名法)
<br>