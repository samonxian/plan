(function ($){
	/**
	*	获取对象整个的html
	*/ 
	$.fn.outerHTML = function() {
		var nowHTML  =this.html();
		var outerHTML = this.html( this.eq(0).clone() ).html();
		this.html(nowHTML);
		return outerHTML;
	};
})(jQuery);