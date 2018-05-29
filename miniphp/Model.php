<?php
namespace miniphp;

class Model
{
	//库名
	public $dbname;
	
	//数据库连接
	public $sql_connect;

	//需要操作的表名
	public $bname;
	
	public function __construct()
	{
		//在这里处理数据库连接
		//本代码仅作为示例
		$conf = CONFIG;
		$this->dbname = $conf['db_name'];
		
		$sql = mysqli_connect($conf['db_ip'] , $conf['db_user'] , $conf['db_password'] , $conf['db_name']);
		
		if(mysqli_connect_error())
		{
			die('SQL连接失败');
		}
		
		//设置数据库编码为UTF8
		$sql->query("set character set 'utf8';");
		$sql->query("set names 'utf8';");
		
		$this->sql_connect = $sql;
	}
	
	public function __destruct()
	{
		mysqli_close($this->sql_connect);
	}
}