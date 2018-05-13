# mini_php_frame
<br>
(๑╹◡╹)ﾉ"""
<br><br>
<h2>史上最简易的PHPWEB框架</h2>
<br><br>
<pre>
app										框架核心部分

	controller						控制器
<br>
		IndexController.php  Index 默认控制器
<br>
		MainController.php  所有控制器的父类
<br>
		core								框架核心部分
<br>
		autoLoad.php			自动加载(Psr4AutoLoad)
<br>
		Safe.php						核心安全部分
<br>
		model								数据库层
<br>
		MainModel.php			所有库的父类
<br>
		user.php						user表 的专用class(自行更改)
<br>
		view								view层
<br>
		Index							Index控制器的view层
<br>
		page						Index控制器中各页面的view
<br>
		index.php			Index控制器中index页面的内容
<br>
		footer.php				Index控制器中的footer
<br>
		header.php			Index控制器中的header
<br>
index.php							框架入口
<br>
.htaccess
</pre>