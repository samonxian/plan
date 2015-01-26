
/**
*	获取外部html
*/	
jQuery.fn.outerHtml =  function(){
	$(this).wrap("<div></div>");
	var parent = $(this).parent();
	var outerHtml = parent.html();
	parent.replaceWith($(this));
	return outerHtml;
}
/**
*	向html中插入数据
*@param jsonData json对象（数据库数据）
*@param before 延伸类型，空为后延伸，为“_before”是前延伸
*@param repeatHTMLtype 预留嵌套插入数据起冲突，默认为空
*@attr action ajax提交目标页面
*@model 
*	<div action="main/index">
*		<div>test</div><!--不循环-->
*		<div class="repeatHTML">
*			<span>{id}</span>
*			<span>{title}</span>
*		</div>
*	</div> 
*	其中类repeatHTML代表循环的目标
*	{id}和{title}标签是代表字段名数据存放处
*/	
jQuery.fn.insertData = function(jsonData,repeatHTMLtype,before){
	if(before==undefined) before = '';
	
	if(repeatHTMLtype==undefined) repeatHTMLtype = '';
	
	var $_this = $(this);
	var removeHtml_obj = "repeatHTML" + repeatHTMLtype + before;
	var child = $("."+removeHtml_obj,$_this);
	// console.log("."+removeHtml_obj);
	child.show();
	child.removeClass(removeHtml_obj);
	child.addClass("removeHtml");//数据循环元素，第二次循环要移除的标识
	//<--中间渠道
	var childOne = $(child[0]);
	childOne.wrap("<div></div>");
	var parent = childOne.parent();
	
	//多个reapeatHTML处理
	for(var j=1;j<child.length;j++){
		parent.append($(child[j]).outerHtml());
		$(child[j]).remove();
	}
	
	//中间渠道-->
	//<--储存repeatHTML 
	var repeatHTMLclone = parent.clone(true);
	var rChild = repeatHTMLclone.children();
	rChild.hide();
	if($(".repeatHTML"+repeatHTMLtype,$_this).html()==undefined){
		rChild.addClass("repeatHTML"+ repeatHTMLtype);//第二次以上后续延伸的标识
		rChild.removeClass("removeHtml");
		
		parent.after(repeatHTMLclone.html());//后续延伸
	}	
	if($(".repeatHTML" + repeatHTMLtype + "_before",$_this).html()==undefined){
		rChild.addClass("repeatHTML" + repeatHTMLtype + "_before");//第二次以上前面延伸的标识
		rChild.removeClass("repeatHTML" + repeatHTMLtype);//是这样的
		rChild.removeClass("removeHtml");//是这样的
		parent.before(repeatHTMLclone.html());//前面延伸
	}
	//储存repeatHTML,以便以后使用 -->
	var htmlData = parent.html();	
	var result = '';
	var fields = [];
	var field_name;
	for(var i in jsonData){
		result += htmlData.replace(/\{\$([^}]+)\}/ig, function(){
			field_name = arguments[1];
			var data = jsonData[i][field_name];			
			return data;
		}); 
		
	}	
	parent.replaceWith(result);
}
/**
*	清空指定input、textarea
*/
jQuery.fn.cleanToEmpty = function(){
	$("input[type=text]",$(this)).val("");
	$("textarea",$(this)).val("");
}
/**
*	获取指定input、textarea、select值，即表单值
*/
jQuery.fn.getInputVal = function(){
	var name = "";
	var data = {};
	$("input",$(this)).each(function(){
		name = $(this).attr("name");
		var val = $(this).val();
		if(val!="")
			data[name] = val;
	});
	$("textarea",$(this)).each(function(){
		name = $(this).attr("name");
		var val = $(this).val();
		if(val!="")
			data[name] = val;
	});
	$("select",$(this)).each(function(){
		name = $(this).attr("name");
		var val = $(this).val();
		if(val!="")
			data[name] = val;
	});
	return data;
}

