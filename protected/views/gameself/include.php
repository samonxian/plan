<script src="/style/js/n/nquery.js"></script>

<style>
	.include_con{
		width:630px;margin:auto;
	}
	.include_con .control-label{
		width:70px;
	}
	.include_con .controls{
		margin:0;
		padding-left:15px;
	}
	.include-list{
		width:600px;margin:auto;
		margin-top:50px;
	}
	.include-list dt{
		width:120px;
	}
	.list-info{
		width:70%;
	}
	.list-info h4{
		margin:0;padding:0px;
	}
	.list-info table{
		font-size:13px;margin-top:5px;
		width:440px;
	}
	.list-info td{
		width:25%;
		line-height:25px;height:25px;
	}
	.info_con{
		margin-top:20px;
	}
</style>
<div class="include_con form-horizontal">
	<div class="control-group">
		<label class="control-label" for="jinclude-glist">查询游戏</label>
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbTypeahead', array(
				'name'=>'typeahead',
				'options'=>array(
					'source'=>$data	,
					'items'=>4,
					
				),
				'htmlOptions'=>array(
					'id'=>'jinclude-glist',
					'class'=>'span6',
					'placeholder'=>'请输入你想收录的游戏名称',
				),
			)); ?>
			
			<a type="submit" class="btn" onclick="include.get_info();">查询</a>
		</div>
	</div>
</div>
<div class="include-list mt15">
	<div class="box none" id="j_g_info" action="<?php echo Yii::app()->createUrl('gameself/include');?>" count="10" pagination="4">
		<dl class="repeatHTML">
			<div class="clearfix">
				<dt class="fl">
					<a target="_blank" href="#"><img src="/game_name.jpg" alt="武尊"></a>
				</dt>
				<dd class="fl list-info ml15">
					<h4 class="">
						<a target="_blank" href="#">{name}</a>
					</h4>
					<table>
						<tr>
							<td><span class="fb">类型：</span>{typet}</td>
							<td><span class="fb">评分：</span>{estimate}</td>
							<td><span class="fb">画面：</span>{ul}</td>
							<td><span class="fb">题材：</span>{theme}</td>
						</tr>
						<tr>
							<td><span class="fb">战斗：</span>{fightform}</td>
							<td><span class="fb">状态：</span>{gstate}</td>
							<td><span class="fb">开发：</span>{cCompany}</td>
							<td><span class="fb">运营：</span>{rCompany}</td>
						</tr>
					</table>
					
				</dd>
			</div>
		</dl>
		<a onclick="include.include(this);" class="btn btn-primary">我要收录</a>
		
	</div>
</div>

<div class="include_con info_con form-horizontal none" id="j_info">
	
	<div class="control-group">
		<label class="control-label" for="p_platform">选择平台</label>
		<div class="controls">
			<select class="span6" id="p_platform">
				<?php
					$data = $this->getPlatform();
					foreach($data as $key=>$d){

					
				?>
				<option value="<?php echo $key?>"><?php echo $d?></option>
				<?php
					}
				?>
			</select>
			
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="p_address">官网</label>
		<div class="controls">
			<input name="p_address" id="p_address" class="span6" placeholder="请输入您的游戏官网" type="text">
			
		</div>
	</div>
	<a type="submit" class="btn btn-primary ml10" onclick="include.add();">提交</a>
</div>
<script>
	function get_include_info(){
		var obj = $("#j_g_info");
		var url = obj.attr('action');
		var pro = {
			url:'',
			data : {},
			tempId : '',
			info : function(){
				$_this = this;
				$.ajax({
					type : 'post',
					dataType : 'json',
					timeout : 5000,
					data : {},
					url : $_this.url,
					success : function(jsonData){
						obj.show();
						$_this.tempId = jsonData.id;
						var htmlData = obj.html();
						
						var result = '';
						var field_name;
						result += htmlData.replace(/\{([^}]+)\}/ig, function(){
							field_name = arguments[1];
							
							var data;
							if(field_name=="message"||field_name=="comment") {
								data =  AnalyticEmotion(jsonData[field_name]);
							}else{
								data = jsonData[field_name];
							}
							
							return data;
						});
						obj.replaceWith(result);						
					},
					beforeSend : function(){
						
					}
				});
				
			},
			get_info : function(){
				var val = $('#jinclude-glist').val();
				if(val!=''){
					this.url = url+'?name='+val;
					this.info();
				}
			},
			include:function(obj){
				$(obj).hide();
				$("#j_info").show();
			},
			add:function(obj){
				var addUrl = url+'?name=add';
				
				var data = {};
				data.p_address = $("#p_address").val();
				data.p_id = $("#p_platform").val();
				data.g_id = this.tempId;
				$.post(addUrl,data,function(json){
					alert(json.msg);
				},"json").error(function() { 
					alert("服务器端没响应！或你已收录了该游戏"); 
				});
			}
		}
		return pro;
	}
	var include = get_include_info();
</script>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		