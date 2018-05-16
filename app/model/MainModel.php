<?php
class MainModel
{
	//库名
	public $dbname;
	
	//数据库连接
	public $sql_connect;
	
	public $conf;

	//表名 在子类的折构函数中赋值
	public $bname;
	
	public function __construct()
	{
		global $conf;
		$this->conf = $conf;
		$this->dbname = $conf['db_name'];
		
		$sql = mysqli_connect($conf['db_ip'],$conf['db_user'],$conf['db_password'],$conf['db_name']);
		$sql->query("set character set 'utf8';");
		$sql->query("set names 'utf8';");
		
		$this->sql_connect = $sql;
	}
	
	//执行sql语句
	public function sql_query($sql)
	{
		$result = $this->sql_connect->query($sql);
		if($r == TRUE)
			return $result;
		else
			return FALSE;
	}
	
	//根据某条信息筛选数据(筛选列名,筛选列值,需要获取字段名)
	public function sql_getFormInfo($w,$wd,$c)
	{
		$sql = "select {$c} from {$this->bname} where {$w}='{$wd}';";
		$r = $this->sql_connect->query($sql)->fetch_array();
		return $r[$c];
	}
	
	//获取表内数据总数
	public function sql_getCount()
	{
		$result = $this->sql_connect->query("select count(*) from {$this->bname};")->fetch_array();
		return $result[0];
	}
	
	public function __destruct()
	{
		mysqli_close($this->sql_connect);
		unset($this->dbname,$this->conf,$this->bname,$this->sql_connect);
	}
}