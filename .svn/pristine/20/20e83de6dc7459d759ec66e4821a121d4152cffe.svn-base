<?php

	header("Content-Type:text/html;charset=utf-8");
	
	include("common/mysql.php");
	
	$userid	= $_POST["userid"];
	$oldPwd	= $_POST["oldPwd"];
	$newPwd	= $_POST["newPwd"];

	
	$oldPwdFind = <<<oldPwdFind
	select * from `user` where  password = "{$oldPwd}" and id = {$userid};
oldPwdFind;

	$res = mysqli_query($link,$oldPwdFind);
	if(mysqli_num_rows($res)!=1) exit("旧密码输入错误,请重新尝试！");
	
	$sql = <<<sql
	update `user` set password="{$newPwd}" where id = "{$userid}"
sql;
	
	$is = mysqli_query($link, $sql);
	
	if($is){
		echo "修改成功";
	}else{
		echo "修改失败！请重新尝试！";
	}
