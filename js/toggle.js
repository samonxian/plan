var $ = {};
if(!$){
	$ = {};
}
else if(typeof $ != 'object'){
	throw new Error('$ already exists and is not an object!');
}
$.trim = function(str) {
  return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
}

 
/* 判断标签是否含有指定的类名 */
$.hasClass = function(obj, value){
	if(obj && obj.nodeType===1 && (' ' + obj.className + ' ').replace(/[\n\t\r]/g, ' ').indexOf(' ' + value + ' ')>-1){
		return true;
	}
	return false;
};
/* 添加类名 */
$.addClass = function(obj, value){
	if(value && typeof(value)==='string'){
		var cs = value.split(/\s+/);
		if(obj && obj.nodeType===1){
			if(!obj.className && cs.length===1){
				obj.className = value;
			}
			else{
				var dc = ' ' + obj.className + ' ';
				for(var i=0, l=cs.length; i<l; i++){
					if(!~dc.indexOf(' ' + cs[i] + ' ')){
						dc += cs[i] + ' ';
					}
				}
				obj.className = $.trim(dc);
			}
		}
	}
};
/* 移除类名 */
$.removeClass = function(obj, value){
	if((value && typeof(value)==='string') || value===undefined){
		var cs = (value || '').split(/\s+/);
		if(obj && obj.nodeType===1 && obj.className){
			if(value){
				var dc = (' ' + obj.className + ' ').replace(/[\n\t\r]/g, ' ');
				for(var i=0, l=cs.length; i<l; i++){
					dc = dc.replace(' ' + cs[i] + ' ', ' ');
				}
				obj.className = $.trim(dc);
			}
			else{
				obj.className = '';
			}
		}
	}
};

//  take_out_p

function take_out_p(){
	var navs = document.querySelectorAll(".take_out-nav a");
	var list = document.querySelectorAll( ".j_dto > li" );

	for( var i = 0; i < navs.length; i++ ) {
		(function(){
			var n = i;
			var li = list[n];
			var status = [ 'fadeOut', 'fadeIn'];
			navs[i].onclick = function(){
				var className = 'ton'+(n+1);
				if( $.hasClass( this, className ) ){
					$.removeClass( this, className );
					$.addClass( li, status[0] );
					$.removeClass( li, status[1] );
					
				} else{
					$.addClass( this, className );
					$.addClass( li, status[1] );
					$.removeClass( li, status[0] );
				}
				return false;
			};
		})(i);
	}
}

//  organizations

function organizations(){
	var academy = document.querySelectorAll( ".academy" );
	
	for( var i = 0; i < academy.length; i++ ) {
		(function(){
			var n = i,
			toggleClass = "showO",
			p = academy[n].parentNode;
			academy[n].onclick = function(){
				if( $.hasClass( p, toggleClass ) ){
					$.removeClass( p, toggleClass );
				}else {
					$.addClass( p, toggleClass );
				}
			};
		})();
	}
}