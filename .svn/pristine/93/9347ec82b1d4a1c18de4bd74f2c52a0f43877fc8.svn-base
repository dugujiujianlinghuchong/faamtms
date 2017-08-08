<?php

	header("Content-Type:text/html;charset=utf-8");
	session_start();
	unset($_SESSION["user"]);
	
	$str = <<<js
				<script>
					alert("退出系统成功！！");
					location = "login.php";
				</script>
js;
	echo $str;