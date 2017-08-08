<?php

	header("Content-Type:text/html;charset=utf-8");
	
	//file_put_contents("test.txt", json_encode($_POST));
	
	include_once("../common/mysql.php");
	
	$sduno   = isset($_POST["sduno"])?$_POST["sduno"]:"";
	$sduname  = isset($_POST["sduname "])?$_POST["sduname "]:"";
	$sdusex = isset($_POST["sdusex"])?$_POST["sdusex"]:"";
	
	$page  = isset($_POST["page"])?$_POST["page"]:"1";
	$rows  = isset($_POST["rows"])?$_POST["rows"]:"10";
	$start = $rows*($page-1);
	
	$showUserSql =<<<showUserSql
	select * from student;
showUserSql;

	if($usernum != "") $showUserSql .= "and usernum like '%{$usernum}%' ";
	if($username != "") $showUserSql .= "and username like '%{$username}%' ";
	if($positions != "") $showUserSql .= "and position = '{$positions}' ";
	if($isshow != "") $showUserSql .= "and isshow = '{$isshow}' ";
	$showUserSql .= "limit {$start},{$rows}";
	

	$res = mysqli_query($link, $showUserSql);
	$arr = array();
	while($row = mysqli_fetch_assoc($res)){
		$arr[] = $row;
	}
	
	
	$getCount = <<<getCount
	select count(*) from `user`
	where 1=1 
getCount;
	if($usernum != "") $getCount .= "and usernum like '%{$usernum}%' ";
	if($username != "") $getCount .= "and username like '%{$username}%' ";
	if($positions != "") $getCount .= "and position = '{$positions}' ";
	if($isshow != "") $getCount .= "and isshow = '{$isshow}' ";
	

	$count = mysqli_query($link, $getCount);
	$total = mysqli_fetch_row($count)[0];
	
	
	$jsonArr = ["rows"=>$arr,"total"=>$total];
	
	$json = json_encode($jsonArr);
	
	echo $json;
	
	mysqli_close($link);