<?php

	header("Content-Type:text/html;charset=utf-8");
	
	include("../common/mysql.php");
	
	$userid	= $_POST["userid"];
	$pwd	= $_POST["pwd"];
	
	$sql = <<<sql
	update `user` set password="{$pwd}" where id = "{$userid}"
sql;
	
	$is = mysqli_query($link, $sql);
	
	if($is){
		echo "修改成功";
	}else{
		echo "修改失败！请重新尝试！";
	}
