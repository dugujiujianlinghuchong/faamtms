<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/conn_mysql.php");
	
	
	$userid = $_POST["userid"];
//	$userid=1;
	
	$getInfo=<<<getInfo
	select * from user where id = "{$userid}";
	
getInfo;
	
	$res= mysqli_query($link, $getInfo);
	$info=mysqli_fetch_assoc($res);
	
	$getRemark=<<<getRemark
	select * from user_remark where userid = "{$userid}";
getRemark;

	$res1= mysqli_query($link, $getRemark);
	$remark=array();
	while ($row=mysqli_fetch_assoc($res1)) {
		$remark[]=$row;
	}
	
	$userDetail=["info"=>$info,"remark"=>$remark];
	$json=json_encode($userDetail);
	echo $json;
	
	mysqli_close($link);
	
?>