<?php
namespace controller;

class IndexController extends MainController
{
	public function __construct()
	{
		parent::__construct();
		
		$this->page_include(unserialize(CONFIG)['absolute_address']."app/view/Index/header.php");
	}

	public function index()
	{
		$this->parameter['page_name']='首页';
		
		$this->page_include(unserialize(CONFIG)['absolute_address']."app/view/Index/page/index.php");
	}

	public function getUserModelConnect()
	{
		//无需 include 直接 new(自动加载会帮你include)
		//仅作为例子 如需使用请先配置config.php
		$sql = new userModel();
		
		return $sql;
	}
	
	public function __destruct()
	{
		$this->page_include(unserialize(CONFIG)['absolute_address']."app/view/Index/footer.php");
		
		parent::__destruct();
	}
}