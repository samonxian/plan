var mask = {
	id :"mask",
	color : "#000",
	opacity:0.5,
	index : 99,
	set:function(){
		this.width =$(document).width();
		this.height = $(document).height();
		this.param = {width:this.width,height:this.height,background:this.color,zIndex:this.index,position:"absolute",left:0,top:0,opacity:this.opacity}
		$("#"+this.id).css(this.param);
	},
	create : function(){
		if(($("#"+this.id).length)){this.show();return false}
		var masked = document.createElement("div");
			masked.id=this.id;
		$('body').append(masked);
		this.set();	
	},
	closed:function(){
	   $("#"+this.id).remove();
	},
	hide:function(){
		if(!($("#"+this.id).length)) return false;
		$("#"+this.id).hide();
	},
	show:function(){
		$("#"+this.id).show();
	},
	center:function(elem){
		var scroll_num = ($(document).scrollTop()),
			$heights = $(document).height(),
			$widths = $(window).width(),
			$e_width = $(elem).width(),
			$windowT = 200+scroll_num,
			$lefts = ($widths-$e_width)/2;
			$(elem).css({left:$lefts,top:$windowT});
	}
}

var tab = {
	class_name:"hover",
	tag :"hover",
	box :"box",
	except:".adorn-line-wb",
	base : function(target,box){//target:触发标签,box下对应容器"div"的
		var class_name = this.class_name;
		var tag = this.tag;
		var except = this.except;
		$(target).live("click",function(){
			if($(this).is("."+class_name)){return false;}
			var name = $(this).attr(tag);
			$(target).removeClass(class_name);
			$(this).addClass(class_name);
			$("#"+name).show().siblings("div:not("+except+")").hide();
			//return false;
		})
	}
}
var setToggle = {
	class_name:"hover",
	base:function(tag,par){
		var hover = this.class_name;
		$(tag).toggle(function(){
			$(this).parents(par).addClass(hover);
		},function(){$(this).parents(par).removeClass(hover)}
		)
	}
}
var g521 = {
	spaceClosed:function(elem){
		$(document).bind("click",function(e){
			var target  = $(e.target);
			if(target.closest(elem).length == 0){
				$(elem).hide();
				$(document).unbind("click");
			}
		})	
	},
	seachXy:function (elem,dom){
                var xy = elem.position();
                $(dom).animate({left:xy.left,top:xy.top},200).show();
        },
	global_seachXy:function (elem,dom){
			var xy = elem.offset();
			$(dom).animate({left:xy.left,top:xy.top},200).show();
		},
	table_author : function(){
		var zValue = 999;
		$(".bbs-table .author .name").each(function(i){$(this).css("zIndex",zValue-i);})
	},
	set_general_val:function(elem){
		$(elem.tag).blur(function(){
			var that = $(this)[0];
			if(that.value==''){
				that.value=elem.word;
				that.className=elem.classed;
			}
		}).focus(function(){
			var that = $(this)[0];
			if(that.value==elem.word){
				that.value='';
				that.className=elem.focus_classed;
			}
		})
	},
	ie6:function(){
		var browser=navigator.appName;
		var b_version=navigator.appVersion;
		var version=b_version.split(";");
		var trim_Version=version[1].replace(/[ ]/g,"");

		if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE6.0"){
		    return true;
		}else{
			return false;
		}
	},
	sayName:function(){
		//console.log(this);
	}
	,
	closedElement:function (elem){
		$(elem).hide();
	},
	reClass:function (elem,name){
		$(elem).removeClass(name);
	},
	elemShow:function (elem,hide_elem,tag){
		this.reClass(hide_elem,tag);
		$(elem).addClass("hover");
	},
	element_toggle:function(elem,tag){
		$(elem,"html,body").click(function(){
			$(tag).toggle();
		});
	},
	set_toggle:function (elem,tag){
		that = this;
	 	$(elem).live("mouseover",function(){
			that.elemShow($(this),elem,tag);
		});
		$(elem).mouseout(function(){
			var get_class = $(this).attr("class");
			if(get_class.indexOf(tag)!=-1){
				that.reClass($(this),tag);
			}
		})
	},
	scrollElem:function(elem,distance){
		$(window).scroll(function(){
			$(elem).css({top:$(window).scrollTop()+distance})
		})
	},
	koordinieren:function (elem,box,x,y){
		var this_x = elem.offset().left-x,
			this_y = elem.offset().top+y;
		$(box).css({left:this_x,top:this_y});
	},
	createMask:function(mask){
		if($("#mask").length){console.log("yes");return false;}
		var str = $("<div id='mask' style='width:"+mask.widths+"px;height:"+mask.heights+"px;background:#ccc;position:absolute;top:0;left:0;z-index:100'>");
		$('body').append(str);
		$('#mask').animate({opacity:mask.opacity},300);
	},
	closedMask:function(trigger,target,removeEle){
		$(trigger).click(function(){
			$('#mask').remove();
			$(target).hide();
			if(removeEle){
				$().remove();
			}
		})
	},
	scroll_to_id:function(id) {
		$('html,body').animate({
			scrollTop : $(id).offset().top
		}, 80);
	},
	elemFocus:function (elem,e_parent,e_class){
		$(elem).focus(function(){
			$(this).parents(e_parent).addClass(e_class)
			.siblings().removeClass(e_class);
		})
		$(elem).blur(function(){
			$(this).parents(e_parent).removeClass(e_class);
		})
	},
	Shadow_box:function(elem){
		var scroll_num = ($(document).scrollTop());
		var $heights = $(document).height(),
			$widths = $(document).width(),
			$windowT = scroll_num<200?200:scroll_num+200,
			$lefts = ($widths-$(elem).width())/2,
			$opacity = 0.4,
			mask = {
				heights:$heights,
				widths:$widths,
				opacity:$opacity,
				backgrounds:'#ccc'
			}
			this.createMask(mask);
			$(elem).show();
			$(elem).css({left:$lefts,top:$windowT});
			this.scrollElem(elem,200);
			window.onresize = function(){
				var $heights = $(document).height(),
					$widths = $(window).width(),
					$windowT = 200,
					$lefts = ($widths-$(elem).width())/2;
					//console.log($widths);
					$("#mask").css({width:$widths});
					$(elem).css({left:$lefts,top:$windowT});
			}
	},
	elemFocus:function (elem,e_parent,e_class){
		$(elem).focus(function(){
			$(this).parents(e_parent).addClass(e_class)
			.siblings().removeClass(e_class);
		})
		$(elem).blur(function(){
			$(this).parents(e_parent).removeClass(e_class);
		})
	}
}

