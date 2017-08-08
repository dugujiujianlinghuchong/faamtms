
<div id="tbBar2" style="padding: 2px 10px;">
	<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="new2">新建</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="del2">删除</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-reload" id="reload2">刷新</a>
</div>

<table id="userTable2">   
    <thead>   
        <tr>   
            <th data-options="field:'name',width:50">文档名称</th>   
            <th data-options="field:'type',width:100">文档类型</th>   
            <th data-options="field:'details">详细内容</th>   
            <th data-options="field:'issuer',width:100">发布人</th>   
            <th data-options="field:'time',width:100">发布时间</th>   
        </tr>   
    </thead>  
</table>  
	
<script>
	$(function(){
		
		$("#userTable2").datagrid({
				title:"文档管理",
				url:"document/doShowDocument.php",
				border:false,
				fit:true,
				fitColumns:true,
				pagination:true,
				rownumbers:true,
				toolbar:"#tbBar2",
				singleSelect:true,
				onDblClickRow:function(index,row){
					window.open("document/documentDetail.php?id="+row.id,"documentDetail","height=600, width=1000,top=50,left=150");
				}
		});
		
		// 新增
		$("#new2").click(function(){
			window.open("document/documentDetail.php","documentDetail","height=600, width=1000,top=50,left=150");
		});
		
		// 刷新
		$("#reload2").click(function(){
			$("#userTable2").datagrid({
				url:"document/doShowDocument.php",
				queryParams:{
					"name":"",
					"type":"",
					"details":"",
					"issuer":"",
					"time":""
				},
				onLoadSuccess:function(){}
			});
		});
		
		// 删除用户
		$("#del2").click(function(){
			var arr = $("#userTable2").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				$.messager.confirm("提示","确认删除一条记录？",function(is){
					if(!is){
						$.messager.alert("提示","取消删除！");
						return;
					}
					$.post("user/doDelDocument.php",{"id":arr[0].id},function(data){
						$.messager.alert("删除提示",data,"info",function(){
							if(data=="数据删除成功"){
								reloadDg();
							}
						});
					});	
				});
			}
		});
	});
	
	function reloadDg() { 
		$("#userTable2").datagrid("reload");
	} 
</script>
