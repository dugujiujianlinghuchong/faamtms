<?php

	header("Content-Type:text/html;charset=utf-8");
	
	include_once("../common/conn_mysql.php");
	
	$plan_name=isset($_POST["plan_name"])?$_POST["plan_name"]:"";
	$plan_stage=isset($_POST["plan_stage"])?$_POST["plan_stage"]:"";
	$plan_remark=isset($_POST["plan_remark"])?$_POST["plan_remark"]:"";
//	$isshow=isset($_POST["isshow"])?$_POST["isshow"]:"";
	
	$page=isset($_POST["page"])?$_POST["page"]:"1";
	$rows=isset($_POST["rows"])?$_POST["rows"]:"10";
	$start=$rows*($page-1);
	
	$showPlanSql=<<<showPlanSql
	select * from planning
showPlanSql;
	
//	if($usernum!="") $showUserSql .="and usernum like'%{$usernum}%' ";
//	if($username!="") $showUserSql .="and username like'%{$username}%' ";
//	if($positons!="") $showUserSql .="and positon='{$positons}' ";
//	if($isshow!="") $showUserSql .="and isshow='{$isshow}' ";
//	$showUserSql .="limit {$start},{$rows};";
//	echo $showUserSql;
	
	$res=mysqli_query($link, $showPlanSql);
	
	$arr=array();
	while ($row=mysqli_fetch_assoc($res)) {
		$arr[]=$row;
	}
	
	$getCount=<<<getCount
	select count(*) from `planning` where 1=1 
getCount;

	if($$plan_name!="") $getCount .="and plan_name like'%{$plan_name}%' ";
	if($plan_stage!="") $getCount .="and plan_stage like'%{$plan_stage}%' ";
	if($plan_remark!="") $getCount .="and plan_remark='{$plan_remark}' ";
//	if($isshow!="") $getCount .="and isshow='{$isshow}' ";
	
//	echo $getCount;

	$count=mysqli_query($link, $getCount);
	$total=mysqli_fetch_row($count)[0];
	
	$jsonArr=["rows"=>$arr,"total"=>$total];
	$json=json_encode($jsonArr);
	
	echo $json;
	mysqli_close($link);
	
	