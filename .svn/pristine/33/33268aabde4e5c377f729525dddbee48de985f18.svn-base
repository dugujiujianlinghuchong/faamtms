<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../common/mysql.php");
	
	$dataid = $_POST["dataid"];
	$data_name = $_POST["data_name"];
	$data_type = $_POST["data_type"];
	$data_description = $_POST["data_description"];
	
	//更新数据详情SQL
	$updata=<<<query
	update data set
	data_name="{$data_name}",data_type="{$data_type}",data_description="{$data_description}"
	where id = "{$dataid}";
query;
	mysqli_query($link, $updata);
	
	mysqli_close($link);
	die("修改成功！");
	