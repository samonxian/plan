(function(){function l(){this.c="30059529";this.R="q";this.N="";this.K="";this.M="";this.o="1395635074";this.P="hqs8.cnzz.com";this.L="";this.s="CNZZDATA"+this.c;this.r="_CNZZDbridge_"+this.c;this.G="_cnzz_CV"+this.c;this.u="1";this.B={};this.a={};this.la()}function g(a,b){try{var c=[];c.push("siteid=30059529");
c.push("name="+d(a.name));c.push("msg="+d(a.message));c.push("r="+d(h.referrer));c.push("page="+d(f.location.href));c.push("agent="+d(f.navigator.userAgent));c.push("ex="+d(b));c.push("rnd="+Math.floor(2147483648*Math.random()));(new Image).src="http://jserr.cnzz.com/log.php?"+c.join("&")}catch(e){}}var h=document,f=window,d=encodeURIComponent,k=decodeURIComponent,p=unescape,r=escape,m="https:"===f.location.protocol?"https:":"http:",s=m+"//c.cnzz.com/core.php";l.prototype={la:function(){try{this.U(),
this.J(),this.ia(),this.H(),this.m(),this.ga(),this.fa(),this.ja(),this.j(),this.ea(),this.ha(),this.ka(),this.ca(),this.aa(),this.da(),this.qa(),f[this.r]=f[this.r]||{},this.ba("_cnzz_CV")}catch(a){g(a,"i failed")}},oa:function(){try{var a=this;f._czc={push:function(){return a.C.apply(a,arguments)}}}catch(b){g(b,"oP failed")}},aa:function(){try{var a=f._czc;if("[object Array]"==={}.toString.call(a))for(var b=0;b<a.length;b++){var c=a[b];switch(c[0]){case "_setAccount":f._cz_account="[object String]"===
{}.toString.call(c[1])?c[1]:String(c[1]);break;case "_setAutoPageview":"boolean"===typeof c[1]&&(f._cz_autoPageview=c[1])}}}catch(e){g(e,"cS failed")}},qa:function(){try{if("undefined"===typeof f._cz_account||f._cz_account===this.c){f._cz_account=this.c;if("[object Array]"==={}.toString.call(f._czc))for(var a=f._czc,b=0,c=a.length;b<c;b++)this.C(a[b]);this.oa()}}catch(e){g(e,"pP failed")}},C:function(a){try{if("[object Array]"==={}.toString.call(a))switch(a[0]){case "_trackPageview":if(a[1]){this.a.d=
m+"//"+f.location.host;"/"!==a[1].charAt(0)&&(this.a.d+="/");this.a.d+=a[1];if(""===a[2])this.a.f="";else if(a[2]){var b=a[2];"http"!==b.substr(0,4)&&(b=m+"//"+f.location.host,"/"!==a[2].charAt(0)&&(b+="/"),b+=a[2]);this.a.f=b}this.A();"undefined"!==typeof this.a.f&&delete this.a.f;"undefined"!==typeof this.a.d&&delete this.a.d}break;case "_trackEvent":var c=[];a[1]&&a[2]&&(c.push(d(a[1])),c.push(d(a[2])),c.push(a[3]?d(a[3]):""),a[4]=parseFloat(a[4]),c.push(isNaN(a[4])?0:a[4]),c.push(a[5]?d(a[5]):
""),this.l=c.join("|"),this.A(),delete this.l);break;case "_setCustomVar":if(3<=a.length){if(!a[1]||!a[2])return!1;var c=a[1],e=a[2],q=a[3]||0;a=0;for(var h in this.a.b)a++;if(5<=a)return!1;var k;k=0==q?"p":1==q?"m":(new Date).getTime()+1E3*q;this.a.b[c]={};this.a.b[c].T=e;this.a.b[c].g=k;this.w()}break;case "_deleteCustomVar":2<=a.length&&(c=a[1],this.a.b[c]&&(delete this.a.b[c],this.w()))}}catch(l){g(l,"aC failed")}},da:function(){try{var a=this.t(this.G),b,c;this.a.b={};if(a)for(var e=a.split("&"),
a=0;a<e.length;a++)c=k(e[a]),b=c.split("|"),this.a.b[k(b[0])]={},this.a.b[k(b[0])].T=k(b[1]),this.a.b[k(b[0])].g=k(b[2])}catch(d){g(d,"gCV failed")}},V:function(){try{var a=(new Date).getTime(),b;for(b in this.a.b)"p"===this.a.b[b].g?this.a.b[b].g=0:"m"!==this.a.b[b].g&&a>this.a.b[b].g&&delete this.a.b[b];this.w()}catch(c){g(c,"cCV failed")}},w:function(){try{var a=[],b,c,e;for(e in this.a.b){var f=[];f.push(e);f.push(this.a.b[e].T);f.push(this.a.b[e].g);b=f.join("|");a.push(b)}if(0===a.length)return!0;
var k=new Date;k.setTime(k.getTime()+157248E5);c=this.G+"=";this.b=d(a.join("&"));c+=this.b;c+="; expires="+k.toUTCString();h.cookie=c+"; path=/"}catch(l){g(l,"sCV failed")}},ca:function(){try{if(""!==f.location.hash)return this.F=f.location.href}catch(a){g(a,"gCP failed")}},j:function(){try{return this.a.ra=h.referrer||""}catch(a){g(a,"gR failed")}},ea:function(){try{return this.a.n=f.navigator.systemLanguage||f.navigator.language,this.a.n=this.a.n.toLowerCase(),this.a.n}catch(a){g(a,"gL failed")}},
ha:function(){try{return this.a.Q=f.screen.width&&f.screen.height?f.screen.width+"x"+f.screen.height:"0x0",this.a.Q}catch(a){g(a,"gS failed")}},m:function(){try{return this.a.na=this.h("ntime")||"none"}catch(a){g(a,"gLVST failed")}},I:function(){try{return this.a.q=this.h("ltime")||(new Date).getTime()}catch(a){g(a,"gFVBT failed")}},ga:function(){try{var a=this.h("cnzz_a");if(null===a)a=0;else{var b=1E3*this.m(),c=new Date;c.setTime(b);(new Date).getDate()===c.getDate()?a++:a=0}return this.a.v=a}catch(e){g(e,
"gRT failed")}},fa:function(){try{return this.a.e=this.h("rtime"),null===this.a.e&&(this.a.e=0),0<this.I()&&432E5<(new Date).getTime()-this.I()&&(this.a.e++,this.a.q=(new Date).getTime()),this.a.e}catch(a){g(a,"gRVT failed")}},ja:function(){try{return"none"===this.m()?this.a.S=0:this.a.S=parseInt(((new Date).getTime()-1E3*this.m())/1E3)}catch(a){g(a,"gST failed")}},ia:function(){try{var a=this.h("sin")||"none";if(!h.domain)return this.a.p="none";this.j().split("/")[2]!==h.domain&&(a=this.j());return this.a.p=
a}catch(b){g(b,"gS failed")}},H:function(){try{return this.a.i=this.h("cnzz_eid")||"none"}catch(a){g(a,"gC failed")}},sa:function(){try{var a=s+"?",b=[];b.push("web_id="+d(this.c));this.N&&b.push("show="+d(this.N));this.M&&b.push("online="+d(this.M));this.K&&b.push("l="+d(this.K));this.R&&b.push("t="+this.R);a+=b.join("&");this.Y(a,"utf-8")}catch(c){g(c,"rN failed")}},U:function(){try{return!1===f.navigator.cookieEnabled?this.a.X=!1:this.a.X=!0}catch(a){g(a,"cCE failed")}},t:function(a){try{a+="=";
var b=h.cookie.indexOf(a),c="";if(-1<b){var e=h.cookie.indexOf(";",b);-1===e&&(e=h.cookie.length);c=k(h.cookie.substring(b+a.length,e))}return c?c:""}catch(d){g(d,"gAC failed")}},ba:function(a){try{h.cookie=a+"=; expires="+(new Date(0)).toUTCString()+"; path=/"}catch(b){g(b,"dAC failed")}},ka:function(){try{for(var a=h.title,b=a.length,c=0,e="",d=0;d<b;d++){var f=a[d];this.ma(f)?c++:c+=2;e+=f;if(20<=c){e+="...";break}}this.a.pa=e}catch(k){g(k,"gT failed")}},D:function(a){try{return"http"!==a.substr(0,
4)?"":RegExp(m+"//.*?/","i").exec(a)}catch(b){g(b,"cH failed")}},J:function(){try{var a=this.s,b={},c=this.t(this.s);if(0<c.length)if(1E8<this.c){var e=c.split("|");b.cnzz_eid=k(e[0]);b.ntime=k(e[1])}else for(var e=c.split("&"),d=0,f=e.length;d<f;d++){var h=e[d].split("=");b[k(h[0])]=k(h[1])}this.B=b}catch(l){g(l,"iC failed:"+a+":"+c)}},O:function(){try{var a=this.s+"=",b=[],c=new Date;c.setTime(c.getTime()+157248E5);if(1E8<this.c){if("none"!==this.a.i)b.push(d(this.a.i));else{var e=Math.floor(2147483648*
Math.random())+"-"+this.o+"-"+this.D(this.j());b.push(d(e))}b.push(this.o);0<b.length?(a+=d(b.join("|")),a+="; expires="+c.toUTCString(),a+="; path=/"):a+="; expires="+(new Date(0)).toUTCString()}else"none"!==this.a.i?b.push("cnzz_eid="+d(this.a.i)):(e=Math.floor(2147483648*Math.random())+"-"+this.o+"-"+this.D(this.j()),b.push("cnzz_eid="+d(e))),b.push("ntime="+this.o),null!==this.a.v&&b.push("cnzz_a="+d(this.a.v)),this.a.p&&b.push("sin="+d(this.a.p)),this.a.q&&b.push("ltime="+d(this.a.q)),this.a.e&&
b.push("rtime="+d(this.a.e)),0<b.length?(a+=d(b.join("&")),a+="; expires="+c.toUTCString(),a+="; path=/"):a+="; expires="+(new Date(0)).toUTCString();h.cookie=a}catch(f){g(f,"sS failed")}},h:function(a){try{return"undefined"!==typeof this.B[a]?this.B[a]:null}catch(b){g(b,"gCPa failed")}},Y:function(a,b){try{if(b=b||"utf-8","1"===this.u){var c=h.createElement("script");c.type="text/javascript";c.async=!0;c.charset=b;c.src=a;var e=h.getElementsByTagName("script")[0];e.parentNode&&e.parentNode.insertBefore(c,
e)}else h.write(p("%3Cscript src='"+a+"' charset='"+b+"' type='text/javascript'%3E%3C/script%3E"))}catch(d){g(d,"cAS failed")}},$:function(a,b){try{var c=h.getElementById("cnzz_stat_icon_"+this.c);if(c){var e=h.createElement("script");e.type="text/javascript";e.async=!0;e.charset=b;e.src=a;c.appendChild(e)}else"0"===this.u&&h.write(p("%3Cscript src='"+a+"' charset='"+b+"' type='text/javascript'%3E%3C/script%3E"))}catch(d){g(d,"cSI failed")}},Z:function(a){try{for(var b=a.length,c="",e=0;e<b;e++)a[e]&&
(c+=p(a[e]));var d=h.getElementById("cnzz_stat_icon_"+this.c);d?d.innerHTML=c:"0"===this.u&&h.write(c)}catch(f){g(f,"cI failed")}},A:function(){try{this.O();this.J();this.H();this.V();var a=[];a.push("id="+d(this.c));this.a.f||""===this.a.f?a.push("r="+d(this.a.f)):a.push("r="+d(this.a.ra));a.push("lg="+d(this.a.n));a.push("ntime="+d(this.a.na));a.push("repeatip="+this.a.v);a.push("rtime="+d(this.a.e));a.push("cnzz_eid="+d(this.a.i));a.push("showp="+d(this.a.Q));a.push("st="+d(this.a.S));a.push("sin="+
d(this.a.p));this.a.d?a.push("p="+d(this.a.d)):"[object String]"==={}.toString.call(this.F)&&a.push("p="+d(this.F));"[object String]"==={}.toString.call(this.l)&&a.push("ei="+d(this.l));"[object String]"==={}.toString.call(this.b)&&a.push("cv="+this.b);a.push("t="+d(this.a.pa));var b=a.join("&");"[object String]"==={}.toString.call(this.l)?this.k([m+"//ei.cnzz.com/stat.htm?"+b]):(this.L&&this.k([m+"//"+this.L+"/stat.htm?"+b]),this.P&&this.k([m+"//"+this.P+"/stat.htm?"+b]))}catch(c){g(c,"sD failed")}},
ma:function(a){return 0>r(a).indexOf("%u")?!1:!0},k:function(a){try{for(var b=a.length,c=null,d=0;d<b;d++)a[d]&&(c="cnzz_image_"+Math.floor(2147483648*Math.random()),f[c]=new Image,f[c].W=c,f[c].onload=f[c].onerror=f[c].onabort=function(){try{this.onload=this.onerror=this.onabort=null,f[this.W]=null}catch(a){}},f[c].src=a[d]+"&rnd="+Math.floor(2147483648*Math.random()))}catch(h){g(h,"cR failed")}}};try{var n=new l;f[n.r].bobject=n;!1!==f._cz_autoPageview?n.A():n.O();l.prototype.getACookie=l.prototype.t;
l.prototype.callRequest=l.prototype.k;l.prototype.createScriptIcon=l.prototype.$;l.prototype.createIcon=l.prototype.Z;n.sa()}catch(t){g(t,"main failed")}})();

