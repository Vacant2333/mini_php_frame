<?php
namespace miniphp;

class Model
{
	//库名
	public $dbname;

	//数据库连接
	public $sql_connect;

	//操作的表名
	public $bname;

	public function __construct()
	{
		$conf = __CONFIG__['db'];
		$this->dbname = $conf['name'];

		$sql = mysqli_connect($conf['ip'] , $conf['user'] , $conf['password'] , $conf['name']);

		if(mysqli_connect_error())
		{
			die('SQL连接失败');
		}

		//设置数据库编码为UTF8以支持中文
		$sql->query("set character set 'utf8';");
		$sql->query("set names 'utf8';");

		$this->sql_connect = $sql;
	}

	public function __destruct()
	{
		mysqli_close($this->sql_connect);
	}
}
