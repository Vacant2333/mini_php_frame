<?php
/*
遍历所有GET POST信息
判断 过滤后字符串是否和原字符串相同
不相同则直接die
*/
function filter($str) 
{
	$html_string = array("&amp;","&nbsp;","'",'"',"<",">","\t","\r");
    $html_clear = array("&"," ","&#39;","&quot;","&lt;", "&gt;", "&nbsp; &nbsp; ","");
    $js_string = array("/<script(.*)<\/script>/isU");
    $js_clear = array("");
    $frame_string = array("/<frame(.*)>/isU","/<\/fram(.*)>/isU","/<iframe(.*)>/isU","/<\/ifram(.*)>/isU");
    $frame_clear = array("","","","");
    $style_string = array("/<style(.*)<\/style>/isU","/<link(.*)>/isU","/<\/link>/isU");
    $style_clear = array("", "", "");
    $str = trim($str);
    $str = str_replace($html_string,$html_clear,$str);
    $str = preg_replace($js_string,$js_clear,$str);
    $str = preg_replace($frame_string,$frame_clear,$str);
    $str = preg_replace($style_string,$style_clear,$str);
    $search = array(" ","　","\n","\r","\t");
	$replace = array("","","","","");
	return htmlspecialchars(str_replace($search,$replace,$str));
}

if(isset($_POST))
{
	foreach($_POST as $p)
	{
		if(isset($p))
		{
			if(filter($p)!= $p)
				die('信息不合法');
		}
	}
}
if(isset($_GET))
{
	foreach($_GET as $p)
	{
		if(isset($g))
		{
			if(filter($g)!= $g)
				die('信息不合法');
		}
	}
}
