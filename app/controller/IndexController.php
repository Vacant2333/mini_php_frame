<?php
namespace controller;

class IndexController extends MainController
{
	function __construct()
	{
		//调用父类构造函数
		parent::__construct();
		
		$this->page_include($this->conf['absolute_address'] . 'app/view/Index/header.php');
	}

	function index()
	{
		$this->parameter['page_name']='首页';
		
		$this->page_include($this->conf['absolute_address'] . 'app/view/Index/page/index.php');
	}

	function __destruct()
	{
		$this->page_include($this->conf['absolute_address'] . 'app/view/Index/footer.php');
		parent::__destruct();
	}
}