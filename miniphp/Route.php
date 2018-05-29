<?php
namespace miniphp;

class Route
{
	//自定义路由参数
	public $route;
	
	public function __construct()
	{
		$this->route = $this->getRouteConfig();
	}
	
	
	public function run($url)
	{
		//保存原始URL
		$returnUrl = $url;
		
		if($this->route || is_array($this->route))
		{
			$url = explode('/' , $url);
			//把 xxx.com/c/a/ 转换为 /c/a
			if($url[1] != NULL)
			{
				$ru = NULL;
				foreach($url as $key => $u)
				{
					if($key == 0)
					{
						$ru = '/';
					}
					else
					{
						if($u != NULL)
						{
							$ru = $ru . $u . '/';
						}
					}
				}
				//判断访问的URL是否存在路由配置中
				foreach($this->route as $left => $right)
				{
					if($ru == $left)
					{
						$url = $url[0] . $right;
						return $url;
					}
				}
				return $returnUrl;
			}
			else
			{
				return $returnUrl;
			}
		}
		else
		{
			return $returnUrl;
		}
	}
	
	public function getRouteConfig()
	{
		return ROUTE;
	}
}