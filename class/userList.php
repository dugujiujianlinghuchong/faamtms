
<div id="tbBar" style="padding: 2px 10px;">
	<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="new">新建</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-edit" id="update">修改</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="del">删除</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-reload" id="reload">刷新</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-search" id="search">筛选</a>
	
	<!--筛选-->
	<div class="userSearch">
		<form action="" method="post">
			用户账号：<input type="text" name="usernum" id="usernum" style="width: 80px; height: 17px;" />
			用户名：<input type="text" name="username" id="username" style="width: 80px; height: 17px;" />
			<a class="easyui-linkbutton" plain="true" iconCls="icon-search" id="searchUser">筛选</a>
		</form>
	</div>
</div>

<table id="showMajorTable">   
    <thead>   
        <tr>   
            <th data-options="field:'sdumajor',width:100">专业</th>  
            <th data-options="field:'remark8',width:100">备注</th> 
            <th data-options="field:'crename',width:100">创建人</th>   
            <th data-options="field:'cretime',width:100">创建时间</th>   
            <th data-options="field:'lastupdatename',width:100">最后修改人</th>
            <th data-options="field:'lastupdatetime',width:100">最后修改时间</th>   
        </tr>   
    </thead>  
</table>  

<!--新增-->

		<div id="add" class="easyui-window" title="My Window" style="width:600px;height:400px" data-options="iconCls:'icon-save',modal:true,close:true,closed:true">   
		    
		<form method="post" id="majorForm">  
			<input type="hidden" name="userid" id="userid" />
			<table class="majorTable">
				<tr>
					<td><span style="color: red;">*</span>名称：</td>
					<td>
						<input type="text" name="sdumajor" id="sdumajor" />
					</td>
					<td>上级名称：</td>
					<td>
						<input type="text" name="username" id="username" disabled="disabled"/>
					</td>
				</tr>
				<tr>
					<td>备注：</td>
					<td colspan="5">
						<textarea name="remark8" id="remark8"></textarea>
					</td>
				</tr>
			</table>
		</form> 	
		    
		    
		<div style="text-align: center; margin-top: 220px;">
			<a class="easyui-linkbutton" iconCls="icon-save" id="save8">保存</a>
			&nbsp;&nbsp;
			<a class="easyui-linkbutton guanbi" iconCls="icon-cancel">关闭</a>
		</div>
		       
		</div>  

	
<script>
	$(function(){
		
		//打开新建
		$("#new").click(function(){
			
			$('#add').window('open');
			
		});
		
		//点击保存按钮
		
		
		$("#save8").click(function(){
				var sdumajor= $("#sdumajor").val();
				var remark8 = $("#remark8").val();
				
				if(sdumajor==""){
					$.messager.alert("提交失败","请确认非空信息！！！","warning");
					return false;
				}
				
				$("#majorForm").form({
					url:"class/doSubmitUser.php",
					success:function(data){
						$.messager.alert("提示",data,"info",function(){
							if(data=="新增成功"||data=="修改成功"){
								$("#showMajorTable").datagrid({
									url:"class/doShowUserList.php",
									queryParams:{
										"sduno":"",
										"stumajor":"",
										"crename":"",
										"cretime":"",
										"lastupdatename":"",
										"lastupdatetime":"",
									},
									onLoadSuccess:function(){}
								});
								$('#add').window('close');
							}
						});
					}//success
				});
				$("#majorForm").submit();		
			});//click
			
			
		//关闭按钮
		
		$(".guanbi").click(function(){
			
			$('#add').window('close');
			
		});
		
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


		$("#showMajorTable").datagrid({
				title:"用户管理",
				url:"class/doShowUserList.php",
				border:false,
				fit:true,
				fitColumns:true,
				pagination:true,
				rownumbers:true,
				toolbar:"#tbBar",
				singleSelect:true,
				onDblClickRow:function(index,row){
					$('#add').window('open');
				}
		});
		
		
		// 修改
		$("#update").click(function(){
			var arr = $("#showMajorTable").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				$('#add').window('open');
			}
		});
		
		// 刷新
		$("#reload").click(function(){
			$("#showMajorTable").datagrid({
									url:"class/doShowUserList.php",
									queryParams:{
										"sduno":"",
										"stumajor":"",
										"crename":"",
										"cretime":"",
										"lastupdatename":"",
										"lastupdatetime":"",
									},
									onLoadSuccess:function(){}
								});
		});
		
		// 删除用户
		$("#del").click(function(){
			var arr = $("#showMajorTable").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				$.messager.confirm("提示","确认删除一条记录？",function(is){
					if(!is){
						$.messager.alert("提示","取消删除！");
						return;
					}
					$.post("class/doDelUser.php",{"id":arr[0].id},function(data){
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
					$("#showMajorTable").datagrid("resize");
				},500);
			}else{
				$(".userSearch").css("height","0px");
				setTimeout(function(){
					$("#showMajorTable").datagrid("resize");
				},500);
			}
		});
	
		// 筛选操作
		$("#searchUser").click(function(){
			var usernum   = $("#usernum").val();
			var username  = $("#username").val();
			var positions = $("#position").combobox("getValue");
			var isshow    = $("#isshow").combobox("getValue");
			
			$("#showMajorTable").datagrid({
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
	
	
	function getdate(){
		//获取当前时间
		var d = new Date()()
		var vYear = d.getFullYear()
		var vMon = d.getMonth() + 1
		var vDay = d.getDate()()
		var h = d.getHours(); 
		var m = d.getMinutes(); 
		var se = d.getSeconds(); 
		s=vYear+(vMon<10 ? "0" + vMon : vMon)+(vDay<10 ? "0"+ vDay : vDay)+(h<10 ? "0"+ h : h)+(m<10 ? "0" + m : m)+(se<10 ? "0" +se : se);
		
		return(s);		
	}
	
	function reloadDg() { 
		$("#showMajorTable").datagrid("reload");
	} 
</script>
