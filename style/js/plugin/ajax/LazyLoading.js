/**
*	延迟加载
*@param options添加传入的任意json对象
*@attr pagination每一次延迟加载的总页数
*@model 继承DataManager类@model,新增attr {pagination}
*/
function LazyLoading(options){
	if(options==undefined) options = {};
	DataManager.call(this,options);//继承类
}
LazyLoading.prototype = new DataManager();//原型继承
/**
*	重置返回初始状态
*/
LazyLoading.prototype.reset = function(){
	this.times = 1;
	this.lazyCurentPage = 1;
	clearInterval(this.interval);
	DataManager.prototype.reset.call(this);
	this.loading();
	
}
/**
*	ajax请求成功后执行函数，特定针对lazyloading
*@param type ajax请求数据处理类型
*/
LazyLoading.prototype.lazyafter = function(type,json){
	switch(type){
		case "update":
			if(this.times>=this.repeatTimes*this.lazyCurentPage) {
				this.selector.next().show();
			}
		break;
	}
}
/**
*	ajax请求成功后执行函数,重写父类的
*@param type ajax请求数据处理类型
*/
LazyLoading.prototype.after = function(type,json){
	this.lazyafter(type,json);//
}
/**
*	检测触发条件以达到延迟加载效果
*@param time延迟加载检测时间间隔
*/
LazyLoading.prototype.loading = function(){
	var time = this.options.time;
	var repeatTimes = this.repeatTimes;
	var obj = this;
	this.interval = setInterval(function(){
		var bodyHeight = $("body").height();
		var scrollTop = $(document).scrollTop();
		var bottom = scrollTop+$(window).height();
		if(bottom>=bodyHeight-50){
			// if(obj.requireCount >= obj.dataCount) return;//没数据是停止
			obj.times++;
			DataManager.prototype.updateExtend.call(obj,obj.times);//数据处理
			if(obj.times>=repeatTimes*obj.lazyCurentPage) {
				clearInterval(obj.interval);
			}
		}
	},time);
}

/**
*	读取分页
*@relaod
*/
LazyLoading.prototype.setPaginator = function(){
	var loadtime = this.times;
	this.pageCount = Math.ceil(this.pageCount/this.repeatTimes);//lazyloading分页总数
	this.lazyCurentPage = Math.ceil(loadtime/this.repeatTimes);//lazyloading当前分页
	this.send.currentPage = this.lazyCurentPage;
	// alert(this.send.currentPage);
	DataManager.prototype.setPaginator.call(this);
	this.selector.next().hide();
}
/**
*	切换分页
*@param object 传入的选择器
*/
LazyLoading.prototype.skip = function(object,type){	
	this.selector.next().show();
	var num = $(object).attr("paginator");
	$_this = $(this._this);
	$(".removeHtml",$_this).remove();//移除
	if(type==1&&num<this.pageCount) num++;
	if(type==0&&num>1) num--;
	this.times = num * this.repeatTimes-this.repeatTimes+1;//重新赋值，进行新的lazyloading
	this.send.currentPage = this.times;//每次加载的数据截断点包过lazyloading和正常分页
	clearInterval(this.interval);
	this.loading();
	this.updateReplace();
	
}
/**
*	初始化
*/
LazyLoading.prototype.init = function(){
	DataManager.prototype.init.call(this);
	
	this.times = 1;//第一次赋值有用，以后没用了
	this.repeatTimes = $(this._this).attr("pagination");//lazyloading加载次数
	this.loading();
}

/**
*	延迟加载
*@time 加载检测时间
*/
$.fn.LazyLoading = function(options){
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
	DataManager.object[index] = new LazyLoading(opt);
	DataManager.object[index].init();
	var manager = DataManager.object[index];
	DataManager.nLength++;
	return manager;
}


