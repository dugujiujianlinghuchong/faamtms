<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>训练管理（详情）</title>
		<link rel="stylesheet" href="../css/default/easyui.css" />
		<link rel="stylesheet" href="../css/icon.css" />
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery.easyui.min.js"></script>
		<script src="../js/easyui-lang-zh_CN.js"></script>
		<script src="../js/jquery.edatagrid.js"></script>
		<style type="text/css">
			.infoTable{
				margin-left: 60px;
			}
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
			#FMSPd th{
				font-weight: bold !important;
				vertical-align: middle;
			}
		</style>
	</head>
	<body>
		<div id="info" class="easyui-panel" title="基本信息（学员录入）"     
        style="width:100%;height:200px;padding:10px;margin-bottom: 20px;"   
        data-options="iconCls:'icon-edit',collapsible:true">
        <form method="post" id="infoForm">  
			<input type="hidden" name="userid" id="userid" />
			<table class="infoTable">
				<tr>
					<td><span style="color: red;">*</span>学员编号：</td>
					<td>
						<input type="text" name="stucode" id="stucode" />
					</td>
					<td><span style="color: red;">*</span>学员姓名：</td>
					<td>
						<input type="text" name="stuname" id="stuname" />
					</td>
					<td><span style="color: red;">*</span>性别：</td>
					<td>
						<select class="easyui-combobox" name="sex" id="sex" panelHeight="auto" editable="false" style="width: 130px; height: 23px;">   
							<option value=""> </option>
						    <option value="0">女</option>   
						    <option value="1">男</option>   
						</select>
					</td>
				</tr>
				<tr>
					<td><span style="color: red;">*</span>专业：</td>
					<td>
						<input id="majorSel" name="majorSel" value="">
					</td>
					<td><span style="color: red;">*</span>班次：</td>
					<td>
						<input id="classSel" name="classSel" value="">
					</td>
					<td><span style="color: red;">*</span>年级：</td>
					<td>
						<select class="easyui-combobox" name="grade" id="grade" panelHeight="auto" editable="false" style="width: 130px; height: 23px;">   
							<option value=""> </option>
						    <option value="1">2011</option>   
						    <option value="2">2012</option>   
						    <option value="3">2013</option>
						    <option value="4">2014</option> 
						    <option value="5">2015</option> 
						    <option value="6">2016</option>  
						</select>
					</td>
				</tr>
				<tr>
					<td><span style="color: red;">*</span>备注：</td>
					<td colspan="5">
						<textarea name="remark" id="remark"></textarea>
					</td>
				</tr>
			</table>
		</form> 	
		</div> 
		
		<div class="easyui-panel" title="自我评定（学员录入）"     
        style="width:100%;height:300px;margin-bottom: 20px;"   
        data-options="iconCls:'icon-edit',collapsible:true">  
        	
        	<div id="tbBar" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark1">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark1">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark1">保存</a>
			</div>
			
			<table id="selfPd">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'cycle',width:100,editor:'text'">周期</th>   
			            <th data-options="field:'train_state',width:100,editor:'text'">训练状态</th>   
			            <th data-options="field:'train_manifestation',width:100,editor:'text'">训练表现</th>   
			            <th data-options="field:'train_hurt',width:100,editor:'text'">训练伤病</th>   
			            <th data-options="field:'quality_growth',width:100,editor:'text'">素质增长</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div> 
		
		<div class="easyui-panel" title="教员评定（教员录入）"     
        style="width:100%;height:300px;margin-bottom: 20px;"   
        data-options="iconCls:'icon-edit',collapsible:true">  
        	
        	<div id="tbBar_teach" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark2">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark2">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark2">保存</a>
			</div>
			
			<table id="teachPd">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'cycle',width:100,editor:'text'">周期</th>   
			            <th data-options="field:'train_state',width:100,editor:'text'">训练状态</th>   
			            <th data-options="field:'train_manifestation',width:100,editor:'text'">训练表现</th>   
			            <th data-options="field:'train_hurt',width:100,editor:'text'">训练伤病</th>   
			            <th data-options="field:'quality_growth',width:100,editor:'text'">素质增长</th>
			            <th data-options="field:'train_need',width:100,editor:'text'">训练需求</th>
			            <th data-options="field:'feedback',width:400,editor:'text'">反馈意见</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div> 
		
		<div class="easyui-panel" title="单位评定（单位录入）"     
        style="width:100%;height:300px;margin-bottom: 20px;"   
        data-options="iconCls:'icon-edit',collapsible:true">  
        	
        	<div id="tbBar_comp" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark3">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark3">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark3">保存</a>
			</div>
			
			<table id="compPd">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'cycle',width:100,editor:'text'">周期</th>   
			            <th data-options="field:'train_state',width:100,editor:'text'">训练状态</th>   
			            <th data-options="field:'train_manifestation',width:100,editor:'text'">训练表现</th>   
			            <th data-options="field:'train_hurt',width:100,editor:'text'">训练伤病</th>   
			            <th data-options="field:'quality_growth',width:100,editor:'text'">素质增长</th>
			            <th data-options="field:'train_need',width:100,editor:'text'">训练需求</th>
			            <th data-options="field:'feedback',width:400,editor:'text'">反馈意见</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div> 
		
		<div class="easyui-panel" title="FMS评定（教员录入）"     
        style="width:100%;height:300px;margin-bottom: 20px;"   
        data-options="iconCls:'icon-edit',collapsible:true">  
        	
        	<div id="tbBar_fms" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark4">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark4">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark4">保存</a>
			</div>
			
			<table id="FMSPd">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'cycle',width:100,editor:'text'" rowspan="2">周期</th>   
			            <th data-options="field:'shendun',width:100,editor:'text'" rowspan="2">深蹲</th>   
			            <th colspan="2">过栏架步</th>   
			            <th colspan="2">前后分腿蹲</th>   
			            <th colspan="2">肩部灵活性</th>
			            <th colspan="2">冲击排除性检测</th>
			            <th colspan="2">主动直膝抬腿</th>
			            <th data-options="field:'qgwdxfc',width:100,editor:'text'" rowspan="2">躯干稳定性俯撑</th>
			            <th data-options="field:'fcpcxcs',width:100,editor:'text'" rowspan="2">俯撑排除性测试</th>
			            <th colspan="2">转动稳定性</th>
			            <th data-options="field:'hystpcxcs',width:100,editor:'text'" rowspan="2">后移上体排除性测试</th>
			            <th data-options="field:'zongji',width:100,editor:'text'" rowspan="2">总计</th>  
			            <th data-options="field:'zdsyl',width:100,editor:'text'" rowspan="2">最大摄氧量</th>   
			        </tr>
			        <tr>
			        	<th data-options="field:'guolan_l',width:100,editor:'text'">左</th>
			        	<th data-options="field:'guolan_r',width:100,editor:'text'">右</th>
			        	<th data-options="field:'fentui_l',width:100,editor:'text'">左</th>
			        	<th data-options="field:'fentui_r',width:100,editor:'text'">右</th>
			        	<th data-options="field:'jianbu_l',width:100,editor:'text'">左</th>
			        	<th data-options="field:'jianbu_r',width:100,editor:'text'">右</th>
			        	<th data-options="field:'chongji_l',width:100,editor:'text'">左</th>
			        	<th data-options="field:'chongji_r',width:100,editor:'text'">右</th>
			        	<th data-options="field:'taitui_l',width:100,editor:'text'">左</th>
			        	<th data-options="field:'taitui_r',width:100,editor:'text'">右</th>
			        	<th data-options="field:'zhuandong_l',width:100,editor:'text'">左</th>
			        	<th data-options="field:'zhuandong_r',width:100,editor:'text'">右</th>
			        </tr>   
			    </thead>  
			</table>  
		</div> 
		
		<div id="info" class="easyui-panel" title="考核成绩（教员录入）"     
        style="width:100%;height:100px;padding:10px;margin-bottom: 20px;"   
        data-options="iconCls:'icon-edit',collapsible:true">
			<div style="margin-top: 10px;margin-left: 50px;">
				考核成绩：<input type="text" name="scale" id="scale" />
			</div>
		</div> 
		<div style="text-align: center; margin-top: 15px;margin-bottom: 40px;">
			<a class="easyui-linkbutton" iconCls="icon-save" id="save">保存</a>
			&nbsp;&nbsp;
			<a class="easyui-linkbutton" iconCls="icon-cancel" onclick="window.close()">关闭</a>
		</div>
		
	</body>
	<script type="text/javascript">
		// 修改时加载页面数据
		var userid = <?php echo isset($_GET["id"])?$_GET["id"]:0; ?>;
		if(userid!=0){ // userid不为0表示修改操作
			$.post("doGetStuDetail.php",{"userid":userid},function(data){
				console.log(data);
				$("#userid").val(data.info.id);
				$("#stucode").val(data.info.stucode);
				$("#stuname").val(data.info.stuname);
				$("#sex").combobox("setValue",data.info.sex);
				$("#majorSel").combobox("setValue",data.info.major);
				$("#classSel").combobox("setValue",data.info.class);
				$("#grade").combobox("setValue",data.info.grade);
				$("#remark").val(data.info.remark);
				$("#scale").val(data.info.scale);
				
				$("#selfPd").edatagrid({
					data:data.selfe
				});
				$("#teachPd").edatagrid({
					data:data.teache
				});
				$("#compPd").edatagrid({
					data:data.compe
				});
				$("#FMSPd").edatagrid({
					data:data.fmse
				});
			},"JSON");
		}
		
		//有依赖关系的下拉选择框
		$('#majorSel').combobox({    
		    url:'doSelect.php',    
		    valueField:'text',    
		    textField:'text',
		    panelHeight:'auto',
		    editable:false,
		    onSelect:function(obj){
		    	$('#classSel').combobox({
				    url:'doSelect.php?id='+obj.id,    
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
		
		//可编辑表格
		$("#selfPd").edatagrid({
			border:false,
			fit:true,
			fitColumns:true,
			rownumbers:true,
			toolbar:"#tbBar",
			singleSelect:true,
			autoSave:true,
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
		$("#teachPd").edatagrid({
			border:false,
			fit:true,
			fitColumns:true,
			rownumbers:true,
			toolbar:"#tbBar_teach",
			singleSelect:true,
			autoSave:true,
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
		$("#compPd").edatagrid({
			border:false,
			fit:true,
			fitColumns:true,
			rownumbers:true,
			toolbar:"#tbBar_comp",
			singleSelect:true,
			autoSave:true,
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
		$("#FMSPd").edatagrid({
			border:false,
			fit:true,
			fitColumns:true,
			rownumbers:true,
			toolbar:"#tbBar_fms",
			singleSelect:true,
			autoSave:true,
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
		
		// 评定操作
		// 新增
		$("#newRemark1").click(function(){
			$('#selfPd').edatagrid('addRow',0);
		});
		// 删除
		$("#delRemark1").click(function(){
			$('#selfPd').edatagrid('destroyRow');
		});
		// 保存
		$("#saveRemark1").click(function(){
			$('#selfPd').edatagrid('saveRow');
		});
		
		// 新增
		$("#newRemark2").click(function(){
			$('#teachPd').edatagrid('addRow',0);
		});
		// 删除
		$("#delRemark2").click(function(){
			$('#teachPd').edatagrid('destroyRow');
		});
		// 保存
		$("#saveRemark2").click(function(){
			$('#teachPd').edatagrid('saveRow');
		});
		
		// 新增
		$("#newRemark3").click(function(){
			$('#compPd').edatagrid('addRow',0);
		});
		// 删除
		$("#delRemark3").click(function(){
			$('#compPd').edatagrid('destroyRow');
		});
		// 保存
		$("#saveRemark3").click(function(){
			$('#compPd').edatagrid('saveRow');
		});
		
		// 新增
		$("#newRemark4").click(function(){
			$('#FMSPd').edatagrid('addRow',0);
		});
		// 删除
		$("#delRemark4").click(function(){
			$('#FMSPd').edatagrid('destroyRow');
		});
		// 保存
		$("#saveRemark4").click(function(){
			$('#FMSPd').edatagrid('saveRow');
		});
		
		
		// 最终保存
		$("#save").click(function(){
			var stucode = $("#stucode").val();
			var stuname = $("#stuname").val();
			var sex = $("#sex").combobox("getValue");
			var majorSel = $("#majorSel").combobox("getValue");
			var classSel = $("#classSel").combobox("getValue");
			var grade = $("#grade").combobox("getValue");
			var remark = $("#remark").val();
			if(stucode==""||stuname==""||sex==""||majorSel==""||classSel==""||grade==""||remark==""){
				$.messager.alert("提交失败","请确认非空信息！！！","warning");
				return false;
			}
			
			$('#selfPd').edatagrid('saveRow');
			$('#teachPd').edatagrid('saveRow');
			$('#compPd').edatagrid('saveRow');
			$('#FMSPd').edatagrid('saveRow');
			
			var selfPd = $("#selfPd").edatagrid("getRows");
			var teachPd = $("#teachPd").edatagrid("getRows");
			var compPd = $("#compPd").edatagrid("getRows");
			var FMSPd = $("#FMSPd").edatagrid("getRows");
			
			var scale = $("#scale").val();
			
			$("#infoForm").form({
				url:"doSubmitTrainManage.php",
				queryParams:{
					"scale":scale,
					"selfPd":JSON.stringify(selfPd),
					"teachPd":JSON.stringify(teachPd),
					"compPd":JSON.stringify(compPd),
					"FMSPd":JSON.stringify(FMSPd)
				},
				success:function(data){
					console.log(data);
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
</html>
