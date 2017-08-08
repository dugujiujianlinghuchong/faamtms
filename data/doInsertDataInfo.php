<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/mysql.php");
	
	$data_name = $_POST["data_name"];
	$data_type = $_POST["data_type"];
	$data_description = $_POST["data_description"];
	$data_updator="虞涛";
	$updata_time=date("Y-m-d");
	
	$insert=<<<insert
	insert into data (data_name,data_type,data_description,data_updator,updata_time)
	values 
	('{$data_name}','{$data_type}','{$data_description}','{$data_updator}','{$updata_time}')
insert;
	mysqli_query($link, $insert);
	echo "添加成功！";
	mysqli_close($link);

