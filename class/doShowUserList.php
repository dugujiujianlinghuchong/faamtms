<?php

	header("Content-Type:text/html;charset=utf-8");
	
	
	include_once("../common/mysql.php");
	
	$stuno   = isset($_POST["stuno"])?$_POST["stuno"]:"";
	$stumajor  = isset($_POST["stumajor"])?$_POST["stumajor"]:"";
	$crename  = isset($_POST["crename"])?$_POST["crename"]:"";
	$cretime  = isset($_POST["cretime"])?$_POST["cretime"]:"";
	$lastupdatename  = isset($_POST["lastupdatename"])?$_POST["lastupdatename"]:"";
	$lastupdatetime  = isset($_POST["lastupdatetime"])?$_POST["lastupdatetime"]:"";
	
	$page  = isset($_POST["page"])?$_POST["page"]:"1";
	$rows  = isset($_POST["rows"])?$_POST["rows"]:"10";
	$start = $rows*($page-1);
	
	$showUserSql =<<<showUserSql
	select * from class
	where 1=1 
showUserSql;

	if($stuno != "") $showUserSql .= "and stuno like '%{$stuno}%' ";
	if($stumajor != "") $showUserSql .= "and stumajor like '%{$stumajor}%' ";
	$showUserSql .= "limit {$start},{$rows}";
	

	$res = mysqli_query($link, $showUserSql);
	$arr = array();
	while($row = mysqli_fetch_assoc($res)){
		$arr[] = $row;
	}
	
	
	$getCount = <<<getCount
	select count(*) from class
	where 1=1 
getCount;
	if($stuno != "") $getCount .= "and stuno like '%{$stuno}%' ";
	if($stumajor != "") $getCount .= "and stumajor like '%{$stumajor}%' ";
	if($crename != "") $getCount .= "and crename like '%{$crename}%' ";
	if($lastupdatename != "") $getCount .= "and lastupdatename like '%{$lastupdatename}%' ";

	$count = mysqli_query($link, $getCount);
	$total = mysqli_fetch_row($count)[0];
	
	$jsonArr = ["rows"=>$arr,"total"=>$total];
	
	$json = json_encode($jsonArr);
	
	echo $json;
	
	mysqli_close($link);