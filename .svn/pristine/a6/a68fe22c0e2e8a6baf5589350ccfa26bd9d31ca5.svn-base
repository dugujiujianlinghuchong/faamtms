<?php

	header("Content-Type:text/html;charset=utf-8");
	include("../common/mysql.php");
//	print_r($_POST);
	$userid = $_POST["userid"]!=null?$_POST["userid"]:null;
	$stucode = $_POST["stucode"];
	$stuname = $_POST["stuname"];
	$sex = $_POST["sex"];
	$majorSel = $_POST["majorSel"];
	$classSel = $_POST["classSel"];
	$grade = $_POST["grade"];
	$remark = $_POST["remark"];
	$scale = $_POST["scale"]!=null?$_POST["scale"]:null;
	
	$selfPd = $_POST["selfPd"]!=null?json_decode($_POST["selfPd"],TRUE):null;
	$teachPd = $_POST["teachPd"]!=null?json_decode($_POST["teachPd"],TRUE):null;
	$compPd = $_POST["compPd"]!=null?json_decode($_POST["compPd"],TRUE):null;
	$FMSPd = $_POST["FMSPd"]!=null?json_decode($_POST["FMSPd"],TRUE):null;
	
	
	if($userid==null){ // 新增操作
		$isHas = <<<isHas
		select count(*) from training where stucode="{$stucode}";
isHas;
		$res = mysqli_query($link, $isHas);
		$num = mysqli_fetch_row($res)[0];
		if($num>0) die("添加失败！学院编号已录入！");
		
		$insertSql = <<<insertSql
		insert into training
		(stucode,stuname,sex,major,class,grade,remark,scale)
		VALUES
		("{$stucode}","{$stuname}","{$sex}","{$majorSel}","{$classSel}","{$grade}","{$remark}","{$scale}");
insertSql;
		mysqli_query($link, $insertSql) or die("信息插入失败！Sorry！");
		$id = mysqli_insert_id($link);
		
		foreach ($selfPd as $key => $value) {
			$sql1 = <<<sql1
				insert into `self_evaluate` (userid,cycle,train_state,train_manifestation,train_hurt,quality_growth) VALUES ("{$id}","{$value['cycle']}","{$value['train_state']}","{$value['train_manifestation']}","{$value['train_hurt']}","{$value['quality_growth']}");
sql1;
			mysqli_query($link, $sql1) or die("自我评定录入失败！Sorry！");
		}
	
	
		foreach ($teachPd as $key => $value) {
			$sql2 = <<<sql2
			insert into teach_evaluate (userid,cycle,train_state,train_manifestation,train_hurt,quality_growth,feedback)
			VALUES("{$id}","{$value['cycle']}","{$value['train_state']}","{$value['train_manifestation']}","{$value['train_hurt']}","{$value['quality_growth']}","{$value['feedback']}");
sql2;
			mysqli_query($link, $sql2) or die("教师评定录入失败！Sorry！");
		}
	
		foreach ($compPd as $key => $value) {
			$sql3 = <<<sql3
			insert into comp_evaluate (userid,cycle,train_state,train_manifestation,train_hurt,quality_growth,feedback)
			VALUES("{$id}","{$value['cycle']}","{$value['train_state']}","{$value['train_manifestation']}","{$value['train_hurt']}","{$value['quality_growth']}","{$value['feedback']}");
sql3;
			mysqli_query($link, $sql3) or die("单位评定录入失败！Sorry！");
		}
	
		foreach ($FMSPd as $key => $value) {
			$sql4 = <<<sql4
			insert into FMS_evaluate (userid,cycle,shendun,guolan_l,guolan_r,fentui_l,fentui_r,jianbu_l,jianbu_r,chongji_l,chongji_r,taitui_l,taitui_r,qgwdxfc,fcpcxcs,zhuandong_l,zhuandong_r,hystpcxcs,zongji,zdsyl) VALUES("{$id}","{$value['cycle']}","{$value['shendun']}","{$value['guolan_l']}","{$value['guolan_r']}","{$value['fentui_l']}","{$value['fentui_r']}","{$value['jianbu_l']}","{$value['jianbu_r']}","{$value['chongji_l']}","{$value['chongji_r']}","{$value['taitui_l']}","{$value['taitui_r']}","{$value['qgwdxfc']}","{$value['fcpcxcs']}","{$value['zhuandong_l']}","{$value['zhuandong_r']}","{$value['hystpcxcs']}","{$value['zongji']}","{$value['zdsyl']}");
sql4;
			mysqli_query($link, $sql4) or die("FMS评定录入失败！Sorry！");
		}
		
		mysqli_close($link);
		die("新增成功");
	}

	
	// 修改操作
	$update = <<<update
	update `training` set
	stucode="{$stucode}",stuname="{$stuname}",sex="{$sex}",major="{$majorSel}",class="{$classSel}",scale="{$scale}"
	where id = "{$userid}";
