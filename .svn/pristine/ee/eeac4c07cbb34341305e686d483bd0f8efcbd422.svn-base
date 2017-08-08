<?php

	header("Content-Type:text/html;charset=utf-8");
	
	include_once("../common/mysql.php");
	
	$id = $_POST["id"];
	
	$sql = <<<sql
	delete from `training` where id = {$id};
sql;
	mysqli_query($link, $sql) or die("数据删除失败！");
	
//	$sql1 = <<<sql
//	delete from user_remark where userid = {$id};
//sql;
//	mysqli_query($link, $sql1);
	
	mysqli_close($link);
	die("数据删除成功");

	