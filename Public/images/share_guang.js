(function(){function c(d){if("true"==GUANGER.login)window.location.href=GUANGER.path+"/snsLogin?snsType="+d}var g=[{referer:"qq",snsType:"qzong"},{referer:"weibo",snsType:"sina"},{referer:"taobao",snsType:"taobao"},{referer:"alipay",snsType:"alipay"}],a=function(d,c){if(!$(".guide")[0]){var a=$.grep(g,function(b){return b.referer!=d}),e="";$.map(a,function(b){e+='<li><a target="_blank" class="shortcut-login-'+b.referer+'" href="http://guang.com/snsLogin?snsType='+b.snsType+'">'+b.referer+"</a></li>"});
$("body").append('<div class="guide guide-'+d+'"><div class="guide_boby"><p><i></i>\u767b\u5f55 Guang.com \uff0c\u53d1\u73b0\u4f60\u7684\u559c\u6b22\uff01<span><a href="/signup">\u6ce8\u518c\u901b\u5e10\u53f7 ></a></span></p><div class="guide_add"><a id="J_RefererLogin" class="referer-login" target="_blank" href="http://guang.com/snsLogin?snsType='+c+'">'+d+'</a><div class="favorites" id="J_Favorites"><a href="javascript:void(0);">\u52a0\u5165\u6536\u85cf\u5939</a></div><ul class="other-login">'+
e+'</ul></div><div class="del" id="J_CloseGuide"><a href="javascript:void(0);">\u5173\u95ed\u5f15\u5bfc</a></div></div></div>');$("#J_Favorites").click(function(){if(window.sidebar)window.sidebar.addPanel("\u901b\uff0c\u53d1\u73b0\u559c\u6b22","http://guang.com","");else if(window.external&&document.all)window.external.AddFavorite("http://guang.com","\u901b\uff0c\u53d1\u73b0\u559c\u6b22");else if(!window.opera)jQuery.guang.tip.conf.tipClass="tipmodal tipmodal-error2",jQuery.guang.tip.show($(this),
"\u60a8\u7684\u6d4f\u89c8\u5668\u4e0d\u652f\u6301\u81ea\u52a8\u52a0\u6536\u85cf\uff0c\u8bf7\u6309 ctrl+d \u52a0\u5165\u6536\u85cf\u3002")});$("#J_CloseGuide").click(function(){$(".guide").hide()})}var a=function(){if(jQuery.guang.util.isIE6()){var b=$(window).height()-90;$(".guide").css({position:"absolute",top:b}).show();$(window).bind("scroll",function(){var a=$(document).scrollTop();$.guang.util.isIE6()&&$(".guide").css("top",a+b+"px")})}else $(".guide").show().animate({bottom:0},500)},f=window.location.href;
-1==f.indexOf("/login")&&-1==f.indexOf("/doEmailLogin")&&-1==f.indexOf("/signup")&&a()};if(""==GUANGER.userId&&"undefined"!=typeof GUANGER.referer)switch(GUANGER.referer){case "taobao":c("taobao");a("taobao","taobao");break;case "alipay":c("alipay");a("alipay","alipay");break;case "weibo":c("sina"),a("weibo","sina")}})();