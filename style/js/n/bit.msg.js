ns.bit.msg = {
	size : "",
	modalId : "modal_",
	modalObj : null,
	modal : function(msg,btns){
		var _this = this;
		_this.modalId = this.modalId + Math.floor(Math.random(10000)*10000000);
		
	    var html = "";
	    html += '<div class="modal fade" id="'+this.modalId+'">';
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
	},
	dialog : function(msg,btns){
		var _this = this;
		this.modal(msg,btns);		
    	_this.modalObj.find(".btn").click(function(){
    		(btns[$(this).data("num")].callback)();	    		
    	});
	},
	alert : function(msg,fn){
		var _this = this;
		var btns = [{text : "确定",callback : function(){
			if(fn) fn(btns[0].text);
			_this.modalObj.modal("hide");
		}}];
		this.dialog(msg,btns);
	},
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
// bMsg.size = "modal-sm";
// bMsg.size = "modal-lg";
// bMsg.alert("确定的舒服舒服的舒服舒服舒服是",function(){
// 	alert(0);
// });
// bMsg.comfirm("sfsf",function(text){
// 	alert(text);
// });