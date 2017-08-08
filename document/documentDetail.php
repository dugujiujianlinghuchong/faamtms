<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>文档管理(明细)</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	    <script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script>
	    <script type="text/javascript" charset="utf-8" src="ueditor.all.min.js"> </script>
	    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
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
				border: 1px solid #95B8E7;
				width: 650px;
				height: 40px;
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
		<div id="info" class="easyui-panel" title="基本信息"     
        style="width:100%;height:100px;padding:10px;"   
        data-options="iconCls:'icon-edit',collapsible:true">
        <form enctype="multipart/form-data" method="post" id="imgForm">
			<input type="file" hidden="hidden" id="file" name="file" accept="image/*">
		</form>
        <form method="post" id="infoForm">  
			<input type="hidden" name="userid" id="userid" />
			<table class="infoTable">
				<tr>
					<td><span style="color: red;">*</span>文档名称：</td>
					<td>
						<input type="text" name="usernum" id="usernum" />
					</td>
					<td><span style="color: red;">*</span>文档类型：</td>
					<td>
						<input type="text" name="username" id="username" />
					</td>
				</tr>
			</table>
		</form> 	
		</div>  
		
		<br />
		
		<div class="easyui-panel" title=""     
        style="width:100%;height:400px;"   
        data-options="iconCls:'icon-edit',collapsible:true">  
        
        	<div style="width: 100%;">
			    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
			</div>
		
		</div> 
		
		<div style="text-align: center; margin-top: 15px;">
			<a class="easyui-linkbutton" iconCls="icon-save" id="save">保存</a>
			&nbsp;&nbsp;
			<a class="easyui-linkbutton" iconCls="icon-cancel" onclick="window.close()">关闭</a>
		</div>
		
		<script>
		// 修改时加载页面数据
		var documentid = <?php echo isset($_GET["id"])?$_GET["id"]:0; ?>;
		if(documentid!=0){ // userid不为0表示修改操作
			$.post("doGetDocumentDetail.php",{"documentid":documentid},function(data){
				$("#documentid").val(data.info.id);
				$("#name").val(data.info.name);
				$("#type").val(data.info.type);
			},"JSON");
		}
			
			$("#upload").click(function(){
				$("#file").trigger("click");
			});
			
			$("#remarkTable").edatagrid({
				// url:"../user/doShowUserList.php",
				border:false,
				fit:true,
				fitColumns:true,
				rownumbers:true,
				toolbar:"#tbBar",
				singleSelect:true,
				destroyMsg:{
					norecord:{    // 在没有记录选择的时候执行
						title:'警告',
						msg:'没有选中任何一行.'
					},
					confirm:{       // 在选择一行的时候执行		
						title:'提示',
						msg:'确定删除本条记录?'
					}
				},
			});
			
			$("#imgForm").form({
				url:"../common/doUpdate.php",
				success:function(data){
					if(data=="false"){
						$.messager.alert("失败提示","图片上传失败！");
					}else{
						$("#img").attr("src",data);
						$("#imgSrc").val(data);
						$.messager.alert("上传成功","图片上传成功！");
					}
				}
			});
			
			$("#file").change(function(){
				$("#imgForm").submit();
			});
			
		//实例化编辑器
	    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
	    var ue = UE.getEditor('editor');
    
    
    
			
		</script>
		
	</body>
</html>
