/**
*	判断数组是否包含指定字符
*@param e数组元素
*@param ignore忽略大小写
*/
Array.prototype.contains  = function(e,ignore)  {  
	if(ignore==undefined) ignore = false;
    for(var i=0;i<this.length;i++){  
		if(ignore){
			if(this[i].toLowerCase() == e.toLowerCase()) 
				return true; 
		}else{
			if(this[i] == e) 
				return true; 
		}				
    }  
    return false;  
}  