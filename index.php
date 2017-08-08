<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>海航军事训练管理系统</title>
		<link rel="icon" href="img/icon.png" />
		<link rel="stylesheet" href="css/default/easyui.css" />
		<link rel="stylesheet" href="css/icon.css" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.easyui.min.js"></script>
		<script src="js/easyui-lang-zh_CN.js"></script>
		<link rel="stylesheet" href="css/index.css" />
		
	<script>
	$(function(){
		
		$(".list1>a>li").click(function(){
			$(".list1>a>li").removeClass("lihover");
			$(this).addClass("lihover");
		});
		
		var count = 0;
		$("#last").click(function(){
			if(count == 0){
				$("#west .list1 .list2").css("height","105px");
				$("#last i").css("background-image","url(img/kai.png)");
				count ++;
			}else{
				$("#west .list1 .list2").css("height","0px");
				$("#last i").css("background-image","url(img/guan.png)");
				count = 0;
			}

		});
		
		$("#main").tabs({
			fit:true,
			tabHeight:30,
		});
		
	});
	
	function addTab(title,url){
		var tab = $("#main").tabs("getTab", title);
		if(tab) {
			$("#main").tabs("select", title);
			return;
		}
		$("#main").tabs("add", {
			title: title,
			selected: true,
			closable: true,
			href: url,
			method: "post"
		});
	}
	
	</script>
		
	</head>
	
	<body class="easyui-layout" style="min-width: 1200px;"> 
		  
    <div data-options="region:'north',border:false" id="north">
    	<img src="img/header.png" />
    	
    	<div class="right">
    		<span>欢迎您，虞涛</span>&nbsp;&nbsp;&nbsp;&nbsp;
    		<a href="#">修改密码</a>
    		&nbsp;|&nbsp;
    		<a href="#">退出登录</a>
    	</div>
    </div> 
    
    <div data-options="region:'west',border:false" id="west">
    	<ul class="list1">
    		<a><li><span></span>个人信息</li></a>
    		<a onclick="addTab('文档管理','document/documentList.php')"><li><span></span>文档管理</li></a>
    		<a onclick="addTab('资料管理','data/dataList.php')"><li><span></span>资料管理</li></a>
    		<a onclick="addTab('计划管理','planning/planningList.php')"><li><span></span>计划管理</li></a>
    		<a onclick="addTab('训练管理','trainManage/trainManage.php')"><li><span></span>训练管理</li></a>
    		
    		<a><li id="last"><span></span>系统管理<i></i></li></a>
    		<ul class="list2">
    			<a onclick="addTab('用户管理','user/userList.php')"><li>用户管理</li></a>
    			<a onclick="addTab('专业管理','zhuanYe/zhuanYeList.php')"><li>专业管理</li></a>
    			<a onclick="addTab('专业管理','class/class.php')" ><li>班级管理</li></a>
    		</ul>
    	</ul>
    </div>   
    
    <div data-options="region:'center',border:false" id="center">
    	<div id="main">   
		    <div title="♛  首页">   
		        <div class="img">
		        	<img src="img/ind_user_href.png"  onclick="addTab('个人信息','userInfo/userList.php')"/>
		        	<img src="img/ind_man_comm_href.png" />
		        </div>  
				<div id="DocumentData">
		        	<div id="documentManage" >
		        		<h2>文档管理</h2>
		        		<table id="documentTable">   
						    <thead>   
						        <tr>   
						            <th data-options="field:'usernum',width:200,align:'left'">文档名称</th>   
						            <th data-options="field:'username',width:100,align:'left'">发布人</th>   
						            <th data-options="field:'position_show',width:180,align:'left'">发布时间</th>   
						        </tr>   
						    </thead>  
						</table>  
		        	</div>
		        	<!--<div id="dataManage" >
		        		<h2>资料管理</h2>
		        		
		        		<table id="dataTable">   
						    <thead>   
						        <tr >   
						            <th data-options="field:'usernum',width:200,align:'left'">资料名称</th>   
						            <th data-options="field:'username',width:100,align:'left'">发布人</th>   
						            <th data-options="field:'position_show',width:180,align:'left'">发布时间</th>   
						        </tr>   
						    </thead>  
						</table> 
						
		        	</div>-->
		        </div>
		    </div>   
		</div>  	
    </div>  
    
	<div id="alterPwd">
		<form method="post" id="alterPwdForm">
			<input type="hidden" name="userid" id="userid" value="<?php echo ''.$_SESSION['user']['id'] ?>" />
			<table style="width: 360px; height: 160px; margin: 20px 50px;">
				<tr>
					<td style="text-align: right;">旧密码：</td>
					<td><input class="easyui-passwordbox" type="password" id="oldPwd" name="oldPwd" /></td>
				</tr>
				
				<tr>
					<td style="text-align: right;">新密码：</td>
					<td><input class="easyui-passwordbox" type="password" id="newPwd" name="newPwd" /></td>
				</tr>
				
				<tr>
					<td style="text-align: right;">确认密码：</td>
					<td><input class="easyui-passwordbox" type="password" id="reNewPwd" name="reNewPwd" /></td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<a class="easyui-linkbutton" iconCls="icon-save" id="alterSave">保存</a>
						<a class="easyui-linkbutton" iconCls="icon-cancel" id="alterClose">关闭</a>
					</td>
				</tr>
				
			</table>
		</form>
	</div>
	
    <div data-options="region:'south',border:false" id="south">
    	Copyright©海军航空工程学院
    </div>
     
	</body> 
	
	<script>

		
	$(function(){
		
		$("#alterPwd").dialog({
			closed:true,
		});
		
		//设置index.php页面修改密码的表单
		$("#alterPwdForm").form({
			url:"doAlterIndexPwd.php",
			success:function(data){
				console.log(data);
				$.messager.alert("修改提示",data);
				if(data == "修改成功"){
					$("#alterPwd").dialog({
						closed:true
					});
				}
			}
		});
		
		// 点击设置密码-显示dialog
		$("#alterPwdBtn").click(function(){
			$("#alterPwd").dialog({
				width:438,
				height:238,
				modal:true,
				title:"修改密码",
				closed:false,
			});
		});	
		
		// 设置密码-保存按钮
		$("#alterSave").click(function(){
			var oldPwd = $("#oldPwd").passwordbox("getValue");
			var newPwd = $("#newPwd").passwordbox("getValue");
			var reNewPwd = $("#reNewPwd").passwordbox("getValue");
			if(oldPwd==""||newPwd=="" ||reNewPwd==""){
				$.messager.alert("警告","所有信息不可为空","warning");
			}else if(newPwd != reNewPwd){
				$.messager.alert("警告","两次密码输入不一致","warning");
			}else{
				$("#alterPwdForm").submit();
			}
		});
		
		// 关闭设置密码dialog
		$("#alterClose").click(function(){
			$("#alterPwd").dialog({
				closed:true
			});
		});
		
		//文档管理
		$("#documentTable").datagrid({
			fitColumns:true,
			striped:true,
			singleSelect:true,
			scrollbarSize:0,
			width:600,
		})
		
		$("#dataTable").datagrid({
			fitColumns:true,
			striped:true,
			singleSelect:true,
			scrollbarSize:0,
			width:600,
			
		})
		
	});
	
	
</script>
	
</html>
