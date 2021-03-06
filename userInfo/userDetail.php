<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>用户详情页</title>
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
				width: 143px;
				height: 16px;
			}
			textarea{
				border: 1px solid #95B8E7;
				width: 650px;
				resize: none;
			}
			#greek{
				height: 15px;
			}
			#remark{
				height: 25px;
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
        style="width:100%;height:300px;padding:10px;"   
        data-options="iconCls:'icon-edit',collapsible:true">
        <form enctype="multipart/form-data" method="post" id="imgForm">
			<input type="file" hidden="hidden" id="file" name="file">
		</form>
        <form method="post" id="infoForm">  
			<input type="hidden" name="userid" id="userid" />
			<table class="infoTable">
				<tr>
					<td><span style="color: red;">*</span>学院编号：</td>
					<td>
						<input type="text" name="usernum" id="usernum" />
					</td>
					<td><span style="color: red;">*</span>学员姓名：</td>
					<td>
						<input type="text" name="username" id="username" />
					</td>
					<td><span style="color: red;">*</span>性别：</td>
					<td>
						<select class="easyui-combobox" name="position" id="position" panelHeight="auto" editable="false" style="width: 130px; height: 23px;">   
						    <option value="0">男</option>   
						    <option value="1">女</option>   
						</select>
					</td>
					<td rowspan="3">
						<input type="hidden" name="imgSrc" id="imgSrc" />
						<div id="upload">
							<img style="width:100%; height: 100%;" id="img" alt="上传图片" />
						</div>
						
					</td>
				</tr>
				<tr>
					<td><span style="color: red;">*</span>专业：</td>
					<td>
						<select class="easyui-combobox" name="position" id="position" panelHeight="auto" editable="false" style="width: 130px; height: 23px;">   
						    <option value="0">通信工程</option>   
						    <option value="1">计算机科学与技术</option>   
						    <option value="2">数学学院</option> 
						    <option value="3">会计学院</option>    
						</select>
					</td>
					<td><span style="color: red;">*</span>班次：</td>
					<td>
						<select class="easyui-combobox" name="position" id="position" panelHeight="auto" editable="false" style="width: 130px; height: 23px;">   
						    <option value="0">通信一班</option>   
						    <option value="1">通信二班</option>   
						</select>
					</td>
					<td><span style="color: red;">*</span>年纪：</td>
					<td>
						<select class="easyui-combobox" name="position" id="position" panelHeight="auto" editable="false" style="width: 130px; height: 23px;">   
						    <option value="0">2011级</option>   
						    <option value="1">2012级</option> 
						    <option value="2">2013级</option> 
						    <option value="3">2014级</option> 
						    <option value="4">2015级</option> 
						    <option value="5">2016级</option>   
						</select>
					</td>
				</tr>
				<tr>
					<td>格言：</td>
					<td colspan="5">
						<textarea name="remark" id="greek"></textarea>
					</td>
				</tr>
				<tr>
					<td>备注：</td>
					<td colspan="5">
						<textarea name="remark" id="remark"></textarea>
					</td>
				</tr>
			</table>
		</form> 	
		</div>  
		
		<br />
		<!--参赛经历(学员录入)-->
		<div class="easyui-panel" title="参赛经历(学员录入)"     
        style="width:100%;height:200px;"   
        data-options="iconCls:'icon-back',collapsible:true">  
        	
        	<div id="tbBar" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark">保存</a>
			</div>
			
			<table id="remarkTable">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'time',width:100,editor:{type:'datetimebox',options:{
			            	editable:false
			            }}">备忘时间</th>   
			            <th data-options="field:'type',width:100,editor:{
			            	type:'combobox',
			            	options:{
			            		valueField: 'value',
								textField: 'text',
								editable:false,
								panelHeight:'auto',
			            		data:[
			            			{value: '违规',text: '违规'},
			            			{value: '封禁',text: '封禁'},
			            			{value: '解禁',text: '解禁'},
			            			{value: '其他',text: '其他'}
			            		]
			            	}
			            }">备忘类型</th>   
			            <th data-options="field:'remark',width:400,editor:'text'">备忘内容</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div> 
		
		<br />
		
		
		
		<!--参赛附件-->
		<div class="easyui-panel" title="参赛附件"     
        style="width:100%;height:200px;"   
        data-options="iconCls:'icon-back',collapsible:true">  
        	
        	<div id="tbBar" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark">保存</a>
			</div>
			
			<table id="remarkTable">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'time',width:100,editor:{type:'datetimebox',options:{
			            	editable:false
			            }}">备忘时间</th>   
			            <th data-options="field:'type',width:100,editor:{
			            	type:'combobox',
			            	options:{
			            		valueField: 'value',
								textField: 'text',
								editable:false,
								panelHeight:'auto',
			            		data:[
			            			{value: '违规',text: '违规'},
			            			{value: '封禁',text: '封禁'},
			            			{value: '解禁',text: '解禁'},
			            			{value: '其他',text: '其他'}
			            		]
			            	}
			            }">备忘类型</th>   
			            <th data-options="field:'remark',width:400,editor:'text'">备忘内容</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div> 
		
		
		
		<br />
		<!--俱乐部经历(学员录入)-->
		<div class="easyui-panel" title="俱乐部经历(学员录入)"     
        style="width:100%;height:200px;"   
        data-options="collapsible:true">  
        	
        	<div id="tbBar" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark">保存</a>
			</div>
			
			<table id="remarkTable">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'time',width:100,editor:{type:'datetimebox',options:{
			            	editable:false
			            }}">备忘时间</th>   
			            <th data-options="field:'type',width:100,editor:{
			            	type:'combobox',
			            	options:{
			            		valueField: 'value',
								textField: 'text',
								editable:false,
								panelHeight:'auto',
			            		data:[
			            			{value: '违规',text: '违规'},
			            			{value: '封禁',text: '封禁'},
			            			{value: '解禁',text: '解禁'},
			            			{value: '其他',text: '其他'}
			            		]
			            	}
			            }">备忘类型</th>   
			            <th data-options="field:'remark',width:400,editor:'text'">备忘内容</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div>
		
		
		<!--身体物理参数(教员录入)-->
		
		<div class="easyui-panel" title="身体物理参数(教员录入)"     
        style="width:100%;height:200px;"   
        data-options="collapsible:true">  
        	
        	<div id="tbBar" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark">保存</a>
			</div>
			
			<table id="remarkTable">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'time',width:100,editor:{type:'datetimebox',options:{
			            	editable:false
			            }}">备忘时间</th>   
			            <th data-options="field:'type',width:100,editor:{
			            	type:'combobox',
			            	options:{
			            		valueField: 'value',
								textField: 'text',
								editable:false,
								panelHeight:'auto',
			            		data:[
			            			{value: '违规',text: '违规'},
			            			{value: '封禁',text: '封禁'},
			            			{value: '解禁',text: '解禁'},
			            			{value: '其他',text: '其他'}
			            		]
			            	}
			            }">备忘类型</th>   
			            <th data-options="field:'remark',width:400,editor:'text'">备忘内容</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div>
		
		
		<!--运动能力信息(教员录入)-->
		
		
		<div class="easyui-panel" title="运动能力信息(教员录入)"     
        style="width:100%;height:200px;"   
        data-options="collapsible:true">  
        	
        	<div id="tbBar" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark">保存</a>
			</div>
			
			<table id="remarkTable">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'time',width:100,editor:{type:'datetimebox',options:{
			            	editable:false
			            }}">备忘时间</th>   
			            <th data-options="field:'type',width:100,editor:{
			            	type:'combobox',
			            	options:{
			            		valueField: 'value',
								textField: 'text',
								editable:false,
								panelHeight:'auto',
			            		data:[
			            			{value: '违规',text: '违规'},
			            			{value: '封禁',text: '封禁'},
			            			{value: '解禁',text: '解禁'},
			            			{value: '其他',text: '其他'}
			            		]
			            	}
			            }">备忘类型</th>   
			            <th data-options="field:'remark',width:400,editor:'text'">备忘内容</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div>
		
		
		<!--病史信息(学员录入)-->
		
		
		<div class="easyui-panel" title="病史信息(学员录入)"     
        style="width:100%;height:200px;"   
        data-options="collapsible:true">  
        	
        	<div id="tbBar" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark">保存</a>
			</div>
			
			<table id="remarkTable">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'time',width:100,editor:{type:'datetimebox',options:{
			            	editable:false
			            }}">备忘时间</th>   
			            <th data-options="field:'type',width:100,editor:{
			            	type:'combobox',
			            	options:{
			            		valueField: 'value',
								textField: 'text',
								editable:false,
								panelHeight:'auto',
			            		data:[
			            			{value: '违规',text: '违规'},
			            			{value: '封禁',text: '封禁'},
			            			{value: '解禁',text: '解禁'},
			            			{value: '其他',text: '其他'}
			            		]
			            	}
			            }">备忘类型</th>   
			            <th data-options="field:'remark',width:400,editor:'text'">备忘内容</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div>
		
		
		
		<!--问卷调查-->
		
		
		<div class="easyui-panel" title="问卷调查"     
        style="width:100%;height:100px;"   
        data-options="collapsible:true">  
        	
        	<div id="tbBar" style="padding: 2px 10px;">
        		<a href="http://192.168.4.232:8080/web/faamtms/personQuestion.jsp?KeyId=10"><button>新学员问卷调查</button></a>
        	</div>
			
		</div>
		
		
		
		
		
		
		
		
		
		
		<!--保存关闭按钮-->
		
		<div style="text-align: center; margin-top: 15px;">
			<a class="easyui-linkbutton" iconCls="icon-save" id="save">保存</a>
			&nbsp;&nbsp;
			<a class="easyui-linkbutton" iconCls="icon-cancel" onclick="window.close()">关闭</a>
		</div>
		
		
		
		
		<script>
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
