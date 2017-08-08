<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="UTF-8">
		<title id="tit"></title>
		<link rel="stylesheet" href="../css/default/easyui.css" />
		<link rel="stylesheet" href="../css/icon.css" />
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery.easyui.min.js"></script>
		<script src="../js/easyui-lang-zh_CN.js"></script>
		<script src="../js/jquery.edatagrid.js"></script>
		<style>
			.infoTable td{
				width: 100px;
				height: 33px;
				text-align: right;
			}
			input{
				border: 1px solid #95B8E7;
				width: 130px;
				height: 17px;
			}
			textarea{
				margin-top: 60px;
				border: 1px solid #95B8E7;
				width: 600px;
				height: 70px;
				resize: none;
			}
			#upload{
				width: 100px;
				height: 100px;
				border: 1px solid black;
				text-align: center;
				line-height: 100px;
				font-weight: bold;
				font-size: 12px;
				margin-left: 30px;
				cursor: pointer;
			}
		</style>
	</head>
	
	
	<body>
		<!--基本信息栏-->
		<div id="info" class="easyui-panel" title="基本信息"     
        style="width:100%;height:auto;padding:10px;"   
        data-options="iconCls:'icon-edit',collapsible:true">
	        <form method="post" id="infoForm">  
				<input type="hidden" name="dataid" id="dataid" />
				<table class="infoTable">
					<tr>
						<td><span style="color: red;">*</span>资料名称：</td>
						<td>
							<input type="text" name="data_name" id="data_name" />
						</td>
						<td><span style="color: red;">*</span>资料类型：</td>
						<td>
							<select class="easyui-combobox" name="data_type" id="data_type" panelHeight="auto" editable="false" style="width: 130px; height: 23px;">   
								<option value=""> </option>
							    <option value="0">类型1</option>   
							    <option value="1">类型2</option>   
							    <option value="2">类型3</option>
							    <option value="3">类型4</option>
							    <option value="4">类型5</option>   
							</select>
						</td>
					</tr>
					<tr>
						<td><span style="color: red;">*</span>资料描述：</td>
						<td colspan="5">
							<textarea name="data_description" id="data_description"></textarea>
						</td>
					</tr>
				</table>
			</form> 	
		</div>  
		
		<br />
		
		<!--附件栏-->
		<div class="easyui-panel" title="附件" style="width:100%;height:150px;"
		data-options="iconCls:'icon-edit',collapsible:true">  
        	<!--toolBar-->
        	<div id="tbBar_file" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newFile">添加附件</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delFile">删除</a>
			</div>
			<!--文件列表-->
			<table id="files">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'file_name',width:400,editor:'text'">文件名称</th>
			            <th data-options="field:'file_type',width:400,editor:'text'">文件类型</th>
			            <th data-options="field:'file_size',width:400,editor:'text'">大小(KB)</th>
			            <th data-options="field:'updator',width:400,editor:'text'">上传人</th>
			            <th data-options="field:'uploadTime',width:400,editor:'text'">上传时间</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div> 
		
		<!--保存&关闭-->
		<div id="s_c" style="text-align: center; margin-top: 15px;">
			<a class="easyui-linkbutton" iconCls="icon-save" id="save_yt">保存</a>
			&nbsp;&nbsp;
			<a class="easyui-linkbutton" iconCls="icon-cancel" onclick="window.close()">关闭</a>
		</div>
		
		<!--文件上传对话框-->
		<div id="dialog">
			<form method="post" id="newFileForm"  enctype="multipart/form-data">
				<table style="width: 300px; height: 100px; margin: 20px auto;">
					<tr>
						<td style="font-size: 12px;">请选择文件：</td>
						<td>
							<input type="file" name="fileInput" style="width: 160px;" accept="*"/>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;">
							<a class="easyui-linkbutton" iconCls="icon-save" id="uploadFile">上传</a>
							<a class="easyui-linkbutton" iconCls="icon-cancel" id="cancelUpload">取消</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
		
	</body>
	<script>
		
		var dataid = <?php echo isset($_GET["id"])?$_GET["id"]:0; ?>;//取到dataList页面通过地址栏传过来的id
		if(dataid!=0){ // dataid不为0，打开文件详情页
			$("#tit").html("资料详情");
			$("#save_yt").click(function(){//保存提交信息
				var data_name = $("#data_name").val();
				var data_type = $("#data_type").combobox("getValue");
				var data_description = $("#data_description").val();
				if(data_name==""||data_type==""||data_description==""){//如果有空项不让提交
					$.messager.alert("提交失败","请确认非空信息！！！","warning");
					return false;
				}
				$("#infoForm").form({
					url:"doSubmitData.php",
					success:function(data){
						$.messager.alert("提示",data,"info",function(){
							if(data=="修改成功！"){
								window.opener.reload_ytDg();//窗口关闭前，调用父窗口的方法
								window.close();
							}
						});
					}
				});
				$("#infoForm").submit();		
			});
			$.post("doGetDataDetail.php",{"dataid":dataid},function(data){
				//为输入框赋数据库默认值
				$("#dataid").val(data.info.id);
				$("#data_name").val(data.info.data_name);
				$("#data_type").combobox("setValue",data.info.data_type);
				$("#data_description").val(data.info.data_description);
				$("#files").datagrid({
					border:false,
					fit:true,
					fitColumns:true,
					singleSelect:true,
					data:data.fileDetails
				});
				$("#tbBar_file").hide();
			},"JSON");
		}else{//dataid为0，打开添加文件页
			$("#tit").html("添加资料");
			$("#files").datagrid({
				border:false,
				fit:true,
				fitColumns:true,
				toolbar:"#tbBar_file",
				singleSelect:true,
			});
			/*上传添加文件的data信息*/
			$("#save_yt").click(function(){
				var data_name = $("#data_name").val();
				var data_type = $("#data_type").combobox("getValue");
				var data_description = $("#data_description").val();
				if(data_name==""||data_type==""||data_description==""){//如果有空项不让提交
					$.messager.alert("提交失败","请确认非空信息！！！","warning");
					return false;
				}
				$("#infoForm").form({
					url:"doInsertDataInfo.php",
					success:function(data){
						$.messager.alert("提示",data,"info",function(){
							if(data=="添加成功！"){
								window.opener.reload_ytDg();//窗口关闭前，调用父窗口的方法
								window.close();
							}
						});
					}
				});
				$("#infoForm").submit();		
			});
			
			
		}
		
		
		/*文件详情列表*/
