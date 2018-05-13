<?php
class Model
{
	public $dbname;
	
	public $sql_connect;
	
	public $conf;

	//表名 由子类赋值
	public $bname;
	
	function __construct()
	{
		global $conf;
		$this->conf=$conf;
		$this->dbname=$conf['db_name'];
		
		$sql=mysqli_connect($conf['db_ip'],$conf['db_user'],$conf['db_password'],$conf['db_name']);
		$sql->query("set character set 'utf8';");
		$sql->query("set names 'utf8';");
		
		$this->sql_connect=$sql;
	}
	
	function sql_query($sql)
	{
		$r=$this->sql_connect->query($sql);
		if($r == TRUE)
			return $r;
		else
			return false;
	}
	
	// (筛选列名,筛选列值,需要获取字段名)
	function sql_getFormInfo($w,$wd,$c)
	{
		$sql="select ".$c." from ".$this->bname." where ".$w."='".$wd."';";
		$r=$this->sql_connect->query($sql)->fetch_array();
		return $r[$c];
	}
	
	//获取表内数据总数
	function sql_getCount()
	{
		$result=$this->sql_connect->query("select count(*) from ".$this->bname.";")->fetch_array();
		return $result[0];
	}
	
	function __destruct()
	{
		mysqli_close($this->sql_connect);
	}
}