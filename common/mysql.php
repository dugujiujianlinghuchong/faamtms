<?php

	header("Content-Type:text/html;charset=utf-8");
	
	define("HOST", "localhost");
	define("USERNAME", "root");
	define("PASSWORD", "");
	define("DBNAME", "faamtms");
	define("CHARSET", "utf8");
	
//	define("HOST", "192.168.0.143");// 192.168.0.143
//	define("USERNAME", "group4"); // group1~4
//	define("PASSWORD", "");
//	define("DBNAME", "faamtms4"); // faamtms1~4
//	define("CHARSET", "utf8");
	
	$link = @mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("数据链接失败！<span style='color:red;'>".mysqli_connect_error()."</span>");
	
	
	@mysqli_set_charset($link, CHARSET) or die("字符集编码设置无效！");
	
	
	