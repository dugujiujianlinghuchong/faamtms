<?php

	header("Content-Type:text/html;charset=utf-8");
	
	include_once("../common/mysql.php");
	
	$id = $_POST["id"];
	
	$sql = <<<sql
	delete from class where id = {$id};
sql;
	mysqli_query($link, $sql) or die("数据删除失败！");
	
	mysqli_close($link);
	die("数据删除成功");

	