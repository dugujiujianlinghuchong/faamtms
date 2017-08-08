<?php
	header("Content-Type:text/html;charset=utf-8");
	@session_start();
	
	include_once("common/mysql.php");
	
	$usernum = $_POST["usernum"];
	$pwd = $_POST["pwd"];
	
	
	$loginSql = <<<login
	select * from `user` where usernum="{$usernum}" and password = "{$pwd}";
login;
	$userSearch = <<<userSearch
	select usernum from `user` where usernum="{$usernum}";
userSearch;

	$res = mysqli_query($link, $loginSql);
	
	if($row = mysqli_fetch_assoc($res)){
		$_SESSION["user"] = $row;
		echo "登录成功";
	}else{
		$res1 = mysqli_query($link, $userSearch);
		if($row = mysqli_fetch_assoc($res1)){
			echo "密码错误 !";
		}else{
			echo "用户不存在 !";
		}
		
	}
	mysqli_free_result($res);
	mysqli_close($link);