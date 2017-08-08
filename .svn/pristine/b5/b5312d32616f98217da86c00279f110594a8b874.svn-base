<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/mysql.php");
	
	$dataid = $_POST["dataid"];
	$fileID=$dataid+1;
	
	$getInfo = <<<getinfo
	select * from data where id = "{$dataid}";
getinfo;
	$res = mysqli_query($link, $getInfo);
	$info = mysqli_fetch_assoc($res);
	
	
	$getFileDetails = <<<getFileDetails
	select * from data_details where fileID = "{$fileID}";
getFileDetails;
	$res1 = mysqli_query($link, $getFileDetails);
	$fileDetails = array();
	while($row = mysqli_fetch_assoc($res1)){
		$fileDetails[] = $row;
	}
	
	$dataDetail = ["info"=>$info,"fileDetails"=>$fileDetails];
	$json = json_encode($dataDetail);
	
	echo $json;
	mysqli_close($link);