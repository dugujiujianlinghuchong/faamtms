<?php
	header("Content-Type:text/html;charset=utf-8");
	include_once("../common/mysql.php");

	
	$fileName=$_FILES["fileInput"]["name"];//文件名
	$fileType=explode(".", $fileName)[1];//后缀名
	$fileSize=$_FILES['fileInput']['size'];//文件大小
	$uploadTime=date("Y-m-d");//上传时间
	$updator="虞涛";
	$filePath="../upload/". $fileName;
	$tmp_name=$_FILES['fileInput']['tmp_name'];//临时文件名
	
	
//	$fileName=iconv("gbk","UTF-8",$fileName);
	$isOk = move_uploaded_file($tmp_name,"upload/". $fileName);
	if($isOk){
		echo "true";
		$insertFileInfo=<<<insertFileInfo
		insert into data_details (file_name,file_type,file_size,uploadTime,updator) 
		values 
		('{$fileName}','{$fileType}','{$fileSize}','{$uploadTime}','{$updator}')
insertFileInfo;
		mysqli_query($link, $insertFileInfo);
		mysqli_close($link);
	}else{
		echo "false";
	}
	
	
	
