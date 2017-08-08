<?php

	header("Content-Type:text/html;charset=utf-8");
	
	file_put_contents("test.txt", json_encode($_POST));
	
	include_once("../common/mysql.php");
	
	$majorSel = isset($_POST["majorSel"])?$_POST["majorSel"]:"";
	$classSel = isset($_POST["classSel"])?$_POST["classSel"]:"";
	
	switch ($majorSel) {
		case '1':
			$majorSel="通信工程";
			if($classSel=="1"){
				$classSel="通信一班";
			}elseif($classSel=="2"){
				$classSel="通信二班";
			}
			break;
		case '2':
			$majorSel="计算机科学与技术";
			if($classSel=="1"){
				$classSel="计科一班";
			}elseif($classSel=="2"){
				$classSel="计科二班";
			}
			break;
		case '3':
			$majorSel="数学学院";
			if($classSel=="1"){
				$classSel="数院一班";
			}elseif($classSel=="2"){
				$classSel="数院二班";
			}
			break;
		case '4':
			$majorSel="会计学院";
			if($classSel=="1"){
				$classSel="会计一班";
			}elseif($classSel=="2"){
				$classSel="会计二班";
			}
			break;
	}
	
	$page  = isset($_POST["page"])?$_POST["page"]:"1";
	$rows  = isset($_POST["rows"])?$_POST["rows"]:"10";
	$start = $rows*($page-1);
	
	$showUserSql =<<<showUserSql
	select *,(
		CASE
			WHEN sex=0 THEN "女"
			WHEN sex=1 THEN "男"
		END
	) sex_show,major,class,(
		CASE
			WHEN grade=1 THEN "2011级"
			WHEN grade=2 THEN "2012级"
			WHEN grade=3 THEN "2013级"
			WHEN grade=4 THEN "2014级"
			WHEN grade=5 THEN "2015级"
			WHEN grade=6 THEN "2016级"
		END
	) grade_show,(
		CASE
			WHEN not isnull(scale) THEN "已评分"
			WHEN ISNULL(scale) THEN "未评分"
		END
	) state_show from `training`
	where 1=1 
showUserSql;

	if($majorSel != "") $showUserSql .= "and major='{$majorSel}' ";
	if($classSel != "") $showUserSql .= "and class='{$classSel}' ";
	$showUserSql .= "limit {$start},{$rows}";
	

	$res = mysqli_query($link, $showUserSql);
	$arr = array();
	while($row = mysqli_fetch_assoc($res)){
		$arr[] = $row;
	}
	
	
	$getCount = <<<getCount
	select count(*) from `training`
	where 1=1 
getCount;
	if($majorSel != "") $getCount .= "and major='{$majorSel}' ";
	if($classSel != "") $getCount .= "and class='{$classSel}' ";
	

	$count = mysqli_query($link, $getCount);
	$total = mysqli_fetch_row($count)[0];
	
	
	$jsonArr = ["rows"=>$arr,"total"=>$total];
	
	$json = json_encode($jsonArr);
	
	echo $json;
	
	mysqli_close($link);