<?php
namespace miniphp;

class Route
{
	//自定义路由参数
	public $routeConfig;

	public function __construct()
	{
		$this->routeConfig = $this->getRouteConfig();
	}

	public function run()
	{
		if($this->routeConfig || is_array($this->routeConfig))
		{
			$url = explode('/' , __URL__);
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
				foreach($this->routeConfig as $left => $right)
				{
					if($ru == $left)
					{
						$url = $url[0] . $right;
						return $url;
					}
				}

				return __URL__;
			}
			else
			{
				return __URL__;
			}
		}
		else
		{
			return __URL__;
		}
	}

	public function getRouteConfig()
	{
		return __ROUTE__;
	}
}
