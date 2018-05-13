<?php
namespace controller;

class MainController
{
	//页面内容
	public $page=array();

	//全局配置文件  /config/config.php
	public $conf=array();

	//页面参数
	public $parameter=array();

	function __construct()
	{
		global $conf;
		$this->conf=$conf;

		if(isset($_SESSION['user']))
		{
			$this->parameter['islogin']=true;
			$this->parameter['user']=$_SESSION['user'];
		}
		else
			$this->parameter['islogin']=false;
	}

	function page_include($dir)
	{
		array_push($this->page,$dir);
		return;
	}

	function __destruct()
	{
		if($this->page!=null)
		{
			foreach($this->page as $p)
				include($p);
		}
	}
}