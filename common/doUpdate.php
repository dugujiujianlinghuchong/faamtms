<?php

	header("Content-Type:text/html;charset=utf-8");
	
	//file_put_contents("test.txt", json_encode($_FILES));
	
	$nameArr = explode(".", $_FILES["file"]["name"]);
	
	$houzhiming = $nameArr[count($nameArr)-1];
	
	$filename = date("YmdHis").rand(100,999).".".$houzhiming;
	
	if(is_uploaded_file($_FILES["file"]["tmp_name"])){
		$isOk = move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/".$filename);
		if(!$isOk){
			echo "false";
			continue;
		}
	}else{
		echo "false";
		continue;
	}
		
		echo "../upload/".$filename;