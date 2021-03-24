<?php
namespace miniphp;

class Controller
{
	//需要加载的view
	public $page_view = array();

	//页面参数
	public $parameter = array();

	public function __construct()
	{
		
	}

	public function page_include($dir)
	{
		$dir = __APP_PATH__ . "app/view/" . $dir;
		array_push($this->page_view, $dir);
	}

	public function __destruct()
	{
		//渲染视图
		if($this->page_view != null)
		{
			foreach($this->page_view as $p)
			{
				include_once($p);
			}
		}
	}
}