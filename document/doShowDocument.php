<?php

	header("Content-Type:text/html;charset=utf-8");
	
	//file_put_contents("test.txt", json_encode($_POST));
	
	include_once("../common/mysql.php");
	
	$name = isset($_POST["name"])?$_POST["name"]:"";
	$type = isset($_POST["type"])?$_POST["type"]:"";
	$details = isset($_POST["details"])?$_POST["details"]:"";
	$issuer = isset($_POST["issuer"])?$_POST["issuer"]:"";
	$time = isset($_POST["time"])?$_POST["time"]:"";
	
	$page  = isset($_POST["page"])?$_POST["page"]:"1";
	$rows  = isset($_POST["rows"])?$_POST["rows"]:"10";
	$start = $rows*($page-1);
	
	$showDocumentSql =<<<showDocumentSql
	select * from document
	where 1=1 
showDocumentSql;

	if($name != "") $showDocumentSql .= "and name like '%{$name}%' ";
	if($type != "") $showDocumentSql .= "and type like '%{$type}%' ";
	if($details != "") $showDocumentSql .= "and details = '{$details}' ";
	if($issuer != "") $showDocumentSql .= "and issuer = '{$issuer}' ";
	if($time != "") $showDocumentSql .= "and time = '{$time}' ";
	$showDocumentSql .= "limit {$start},{$rows}";
	

	$res = mysqli_query($link, $showDocumentSql);
	$arr = array();
	while($row = mysqli_fetch_assoc($res)){
		$arr[] = $row;
	}
	
	
	$getCount = <<<getCount
	select count(*) from document
	where 1=1 
getCount;
	if($name != "") $getCount .= "and name like '%{$name}%' ";
	if($type != "") $getCount .= "and type like '%{$type}%' ";
	if($details != "") $getCount .= "and details = '{$details}' ";
	if($issuer != "") $getCount .= "and issuer = '{$issuer}' ";
	if($time != "") $getCount .= "and time = '{$time}' ";
	

	$count = mysqli_query($link, $getCount);
	$total = mysqli_fetch_row($count)[0];
	
	
	$jsonArr = ["rows"=>$arr,"total"=>$total];
	
	$json = json_encode($jsonArr);
	
	echo $json;
	
	mysqli_close($link);