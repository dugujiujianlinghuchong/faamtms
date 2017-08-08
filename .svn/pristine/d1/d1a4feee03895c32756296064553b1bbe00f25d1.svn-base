<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/mysql.php");
	
	
	$page=isset($_POST["page"])?$_POST["page"]:"1";
	$rows=isset($_POST["rows"])?$_POST["rows"]:"10";
	$start=$rows*($page-1);
	
	$query=<<<query
	select *,(
		case
			WHEN data_type=0 THEN "类型1"
			WHEN data_type=1 THEN "类型2"
			WHEN data_type=2 THEN "类型3"
			WHEN data_type=3 THEN "类型4"
			WHEN data_type=4 THEN "类型5"
		end
	)as type_show
	from data limit {$start},{$rows};
query;
	
	$result=mysqli_query($link, $query);
	
	$arr=array();
	while ($row=mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	
	$getTotal=<<<total
	select count(*) from data;
total;
	$count=mysqli_query($link,$getTotal);
	$total=mysqli_fetch_row($count)[0];
	
	$jsonArr=["rows"=>$arr,"total"=>$total];
	$json = json_encode($jsonArr);
	echo $json;
	
	mysqli_close($link);
	
	