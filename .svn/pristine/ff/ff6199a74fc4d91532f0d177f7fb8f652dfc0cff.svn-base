<?php

	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/mysql.php");
	
	$documentid = $_POST["documentid"];
	
	$getInfo = <<<getinfo
	select * from document where id = "{$documentid}";
getinfo;
	$res = mysqli_query($link, $getInfo);
	$info = mysqli_fetch_assoc($res);
	
	$documentDetail = ["info"=>$info];
	$json = json_encode($documentDetail);
	
	echo $json;
	mysqli_close($link);
