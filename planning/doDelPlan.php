<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/conn_mysql.php");
	
	$id = $_POST["id"];	
	
	$sql=<<<sql
	delete from `planning` where id ={$id};
sql;
	mysqli_query($link, $sql) or die("基本信息删除失败");
	$sql1=<<<sql1
	delete from planning_injuries where id ={$id};
sql1;
	mysqli_query($link, $sql) or die("素质信息删除失败");
	$sql2=<<<sql1
	delete from planning_quality where id ={$id};
sql1;
	mysqli_query($link, $sql) or die("伤病信息删除失败");
	
	mysqli_query($link, $sql1);
	mysqli_close($link);
	die("删除成功");
?>