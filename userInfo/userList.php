
<div id="tbBar" style="padding: 2px 10px;">
	<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="new">添加</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-edit" id="update">编辑</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="del">删除</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-reload" id="reload">刷新</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-search" id="search">筛选</a>
	
	<div class="userSearch">
		<form action="" method="post">
			姓名：<input type="text" name="usernum" id="usernum" style="width: 80px; height: 17px;" />
			性别：<select class="easyui-combobox" name="position" id="position" panelHeight="auto" editable="false" style="width: 80px;">   
						<option value=""> </option>
					    <option value="0">男</option>   
					    <option value="1">女</option>   
					</select>
			专业：<select class="easyui-combobox" name="isshow" id="isshow" panelHeight="auto" editable="false" >   
						<option value=""> </option>
					    <option value="0">通信工程</option>   
					    <option value="1">计算机科学与技术</option>   
					    <option value="2">数学学院</option>
					    <option value="3">会计学院</option>
					</select>
				班次：<select class="easyui-combobox" name="position" id="position" panelHeight="auto" editable="false" >   
						<option value=""> </option>
					    <option value="0">计科一班</option>   
					    <option value="1">计科二班</option>   
					</select>
			<a class="easyui-linkbutton" plain="true" iconCls="icon-search" id="searchUser">筛选</a>
		</form>
	</div>
</div>

<table id="userTable">   
    <thead>   
        <tr>   
            <th data-options="field:'usernum',width:100">学员编号</th>   
            <th data-options="field:'username',width:100">学员姓名</th>   
            <th data-options="field:'position_show',width:100">性别</th>   
            <th data-options="field:'tel',width:100">专业</th>   
            <th data-options="field:'isshow_show',width:100">班次</th>   
        </tr>   
    </thead>  
</table>  

<div id="settingPwd">
	<form method="post" id="settingForm">
		<input type="hidden" name="userid" id="userid" value="" />
		<table style="width: 300px; height: 100px; margin: 20px auto;">
			<tr>
				<td>新密码：</td>
				<td>
					<input class="easyui-passwordbox" type="password" id="pwd" name="pwd" />
				</td>
			</tr>
			<tr>
				<td>确认密码：</td>
				<td>
					<input class="easyui-passwordbox" type="password" id="repwd" name="repwd" />
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<a class="easyui-linkbutton" iconCls="icon-save" id="settingSave">保存</a>
					<a class="easyui-linkbutton" iconCls="icon-cancel" id="settingClose">关闭</a>
				</td>
			</tr>
		</table>
	</form>
</div>
	
<script>
	$(function(){
		$("#settingForm").form({
			url:"user/doUpdatePwd.php",
			success:function(data){
				$.messager.alert("修改提示",data);
				if(data == "修改成功"){
					$("#settingPwd").dialog({
						closed:true
					});
				}
			}
		});
		
		$("#userTable").datagrid({
				title:"用户管理",
				url:"user/doShowUserList.php",
				border:false,
				fit:true,
				fitColumns:true,
				pagination:true,
				rownumbers:true,
				toolbar:"#tbBar",
				singleSelect:true,
				onDblClickRow:function(index,row){
					window.open("userInfo/userDetail.php?id="+row.id,"userDetail","height=600, width=1000,top=50,left=150");
				}
		});
		
		// 新增
		$("#new").click(function(){
			window.open("user/userDetail.php","userDetail","height=600, width=1000,top=50,left=150");
		});
		
		// 修改
		$("#update").click(function(){
			var arr = $("#userTable").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				window.open("user/userDetail.php?id="+arr[0].id,"userDetail","height=600, width=1000,top=50,left=150");
			}
		});
		
		// 点击设置密码-显示dialog
		$("#setting").click(function(){
			var arr = $("#userTable").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				$("#userid").val(arr[0].id);
				$("#settingPwd").dialog({
					width:400,
					height:200,
					modal:true,
					title:"设置新密码",
					closed:false,
				});
			}
		});
		
		// 设置密码-保存按钮
		$("#settingSave").click(function(){
			var pwd = $("#pwd").passwordbox("getValue");
			var repwd = $("#repwd").passwordbox("getValue");
			if(pwd=="" || repwd==""){
				$.messager.alert("警告","所有信息不可为空","warning");
			}else if(pwd != repwd){
				$.messager.alert("警告","两次密码输入不一致","warning");
			}else{
				$("#settingForm").submit();
			}
		});
		
		// 关闭设置密码dialog
		$("#settingClose").click(function(){
			$("#settingPwd").dialog({
				closed:true
			});
		});
		
		// 刷新
		$("#reload").click(function(){
			$("#userTable").datagrid({
				url:"user/doShowUserList.php",
				queryParams:{
					"usernum":"",
					"username":"",
					"positions":"",
					"isshow":""
				},
				onLoadSuccess:function(){}
			});
		});
		
		// 删除用户
		$("#del").click(function(){
			var arr = $("#userTable").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				$.messager.confirm("提示","确认删除一条记录？",function(is){
					if(!is){
						$.messager.alert("提示","取消删除！");
						return;
					}
					$.post("user/doDelUser.php",{"id":arr[0].id},function(data){
						$.messager.alert("删除提示",data,"info",function(){
							if(data=="数据删除成功"){
								reloadDg();
							}
						});
					});	
				});
			}
		});
		
		// 点击筛选，显示筛选条
		$("#search").click(function(){
			if($(".userSearch").css("height")=="0px"){
				$(".userSearch").css("height","30px");
				setTimeout(function(){
					$("#userTable").datagrid("resize");
				},500);
			}else{
				$(".userSearch").css("height","0px");
				setTimeout(function(){
					$("#userTable").datagrid("resize");
				},500);
			}
		});
	
		// 筛选操作
		$("#searchUser").click(function(){
			var usernum   = $("#usernum").val();
			var username  = $("#username").val();
			var positions = $("#position").combobox("getValue");
			var isshow    = $("#isshow").combobox("getValue");
			
			$("#userTable").datagrid({
				url:"user/doShowUserList.php",
				queryParams:{
					"usernum":usernum,
					"username":username,
					"positions":positions,
					"isshow":isshow
				},
				onLoadSuccess:function(data){
					$.messager.alert("筛选提示","筛选成功！共筛选出"+data.total+"条数据");
				}
			});	
		});

	});
	
	function reloadDg() { 
		$("#userTable").datagrid("reload");
	} 
</script>