var overText = false, overBox = false;
var isOver = function() { return overText || overBox;}

var playerList = {};
function list_data(data,elem,c_id){
	var links = data.data.detail_url;
		var players = data.data.players;
		var titles = $(elem).attr('server_name');
		//console.log(titles)
		var list = [];
		if(players){
			$.each(players,function(key,val){
					list.push('<li'+(val.is_guest?' class="guest"':'')+'><div class="username">'+(val.is_guest?val.user:'<a target="_blank" href="'+val.info_url+'">'+val.user+'</a>')+'</div><div class="border"><div class="detail"><div class="about"><span class="titel">称号<em>'+val.title+'</em></span><span class="from">来自<em>'+val.province+'</em></span></div><div class="set"><a class="add" href="javascript:void(add_friend('+val.id+'))"></a><a class="msg" href="javascript:void(outmsg.shows(\''+val.user+'\','+val.id+'))"></a></div></div></div></li>')
			})
		}
		var more_link = players.length>4?'<div class="more"><s class="more-arrow"></s><a href="'+links+'">更多</a></div>':"";
		var rList = list.length>0?list.join(''):"暂时没有玩家";
		var list_content = '<div class="title">'+titles+'</div><div class="list"><ul>'+rList+'</ul></div>'+more_link;
			playerList[c_id] = list_content;
			$('.player-list .box').html(playerList[c_id]);
			g521.set_toggle('.player-list li','hover');
}
function getList(elem){
	var server_id,s,list_z=0;
	if($(elem).attr("server_id")){
		s = $(elem).attr("server_id");
		list_z=1;
	}else{
		s = $(elem).attr("game_id");
	}

	var c_id = "c_"+s;
	if(playerList[c_id]){
		$('.player-list .box').html(playerList[c_id]);	
	}else{
		if(list_z){
			$.get(
				url + 'user/players/',
				{
					server_id : s
				},
				function(data){
					list_data(data,elem,c_id);
				}
			)
		}else{
			$.get(
				url + 'user/players/',
				{
					game_id : s
				},
				function(data){
					list_data(data,elem,c_id);
				}
			)
		}
	}

}
var add_friend = function(id){
	if(user_login_check()){
		set_ajax({type:"GET",url:("/user/addfriend/?player_id="+id)},function(msg){
			if(msg.status==1){
				outMsg(msg.msg);
				return true;
			}else{
				alert(msg.msg)
			}
		},{completes:function(){}});
	}
	
}
var domBox = function (elem1,elem2,x,y){	
	$(elem1).mouseenter(function(){
		var a = $(this);
		var b = elem2;
		overText = true;
		setOverBox = setTimeout(function(){g521.koordinieren(a,b,x,y);$(b).show();getList(a)},200);	
	})
	$(elem1).mouseleave(function(){
		overText = false;
		clearTimeout(setOverBox);
		setTimeout("isOver() || g521.closedElement('"+elem2+"')",100); 
	})
	$(elem2).mouseenter(function(){
		overBox = true;
	})
	$(elem2).mouseleave(function(){
		overBox = false;
		setTimeout("isOver() || g521.closedElement('"+elem2+"')",100); 
	})
}


