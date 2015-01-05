<!--
/*
 Subsite login service script 
 Version 2013.410
 Woody @ 2013.4.22
*/
String.prototype.replaceAll=function(s1,s2)
{
	var demo=this;
	while(demo.indexOf(s1)!=-1)
		demo=demo.replace(s1,s2);
	return demo;
}

//Enc.js

function Enc(){_keyStr="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";this.encode=function(input){var output="";var chr1,chr2,chr3,enc1,enc2,enc3,enc4;var i=0;input=_utf8_encode(input);while(i<input.length){chr1=input.charCodeAt(i++);chr2=input.charCodeAt(i++);chr3=input.charCodeAt(i++);enc1=chr1>>2;enc2=((chr1&3)<<4)|(chr2>>4);enc3=((chr2&15)<<2)|(chr3>>6);enc4=chr3&63;if(isNaN(chr2)){enc3=enc4=64;}else if(isNaN(chr3)){enc4=64;}
output=output+
_keyStr.charAt(enc1)+_keyStr.charAt(enc2)+
_keyStr.charAt(enc3)+_keyStr.charAt(enc4);}
output=output.replaceAll('=','_');output=output.replaceAll('+','.');output=output.replaceAll('/','-');return output;}
this.decode=function(input){var output="";var chr1,chr2,chr3;var enc1,enc2,enc3,enc4;var i=0;input=input.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(i<input.length){enc1=_keyStr.indexOf(input.charAt(i++));enc2=_keyStr.indexOf(input.charAt(i++));enc3=_keyStr.indexOf(input.charAt(i++));enc4=_keyStr.indexOf(input.charAt(i++));chr1=(enc1<<2)|(enc2>>4);chr2=((enc2&15)<<4)|(enc3>>2);chr3=((enc3&3)<<6)|enc4;output=output+String.fromCharCode(chr1);if(enc3!=64){output=output+String.fromCharCode(chr2);}
if(enc4!=64){output=output+String.fromCharCode(chr3);}}
output=_utf8_decode(output);return output;}
_utf8_encode=function(string){string=string.replace(/\r\n/g,"\n");var utftext="";for(var n=0;n<string.length;n++){var c=string.charCodeAt(n);if(c<128){utftext+=String.fromCharCode(c);}else if((c>127)&&(c<2048)){utftext+=String.fromCharCode((c>>6)|192);utftext+=String.fromCharCode((c&63)|128);}else{utftext+=String.fromCharCode((c>>12)|224);utftext+=String.fromCharCode(((c>>6)&63)|128);utftext+=String.fromCharCode((c&63)|128);}}
return utftext;}
_utf8_decode=function(utftext){var string="";var i=0;var c=c1=c2=0;while(i<utftext.length){c=utftext.charCodeAt(i);if(c<128){string+=String.fromCharCode(c);i++;}else if((c>191)&&(c<224)){c2=utftext.charCodeAt(i+1);string+=String.fromCharCode(((c&31)<<6)|(c2&63));i+=2;}else{c2=utftext.charCodeAt(i+1);c3=utftext.charCodeAt(i+2);string+=String.fromCharCode(((c&15)<<12)|((c2&63)<<6)|(c3&63));i+=3;}}
return string;}}


var _login_flag = 0; 
var BASE_URL = 'http://me.07073.com';
var SERVICE_URL = BASE_URL + '/service';

$.ajaxSetup({ 
	cache: true
}); 

function json_get_login_stauts()
{
	try {
		$.getScript(SERVICE_URL + "/jsonLoginStauts/", function(){

			$('#ancl').html('<p><a href="'+userinfo.notice_url0+'" target="_blank">'+userinfo.notice0+'</a></p><p><a href="'+userinfo.notice_url1+'" target="_blank">'+userinfo.notice1+'</a></p>');
			$('#an').show();
			announcement();
			if(userinfo.islogin>0)
			{
				$('.di_reg').hide(); 
				$('.eixt,.user_name,.footmark').show();
				$('.user_name img').attr('src', userinfo.a);
				$('.user_name a').attr('href', BASE_URL).text(userinfo.username);
				if(parseInt(userinfo.m)>0)
				{
					$('.user_name_mail').show();
					
					$('.user_name_mail a').attr('href', BASE_URL+'/msg/unread/');
					$('#msg_t').text(userinfo.m);
					$('.user_name_mail1').show();
				}
				$('#u_l').text(userinfo.l);
				$('#u_c').text(userinfo.c);
				$('#uihome').attr('href', BASE_URL);
				$('#u_t').text(userinfo.t);
				$('.footmark_boxMid_a a').each(function(){
					if($(this).attr('href').indexOf('http')==-1)
						$(this).attr('href',BASE_URL + $(this).attr('href'));
				});
				$('a.taska').attr('href',BASE_URL + $('a.taska').attr('href'));
				$('.cont_user2').hide(); 
				$('.cont_user1').show();
				$('#con_ava').attr('src', userinfo.i);
				$('.cont_user1 dl dt a').attr('href', BASE_URL);
				$('.cont_user1 dl dt i a').text(userinfo.username);
				$('#fav_arc').html(userinfo.favarc);
				$('#recomm_arc').html(userinfo.recfavarc);
				$('#login_form').hide();
				_login_flag = 1;
				try{
					if(funcName && typeof(eval(funcName))=="function"){
						funcName(_login_flag);
					}
				}catch(e){

				}
			}
			else
			{
				_login_flag = 0;
				$('.eixt,.user_name,.footmark').hide(); 
				$('.user_name_mail,.user_name_mail1').hide(); 
				$('.di_reg').show();
				$('.cont_user2').show(); 
				$('.cont_user1').hide();
				$('#_password').attr('value','');
				$('#ctips').css('color', 'green').text('');
				try{
					//hook other functions
					if(funcName && typeof(eval(funcName))=="function"){
						funcName(_login_flag);
					}
				}catch(e){

				}
			}

		});
	} catch(e) {
		
	}
}
 
