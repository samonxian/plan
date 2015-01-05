var FormSearch = function(selectorString,url,form_id){
    var form = $('#'+form_id);
    var obj = {
        send : [],
        url : url,
        search : function(event){
//            alert(event);
            if(event && event.preventDefault){
                event.preventDefault();
            }else{
                window.event.returnValue = false;//注意加window
            }
            $_this = this;
            
            var data = form.serializeArray();
            $.extend(true,$_this.send,data);
            var i;
            for(data in i){
                $_this.send.push(data[i]);
            }
            $.post(
                $_this.url,
                $_this.send,
                function(html){
                    $('#'+selectorString).html($('#'+selectorString,html).html());
                }
            );
        },
        searchByLetter : function (letter,obj){
            $_this = this;
            var model = letter.split('[');
            var field = model[1].split(']');
            var data = [
                {
                    name:model[0]+'[searchType]',
                    value:'dim'
                },
                {
                    name:letter,
                    value:$(obj).attr('value')
                },
                {
                    name:model[0]+'[ucfirst]',
                    value:field[0]
                }
            ];
//            var data_s = Json.toString(data);
            $_this.send.push(
                {name:model[0]+'[searchType]',value:'dim'}
            );
            $_this.send.push(
                { name:letter,value:$(obj).attr('value')}
            );
            $_this.send.push(
                {name:model[0]+'[ucfirst]',value:field[0]}
            );
            $.post(
                $_this.url,
                $_this.send,
                function(html){
                    $('#'+selectorString).html($('#'+selectorString,html).html());
                }
            );    
        }
    }
    return obj;
}