function count(o){
    var s = typeof o;
    if(s == 'string'){
        return o.length;
    }else if(s=='object'){
        var n=0;
        for(var i in o){
            n++;
        }
        return n;
    }
    return false;
}


function setValue(elem){
	$(elem+"[type=password]").parent(".text-box").click(function(){
		$(this).children("input").focus().siblings(".pwd-words").hide();
	})
	$(elem+"[type=password]").focus(function(){
		$(this).siblings(".pwd-words").hide()
	})
	$(elem+"[type=password]").blur(function(){
		if($(this).val()==""){
			$(this).siblings(".pwd-words").show();
		}
	})
	$(elem+"[type=password]").change(function(){
		$(this).siblings(".pwd-words").hide();
	})
	$(elem+"[type=text]").focus(function(){
		if($(this).val()==$(this).attr("role")){
			$(this).val("");
		}
		if($(":has(empty)",this)){
			$(this).removeClass("empty");
			$(this).addClass("on");
		}	
	})
	$(elem+"[type=text]").blur(function(){
		if($(this).val()==""){
			if($(":has(on)",this)){
				$(this).removeClass("on");
			}
			$(this).val($(this).attr("role")).addClass("empty");
		}
	})
}

$(document).ready(function(){
	domBox('.table-box .players a','.player-list',156,20);
	$('.bbs-table .author').live('mouseover mouseout',function(event){
		if(event.type=='mouseover'){
			$(' .author-box',this).show();
			}else{
				$(' .author-box',this).hide();
			}
	})
	
	$('.open dl').hover(function(){
		$(this).children('dt').hide().next('dd').show();;	
	},
	function(){
		$(this).children('dt').show().next('dd').hide();	
	})

	var re_box = function(elem){
		return elem.parents().parents().siblings(".re-box");
	}

	$(".re-div .re:not(:first)").click(function(){
		var a = $(this),reBox = re_box(a);
		a.hide().siblings(".back").slideDown(100,function(){
			reBox.slideDown();
		})
		return false;
	});

	$(".re-div .back").click(function(){
		var a = $(this);
		var reBox = re_box(a);
		reBox.slideUp(400,function(){
			a.hide(200,function(){
					$(this).siblings(".re").show();
					var li_length = $(" li",reBox).length;
					var re_length = $(this).siblings(".re").html().length<=2;
					if(li_length>0 && re_length){
						var word = $(this).siblings(".re").html()+"("+li_length+")";
						$(this).siblings(".re").html(word);
					}
				}
			)

		});
		return false;
	})
	$(".say .say-btn").click(function(){
		var text_html = $(this).parents(".say").siblings(".say-box").children("textarea").val();
		//console.log(text_html);
		if(text_html){
			$(this).parents(".say").siblings(".say-box").children("textarea").val("");
		}else{
			$(this).parents().siblings(".say-box").toggle();
		}
		return false;
	})
	$(".re-btn").click(function(){
		 var html_text = $(this).parents().siblings("p").find(".name").html();
		 $(this).parents("ul").siblings(".say-box").show().children("textarea").val(html_text);
		 return false;
	})
})

function qqAlarm(title,qqurl,time){
	window.open('http://qzs.qq.com/snsapp/app/bee/widget/open.htm#content=' + encodeURIComponent(title) + '%0D%0A开启:' + encodeURIComponent(qqurl) +'&time=' + encodeURIComponent(time) +'&advance=0&url=' +encodeURIComponent(qqurl));
}

