<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>计划详情</title>
		<link rel="icon" href="header.png"/>
		<link rel="stylesheet" type="text/css" href="../../../css/default/easyui.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/icon.css"/>
		<script src="../../js/jquery-1.10.2.js" type="text/javascript" charset="utf-8"></script>
		<script src="../../js/jquery.easyui.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../../js/easyui-lang-zh_CN.js" type="text/javascript" charset="utf-8"></script>
		<script src="../../js/jquery.edatagrid.js" type="text/javascript" charset="utf-8"></script>
		
		<style type="text/css">
			.infoTable td{
				width: 100px;
				text-align: right;
				height: 30px;
			}
			input{
				border: 1px solid #95B8E7;
				width: 130px;
				height: 17px;
			}
			textarea{
				border: 1px solid #95B8E7;
				width: 650px;
				height: 30px;
				resize: none;
			}
			#upload{
				width: 80px;
				height: 100px;
				border: 1px solid #95B8E7;
				text-align: center;
				line-height: 100px;
				font-weight: bold;
				font-size: 12px;
				margin-left: 50px;
				cursor: pointer;
			}
		</style>
		
	</head>			
	
	<body>
		<div id="baseinfo" class="easyui-panel" title="基本信息" iconCls="icon-edit" style="width:100%;height:200px;padding:10px;"   
        data-options="iconCls:'icon-edit',collapsible:true"> 
        
        <form method="post" id="infoForm">
		    <input type="hidden" name="planid" id="planid" />
        	<table class="infoTable">
        		<tr>
        			<td><span style="color: red;">*</span>计划名称：</td>
        			<td><input type="text" name="planname" id="planname" /></td>
        			<td><span style="color: red;">*</span>阶段标准：</td>
        			<td><select class="easyui-combobox" name="planstage" panelHeight="auto" editable="false" id="planstage" style="width: 130px;height: 25px;">  
						    <option value=""> </option> 
						    <option value="1">第一阶段</option>   
						    <option value="2">第二阶段</option>   
						    <option value="3">第三阶段</option>   
						    <option value="4">第四阶段</option>   
						    <option value="5">第五阶段</option>   
						</select>
					</td>
        			<td>军人体能标准：</td>
        			<td style="text-align: left;"><a href="javascript:window.open('MilitaryPhysicalStandard.html')" >点击查看</a></td>
        			
        		</tr>
        		<tr>
        			<td><span style="color: red;">*</span>年度标准：</td>
        			<td style="text-align: left;"><a href="javascript:window.open('AnnualAppraisalStandard.html')">点击查看</a></td>
        			
        		</tr>
        		<tr>
        			<td>备注：</td>
        			<td colspan="5">
        				<textarea id="remark" name="remark"></textarea>
        			</td>
        		</tr>
        	</table>
        </form>  
		</div> <br />
		
		<div id="commonquality" class="easyui-panel" title="通用素质" iconCls="icon-edit" style="width:100%;height:400px;padding:10px;"   
        data-options="iconCls:'icon-edit',collapsible:true"> 
        
        <form method="post" id="commonForm">
		    <input type="hidden" name="planid" id="planid" />
        	<table class="commonTable">
        		<tr>
        			<td style="text-align: right;"><input type="checkbox" name="common_quality" id="common_quality" value="0" style="height: 13px;width: 13px;" />力量</td>
        			<td style="text-align: right;"><input type="checkbox" name="common_quality" id="common_quality" value="1" style="height: 13px;width: 13px;" />速度</td>
        			<td style="text-align: right;"><input type="checkbox" name="common_quality" id="common_quality" value="2" style="height: 13px;width: 13px;" />耐力</td>
        			<td style="text-align: right;"><input type="checkbox" name="common_quality" id="common_quality" value="3" style="height: 13px;width: 13px;" />灵敏</td>
        			<td style="text-align: right;"><input type="checkbox" name="common_quality" id="common_quality" value="4" style="height: 13px;width: 13px;" />协调</td>
        			
        		</tr>
        		<tr>
        			<td>训练方法：</td>
        			<td colspan="5">
        				<textarea id="trainmethod" name="trainmethod"></textarea>
        			</td>
        		</tr>
        	</table>
        </form>  
        <div id="tbBar1" style="padding: 3px 10px;background-color: white;">
			<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" id="newTrain">
				新建</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" id="delTrain">
				删除</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" id="saveTrain">
				保存</a>
		</div>
    	<table id="trainTable">   
		    <thead>   
		        <tr>   
		            <th data-options="field:'time',width:100,editor:{type:'datetimebox',options:{
		            	editable:false
		            }}">训练周期</th>   
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
		            }">强度</th>   
		            <th data-options="field:'remark',width:400,editor:'text'">动作要求</th>   
		        </tr>   
		    </thead>  
		</table>  
		</div> <br />
		
		<div id="professquality" class="easyui-panel" title="专业素质" iconCls="icon-edit" style="width:100%;height:100px;padding:10px;"   
        data-options="iconCls:'icon-edit',collapsible:true"> 
        
        <form method="post" id="infoForm">
		    <input type="hidden" name="planid" id="planid" />
        	<table class="infoTable">
        		<tr>
        			<td><input type="checkbox" name="profess_quality" id="profess_quality" value="0" style="height: 13px;width: 13px;" />心肺功能</td>
        			<!--<td style="text-align: left;"></td>-->
        			<td><input type="checkbox" name="profess_quality" id="profess_quality" value="1" style="height: 13px;width: 13px;" />抗荷</td>
        			<!--<td style="text-align: left;"></td>-->
        			<td><input type="checkbox" name="profess_quality" id="profess_quality" value="2" style="height: 13px;width: 13px;" />抗晕眩</td>
        			<!--<td style="text-align: left;"></td>-->
        			<td><input type="checkbox" name="profess_quality" id="profess_quality" value="3" style="height: 13px;width: 13px;" />颈肌</td>
        			<!--<td style="text-align: left;"></td>-->
        			
        		</tr>
        	</table>
        </form>  
		</div> <br />
		
		<div class="easyui-panel" id="injury" title="伤病情况" iconCls="icon-edit" style="width:100%;height:300px;"   
        data-options="iconCls:'icon-edit',collapsible:true">   
        <div id="tbBar2" style="padding: 3px 10px;">
			<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" id="newRemark">
				新建</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" id="delRemark">
				删除</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" id="saveRemark">
				保存</a>
		</div>
        	<table id="remarkTable">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'time',width:100,editor:{type:'datetimebox',options:{
			            	editable:false
			            }}">伤病类型</th>   
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
			            }">伤病人员</th>   
			            <th data-options="field:'remark',width:200,editor:'text'">时间</th>   
			            <th data-options="field:'remark',width:100,editor:'text'">伤病原因</th>   
			            <th data-options="field:'remark',width:100,editor:'text'">伤病症状</th>   
			        </tr>   
			    </thead>  
			</table>  
  
		</div><br />
		
		<div style="text-align: center;margin-top: 15px;">
			<a href="#" class="easyui-linkbutton" iconCls="icon-save" id="save" >保存</a>&nbsp;
			<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="window.close()">取消</a>
		</div>
			
	</body>
	
	<script type="application/javascript">
		
		//修改时加载页面数据
		var userid=<?php echo isset($_GET["id"])?$_GET["id"]:0; ?>;
		if(userid!=0){  //不等于为修改操作
			$.post("doGetUserDetail.php",{"userid":userid},function(data){
				$("#userid").val(data.info.id);
				$("#usernum").val(data.info.usernum);
				$("#username").val(data.info.username);
				$("#tel").val(data.info.tel);
				$("#imgsrc").val(data.info.headimg);
				$("#img").attr("src",data.info.headimg);
				$("#position").combobox("setValue",data.info.position);
				data.info.isShow==1?$("#isshow").attr("checked","checked"):0;
				$("#remark").val(data.info.remark);
			},"JSON");
		}
		
	
		$("#remarkTable").edatagrid({
			fit:true,
			fitColumns:true,
			toolbar:"#tbBar2",
			singleSelect:true,
			border:false,
			rownumbers:true,
			url:"../planning/doGetPlanDetail.php",
			destroyMsg:{
				norecord:{    // 在没有记录选择的时候执行
					title:'警告',
					msg:'没有选中任何一行'
				},
				confirm:{       // 在选择一行的时候执行		title:'Confirm',
					msg:'确定删除本条记录 ?'
				}
			}


		});
		$("#trainTable").edatagrid({
			fit:true,
			fitColumns:true,
			toolbar:"#tbBar1",
			singleSelect:true,
			border:false,
			rownumbers:true,
			url:"../planning/doGetPlanDetail.php",
			destroyMsg:{
				norecord:{    // 在没有记录选择的时候执行
					title:'警告',
					msg:'没有选中任何一行'
				},
				confirm:{       // 在选择一行的时候执行		title:'Confirm',
					msg:'确定删除本条记录 ?'
				}
			}


		});
		
		
		//可编辑表格
		$('#newRemark').click(function(){
			$("#remarkTable").edatagrid('addRow',0);
		});
		$('#delRemark').click(function(){
			$("#remarkTable").edatagrid('destroyRow');
		});
		$('#saveRemark').click(function(){
			$("#remarkTable").edatagrid('saveRow');
		});
		
		$('#newTrain').click(function(){
			$("#trainTable").edatagrid('addRow',0);
		});
		$('#delTrain').click(function(){
			$("#trainTable").edatagrid('destroyRow');
		});
		$('#saveTrain').click(function(){
			$("#trainTable").edatagrid('saveRow');
		});
		
		//最下面的保存按钮
		$('#save').click(function(){
			var usernum=$("#usernum").val();
			var username=$("#username").val();
			var position=$("#usernum").combobox("getValue");
			
			if (usernum==""||username==""||position=="") {
				$.messager.alert("提交失败","确认所有信息不为空","warning");
				return false;
			}
			
			var remarkTable=$("#remarkTable").edatagrid('getRows');
			var trainTable=$("#trainTable").edatagrid('getRows');
			$("#infoForm").form({
				url:"doSubmitPlan.php",
				queryParams:{
					"remarkTable":JSON.stringify(remarkTable)
				},
				success:function(data){
					$.messager.alert("提示",data,"info",function(){
						if(data=="新增成功"||data=="修改成功"){
							window.close();
						}
					});
					
				}
			});
			$("#infoForm").submit();
		});
		
		
	</script>
	
</html>
