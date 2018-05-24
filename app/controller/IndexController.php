<?php
namespace controller;

class IndexController extends \miniphp\Controller
{
	public function __construct()
	{
		parent::__construct();
		
		//判断是否登录   仅作为示例
		session_start();
		
		if(isset($_SESSION['user']))
		{
			$this->parameter['islogin'] = true;
			$this->parameter['user'] = $_SESSION['user'];
		}
		else
		{
			$this->parameter['islogin'] = false;
		}
		
		//加载view
		$this->page_include("Index/header.php");
	}

	public function index()
	{
		$this->parameter['page_name'] = '首页';
		
		$this->page_include("Index/page/index.php");
	}
	
	public function register()
	{
		$this->parameter['page_name'] = '注册';
		
		$this->page_include("Index/page/register.php");
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
		$this->page_include("Index/footer.php");
		
		parent::__destruct();
	}
}