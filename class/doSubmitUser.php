<?php

	header("Content-Type:text/html;charset=utf-8");
	include("../common/mysql.php");
	
	$userid = $_POST["userid"]!=null?$_POST["userid"]:null;
	$sdumajor = $_POST["sdumajor"]!=null?$_POST["sdumajor"]:null;;
	$remark8 = $_POST["remark8"]!=null?$_POST["remark8"]:null;;
	
	//file_put_contents("test.txt", json_encode($_POST));
	//die;
	//if($userid==null){ // 新增操作
		/*$isHas = <<<isHas
		select count(*) from `user` where remark8="{$remark8}";
isHas;
		$res = mysqli_query($link, $isHas);
		$num = mysqli_fetch_row($res)[0];
		if($num>0) die("新增失败！用户账号已注册！");*/
		
		$insertSql = <<<insertSql
		insert into class
		(sdumajor,remark8,crename,cretime,lastupdatename,lastupdatetime)
		VALUES
		("{$sdumajor}","{$remark8}","水晶虾饺",now(),"水晶虾饺",now());
insertSql;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
		mysqli_query($link, $insertSql) or die("信息插入失败！Sorry！");
		/*$id = mysqli_insert_id($link);
		
		foreach ($remarkTable as $key => $value) {
			$sql = <<<sql
			insert into user_remark(userid,time,type,remark)
			VALUES("{$id}","{$value['time']}","{$value['type']}","{$value['remark']}");
sql;
			mysqli_query($link, $sql) or die("账号备忘录插入失败！Sorry！");
		}*/
		mysqli_close($link);
		die("新增成功");
	//}

	
	// 修改操作
	$update = <<<update
	update `user` set
	remark8="{$remark8}",sdumajor="{$sdumajor}",position="{$position}",headimg="{$imgSrc}",tel="{$tel}",remark="{$remark}",isShow="{$isshow}"
	where id = "{$userid}";
update;
	mysqli_query($link, $update) or die("个人信息修改失败！");
	
	$delRemark = <<<delRemark
	delete from user_remark where userid = "{$userid}";
delRemark;
	
	mysqli_query($link, $delRemark) or die("个人信息修改失败！");

	foreach ($remarkTable as $key => $value) {
		$sql = <<<sql
			insert into user_remark(userid,time,type,remark)
			VALUES("{$userid}","{$value['time']}","{$value['type']}","{$value['remark']}");
sql;
		mysqli_query($link, $sql) or die("个人信息修改失败！");
	}
	mysqli_close($link);
	die("修改成功");