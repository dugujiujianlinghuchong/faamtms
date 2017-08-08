<div id="tbBar_yt" style="padding: 2px 10px;">
	<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="new_yt">新建</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="del_yt">删除</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-reload" id="reload_yt">刷新</a>
</div>

<table id="dataTable">   
    <thead>   
        <tr>   
            <th data-options="field:'data_name',width:100">资料名称</th>   
            <th data-options="field:'type_show',width:100">资料类型</th>   
            <th data-options="field:'data_description',width:100">资料描述</th>   
            <th data-options="field:'data_updator',width:100">发布人</th>   
            <th data-options="field:'updata_time',width:100">发布时间</th>   
        </tr>   
    </thead>  
</table>


<script type="text/javascript">
	/*展示资料列表*/
	$("#dataTable").datagrid({
		title:"资料管理",
		url:"data/doShowDataList.php",
		border:false,
		fit:true,
		fitColumns:true,
		pagination:true,
		rownumbers:true,
		toolbar:"#tbBar_yt",
		singleSelect:true,
		onDblClickRow:function(index,row){
			window.open("data/dataDetail.php?id="+row.id,"dataDetail","height=600, width=1000,top=50,left=150");
		}
	});
		
	/*刷新资料列表功能*/
	$("#reload_yt").click(function(){
		$("#dataTable").datagrid({
			url:"data/doShowDataList.php",
		});
	});
	
	/*删除资料功能*/
	$("#del_yt").click(function(){
		var arr = $("#dataTable").datagrid("getSelections");
		if(arr.length == 0){
			$.messager.alert("提示","请至少选择一行！");
		}else{
			$.messager.confirm("提示","确认删除一条记录？",function(is){
				if(!is){
					return;
				}
				$.post("data/doDelData.php",{"id":arr[0].id},function(data){//删除data表记录
					$.messager.alert("删除提示",data,"info",function(){
						if(data=="数据删除成功"){
							reload_ytDg();//删除后刷新页面
						}
					});
				});	
			});
		}
	});
	function reload_ytDg() { 
		$("#dataTable").datagrid("reload");//删除后刷新页面
	}
	
	/*新增资料功能*/
	$("#new_yt").click(function(){
		window.open("data/dataDetail.php?userID=yt","dataDetail","height=600, width=1000,top=50,left=150");
	});
	
	
	
</script>