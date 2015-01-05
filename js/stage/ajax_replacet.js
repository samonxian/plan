var user = {};
var replact = function (str, param) {
	var start = 0, 
	length = str.length;
    var result = '';
    while(start < length) {
        var p1 = str.indexOf('${', start);
        if(p1 == -1) {
            result += str.slice(start);
            start = str.length;
        } else {
            var p2 = str.indexOf('}', p1);
            if(p2 != -1) {
                    //console.log("p1:",p1,"p2:",p2)
                var name = str.slice(p1, p2).slice(2);
                result += str.slice(start, p1); result += param[name] || '';
                start = p2 + 1;
            } else {
                result += str.slice(start);
                start = length;
            }
        }
    }
    return result;
}
function set_ajax(url, callback, es) {
    $.ajax({
        type:url.type,
        url:url.url,
        dataType:"json",
        data:url.data||'',
        beforeSend:function(){
            if(es.before){
                es.before();
            }
        },
        success : function(msg) {
            if(msg=='')return false; 
            try{
                    if(callback){
                        callback(msg);
                    }else{
                        //console.log("false");
                    }
            } catch(e) {
            }
        },
        complete:function(){
            if(es.completes){
                es.completes();
            }
        }
    })
}
var init_starts = function(values,key,set){
    if(values[key]){
        clearInterval(set_bbs_clock);
        set();
    }
}
var load_ajax = function(val){
    val = Array.prototype.slice.call(arguments, 0).join(',');
    set_bbs_clock = setInterval("init_starts("+val+")",100)
}
$(function(){
    /*
     * user 对象定义
     * 头部ajax
     */
    function userFun() {
    }
    userFun.prototype.initWithMsg = function(msg) {
        var player = msg.data.player;
        user.id = player.id;
        user.gd = player.play_games;
        user.bbs = player.in_bbs;
        user.small = player.small_img;
        user.player_msg = player.num_user_msg||"0";
        user.sys_msg = player.num_system_msg||"0";
        user.msg_num = (player.num_user_msg+player.num_system_msg)||"0";
        user.name = player.user;
        user.title = player.title;
        user.guest = player.is_guest;
        user.tips  = [];
        user.bar = function(){
            var list ='';
            if(user.bbs){
                $.each(user.bbs,function(num,val){
                    list+='<li><a target="_blank" href="'+val.forum_url+'">'+val.forum_name+'吧</a></li>'
                })
            }
            return list||"暂时没有内容";
        }();
        user.played_list = function(){
            var list ='';
            if(user.gd){
                $.each(user.gd,function(num,val){
                    list+='<li><a target="_blank" href="'+val.detail_url+'"><span class="left">'+val.game_name+'</span><span class="right">'+val.operator_name+'</span></a></li>'
                })
            }
            return list||"还没有任何游戏";

        }();
        user.game_title = user.guest?"我玩过的游戏":"我逛过的江湖吧";
        user.my_list = function(){
            var list = '';
            if(!user.guest){
                return user.bar;
            }else{
                if(user.gd){
                    $.each(user.gd,function(num,val){
                        list+='<li><a target="_blank" href="'+val.detail_url+'">'+val.operator_name+'《'+val.game_name+'》</a></li>'
                    })
                }
                return list||"暂时没有内容";
            }
        }();
        user.tip = function(){
            if(player.tip){
                $.each(player.tip,function(num,val){
                    user.tips.push(val);
                })
            }
        }()
    }


    var users = new userFun();// 如果user 在其他地方没有使用到可以在 user.initWithMsg 那里临时定义
    var template = '<div id="played-list" class="played right"><span class="left rBox"><s></s>${game_title}<b></b></span><ul class="left">${my_list}</ul></div>';

    var logined_temp = '<div class="logined"><ul class="top-list"><li><span class="user rBox"><s></s>[${title}] <a href="http://www.521g.com/center">${name}</a><b></b></span></li><li class="i-bbs"><a href="http://www.521g.com/center/thread" class="rBox"><s></s>我的帖子</a></li><li class="items" id="i-played"><a style="margin:0 5px" class="i-played rBox" href="http://www.521g.com/center/played"><s></s>玩过的游戏<b></b></a><div class="top-msg aBox alpha_bg"><div class="arrow"></div><div class="box" id="i-played"><ul>${played_list}</ul></div></div></li><li id="i-msg" class="items"><a class="i-msg rBox" href="http://www.521g.com/center/player_msg/"><s></s>消息<em class="orange">(${msg_num})</em></a><div class="top-msg aBox alpha_bg"><div class="arrow"></div><div class="box" id="i-msg"><ul><li><a href="http://www.521g.com/center/player_msg"><span class="left">玩家消息</span><span class="right">${player_msg}</span></a></li><li><a href="http://www.521g.com/center/system_msg"><span class="left">系统消息</span><span class="right">${sys_msg}</span></a></li></ul></div></div></li><li><a href="http://www.521g.com/user/logout" class="exit rBox"><s></s>退出</a></li></ul></div>';

    set_ajax({type:"GET",url:"/user/status/"}, function(msg){
        users.initWithMsg(msg);
        if(!user.guest){
            $('#head_login').html(replact(logined_temp, user));
        }       
    },{completes:function(){
        userTips();
        if(load_ajax){
            clearInterval(load_ajax);
        }
        if($('#my521 .title')){
            $('#my521 .title').append(replact(template, user))
        }
      }
    });
    function userTips(){
        var tip_nums=0;
        var tips_total=user.tips.length
        if(tips_total>0){ 
            tip_nums_set = setInterval(function(){outMsg(user.tips[tip_nums]);tip_nums++;if(tips_total==tip_nums){clearInterval(tip_nums_set)}},1500);
        }
    }
})