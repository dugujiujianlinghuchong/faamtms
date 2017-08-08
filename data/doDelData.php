<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/mysql.php");
	
	$id = $_POST["id"];
	$fileId=$id+1;
	
	$sql = <<<sql
	delete from data where id = {$id};
sql;
	mysqli_query($link, $sql) or die("数据删除失败！");
	
	$sql1 = <<<sql1
	delete from data_details where fileID = {$fileId};
sql1;
	mysqli_query($link, $sql1) or die("数据删除失败！");
	
	mysqli_close($link);
	die("数据删除成功");