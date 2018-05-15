<?php
class user extends MainModel
{
	public function __construct()
	{
		parent::__construct();
		$this->bname = 'user';
	}
	
	//通过user列信息筛选数据
	public function getUserInfo($user)
	{
		$sql = "select * from ".$this->bname." where user='".$user."';";
		$r = $this->sql_query($sql)->fetch_array();
		return $r;
	}
	
	public function __destruct()
	{
		parent::__destruct();
	}
}