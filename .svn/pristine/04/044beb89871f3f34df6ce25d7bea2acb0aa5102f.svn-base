<?php

	header("Content-Type:text/html;charset=utf-8");
	
	
	include_once("../common/mysql.php");
	
	$usernum   = isset($_POST["usernum"])?$_POST["usernum"]:"";
	$username  = isset($_POST["username"])?$_POST["username"]:"";
	$positions = isset($_POST["positions"])?$_POST["positions"]:"";
	$isshow    = isset($_POST["isshow"])?$_POST["isshow"]:"";
	
	$page  = isset($_POST["page"])?$_POST["page"]:"1";
	$rows  = isset($_POST["rows"])?$_POST["rows"]:"10";
	$start = $rows*($page-1);
	
	$showUserSql =<<<showUserSql
	select *,(
		CASE
			WHEN position=0 THEN "管理员"
			WHEN position=1 THEN "教员"
			WHEN position=2 THEN "学员"
		END
	) position_show,(
		CASE
			WHEN isshow=0 THEN "否"
			WHEN isshow=1 THEN "是"
		END
	) isshow_show from `user`
	where 1=1 
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