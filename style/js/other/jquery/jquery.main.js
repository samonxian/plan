
/*! HTML5 Shiv vpre3.6 | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed */
;(function(o,s){var g=o.html5||{};var j=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i;var d=/^<|^(?:a|b|button|code|div|fieldset|form|h1|h2|h3|h4|h5|h6|i|iframe|img|input|label|li|link|ol|option|p|param|q|script|select|span|strong|style|table|tbody|td|textarea|tfoot|th|thead|tr|ul)$/i;var x;var k="_html5shiv";var c=0;var u={};var h;(function(){var A=s.createElement("a");A.innerHTML="<xyz></xyz>";x=("hidden" in A);h=A.childNodes.length==1||(function(){try{(s.createElement)("a")}catch(B){return true}var C=s.createDocumentFragment();return(typeof C.cloneNode=="undefined"||typeof C.createDocumentFragment=="undefined"||typeof C.createElement=="undefined")}())}());function i(A,C){var D=A.createElement("p"),B=A.getElementsByTagName("head")[0]||A.documentElement;D.innerHTML="x<style>"+C+"</style>";return B.insertBefore(D.lastChild,B.firstChild)}function q(){var A=n.elements;return typeof A=="string"?A.split(" "):A}function w(A){var B=u[A[k]];if(!B){B={};c++;A[k]=c;u[c]=B}return B}function t(D,A,C){if(!A){A=s}if(h){return A.createElement(D)}C=C||w(A);var B;if(C.cache[D]){B=C.cache[D].cloneNode()}else{if(d.test(D)){B=(C.cache[D]=C.createElem(D)).cloneNode()}else{B=C.createElem(D)}}return B.canHaveChildren&&!j.test(D)?C.frag.appendChild(B):B}function y(C,E){if(!C){C=s}if(h){return C.createDocumentFragment()}E=E||w(C);var F=E.frag.cloneNode(),D=0,B=q(),A=B.length;for(;D<A;D++){F.createElement(B[D])}return F}function z(A,B){if(!B.cache){B.cache={};B.createElem=A.createElement;B.createFrag=A.createDocumentFragment;B.frag=B.createFrag()}A.createElement=function(C){if(!n.shivMethods){return B.createElem(C)}return t(C)};A.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+q().join().replace(/\w+/g,function(C){B.createElem(C);B.frag.createElement(C);return'c("'+C+'")'})+");return n}")(n,B.frag)}function e(A){if(!A){A=s}var B=w(A);if(n.shivCSS&&!x&&!B.hasCSS){B.hasCSS=!!i(A,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")}if(!h){z(A,B)}return A}var n={elements:g.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:!(g.shivCSS===false),supportsUnknownElements:h,shivMethods:!(g.shivMethods===false),type:"default",shivDocument:e,createElement:t,createDocumentFragment:y};o.html5=n;e(s);var b=/^$|\b(?:all|print)\b/;var l="html5shiv";var r=!h&&(function(){var A=s.documentElement;return !(typeof s.namespaces=="undefined"||typeof s.parentWindow=="undefined"||typeof A.applyElement=="undefined"||typeof A.removeNode=="undefined"||typeof o.attachEvent=="undefined")}());function f(E){var F,C=E.getElementsByTagName("*"),D=C.length,B=RegExp("^(?:"+q().join("|")+")$","i"),A=[];while(D--){F=C[D];if(B.test(F.nodeName)){A.push(F.applyElement(v(F)))}}return A}function v(C){var D,A=C.attributes,B=A.length,E=C.ownerDocument.createElement(l+":"+C.nodeName);while(B--){D=A[B];D.specified&&E.setAttribute(D.nodeName,D.nodeValue)}E.style.cssText=C.style.cssText;return E}function a(D){var F,E=D.split("{"),B=E.length,A=RegExp("(^|[\\s,>+~])("+q().join("|")+")(?=[[\\s,>+~#.:]|$)","gi"),C="$1"+l+"\\:$2";while(B--){F=E[B]=E[B].split("}");F[F.length-1]=F[F.length-1].replace(A,C);E[B]=F.join("}")}return E.join("{")}function p(B){var A=B.length;while(A--){B[A].removeNode()}}function m(A){var E,C,B=A.namespaces,D=A.parentWindow;if(!r||A.printShived){return A}if(typeof B[l]=="undefined"){B.add(l)}D.attachEvent("onbeforeprint",function(){var F,J,H,L=A.styleSheets,I=[],G=L.length,K=Array(G);while(G--){K[G]=L[G]}while((H=K.pop())){if(!H.disabled&&b.test(H.media)){try{F=H.imports;J=F.length}catch(M){J=0}for(G=0;G<J;G++){K.push(F[G])}try{I.push(H.cssText)}catch(M){}}}I=a(I.reverse().join(""));C=f(A);E=i(A,I)});D.attachEvent("onafterprint",function(){p(C);E.removeNode(true)});A.printShived=true;return A}n.type+=" print";n.shivPrint=m;m(s)}(this,document));