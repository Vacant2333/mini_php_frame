<?php
class user_sql extends Model
{
	/*
	power列
	免费用户
	付费用户
	管理员
	*/
	function __construct()
	{
		parent::__construct();
		$this->bname='user';
	}
	
	function getUserInfo($user)
	{
		$sql="select * from ".$this->bname." where user='".$user."';";
		$r=$this->sql_query($sql)->fetch_array();
		return $r;
	}
	
	function __destruct()
	{

	}
}
$user_sql=new user_sql();