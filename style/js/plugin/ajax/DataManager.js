/**
*	DataManager
*@param options添加传入的任意json对象
*@attr count展示的数据条数
*@model 继承Ajax类@model,新增attr {count}
*/
function DataManager(options){
	Ajax.call(this,options);//继承类
}
DataManager.prototype = new Ajax();//原型继承

/**
*	定义类公共变量
*/
DataManager.prototype.define = function(){
	Ajax.prototype.define.call(this);//调用父类方法
	this.url = this.selector.attr("action");
	this.field = [];
	this.jsonData = {};
	this._this = this.selector;//最外层选择器
	this.send.pageNum = parseInt(this.selector.attr("count"));//每次展示的条数
	this.requireCount = 0;//请求的数据总条数会叠加
}
/**
*	重置返回初始状态
*/
DataManager.prototype.reset = function(){
	this.send.currentPage = 1
	this.updateReplace();
}
/**
*	常规更新数据,重写父类方法
*/
DataManager.prototype.update = function(){
	var $_this = $(this._this);
	var obj = this;
	var success = function(json){
		$_this.insertData(json.data,obj.options.repeatHTMLtype);
		obj.pageCount = json.paginator.pages;//页数
		obj.requireCount += obj.send.pageNum;
		if(obj.send.currentPage==1) {
			obj.dataCount = json.paginator.count;
			obj.lastId = json.lastId;//储存最初的最大id,后边可改变
			obj.send.lastId_No = json.lastId;//储存最初的最大id，后边不可改变，即排除新数据的影响
			//alert(json.lastId);
		}
		$("#ajaxLoading").remove();//移除加载图标
		obj.setPaginator();
	}
	Ajax.prototype.update.call(this,success,this.beforeSend);//调用父类方法
}
/**
*	 及时更新数据
*/
DataManager.prototype.updateBefore = function(){
	var $_this = $(this._this);
	var obj = this;
	this.send.lastId = this.lastId;
	var success = function(json){
		if(json.lastId!=undefined){
			$_this.insertData(json.data,obj.options.repeatHTMLtype,"_before");
			obj.lastId = json.lastId;
		}
		$("#ajaxLoading").remove();//移除加载图标
	}
	this.nAjax({success:success,beforeSend:this.beforeSend,type:"before"}); 
}

/**
*	 检查是否有新数据，并返回新数据条数
*/
DataManager.prototype.check = function(time){
	if(time==undefined) time = 5000;
	var obj = this;
	var interval = setInterval(function(){
		obj.send.lastId = obj.lastId;
		obj.nAjax({type:"check"}); 
	},time);
}
/**
*	 后延伸更新数据
*@param num当前加载的页数
*/
DataManager.prototype.updateExtend = function(num){
	this.send.currentPage = num;//当前页数
	if(!this.send.currentPage) this.send.currentPage = 1;
	
	this.update();
}
/**
*	替换更新数据
*@param num当前加载的页数
*/
DataManager.prototype.updateReplace = function(){
	$(".removeHtml",$(this._this)).remove();//移除
	this.updateExtend(this.send.currentPage);
}

/**
*	添加或修改数据
*@param obj 传人的目标选择器（获取表单值）
*@param check 提交之前的数据检查
*/
DataManager.prototype.save = function(obj,check){
	var $_this = this;
	var data = this.send;
	var pass = true;
	if(check!=undefined) pass = check();//检测提交数据是否符合条件，自定义
	if(!pass) return;
	this.send = obj.getInputVal();
	if(!jQuery.isEmptyObject(this.send)){//不为空
		var success = function(json){
			$_this.updateBefore();
			obj.cleanToEmpty();
		}
		Ajax.prototype.save.call(this,success);
	}
	this.send = data;//还原this.send
}
/**
*	删除
*@param id 表字段id序号
*/
DataManager.prototype.del = function(id){
	this.send.id = id;
	Ajax.prototype.del.call(this);//调用父类del方法
}
/**
*	搜索
*@param id 表字段id序号
*/
DataManager.prototype.search = function(obj,check){
	var $_this = this;
	var data = this.send;
	var pass = true;
	if(check!=undefined) pass = check();//检测提交数据是否符合条件，自定义
	if(!pass) return;
	this.send.search = {};
	this.send.search = obj.getInputVal();
	if(!jQuery.isEmptyObject(this.send.search)){//不为空
		this.reset();
	}
	
}
/**
*	读取分页
*@param pagination页数
*/
DataManager.prototype.setPaginator = function(){
	var length = "'"+this.options.dLength+"'";
	$_this = $(this._this);
	pageCount = this.pageCount;
	if(pageCount<=0) return; 
		
	//生成
	var elements = '<div class="tc paging"><a onclick="DataManager.object['+length+'].skip(this)"  href="javascript:void(0);" paginator="1">第一页</a>';
	elements += '<a onclick="DataManager.object['+length+'].skip(this,0)" class="prev" href="javascript:void(0); " paginator="'+this.send.currentPage+'">&lt;&lt;&nbsp;上一页</a>';
	for(var i=1;i<pageCount+1;i++){
		if(i==this.send.currentPage) {
			elements += '<a class="page-current">'+i+'</a>';
		}else {
			elements += '<a href="javascript:void(0)" paginator="'+i+'" onclick="DataManager.object['+length+'].skip(this)";>'+i+"</a>";
			
		}
	}
	elements += '<a onclick="DataManager.object['+length+'].skip(this,1)" class="next" href="javascript:void(0);" paginator="'+this.send.currentPage+'">下一页&nbsp;&gt;&gt;</a>';
	elements += '<a onclick="DataManager.object['+length+'].skip(this)"  paginator="'+pageCount+'" href="javascript:void(0);">最后一页</a>';
	$_this.next(".paging").remove();
	$_this.after(elements);
}
/**
*	切换分页
*@param object 传入的选择器
*/
DataManager.prototype.skip = function(object,type){	
	var num = $(object).attr("paginator");
	$_this = $(this._this);
	$(".removeHtml",$_this).remove();//移除
	this.send.currentPage = num;//当前页数
	if(type==1&&num<this.pageCount) this.send.currentPage++;
	if(type==0&&num>1) this.send.currentPage--;
	
	this.updateReplace();
}

DataManager.prototype.init = function(){
	this.define();
	this.updateExtend(1);//初始化第一页
}
//初始储存机制
DataManager.nLength = 0;
DataManager.object = {};
/**
*	转成jQuery调用方式
*/
jQuery.fn.DataManager = function(options){
	if(options==undefined) options = {};
	var $_this = $(this),index;
	if(options.dLength!=undefined) index = options.dLength;
	else index = DataManager.nLength;
	var opt = {
		selector : $_this,
		time : 1000,
		dLength : index
	};
	$.extend(opt,options);
	DataManager.object[index] = new DataManager(opt);
	DataManager.object[index].init();
	var manager = DataManager.object[index];
	DataManager.nLength++;
	return manager;
}




