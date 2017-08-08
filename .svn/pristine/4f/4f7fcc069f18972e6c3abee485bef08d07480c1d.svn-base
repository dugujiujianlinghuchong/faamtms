<?php

	header("Content-Type:text/html;charset=utf-8");
	
//	file_put_contents("test.txt", json_encode($_POST));
	
	include_once("../common/mysql.php");
	
	$num = isset($_POST["num"])?$_POST["num"]:"";
	$comment = isset($_POST["comment"])?$_POST["comment"]:"";
	$founder = isset($_POST["founder"])?$_POST["founder"]:"";
	$creationTime = isset($_POST["creationTime"])?$_POST["creationTime"]:"";
	$lastXiuGaiRen = isset($_POST["lastXiuGaiRen"])?$_POST["lastXiuGaiRen"]:"";
	$lastXuiGaiTime = isset($_POST["lastXuiGaiTime"])?$_POST["lastXuiGaiTime"]:"";
	
	$page  = isset($_POST["page"])?$_POST["page"]:"1";
	$rows  = isset($_POST["rows"])?$_POST["rows"]:"10";
	$start = $rows*($page-1);
	
	$showZhuanYeSql =<<<showZhuanYeSql
	select * from sdumajor
	where 1=1  limit {$start},{$rows};
showZhuanYeSql;

//	if($num != "") $getCount .= "and num like '%{$num}%' ";
//	if($comment != "") $getCount .= "and comment like '%{$comment}%' ";
//	if($founder != "") $getCount .= "and founder = '{$founder}' ";
//	if($creationTime != "") $getCount .= "and creationTime = '{$creationTime}' ";
//	if($lastXiuGaiRen != "") $getCount .= "and lastXiuGaiRen = '{$lastXiuGaiRen}' ";
//	if($lastXuiGaiTime != "") $getCount .= "and lastXuiGaiTime = '{$lastXuiGaiTime}' ";
//	$showZhuanYeSql .= " limit {$start},{$rows}";
	

	$res = mysqli_query($link, $showZhuanYeSql);
	$arr = array();
	while($row = mysqli_fetch_assoc($res)){
		$arr[] = $row;
	}
	
	
	$getCount = <<<getCount
	select count(*) from sdumajor
	where 1=1 
getCount;
//	if($num != "") $getCount .= "and num like '%{$num}%' ";
//	if($comment != "") $getCount .= "and comment like '%{$comment}%' ";
//	if($founder != "") $getCount .= "and founder = '{$founder}' ";
//	if($creationTime != "") $getCount .= "and creationTime = '{$creationTime}' ";
//	if($lastXiuGaiRen != "") $getCount .= "and lastXiuGaiRen = '{$lastXiuGaiRen}' ";
//	if($lastXuiGaiTime != "") $getCount .= "and lastXuiGaiTime = '{$lastXuiGaiTime}' ";
	

	$count = mysqli_query($link, $getCount);
	$total = mysqli_fetch_row($count)[0];
	
	
	$jsonArr = ["rows"=>$arr];//,"total"=>$total
	
	$json = json_encode($jsonArr);
	
	file_put_contents("test.txt", $json);
	
	echo $json;
	
	mysqli_close($link);
	
	