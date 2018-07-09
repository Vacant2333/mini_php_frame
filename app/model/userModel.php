<?php
namespace model;

class userModel extends \miniphp\Model
{
	public function __construct()
	{
		parent::__construct();

		//直接从类名获取当前操作表名
		$this->bname = substr(__CLASS__ , 0 , -5);
	}

	//通过user列信息筛选数据
	public function getUserInfo($userName)
	{
		$stmt = $this->sql_connect->prepare("select * from ? where user='?';");
		$result = $stmt->bind_param("ss" , $this->bname , $userName)->excute()->fetch_array();
		$stmt->close();

		return $result;
	}

	public function __destruct()
	{
		parent::__destruct();
	}
}
