<?php
namespace model;

class userModel extends \miniphp\Model
{
	public function __construct()
	{
		parent::__construct();

		//直接从类名获取当前操作表名
		$this->table_name = substr(__CLASS__ , 0 , -5);
	}

	//示例
	public function getUserInfo($userName)
	{
		$stmt = $this->sql_connect->prepare("select * from ? where user = '?';");
		$result = $stmt->bind_param("ss" , $this->table_name , $userName)->excute()->fetch_array();
		$stmt->close();

		return $result;
	}

	public function __destruct()
	{
		parent::__destruct();
	}
}