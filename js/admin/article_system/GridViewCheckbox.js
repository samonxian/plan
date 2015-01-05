var GridViewCheckbox = function(selectorString,url){
    var obj = {
        send : {},
        url : url,
        checkboxs : $(selectorString+" .grid_checkbox"),
        select : function(){
            this.checkboxs.attr("checked",true);
        },
        cancel : function(){
            this.checkboxs.attr("checked",false);
        },
        pass : function(ex,action,type){
            var data = {},flag,tr,i=0,pass;
            var $_this = this;
            this.checkboxs.each(function(){
                flag = $(this).attr("checked");
                if(flag){
                    if(!flag) return;
                    tr = $(this).parents("tr");
                    data[i] = tr.attr("data_id");
                    i++;
                    pass = true
                }
            });
            if(!pass) return;
            flag = confirm("你确定要"+action+"！");
            if(flag){
                $_this.send.ids = data;
                $_this.send.examine = ex;   
                $_this.send.ntype = type;   
                $.post(
                    $_this.url,
                    $_this.send,
                    function(html){
                        $(selectorString).html($(selectorString,html).html());
                        $_this.checkboxs = $(selectorString + " .grid_checkbox");
                    }
                );
            }
        }
    };
    return obj;
}