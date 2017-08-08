<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>专业详情页</title>
		
		<link rel="stylesheet" href="../css/default/easyui.css" />
		<link rel="stylesheet" href="../css/icon.css" />
		
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery.easyui.min.js"></script>
		<script src="../js/easyui-lang-zh_CN.js"></script>
		<script src="../js/jquery.edatagrid.js"></script>
		
		<style>
			table td{
				width: 200px;
				height: 33px;
				text-align: right;
				/*border: 1px solid red;*/
			}
			input{
				border: 1px solid #95B8E7;
				width: 180px;
				height: 17px;
			}
			textarea{
				width: 860px;
				height: 38px;
			}
		</style>
		
	</head>
	
	<body>
		<div id="win" class="easyui-window" title="My Window" style="width:1000px;height:400px"   
        data-options="iconCls:'icon-save',modal:true">   
    		<!--Window Content    -->

		
			<table>
				<tr>
					<td><span style="color: red;">*</span>名称:</td>
					<td>
						<input type="text" name="mingCheng" />
					</td>
					<td>上级名称:</td>
					<td>
						<input type="text" name="shangJiMingCheng" />
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>备注信息:</td>
					<td colspan="5">
						<textarea></textarea>
					</td>
				</tr>
				
			</table>
			
			<!--保存、关闭按钮-->
			<div style="text-align: center; margin-top: 15px;">
				<a class="easyui-linkbutton" iconCls="icon-save" id="save">保存</a>
				&nbsp;&nbsp;
				<a class="easyui-linkbutton" iconCls="icon-cancel" onclick="window.close()">关闭</a>
			</div>
        
		</div>  
		
		<br />
		
		
		
		
		
		
		
		<script type="text/javascript">
			
		// 修改时加载页面数据
		var userid = <?php echo isset($_GET["id"])?$_GET["id"]:0; ?>;
		if(userid!=0){ // userid不为0表示修改操作
			$.post("doGetUserDetail.php",{"userid":userid},function(data){
				$("#userid").val(data.info.id);
				$("#usernum").val(data.info.usernum);
				$("#username").val(data.info.username);
				$("#tel").val(data.info.tel);
				$("#imgSrc").val(data.info.headimg);
				$("#img").attr("src",data.info.headimg);
				$("#remark").val(data.info.remark);
				if(data.info.isShow==1)$("#isshow").attr("checked","checked");
				$("#position").combobox("setValue",data.info.position);
				
				$("#remarkTable").edatagrid({
					data:data.remark
				});
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
			
			// 备忘录操作
			// 新增
			$("#newRemark").click(function(){
				$('#remarkTable').edatagrid('addRow',0);
			});
			// 删除
			$("#delRemark").click(function(){
				$('#remarkTable').edatagrid('destroyRow');
			});
			// 保存
			$("#saveRemark").click(function(){
				$('#remarkTable').edatagrid('saveRow');
			});
			
			
			// 最终保存
			$("#save").click(function(){
				var usernum = $("#usernum").val();
				var username = $("#username").val();
				var position = $("#position").combobox("getValue");
				if(usernum==""||username==""||position==""){
					$.messager.alert("提交失败","请确认非空信息！！！","warning");
					return false;
				}
				
				$('#remarkTable').edatagrid('saveRow');
				var remarkTable = $("#remarkTable").edatagrid("getRows");
				$("#infoForm").form({
					url:"doSubmitUser.php",
					queryParams:{
						"remarkTable":JSON.stringify(remarkTable)
					},
					success:function(data){
						$.messager.alert("提示",data,"info",function(){
							if(data=="新增成功"||data=="修改成功"){
								window.opener.reloadDg();//窗口关闭前，调用父窗口的方法
								window.close();
							}
						});
					}
				});
				$("#infoForm").submit();		
			});
			
		</script>
		
	</body>
</html>
