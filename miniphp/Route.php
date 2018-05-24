<?php
namespace miniphp;

class Route
{
	/*
	自定义路由(缩短URL)
	当用户访问 xxx.com/register
	变为 xxx.com/Index/register
	*/
	//获取自定义路由参数
	public $route = ROUTE;
	
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
				
				foreach($this->route as $left => $right)
				{
					if($ru == $left)
					{
						$url = $url[0] . $right;
						return $url;
					}
				}
				
				die('error 404');
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
}