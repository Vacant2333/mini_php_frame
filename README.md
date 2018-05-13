# mini_php_frame
<br>
(๑╹◡╹)ﾉ"""
<br><br>
<h2>史上最简易的PHPWEB框架</h2>
<br><br>

<pre>
app                        框架核心部分
  controller                      控制器
    IndexController.php  Index 默认控制器
    MainController.php  所有控制器的父类
  core                框架核心部分
    autoLoad.php      自动加载(Psr4AutoLoad)
    Safe.php            核心安全部分
  model                数据库层
    MainModel.php      所有库的父类
    user.php            user表 的专用class(自行更改)
  view                view层
    Index              Index控制器的view层
      page            Index控制器中各页面的view
        index.php      Index控制器中index页面的内容
      footer.php        Index控制器中的footer
      header.php      Index控制器中的header
index.php              框架入口
.htaccess
</pre>