var cur_flag = 1;
function json_api_login_form()
{
	var container = $('#top1_banner');
	if($('#login_form').length<1)
	{
		container.after('<div class="user_win1" id="login_form"></div>');
	}
	var loginFormHtml = container.data('loginHtml');
	$('#login_form').hide();
	if(typeof(loginFormHtml) == 'undefined' || !loginFormHtml)
	{
		$.getScript(SERVICE_URL + "/jsonLoginForm/", function(){
			try{
				container.data('loginHtml', loginHtml.data);
				$('#login_form').html(loginHtml.data).show();
			}catch(e){};
		});
		return false;
	}
	$('#login_form').html(loginFormHtml).show();
	return false;
}

function con_login_form(){

}

function json_api_reg_form()
{
	document.cookie = "from_url="+ escape (location.href)+';domain=.07073.com;path=/';
	window.location.href = BASE_URL + '/center/register/';
}

var isLogining = 0;
function do_json_login()
{
	var e = new Enc();
	if(isLogining==1){
		return false;
	}
	var username = $('#_username').val();
	var password = $('#_password').val();
	if(username=='' || username=='请输入您的帐号' ||password=='')
	{
		alert('帐号和密码不能为空!');
		return false;
	}
	/*
	if(/.*[\u4e00-\u9fa5-@^|]+.*$/.test(username)) 
	{
		document.cookie = 'cookie___='+escape(username)+';domain=.07073.com;path=/';
		username = 'cookie___';
	}
	*/
	always = $("#_always").attr("checked") ? 1 : 0;
	isLogining = 1;
	$('#login_href').hide();
	$('#tips').css('color', 'green').text('请稍等，正在登录中……');
	$('#ctips').css('color', 'green').text('请稍等，正在登录中……');
	//var login_result = { stauts : -1 };
	$.getScript(SERVICE_URL + "/jsonLogin_/"+e.encode(username)+"/"+e.encode(password)+"/"+always+"/r"+new Date().getMilliseconds(), function(data){
		isLogining = 0;
		if(parseInt(login_result.stauts,10)<1){
			//login failure
			$('#tips').hide();
			$('#login_href').show();
		}
		if(parseInt(login_result.stauts,10)==-1)
		{
			alert('帐号和密码不能为空!');
			return false;
		}
		if(parseInt(login_result.stauts,10)==0)
		{
			alert('帐号或密码错误!');
			return false;
		}

		json_get_login_stauts();
		return false;
	});
}

function json_logout()
{
	$.getScript(SERVICE_URL + "/jsonLogout/r"+new Date().getMilliseconds(), function(){
		$('div.foot').find('div').eq(0).html('<div class="clear"></div>');
		$('.footmark_boxMid_2').html('');
		$('div[rel="game"],div[rel="flash"],div[rel="comic"],div[rel="animation"]').removeData('fp');
		$('div[rel="game"]').css('display','block').siblings('.foot').css('display','none');
		$('ul.footmark_boxMid_nav li').eq(0).addClass('new_show').siblings('li').removeClass('new_show');
		if($('#login_form').length>0)
		{
			$("#login_form").remove();
		}
		json_get_login_stauts();
	});
	return false;
}

function json_api_reg()
{
	document.cookie = "from_url="+ escape (location.href)+';domain=.07073.com;path=/';
	window.location.href = BASE_URL + '/center/register/';
}
$(document).ready(function(){
	json_get_login_stauts();
});