update;
	mysqli_query($link, $update) or die("个人信息修改失败！");
	
	$delRemark = <<<delRemark
	delete from self_evaluate where userid = "{$userid}";
	delete from teach_evaluate where userid = "{$userid}";
	delete from comp_evaluate where userid = "{$userid}";
	delete from FMS_evaluate where userid = "{$userid}";
delRemark;
	
	mysqli_query($link, $delRemark) or die("个人信息修改失败！");

	foreach ($selfPd as $key => $value) {
		$sql1 = <<<sql1
				insert into `self_evaluate` (userid,cycle,train_state,train_manifestation,train_hurt,quality_growth) VALUES ("{$id}","{$value['cycle']}","{$value['train_state']}","{$value['train_manifestation']}","{$value['train_hurt']}","{$value['quality_growth']}");
sql1;
		mysqli_query($link, $sql1) or die("自我评定录入失败！Sorry！");
	}


	foreach ($teachPd as $key => $value) {
		$sql2 = <<<sql2
			insert into teach_evaluate (userid,cycle,train_state,train_manifestation,train_hurt,quality_growth,feedback)
			VALUES("{$id}","{$value['cycle']}","{$value['train_state']}","{$value['train_manifestation']}","{$value['train_hurt']}","{$value['quality_growth']}","{$value['feedback']}");
sql2;
		mysqli_query($link, $sql2) or die("教师评定录入失败！Sorry！");
	}

	foreach ($compPd as $key => $value) {
		$sql3 = <<<sql3
			insert into comp_evaluate (userid,cycle,train_state,train_manifestation,train_hurt,quality_growth,feedback)
			VALUES("{$id}","{$value['cycle']}","{$value['train_state']}","{$value['train_manifestation']}","{$value['train_hurt']}","{$value['quality_growth']}","{$value['feedback']}");
sql3;
		mysqli_query($link, $sql3) or die("单位评定录入失败！Sorry！");
	}

	foreach ($FMSPd as $key => $value) {
		$sql4 = <<<sql4
			insert into FMS_evaluate (userid,cycle,shendun,guolan_l,guolan_r,fentui_l,fentui_r,jianbu_l,jianbu_r,chongji_l,chongji_r,taitui_l,taitui_r,qgwdxfc,fcpcxcs,zhuandong_l,zhuandong_r,hystpcxcs,zongji,zdsyl) VALUES("{$id}","{$value['cycle']}","{$value['shendun']}","{$value['guolan_l']}","{$value['guolan_r']}","{$value['fentui_l']}","{$value['fentui_r']}","{$value['jianbu_l']}","{$value['jianbu_r']}","{$value['chongji_l']}","{$value['chongji_r']}","{$value['taitui_l']}","{$value['taitui_r']}","{$value['qgwdxfc']}","{$value['fcpcxcs']}","{$value['zhuandong_l']}","{$value['zhuandong_r']}","{$value['hystpcxcs']}","{$value['zongji']}","{$value['zdsyl']}");
sql4;
		mysqli_query($link, $sql4) or die("FMS评定录入失败！Sorry！");
	}
	mysqli_close($link);
	die("修改成功");