<?php
namespace model;

class userModel extends MainModel
{
	public function __construct()
	{
		parent::__construct();
		
		//声明当前数据库 表名
		$this->bname = substr(__CLASS_NAME__,0,-5);
	}
	
	//通过user列信息筛选数据
	public function getUserInfo($user)
	{
		$sql = "select * from {$this->bname} where user='{$user}';";
		$result = $this->sql_query($sql)->fetch_array();
		return $result;
	}
	
	public function __destruct()
	{
		parent::__destruct();
	}
}