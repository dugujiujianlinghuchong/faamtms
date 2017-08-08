<?php

	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/mysql.php");
	
	$userid = $_POST["userid"];
	
	$getInfo = <<<getinfo
	select * from `training` where id = "{$userid}";
getinfo;
	$res = mysqli_query($link, $getInfo);
	$info = mysqli_fetch_assoc($res);
	
	$self = <<<self
	select * from self_evaluate where userid = "{$userid}";
self;
	$res_s = mysqli_query($link, $self);
	$selfe = array();
	while($row1 = mysqli_fetch_assoc($res_s)){
		$selfe[] = $row1;
	}
	$teach = <<<teach
	select * from teach_evaluate where userid = "{$userid}";
teach;
	$res_t = mysqli_query($link, $teach);
	$teache = array();
	while($row2 = mysqli_fetch_assoc($res_t)){
		$teache[] = $row2;
	}
	$comp = <<<comp
	select * from comp_evaluate where userid = "{$userid}";
comp;
	$res_c = mysqli_query($link, $comp);
	$compe = array();
	while($row3 = mysqli_fetch_assoc($res_c)){
		$compe[] = $row3;
	}
	$fms = <<<fms
	select * from FMS_evaluate where userid = "{$userid}";
fms;
	$res_f = mysqli_query($link, $fms);
	$fmse = array();
	while($row4 = mysqli_fetch_assoc($res_f)){
		$fmse[] = $row4;
	}
	
	$stuDetail = ["info"=>$info,"selfe"=>$selfe,"teache"=>$teache,"compe"=>$compe,"fmse"=>$fmse];
	$json = json_encode($stuDetail);
	
	echo $json;
	mysqli_close($link);