var exp = {
		key:"exp_line",
		box:"model-box",
		line:450,//经验条长度
		total:180,//用户目前总经验值
		pre:80,//上一级所需经验值
		nexts:200,//下一级所需经验值	
		box_gap:56,	
		per : function(){
			var need = this.nexts-this.pre,
				now = this.total - this.pre;
			return (now/need).toFixed(2);
		},
		line_move : function(){
				exp.per_num = this.per();
			var this_width = this.per_num * this.line,
				key_width = this_width+"px",
				box_left = this_width - this.box_gap+"px",
				box = this.box;
			$("#"+this.key).animate({width:key_width},"slow",function(){
				$("#"+box).fadeIn(500,function(){$(this).animate({left:box_left},"slow")})
			});
			
		}
	}

function setList(){}
/**
*	this.tag//需要隐藏的目标列表集合开始数
	this.num = msg.num-1-(msg.other_num||0);//显示的数目(other_num为一些额外不隐藏的数量)
	this.show_word = msg.show_word||"查看所有";//显示时的按钮文字
	this.hide_word = msg.hide_word||"收起内容";//收起时的按钮文字
	this.class_name = msg.class_name;//增加删除的css名称
	this.targets = msg.targets;//按钮名字
	this.other = msg.other;//不隐藏的元素序号。
**/
setList.prototype.reset = function(msg){
	var _this = this;

	for(key in msg){
		this[key] = msg[key];
	}
	if(this.other){
		this.other = ":"+this.other;
	}else{
		this.other = "";
	}
	this.num = msg.num-1;//显示的数目
	this.show_word = msg.show_word||"查看所有";//显示时的按钮文字
	this.hide_word = msg.hide_word||"收起内容";//收起时的按钮文字
	this.flag = false;

	_this.flag?_this.shows():_this.hides();

	$(this.targets).live("click",function(){
		if($(_this.tag).length > _this.num){
			_this.flag?_this.shows():_this.hides();
		}
		return false;
	});
}
setList.prototype.hides = function(){
	$(this.tag+':gt('+(this.num)+')').not(this.other).hide();
	$(this.targets).addClass(this.class_name).html(this.show_word);
	this.flag=true;
}
setList.prototype.shows = function(){
	$(this.tag+':gt('+(this.num)+')').show();
	$(this.targets).removeClass(this.class_name).html(this.hide_word);
	this.flag=false;
}
var outmsg = {//弹出发送消息框
	in_body:0,
	player_name:"",//带入的用户名
	player_id:0,
	msgBox :function(){ return '<div class="user-msg-box aBox alpha_bg" style="display:none"><div class="box"><div class="title"><span class="right closed">[关闭]</span>给 '+this.player_name+' 消息</div><div class="box"><form class="for-user-msg" action=""><p class="for"><label for="">收件人:</label><span class="name">'+this.player_name+'</span></p><div class="text"><label for="texts">内　容：</label><textarea  name="msg" id="texts" cols="30" rows="10"></textarea></div><div class="submits"><input value="发送" type="button" onclick="outmsg.send($(\'#texts\').val())" class="submit" /></div></form></div></div></div>'},
	send:function(msg){//发送消息
		$.post(
				url+'user/sendmsg/',
				{send_player_id:this.player_id,msg:msg},
				function(data){
					if(data.status==1){
						outMsg(data.msg);
						$(".user-msg-box").remove();
						$('#mask').remove();
					}else{
						alert(data.msg);
					}
				},
				'json'
				
		);
	},
	shows:function(name,id){//显示并绑定关闭按钮
		if(user_login_check()){
			var that = this;
			this.player_name=name;
			this.player_id=id;
			if(this.in_body==1) return false;
			var appendMsg = $("body").append(this.msgBox());
			g521.Shadow_box(".user-msg-box");
			this.in_body=1;
			$(".user-msg-box .closed").click(function(){
				$(".user-msg-box").remove();
				$('#mask').remove();
				that.in_body=0;
			});
		}
	}

}
var checkbox = {
		class_name : ".setBox",//按钮的class
		get_target : "data",//对应的绑定参数
		set_target : "dd",//目标input的父元素
		check_all:function(){
			var tag = this.set_target,
				data = this.get_target;
			$(this.class_name).live("click",function(){	
				var thisTarget = $(this).attr(data),
					thisCheck  = $(this)[0].checked;
				$(tag+" input["+data+"="+thisTarget+"]").each(function(){
					$(this)[0].checked = thisCheck;
				})
			})
		}
	}