var loading = new Array();
loading['game'] = 0;
loading['flash'] =0;
loading['comic'] = 0;
loading['animation'] = 0;
function loadFootPrint(dc){
	if(dc=='game')
		dc = $('div[rel="game"]');
	t = dc.attr('rel');
	if(loading[t]==1)
		return false;
	if(typeof(dc.data('fp'))=='undefined'){
		html = '';
		dc.find('div').eq(0).html('<div style="text-align:center; color:green; padding:5px 0 5px;" class="loading"><img src="http://m1.073img.com/_12img/loading4.gif" align="absmiddle"/> 数据加载中……</div><div class="clear"></div>');
		loading[t] = 1;
		$.getScript(SERVICE_URL + '/loadFootPrint/'+t, function(){
			loading[t] = 0;
			dc.find('.loading').remove();
			dc.data('fp', 1);
			if(data==-1 || !data.list || data.list.length==0){
				dc.find('div').eq(0).prepend('<div style="text-align:center;padding:15px 0 15px;">您还没有此足迹，去频道看看吧!</div>');
			} else {
				for(i=0; i<data.list.length; i++){
					x = data.list[i];
					html += '<dl><dt><a href="'+x.url+'" title="'+x.title+'"><img src="'+x.pic+'" /></a></dt><dd><a href="'+x.url+'">'+x.title+'</a></dd></dl>';
				}
				dc.find('div').eq(0).prepend(html);
			}
			if(t=='game'){
				html1 = '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
				if(data.kf.length>0){
					for(i=0; i<data.kf.length; i++){
						x = data.kf[i];
						html1 += '<tr><td width="105" height="20"><a href="'+x.url+'" target="_blank">'+x.name+'</a></td><td width="60" align="center"><a href="'+x.url+'">'+x.servername+'</a></td><td align="right">'+x.thread+'</td></tr>';
					}
				} else {
					html1 += '<tr><td colspan=3 align=center>您还没有此足迹，去开服频道看看吧!</td></tr>';
				}
				html1 += '</table>';
				$('.footmark_boxMid_2').html(html1);
			}
		});
	}
}
$('.footmark_boxMid_nav li').click(function(){
	$(this).addClass('new_show').siblings('li').removeClass('new_show');
	i = $('.footmark_boxMid_nav li').index($(this));
	dc = $('div.foot').eq(i);
	dc.show().siblings('.foot').hide();
	loadFootPrint(dc);
});

function announcement() {
	var ann = new Object();
	ann.anndelay = 3000;
	ann.annst = 0;
	ann.annstop = 0;
	ann.annrowcount = 0;
	ann.anncount = 0;
	ann.annlis = document.getElementById('anc').getElementsByTagName("p");
	ann.annrows = new Array();
	ann.announcementScroll = function() {
	if (this.annstop) {
	this.annst = setTimeout(function() {
	ann.announcementScroll();
	},
	this.anndelay);
	return;
	}
	if (!this.annst) {
	var lasttop = -1;
	for (i = 0; i < this.annlis.length; i++) {
	if (lasttop != this.annlis[i].offsetTop) {
	if (lasttop == -1) lasttop = 0;
	this.annrows[this.annrowcount] = this.annlis[i].offsetTop - lasttop;
	this.annrowcount++;
	}
	lasttop = this.annlis[i].offsetTop;
	}
	if (this.annrows.length == 1) {
	document.getElementById('an').onmouseover = document.getElementById('an').onmouseout = null;
	} else {
	this.annrows[this.annrowcount] = this.annrows[1];
	document.getElementById('ancl').innerHTML += document.getElementById('ancl').innerHTML;
	this.annst = setTimeout(function() {
	ann.announcementScroll();
	},
	this.anndelay);
	document.getElementById('an').onmouseover = function() {
	ann.annstop = 1;
	};
	document.getElementById('an').onmouseout = function() {
	ann.annstop = 0;
	};
	}
	this.annrowcount = 1;
	return;
	}
	if (this.annrowcount >= this.annrows.length) {
	document.getElementById('anc').scrollTop = 0;
	this.annrowcount = 1;
	this.annst = setTimeout(function() {
	ann.announcementScroll();
	},
	this.anndelay);
	} else {
	this.anncount = 0;
	this.announcementScrollnext(this.annrows[this.annrowcount]);
	}
	};
	ann.announcementScrollnext = function(time) {
	document.getElementById('anc').scrollTop++;
	this.anncount++;
	if (this.anncount != time) {
	this.annst = setTimeout(function() {
	ann.announcementScrollnext(time);
	},
	10);
	} else {
	this.annrowcount++;
	this.annst = setTimeout(function() {
	ann.announcementScroll();
	},
	this.anndelay);
	}
	};
	ann.announcementScroll();
} 
//-->