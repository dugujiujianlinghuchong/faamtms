<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/conn_mysql.php");
	
	
	$userid=$_POST["userid"]!=null?$_POST["userid"]:null;
	$username=$_POST["username"];
	$usernum=$_POST["usernum"];
	$position=$_POST["position"];
	$tel=$_POST["tel"]==null?$_POST["tel"]:'';
	$imgSrc=$_POST["imgSrc"]==null?$_POST["imgSrc"]:'';
	$remark=$_POST["remark"]==null?$_POST["remark"]:'';
	$isshow=isset($_POST["isshow"])?1:0;
	
	$remarkTable=$_POST["remarkTable"]!=null?json_decode($_POST["remarkTable"],TRUE):null;
	
	if($userid==null){  //新增操作
		
		$isHas=<<<isHas
		select count(*) from `user` where usernum ="{$usernum}";
isHas;
		$res=mysqli_query($link, $isHas);
		$num=mysqli_fetch_row($res)[0];
		if($num>0) die("新增失败，用户已存在");
		
		$insertSql=<<<insertSql
		insert into `user`(usernum,username,password,position,tel,headimg,remark,isShow) 
		values ("{$usernum}","{$username}","1","{$position}","{$tel}","{$imgSrc}","{$remark}","{$isshow}");
insertSql;
		
		mysqli_query($link, $insertSql) or die("新增信息失败");
		$id=mysqli_insert_id($link);
		
		foreach($remarkTable as $key=> $value){
			$sql=<<<sql
			insert into user_remark(userid,time,type,remark) 
			value("{$id}","{$value['time']}","{$value['type']}","{$value['remark']}");
sql;
			mysqli_query($link, $sql) or die("备忘录插入失败");
		}
		mysqli_close($link);
		die("新增成功");
		
	}
	
	//修改操作
	
	$update = <<<update
	update `user` set usernum="{$usernum}",username="{$username}",position="{$position}",tel="{$tel}",headimg="{$imgSrc}",remark="{$remark}",isShow="{$isshow}"  
	where id="{$userid}";
update;
	
	mysqli_query($link, $update) or die("信息修改失败");
	
	$delRemark=<<<delRemark
	delete from user_remark where userid = "{$userid}";
delRemark;
	mysqli_query($link, $delRemark) or die("信息修改失败");
	
	foreach($remarkTable as $key=>$value){
		$sql=<<<sql
			insert into user_remark(userid,time,type,remark) 
			value("{$userid}","{$value['time']}","{$value['type']}","{$value['remark']}");
sql;
		mysqli_query($link, $sql) or die("信息修改失败");
	}

	mysqli_close($link);
	die("修改成功");
	
?>