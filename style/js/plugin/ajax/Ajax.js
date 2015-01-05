/**
*	Ajax类
*@param options添加传入的任意json对象
*@model 
*	<div action="main/index">
*		<div>test</div><!--不循环-->
*		<div class="rpeatHTML">
*			<span class="_title_"></span>
*			<span class="_contents_"></span>
*		</div>
*	</div> 
*/
function Ajax(options){
	if(options == undefined) var options = {};
	this.options = options;
}

/**
*	定义类公共变量
*/
Ajax.prototype.define = function(){
	$.extend(this.options,{
		type : 'post',
		dataType : 'json',
		timeout : 5000
	});
	this.selector = this.options.selector;
	if(this.options.send==undefined) this.options.send = {};//初始自定义发送数据
	this.send = this.options.send;
	this.url = '';//定义要发送的目标网址
	Ajax.selector = this.selector;
}
/**
*	ajax请求成功后执行函数
*@param type ajax请求数据处理类型
*/
Ajax.prototype.after = function(type,json){
	
}
/**
*	ajax请求前运行
*@param type ajax请求数据处理类型
*/
Ajax.prototype.before = function(type){
	
}
/**
*	提取数据
*@param success ajax请求成功后的回调函数
*@param beforeSend ajax请求之前的回调函数
*@param type ajax请求数据处理类型
*/
Ajax.prototype.nAjax = function(options){
	if(options == undefined) var options = {};
	var success = options.success;
	var beforeSend = options.beforeSend;
	var type = options.type;
	
	// alert(beforeSend);
	var $_this = this;
	var ajax = {
		data : this.send,
		url : this.url + "/"+type+"",
		success : function(json){
			this.json = json;
			if(success!=undefined) success(json);
			$_this.after(type,json);
		},
		beforeSend : function(){
			if(beforeSend!=undefined) beforeSend();
			$_this.before(type);
		}
	};
	$.extend(this.options,ajax);
	$.ajax(this.options);
	
}

Ajax.prototype.beforeSend = function(){
	$(Ajax.selector).after("<div id='ajaxLoading'><img src=\"/style/images/loading.gif\" width='40' style='vertical-align:-20px;margin-right:20px;'/>加载中......</div>");
}
/**
*	更新数据
*@param success ajax请求成功后的回调函数
*@param beforeSend ajax请求之前的回调函数
*/
Ajax.prototype.update = function(success,beforeSend){
	this.nAjax({success:success,beforeSend:beforeSend,type:"update"});
}
/**
*	保持或修改数据
*@param success ajax请求成功后的回调函数
*@param beforeSend ajax请求之前的回调函数
*/
Ajax.prototype.save = function(success,beforeSend){
	this.nAjax({success:success,beforeSend:beforeSend,type:"save"});
}
/**
*	 删除数据
*@param success ajax请求成功后的回调函数
*@param beforeSend ajax请求之前的回调函数
*/
Ajax.prototype.del = function(success,beforeSend){
	this.nAjax({success:success,beforeSend:beforeSend,type:"del"});
}




