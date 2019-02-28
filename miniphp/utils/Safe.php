<?php
namespace miniphp\utils                      ;

class Safe
{
	public function cryptStr($str)
	{
		return crypt(md5($str, true), __CONFIG__['crypt_salt']);
	}
}