function receive_card(server_id){
	$.get(
			url + 'user/card/',
			{
				server_id : server_id
			},
			function(data) {
				var datas = data.data;
				var dialogBox = null;
				if (data.status !== 1) {
					alert(data.msg);
				} else {
					new Dialog(
						'<p style="margin-bottom:5px;font-size:14px;font-weight:bold;">领取成功！</p><p style="overflow:hidden;_zoom:1;"><span class="left">卡号为：</span><strong style="color:#b1080d;" class="left" id="card_number">'
								+ datas.card+'</strong><span style="cursor:pointer;color:#0073b7;margin-left:5px;" class="left" onclick="copyToClipboard(&quot;card_number&quot;)">复制卡号</span></p><div style="border-top:1px solid #b1080d;padding-top:3px;margin-top:5px;">'+datas.desc+'</div><p><a target="_blank" href="'+datas.href+'">链接地址</a></p>', {
							modal : false, 
							// showTitle:false,
							// draggable:false, // 是否移动
							time : 900000
						// 自动关闭时间
						}).show();
				}
			});
}
function copyToClipboard(theField) {
  var tempval=document.getElementById(theField);
  var signal=false;
  if(window.clipboardData){
	therange=tempval.innerHTML;
	window.clipboardData.setData('text',therange);
	signal=true;
  }else{
	alert('您的浏览器不支持粘贴功能，请使用Ctrl+V来进行操作。');
  }
  if(signal){
	alert('复制成功！');
  }
}
function user_login_check(){
	if(!user.guest){
		return true;
	}else{
		login_show();
		return false;
	}
}
/**
* 滑出消息框
*/
function outMsg(msg){
	$("#outMsg").remove();
	var template='<div id="outMsg"><span class="left-border"></span><span class="event">'+msg+'</span><span class="right-border"></span></div>';
		$("body").append(template);
		mask.center("#outMsg");
		$("#outMsg").fadeIn(500,function(){
			$(this).animate({top:($("#outMsg").offset().top-50),opacity:'hide'},1000)
		})
}

/**
**弹出登陆框
*/
function login_show(){
	var login_window='<div class="login-window aBox alpha_bg" style="display:none"><div class="box"><div class="title"><h3 class="left">登录521G，一起玩游戏！</h3><a class="right closed" href="javascript:void(0)"></a></div><div class="form"><form action="" onsubmit="return !login_521g()"><div class="input-item"><span class="user"><input name="username" id="w_user_name" type="text" /><s></s></span></div><div class="input-item"><span class="pwd"><input id="w_pwd" name="password" type="password" /><s></s></span></div><div class="safe"><span class="auto-login"><input type="checkbox" checked="checked" value="1" id="auto-login"><label for="auto-login"> 自动登录</label></span></div><div class="btn"><input id="w_submit" class="submit" value="" type="submit" /></div></form></div><div class="help"><a class="forget-pwd" href="http://passport.521g.com/repwd.html">忘记密码</a>|<a href="http://passport.521g.com/reg.html">免费注册</a></div></div></div>';
	if(user.login_window){
		g521.Shadow_box(".login-window");
	}else{
		$("body").append(login_window);
		g521.Shadow_box(".login-window");
		g521.elemFocus('.login-window .input-item input','.input-item','hover');
		g521.closedMask(".login-window .closed",".login-window");
		user.login_window = true;
		$('.login-window .input-item input').eq(0).focus();
	}
}
function login_521g(){
	//console.log(231213);
	var name = $("#w_user_name").val(),
		pwd = $("#w_pwd").val(),
		remember = $("#auto-login").attr("checked")=="checked"?1:0;
		if(name==""||pwd==""){
			alert("用户名/密码格式不正确!");
			return false;
		}
		set_ajax({type:"POST",url:("/user/login/"),data:("user="+name+"&pwd="+pwd+"&remember="+remember)},function(msg){
			if(msg.status==1){
				location.href=window.location.href;
			}else{
				alert("用户名或密码不正确!");
				return false;
			}
		},{completes:function(){}});
	return true;
}