//		$("#files").datagrid({
//			url:"doShowUploadDetails.php",
//			border:false,
//			fit:true,
//			fitColumns:true,
//			pagination:true,
//			rownumbers:true,
//			toolbar:"#tbBar_file",
//			singleSelect:true,
//		});
		
		/*添加文件*/
		$('#dialog').dialog({//上传对话框(隐藏)    
		    title: '上传文件',    
		    width: 400,    
		    height: 200,    
		    closed: true,    
		    cache: false,    
		    modal: true   
		});
		$("#newFile").click(function(){
			var data_name = $("#data_name").val();
			var data_type = $("#data_type").combobox("getValue");
			var data_description=$("#data_description").val();
			if(data_name==""||data_type==""||data_description==""){
				$.messager.alert("提示","请先填写基本信息再上传附件！！！","warning");
				return false;
			}else{
				$('#dialog').dialog({    
				    title: '上传文件',    
				    width: 400,    
				    height: 200,    
				    closed: false,    
				    cache: false,    
				    modal: true   
				});
			}
		})
		$("#newFileForm").form({
			url:"doUploadFile.php",
			success:function(data){
				if(data=="true"){
					$.messager.alert("提示","文件上传成功！");
					$("#files").datagrid({
						url:"doShowNewFileDetails.php",
						border:false,
						fit:true,
						fitColumns:true,
						toolbar:"#tbBar_file",
					});
					reFresh();
					$('#dialog').dialog({    
					    title: '上传文件',    
					    width: 400,    
					    height: 200,    
					    closed: true,    
					    cache: false,    
					    modal: true   
					});
				}else{
					$.messager.alert("上传失败","文件上传失败！");
				}
			}
		});
		$("#uploadFile").click(function(){//点击提交上传表单
			$("#newFileForm").submit();
		})
		$("#cancelUpload").click(function(){//点取消关闭对话框
			$('#dialog').dialog({    
			    title: '上传文件',    
			    width: 400,    
			    height: 200,    
			    closed: true,    
			    cache: false,    
			    modal: true   
			});
		})
		
		/*删除文件*/
		$("#delFile").click(function(){
			var arr = $("#files").datagrid("getSelections");
			if(arr.length == 0){
				$.messager.alert("提示","请至少选择一行！");
			}else{
				$.messager.confirm("提示","确认删除一条记录？",function(is){
					if(!is){
						$.messager.alert("提示","取消删除！");
						return;
					}
					$.post("doDelFile.php",{"id":arr[0].id},function(data){
						$.messager.alert("删除提示",data,"info",function(){
							if(data=="数据删除成功"){
								//删除后刷新页面
								reFresh();
							}
						});
					});	
				});
			}
		});
		
		/*刷新附件表方法*/
		function reFresh() { 
			$("#files").datagrid("reload");
		}
	</script>
</html>
