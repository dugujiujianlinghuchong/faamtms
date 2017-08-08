<div id="tbBar" style="padding: 2px 10px;">
	<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="new6_2">新建根节点</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newChild6_2">添加子节点</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-edit" id="update6_2">修改</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="del6_2">删除</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-reload" id="reload6_2">刷新</a>
	
</div>

<table id="userTable">   
    <thead>   
        <tr>   
            <th data-options="field:'usernum',width:260">名称</th>   
            <th data-options="field:'username',width:300">备注</th>   
            <th data-options="field:'position_show',width:100">创建人</th>   
            <th data-options="field:'tel',width:160">创建时间</th>   
            <th data-options="field:'isshow_show',width:100">最后修改人</th>   
            <th data-options="field:'isshow_show',width:160">最后修改时间</th>
        </tr>   
    </thead>  
</table>  

<!--<div id="settingPwd">
	<form method="post" id="settingForm">
		<input type="hidden" name="userid" id="userid" value="" />
		<table style="width: 300px; height: 100px; margin: 20px auto;">
			
			<tr>
				<td></td>
				<td>
					<a class="easyui-linkbutton" iconCls="icon-save" id="settingSave">保存</a>
					<a class="easyui-linkbutton" iconCls="icon-cancel" id="settingClose">关闭</a>
				</td>
			</tr>
		</table>
	</form>
</div>-->
	
<script type="text/javascript">
	$(function(){
//		$("#settingForm").form({
//			url:"zhuanYe/doUpdatePwd.php",
//			success:function(data){
//				$.messager.alert("修改提示",data);
//				if(data == "修改成功"){
//					$("#settingPwd").dialog({
//						closed:true
//					});
//				}
//			}
//		});
//		
		$("#userTable").datagrid({
				title:"专业管理",
				url:"zhuanYe/doShowZhuanYeList.php",
				border:false,
				fit:true,
				fitColumns:true,
				pagination:true,
				rownumbers:true,
				toolbar:"#tbBar",
				singleSelect:true,
				onDblClickRow:function(index,row){
					window.open("zhuanYe/zhuanYeDetail.php?id="+row.id,"zhuanYeDetail","height=600, width=1000,top=50,left=150");
				}
		});
		
		// 新增
		$("#new6_2").click(function(){
//			window.open("zhuanYe/zhuanYeDetail.php","zhuanYeDetail","height=600, width=1000,top=50,left=150");
			$.messager.alert("提示","请至少选择一行！");
		});
		
		// 修改
		$("#update6_2").click(function(){
			var arr = $("#userTable").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				window.open("user/userDetail.php?id="+arr[0].id,"userDetail","height=600, width=1000,top=50,left=150");
			}
		});
		
		
		// 删除用户
		$("#del6_2").click(function(){
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
		
		
		// 刷新
		$("#reload6_2").click(function(){
			$("#userTable").datagrid({
				url:"user/doShowZhuanYeList.php",
				queryParams:{
					"usernum":"",
					"username":"",
					"positions":"",
					"isshow":""
				},
				onLoadSuccess:function(){}
			});
		});
		
		
		
		
	});
	
	function reloadDg() { 
		$("#userTable").datagrid("reload");
	} 
</script>
