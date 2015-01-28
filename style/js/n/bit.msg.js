ns.bit.msg = {
	size : "",
	modalId : "modal_",
	modalObj : null,
	/**
	*	生成bootstrap 模态框
	*@param [string] msg 提示语
	*@param [object] btns 按钮（包括文字和回调函数）
	*@example 
	*	var btns = [{text : "取消",callback : function(){}},{text : "确定",callback : function(){}}];
	*	this.modal(msg,btns);
	*/
	modal : function(msg,btns){
		var _this = this;
		_this.modalId = this.modalId + Math.floor(Math.random(10000)*10000000);
		
	    var html = "";
	    html += '<div class="modal fade create_php_for_remove" id="'+this.modalId+'">';
	    html += '<div class="modal-dialog '+this.size+'">';
	    html +=	'<div class="modal-content">';
	    html +=	'<div class="modal-body">';
	    html += msg;
	    html +=	'</div><div class="modal-footer">';
	    
	    for(var i in btns){
	    	html +=	'<button type="button" class="btn btn-default" data-num="'+i+'">'+btns[i].text+'</button>';	    	
	    }
	    html +=	'</div></div></div></div>';
	    $("body").append(html);
	    _this.modalObj = $("#"+_this.modalId);
	    _this.modalObj.modal({keyboard: true,show : true});
	    _this.modalObj.find(".btn").click(function(){
    		(btns[$(this).data("num")].callback)();	    		
    	});
	},
	/**
	*	同上modal
	*/
	dialog : function(msg,btns){
		var _this = this;
		this.modal(msg,btns);
	},
	/**
	*	弹出框
	*@param [string] msg 提示信息
	*@param [function] fn 确认回调函数
	*/
	alert : function(msg,fn){
		var _this = this;
		var btns = [{text : "确定",callback : function(){
			if(fn) fn(btns[0].text);
			_this.modalObj.modal("hide");
		}}];
		this.dialog(msg,btns);
	},
	/**
	*	确认框
	*@param [string] msg 提示信息
	*@param [function] fn 确认回调函数
	*/
	comfirm : function(msg,fn){
		var _this = this;
		var btns = [{text : "取消",callback : function(){
			_this.modalObj.modal("hide");
		}},{text : "确定",callback : function(){
			if(fn) fn(btns[1].text);
			_this.modalObj.modal("hide");
		}}];
		this.dialog(msg,btns);
	}
};
bMsg = ns.bit.msg;