/**
**召集令
**/
function zjl_detail(){};
zjl_detail.prototype.initWithMsg=function(msg){
	var zjl = this;
	zjl.game_name =msg.data.game_name;
	zjl.time = msg.data.time;
	zjl.game_detail = msg.data.title; 
}
var zjls = new zjl_detail();
function add_zjl(numbers){
	$("#convene-box").remove();
	var zjl ='<div id="convene-box" class="convene-box aBox alpha_bg" style="display:none"><div class="box"><div class="title"><h3 class="left">发召集令，一起玩游戏！</h3><a class="right closed" href="javascript:void(0)"></a></div><form name="conven_table" action=""><div class="item"><span class="label">标题:</span><span><em>[${title}]</em>${name} 邀大家一起玩《${game_name}》</span></div><div class="item"><span class="label">一起玩:</span><span class="game">${game_detail} <em class="time">${time}</em></span></div><div class="item"><span class="label">邀好友</span><span class="einladen"><input type="radio" value="1" checked="checked" id="einladen" name="einladen" /><label for="einladen">邀请好友一起玩</label></span><span class="einladen"><input type="radio" value="0" id="no-einladen" name="einladen" /><label for="no-einladen">不邀好友</label></span></div><div class="item setinput"><span class="label">角色名:</span><div class="input"><input class="game-name" type="text" /><span class="help-msg">在该服使用的游戏角色名</span></div></div><div class="item setinput"><span class="label">说明:</span><div class="input"><textarea name="messages" cols="30" rows="10"></textarea><span class="help-msg">例:进入游戏后M我,加好友,一起玩!</span></div></div><input class="submit" id="zjl_sub" value="" type="text"></form></div></div>';
	set_ajax({type:"GET",url:("/user/zjl/?server_id="+numbers)},
			function(msg){
				var types = msg.status;
				switch(types){
					case 1:

						zjls.initWithMsg(msg);
						zjls =$.extend(user,zjls);
				        zjl_html = replact(zjl, zjls);
				        $("body").append(zjl_html);
				        g521.Shadow_box(".convene-box");
				        g521.closedMask(".convene-box .closed",".convene-box","#convene-box");
				        $("#zjl_sub").click(function(){
				        	var server_id = numbers,
				        		is_send = $('input[name="einladen"]:checked').val(),
				        		role = $("#convene-box .game-name").val(),
				        		desc = $("#convene-box textarea").val();
				        		if(role==""||desc==""){
									alert("角色名/说明不能为空!");
									return false;
								}
				        		set_ajax({type:"POST",url:("/user/zjl/"),data:("server_id="+server_id+"&is_send="+is_send+"&role="+role+"&desc="+desc)},function(msg){
				        				var back_msg = msg.status,
				        					back_url = msg.data.bbs_url;
				        				switch(back_msg){
				        					case 1:
				        						location.href=back_url;
				        						break;

				        				}
									},{
										completes:function(){ }
									   }
								);
				        })
				    	break;
				    case 0:
				    	login_show();
				    	break;
				    case -1:
				    	login_show();
				    	break;
				    case -2:
				    	alert(msg.msg);
				    	break;
				    case -3:
				    	alert(msg.msg);
				    	break;
				}
			},
				{completes:function(){}}
			);

}

var choose_time = function(time){
	if(time==='all'){
		$(".t-page-num li").removeClass("hover");
		$("#today-open dd ul").show();
		return false;
	}
	$("#today-open dd ul").hide();
	$("#today-open dd ul[time="+time+"]").show();
}


function addFavorite(){
    if (document.all){
        try{
            window.external.addFavorite(window.location.href,document.title);
        }catch(e){
            alert( "加入收藏失败，请使用Ctrl+D进行添加" );
        }
        
    }else if (window.sidebar){
        window.sidebar.addPanel(document.title, window.location.href, "");
     }else{
        alert( "加入收藏失败，请使用Ctrl+D进行添加" );
    }
}

function setHomepage(){
    if (document.all){
        document.body.style.behavior='url(#default#homepage)';
          document.body.setHomePage(window.location.href);
    }else if (window.sidebar){
        if(window.netscape){
            try{
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }catch (e){
                alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true" );
            }
        }
        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
        prefs.setCharPref('browser.startup.homepage',window.location.href);
    }else{
        alert('您的浏览器不支持自动自动设置首页, 请使用浏览器菜单手动设置!');
    }
}
function getLength(str){
    var len = str.length;
    var reLen = 0;
    for (var i = 0; i < len; i++) {       
        if (str.charCodeAt(i) < 27 || str.charCodeAt(i) > 126) {
            // 全角   
            reLen += 2;
        } else {
            reLen++;
        }
    }
    return reLen;   
}