<?php
namespace model;

class MainModel
{
	//库名
	public $dbname;
	
	//数据库连接
	public $sql_connect;

	//表名 在子类的折构函数中赋值
	public $bname;
	
	public function __construct()
	{
		$conf=unserialize(CONFIG);
		$this->dbname = $conf['db_name'];
		
		$sql = mysqli_connect($conf['db_ip'],$conf['db_user'],$conf['db_password'],$conf['db_name']);
		$sql->query("set character set 'utf8';");
		$sql->query("set names 'utf8';");
		
		$this->sql_connect = $sql;
	}
	
	//执行sql语句
	public function querySql($sql)
	{
		$result = $this->sql_connect->query($sql);
		if($r == TRUE)
			return $result;
		else
			return FALSE;
	}
	
	public function __destruct()
	{
		mysqli_close($this->sql_connect);
	}
}