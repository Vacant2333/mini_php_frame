<?php
namespace controller;

class IndexController
{
	//加载html
	public $page=array();

	//全局配置文件  /config/config.php
	public $conf=array();

	//页面参数
	//在方法中传参
	public $parameter=array();


	function __construct()
	{
		global $conf;
		$this->conf=$conf;

		session_start();

		if(isset($_SESSION['user']))
		{
			$this->parameter['islogin']=true;
			$this->parameter['user']=$_SESSION['user'];
		}
		else
			$this->parameter['islogin']=false;


		$this->page_include($this->conf['absolute_address'] . 'app/view/Index/header.php');
	}

	function index()
	{
		//调用MODEL层直接INCLUDE && NEW
		$this->parameter['page_name']='首页';

		global $url;
		//xxx.com/index/aricle/id1/id2
		$id1 = isset($url[3]) ? $url[3] : 1;
		$id2 = isset($url[4]) ? $url[4] : 150;
		$article_sql=$this->article_sql();
		$this->parameter['article']=$article_sql->getArticle($id1,$id2);

		$this->page_include($this->conf['absolute_address'] . 'app/view/Index/page/index.php');
	}

	function page_include($dir)
	{
		array_push($this->page,$dir);
	}

	function __destruct()
	{
		$parameter=$this->parameter;

		$this->page_include($this->conf['absolute_address'] . 'app/view/Index/footer.php');

		foreach($this->page as $p)
			include($p);
	}
}