<?php
namespace controller;

class MainController
{
	//页面内容
	public $page = array();
	
	//页面参数
	public $parameter = array();

	public function __construct()
	{		
		session_start();
		if(isset($_SESSION['user']))
		{
			$this->parameter['islogin'] = true;
			$this->parameter['user'] = $_SESSION['user'];
		}
		else
			$this->parameter['islogin'] = false;
	}

	public function page_include($dir)
	{
		array_push($this->page,$dir);
	}

	public function __destruct()
	{
		//渲染视图
		if($this->page != null)
		{
			foreach($this->page as $p)
				include($p);
		}
	}
}