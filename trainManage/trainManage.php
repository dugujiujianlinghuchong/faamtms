
<div id="tbBar5" style="padding: 2px 10px;">
	<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="addTrain">添加</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-edit" id="change">编辑</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="del5">删除</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-reload" id="reload5">刷新</a>
	<a class="easyui-linkbutton" plain="true" iconCls="icon-search" id="search5">筛选</a>
	
	<div class="userSearch5" style="width:100%;height: 0px;transition: all .5s ease;display: flex;align-items: center;overflow: hidden;">
		<form method="post">
			专业：<input id="majorSel" name="majorSel" value="">
			班次：<input id="classSel" name="classSel" value="">
					
			<a class="easyui-linkbutton" plain="true" iconCls="icon-search" id="searchUser5">筛选</a>
		</form>
	</div>
</div>

<table id="userTable5">   
    <thead>   
        <tr>   
            <th data-options="field:'stucode',width:100">学员编号</th>   
            <th data-options="field:'stuname',width:100">学员姓名</th>   
            <th data-options="field:'sex_show',width:100">性别</th>   
            <th data-options="field:'major',width:100">专业</th>   
            <th data-options="field:'class',width:100">班次</th>    
            <th data-options="field:'state_show',width:100">状态</th>   
        </tr>   
    </thead>  
</table>




<script type="text/javascript">
	$(function(){
		//有依赖关系的下拉框
		$('#majorSel').combobox({    
		    url:'trainManage/doSelect.php',    
		    valueField:'text',    
		    textField:'text',
		    panelHeight:'auto',
		    editable:false,
		    onSelect:function(obj){
		    	$('#classSel').combobox({
				    url:'trainManage/doSelect.php?id='+obj.id,    
				    valueField:'text',    
				    textField:'text',
				    panelHeight:'auto',
				    editable:false,
				});
		    },
		});
		$('#classSel').combobox({
			panelHeight:'auto',
			editable:false
		});
		
		
		//数据显示
		$("#userTable5").datagrid({
			title:"训练管理",
			url:"trainManage/doShowStuList.php",
			border:false,
			fit:true,
			fitColumns:true,
			pagination:true,
			rownumbers:true,
			toolbar:"#tbBar5",
			singleSelect:true,
			onDblClickRow:function(index,row){
				window.open("trainManage/trainManageDetail.php?id="+row.id,"userDetail","height=600, width=1000,top=50,left=150");
			}
		});
		
		
		// 添加
		$("#addTrain").click(function(){
			window.open("trainManage/trainManageDetail.php","trainManageDetail","height=600, width=1000,top=50,left=150");
		});
		// 编辑
		$("#change").click(function(){
			var arr = $("#userTable5").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				console.log(arr);
				window.open("trainManage/trainManageDetail.php?id="+arr[0].id,"trainManageDetail","height=600, width=1000,top=50,left=150");
			}
		});
		
		
		// 删除用户
		$("#del5").click(function(){
			var arr = $("#userTable5").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				$.messager.confirm("提示","确认删除一条记录？",function(is){
					if(!is){
						$.messager.alert("提示","取消删除！");
						return;
					}
					$.post("trainManage/doDelStu.php",{"id":arr[0].id},function(data){
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
		$("#reload5").click(function(){
			$("#userTable5").datagrid({
				url:"trainManage/doShowStuList.php",
				queryParams:{
					"majorSel":"",
					"classSel":""
				},
				onLoadSuccess:function(){}
			});
		});
		
		// 点击筛选，显示筛选条
		$("#search5").click(function(){
			if($(".userSearch5").css("height")=="0px"){
				$(".userSearch5").css("height","30px");
				setTimeout(function(){
					$("#userTable5").datagrid("resize");
				},500);
			}else{
				$(".userSearch5").css("height","0px");
				setTimeout(function(){
					$("#userTable5").datagrid("resize");
				},500);
			}
		});
		// 筛选操作
		$("#searchUser5").click(function(){
			var majorSel = $("#majorSel").combobox("getValue");
			var classSel = $("#classSel").combobox("getValue");
			
			$("#userTable5").datagrid({
				url:"trainManage/doShowStuList.php",
				queryParams:{
					"majorSel":majorSel,
					"classSel":classSel
				},
				onLoadSuccess:function(data){
					$.messager.alert("筛选提示","筛选成功！共筛选出"+data.total+"条数据");
				}
			});	
		});
		
		
		
		
	})
	
	function reloadDg() { 
		$("#userTable5").datagrid("reload");
	} 
</script>