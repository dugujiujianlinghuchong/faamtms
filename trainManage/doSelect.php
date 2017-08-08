<?php
	header("content-type:text/html;charset=utf-8");

	$getId = isset($_GET["id"])?$_GET["id"]:0;
	switch($getId){
		case 1:
			$json = <<<json
				[{    
				    "id":1,    
				    "text":"通信一班"   
				},{    
				    "id":2,    
				    "text":"通信二班"   
				}]
json;
		die($json);
		case 2:
			$json = <<<json
				[{    
				    "id":1,    
				    "text":"计科一班"   
				},{    
				    "id":2,    
				    "text":"计科二班"   
				}]
json;
		die($json);
		case 3:
			$json = <<<json
				[{    
				    "id":1,    
				    "text":"数院一班"   
				},{    
				    "id":2,    
				    "text":"数院二班"   
				}]
json;
		die($json);
		case 4:
			$json = <<<json
				[{    
				    "id":1,    
				    "text":"会计一班"   
				},{    
				    "id":2,    
				    "text":"会计二班"   
				}]
json;
		die($json);
		default:
			$json = <<<json
				[{    
				    "id":1,    
				    "text":"通信工程"   
				},{    
				    "id":2,    
				    "text":"计算机科学与技术"   
				},{    
				    "id":3,    
				    "text":"数学学院"  
				},{    
				    "id":4,    
				    "text":"会计学院"   
				}]
json;
		die($json);
	}


	
	