<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/mysql.php");
	
	$query=<<<query
	select * from data_details where fileID=(select max(fileId) from data_details);
query;
	$result=mysqli_query($link, $query);
	
	$arr=array();
	while ($row=mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	
	$getTotal=<<<total
	select count(*) from data_details;
total;
	$count=mysqli_query($link,$getTotal);
	$total=mysqli_fetch_row($count)[0];
	
	$jsonArr=["rows"=>$arr,"total"=>$total];
	$json = json_encode($jsonArr);
	echo $json;
	
	mysqli_close($link);