
/*
 * GUANG UI JavaScript Library v1.0.8
 * Copyright 2011-2012, Guang.com
 * @contain: 前端基础功能插件，包含基础库、功能库（定位、浮层、校验、滚动、提示框）
 * @depends: jquery.js
 *
 * Includes jquery.tools.js,json2.js
 * 
 * Author: Jeffer Xia 
 * Since: 2011-11-07
 * ModifyTime : 2012-04-27 10:05
 * http://www.guang.com/
 * 
 */

define(function(require, exports) {
	var $ = jQuery = require("jquery");
	require("module/jquery.tools.tabs")($);
	require("module/jquery.tools.overlay")($);
	require("module/jquery.tools.scrollable")($);
	require("module/json");




//(function($) { 
	$.guang = $.guang || {
        version: "v1.0.0"
    };
    $.extend($.guang, {
    	util: {
    		//获取url参数名
			getUrlParam : function(paramName){
				var reg = new RegExp("(^|&)"+ paramName +"=([^&]*)(&|$)");
				var r = window.location.search.substr(1).match(reg);
				if (r!=null) return unescape(r[2]); return null;
			},
    		//判断是否ie6
			isIE6: function() {
				return ($.browser.msie && $.browser.version=="6.0") ? true : false
			},
			//判断是否是苹果手持设备
			isIOS: function(){
				return /\((iPhone|iPad|iPod)/i.test(navigator.userAgent)
			},
			//去掉首尾空字符
			trim: function(str) {
				return str.replace(/(^\s*)|(\s*$)/g,"");
			},
			//去掉首空字符
			lTrim: function(str){
				return str.replace(/(^\s*)/g, "");
			},
			//去掉尾空字符
			rTrim: function(str){
				return str.replace(/(\s*$)/g, "");
			},
			//获取字符串中文长度
			getStrLength: function(str) {
				str = $.guang.util.trim(str);
				var theLen = 0,
				strLen = str.replace(/[^\x00-\xff]/g,"**").length;
				theLen = parseInt(strLen/2)==strLen/2 ? strLen/2 : parseInt(strLen/2)+0.5;
				return theLen;
			},
			//截取一定长度的中英文字符串并转全角
			substring4ChAndEn: function(str,maxLength){
				var strTmp = str.substring(0,maxLength*2);
				while($.guang.util.getStrLength(strTmp)>maxLength){
					strTmp = strTmp.substring(0,strTmp.length-1);
				}
				return strTmp;
			},
			//将<>"'&符号转换成全角
			htmlToTxt: function(str){
				var RexStr = /\<|\>|\"|\'|\&/g;
				str = str.replace(RexStr, function(MatchStr) {  
					switch (MatchStr) {  
					case "<":  
						return "＜";  
						break;  
					case ">":  
						return "＞";  
						break;  
					case "\"":  
						return "＼";  
						break;  
					case "'":  
						return "＇";  
						break;  
					case "&":  
						return "＆";  
						break;  
					default:  
						break;  
					}  
				})  
				return str;  
			},
			//截取一定长度的字符串
			ellipse: function(str, len) {
    			var boolLimit = $.guang.util.getStrLength(str)*2 > len;
        		if(str && boolLimit){
            		return str.replace(new RegExp("([\\s\\S]{"+len+"})[\\s\\S]*"),"$1…");
        		}
       			return str;
    		},
			//校验是否为空
			isEmpty: function(v) {
				return $.guang.util.trim(v)=="" ? false : true;
			},
			//校验邮箱是否合法
			isEmail: function(v) {
				return /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(v);
			},
			//校验昵称是否合法
			isNick: function(v){
				return /^[a-zA-Z\d\u4e00-\u9fa5_-]*$/.test(v);
			},
			nickMin: function(v){
				var l = $.guang.util.getStrLength(v)*2;
				return l < 4 ? false : true;
			},
			nickMax: function(v){
				var l = $.guang.util.getStrLength(v)*2;
				return l > 30 ? false : true;
			},
			//校验字符长度不超过某个长度
			tooShort: function(v,l) {
				return v.length<l ? false : true;
			},
			//校验是否包含网址
			noLink: function(v){
				var matchURL = v.match(/(http[s]?:\/\/)?[a-zA-Z0-9-]+(\.[a-zA-Z0-9]+)+/);
				return matchURL==null ? true : false;
			},
			//获取dom对象的当前位置
			getPosition: function(ele){
				var top = ele.offset().top, 
			 	left = ele.offset().left,
				bottom = top + ele.outerHeight(),
				right = left + ele.outerWidth(),
				lmid = left + ele.outerWidth()/2,
				vmid = top + ele.outerHeight()/2;
		
				// iPad position fix
				if (/iPad/i.test(navigator.userAgent)) {
					top -= $(window).scrollTop();
					bottom -= $(window).scrollTop();
					vmid -= $(window).scrollTop();
				}
				var position = {
					leftTop: function(){
						return {x: left, y: top}
					},
					leftMid: function(){
						return {x: left, y: vmid}
					},
					leftBottom: function(){
						return {x: left, y: bottom}
					},
					topMid: function(){
						return {x: lmid, y: top}
					},
					rightTop: function(){
						return {x: right, y: top}
					},
					rightMid: function(){
						return {x: right, y: vmid}
					},
					rightBottom: function(){
						return {x: right, y: bottom}
					},
					MidBottom: function(){
						return {x: lmid, y: bottom}
					},
					middle: function(){
						return {x: lmid, y: vmid}
					}
				};			
				return position;
			},
			//获取根域名
			getDomain: function(url){
				var domain = "null";
				var regex = /[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+\.?/;
				var match = regex.exec(url);
				if (typeof match != "undefined" && null != match) {
					domain = match[0];
				}
				return domain;
			},
			//校验合法网站
			validSite: function(url){
				var domain = $.guang.util.getDomain(url);
				if(url.indexOf("guang.com") != -1){
					return (domain == "guang.com" && url.indexOf("baobei/") != -1) ? "guang" : false;
				}else if (url.indexOf("tmall.com") != -1) {
					var curBool=true, bool1, bool2, bool3, boo4;
					bool3 = (domain == "detail.tmall.com" || domain == "item.tmall.com") && (url.indexOf("item.htm?") != -1);
					bool4 = (domain == "detail.tmall.com" || domain == "item.tmall.com") && (url.indexOf("spu_detail.htm?") != -1);
					switch(curBool){
						case bool3 : {return "tmall3"} break;
						case bool4 : {return "tmall4"} break;
						default : {return false;} break;
					}
				}else if (url.indexOf("taobao.com") != -1) {
					var curBool=true, bool1, bool2, bool3;
					bool1 = (domain == "item.taobao.com" || domain == "item.beta.taobao.com" || domain == "item.lp.taobao.com") && (url.indexOf("item.htm?") != -1);
					switch(curBool){
						case bool1 : {return "taobao"} break;
						default : {return false;} break;
					}
				} else if (url.indexOf("item.buy.qq.com") != -1) {
					return (domain == "item.buy.qq.com") ? "qqbuy" : false;
				} else if (url.indexOf("vancl.com") != -1) {
					bool1 = (domain == "item.vancl.com") && (url.indexOf("ch_vt") == -1)
					bool2 = (domain == "item.vt.vancl.com");
					switch(true){
						case bool1 : {return "vancl"} break;
						case bool2 : {return "vancl"} break;
						default : {return false;} break;
					}
				} else if (url.indexOf("www.mbaobao.com") != -1) {
					return (domain == "www.mbaobao.com" && url.indexOf("item/") != -1) ? "mbaobao" : false;
				} else if (url.indexOf("auction1.paipai.com") != -1) {
					return (domain == "auction1.paipai.com") ? "paipai" : false;
				} else {
					return false;
				}
			},
			openWin: function(url){
				var top=190;
				var whichsns = url.substr(url.lastIndexOf("snsType=")+8,1);
				if(whichsns==4 || whichsns==5){
					var left=document.body.clientWidth>820 ? (document.body.clientWidth-820)/2 : 0;
					window.open(url, 'connect_window', 'height=700, width=820, toolbar=no, menubar=no, scrollbars=yes, resizable=no,top='+top+',left='+left+', location=no, status=no');
				}else if(whichsns==8){
					var left=(document.body.clientWidth-580)/2;
					window.open(url, 'connect_window', 'height=620, width=580, toolbar=no, menubar=no, scrollbars=yes, resizable=no,top='+top+',left='+left+', location=no, status=no');
				}else if(whichsns==9){
					var left=document.body.clientWidth>900 ? (document.body.clientWidth-900)/2 : 0;
					window.open(url, 'connect_window', 'height=550, width=900, toolbar=no, menubar=no, scrollbars=yes, resizable=no,top='+top+',left='+left+', location=no, status=no');
				}else{										
					var left=(document.body.clientWidth-580)/2;
					window.open(url, 'connect_window', 'height=420, width=580, toolbar=no, menubar=no, scrollbars=yes, resizable=no,top='+top+',left='+left+', location=no, status=no');
				}
		
    	},
    	moveEnd : function(obj){
    		obj.focus();
    		var len = obj.value.length;
    		if (document.selection) {
    			var sel = obj.createTextRange();
    			sel.moveStart('character',len);
    			sel.collapse();
    			sel.select();
    		} else if (typeof obj.selectionStart == 'number' && typeof obj.selectionEnd == 'number') {
    			obj.selectionStart = obj.selectionEnd = len;
    	}
	    	},
	    	submitByEnter : function(e, clk) {
		   		 e = e || window.event;
		   		 var key = e ? (e.charCode || e.keyCode) : 0;
		   		 if(key == 13) {
		   		      clk();
    	}
    	}
    	}
    });
    $.fn.extend({
    	//返回顶部
    	returntop: function(){
    		if(!this[0]){
				return;
			}
			var backToTopEle = this.click( function() {
				$("html, body").animate({
					scrollTop: 0
				}, 500);
				var topH = $(window).height()+80+"px";
				backToTopEle.data("isClick",true);
				backToTopEle.css("bottom",topH);
			});
			var showEle = function(){
				if(backToTopEle.data("isClick")){
				}else{
					backToTopEle.css({"opacity":1,"bottom":"200px"});
				}
			};
			var timeDelay = null;
			var backToTopFun = function() {	
				var docScrollTop = $(document).scrollTop();
				var winowHeight = $(window).height();
				(docScrollTop > 0)? showEle(): backToTopEle.css({"opacity":0,"bottom":"-200px"}).data("isClick",false);
				//IE6下的定位
				if ($.guang.util.isIE6()) {
					backToTopEle.hide();
					clearTimeout(timeDelay);
					timeDelay = setTimeout(function(){
						backToTopEle.show();
						clearTimeout(timeDelay);
					},1000);
					backToTopEle.css("top", docScrollTop + winowHeight - 125);
				}
			};
			$(window).bind("scroll", backToTopFun);
    	},
    	//等比例缩放图片
    	resizeImage: function(width,height){
    		this.each(function(){
				var obj = $(this)[0];
				var w = obj.width;
				var h = obj.height;
				if (w <= width && h <= height) {
					return;
				} else if (w <= width && h > height) {
					obj.width = w * height / h;
					obj.height = height;
				} else if (w > width && h <= height) {
					obj.width = width;
					obj.height = h * width / w;
				} else {
					obj.width = width;
					obj.height = h * width / w;
					var temp=h * width / w;
					if(temp>height) {
						obj.width = w * height / h;
						obj.height = height;
					}
				}
			});
    	},
    	//文本框高度自适应
    	textareaAutoHeight: function(){
    		var obj = this;
    		var h = obj.outerHeight();
			var func = function(){				
				h < 0 && (h = obj.outerHeight());
				if($.browser.mozilla || $.browser.safari){
					obj.height(h);
				}
				var sh = obj[0].scrollHeight,
 				autoHeight = sh < h ? h: sh,
				autoHeight = autoHeight < h * 1.5 ? h: sh;
				obj.height(autoHeight);
			}
			obj.bind("keyup input propertychange focus",func);
    	},
    	//按钮置为灰色
    	disableBtn: function(str){
    		var $btn = this;
    		$btn[0].disabled = "disabled";
    		$btn.removeClass(str).addClass("disabled");
    	},
    	//开启按钮
    	enableBtn: function(str){
    		var $btn = this;
    		$btn[0].disabled = "";
    		$btn.removeClass("disabled").addClass(str);
    	},
    	//下拉菜单
    	dropDown: function(options){
        	var settings = {
            	event: "mouseover",
            	classNm: ".dropdown",
            	timer: null,
            	fadeSpeed: 100,
            	duration: 500,
            	offsetX: 82,
            	offsetY: 8,
            	isLocation: false
        	};                
        	if(options) {
            	$.extend(settings, options);
        	}

        	var triggers = this,
        	$dropDown = $(settings.classNm);
            triggers.each(function() {
                $this = $(this);
    			$this.hover(function(){
					clearTimeout(settings.timer);
					$(".dropdown:not("+settings.classNm+")").hide();
					if(settings.isLocation){
						var position = $.guang.util.getPosition($(this)).rightBottom();
						$dropDown.css({
							left: position.x - settings.offsetX + "px",
							top: position.y + settings.offsetY + "px"
						});
					}
					$dropDown.fadeIn(settings.fadeSpeed);
				},function(){
					settings.timer = setTimeout(function(){
						$dropDown.fadeOut(settings.fadeSpeed);
					},settings.duration);
				});
				$dropDown.hover(function(){
					clearTimeout(settings.timer);
					$dropDown.show();
				},function(){
					settings.timer = setTimeout(function(){
						$dropDown.fadeOut(settings.fadeSpeed);
					},settings.duration);
				});
			});
    	}
    });
//})(jQuery);

//(function($) { 	
	//使用弹窗方式登录 add by heiniu@guang.com 2012-07-03
	if($("a[rel=loginD]")[0]){
		$("a[rel=loginD]").click(function(event){
			event.preventDefault();
			$.guang.dialog.login();
		});
	}
	$.guang.dialog = {
		isLogin: function(){
			if(GUANGER.userId == ""){
				$.guang.dialog.login();
				return false;
			}
			return true;
		},
		login: function(){
			if(!$("#loginDialog")[0]){
				var html = "";
				html += '<div id="loginDialog" class="g-dialog">';
				html += '<div class="dialog-content">';
				html += '<div class="hd"><h3>登录</h3></div>';
				html += '<div class="bd clearfix"><div class="bd-l">';
				html += '<form id="J_LoginDForm" action="' + GUANGER.path + '/emailLogin" method="POST">';
				html += '<div class="error-row"><p class="error"></p></div>';
				html += '<div class="form-row"><label>Email：</label>';
				html += '<input type="text" class="base-input" name="email" id="email" value="" placeholder="" />';
				html += '</div>';
				html += '<div class="form-row"><label>密码：</label>';
				html += '<input type="password" class="base-input" name="password" id="password" value="" />';
				html += '</div>';
				html += '<div class="form-row"><label>&nbsp;</label>';
				html += '<input type="checkbox" class="check" name="remember" value="1" checked="checked" />';
				html += '<span>两周内自动登录</span>';
				html += '</div>';
				html += '<div class="form-row act-row clearfix"><label>&nbsp;</label>';
				html += '<input type="submit" class="bbl-btn login-submit" value="登录" />';
				html += '<a class="ml10 l30" href="'+GUANGER.path+'/resetpwd">忘记密码？</a></div>';
				//html += '<div class="noaccount">还没有帐号？<a href="'+GUANGER.path+'/signup">免费注册一个</a></div>';
				html += '</form></div>';
				html += '<div class="bd-r">';
				html += '<p>你也可以使用这些帐号登录</p>';
				html += '<div class="snslogin mt15 clearfix"><ul class="fl mr20 outlogin-b">';
				html += '<li><a class="l-qq" href="'+GUANGER.path+'/snsLogin?snsType=qzone&backType=asyn">QQ帐号登录</a></li>';
				html += '<li><a class="l-sina" href="'+GUANGER.path+'/snsLogin?snsType=sina&backType=asyn">新浪微博登录</a></li>';
				html += '<li><a class="l-tao" href="'+GUANGER.path+'/snsLogin?snsType=taobao&backType=asyn">淘宝帐号登录</a></li>';
				html += '</ul>';
				html += '<ul class="fl outlogin-s share-link">';
        		html += '<li><a class="s-alipay" href="'+GUANGER.path+'/snsLogin?snsType=alipay&backType=asyn">支付宝</a></li>';
				html += '<li><a class="s-tencent" href="'+GUANGER.path+'/snsLogin?snsType=tec_weibo&backType=asyn">腾讯微博</a></li>';
        		//html += '<li><a class="s-douban" href="'+GUANGER.path+'/snsLogin?snsType=douban&backType=asyn">豆瓣</a></li>';
        		html += '<li><a class="s-renren" href="'+GUANGER.path+'/snsLogin?snsType=renren&backType=asyn">人人网</a></li>';
				html += '</ul></div>';
				html += '</div>';
				html += '</div>';
				html += '<a class="close" href="javascript:;"></a>';
				html += '</div>';
				html += '</div>';
				$("body").append(html);
				$("#loginDialog").overlay({
					top: 'center',
					mask: {
						color: '#000',
						loadSpeed: 200,
						opacity: 0.3
					},
					closeOnClick: false,
					load: true			
				});
				$("#J_LoginDForm").submit(function(){
					$this = $(this);
					$.post($this.attr("action"),$this.serializeArray(),function(data){
    					if(data.code==100){
    						$("#loginDialog").overlay().close();
    						//GUANGER.userId = data.userId;
    						window.location.reload();
    					}else if(data.code==101){
    						$("#loginDialog").find(".error-row").fadeIn();
    						$("#loginDialog").find(".error").html(data.message);
    						$("#loginDialog input[name=password]").val("");
    					}
					});
					return false;
				});
				$(".snslogin a").unbind("click").click(function(){
					if($(this).hasClass("s-douban")){
						$("#loginDialog").overlay().close();
						setTimeout(function(){
							$.guang.dialog.doubanTip();
						},500);
					}else{
						var snsurl = $(this).attr("href");
						$.guang.util.openWin(snsurl);
					}
					return false;
				});
				$("#loginDialog").overlay().getClosers().bind("click",function(){
					$("#J_LoginDForm")[0].reset();
					$("#loginDialog").find(".error-row").hide();
				});
			}else{
				$("#loginDialog").data("overlay").load();
			}
		},
		doubanTip: function(){
			if(!$("#dbTipDialog")[0]){
			var html = "";
			html += '<div id="dbTipDialog" class="g-dialog">';
			html += '<div class="dialog-content">';
			html += '<div class="hd"><h3>致豆瓣用户：</h3></div>';
			html += '<div class="bd clearfix">';
			html += '<p>由于近期豆瓣开放平台接口不稳定，我们已暂停该帐户的登陆操作，因此次调整给您带来的不便表示歉意。</p><p>您可以继续通过以下几种方式登陆［逛］，感谢您的理解！</p>';
			html += '<div class="clearfix other-login">';
			html += '<a class="l-qq" href="'+GUANGER.path+'/snsLogin?snsType=qzone&backType=asyn">QQ帐号登录</a>';
			html += '<a class="l-sina" href="'+GUANGER.path+'/snsLogin?snsType=sina&backType=asyn">新浪微博登录</a>';
    		html += '<a class="l-tao" href="'+GUANGER.path+'/snsLogin?snsType=taobao&backType=asyn">淘宝帐号登录</a> ';
    		html += '</div></div><a class="close" href="javascript:;"></a></div></div>';
    		$("body").append(html);
			$("#dbTipDialog").overlay({
				top: 'center',
				mask: {
					color: '#000',
					loadSpeed: 200,
					opacity: 0.3
				},
				closeOnClick: false,
				load: true			
			});
				$(".other-login a").unbind("click").click(function(){
					var snsurl = $(this).attr("href");
					$.guang.util.openWin(snsurl);
					return false;
				});
			}else{
				$("#dbTipDialog").data("overlay").load();	
			}
		}
	}
//})(jQuery);


/*
 * ADD BY heiniu@guang.com 2012-04-24
 */
//(function($) { 
	/*
	 * 字数统计限制
	 * $.guang.wordCount.init($wordCon,$wordNum,10)
	 */
	$.guang.wordCount = {
			conf : {
				okClk : function(){},
				errorClk : function(){}
			},
			init : function($wordCon, $wordNum, limitNum, speed) {		
				//判断是否存在评论框，不存在则返回
				var thelimit = limitNum;
			    var charDelSpeed = speed || 15;
			    var toggleCharDel = speed != -1;
			    var toggleTrim = true;
			    var that = $wordCon[0];
			    var getLen = function(){
			    	var wordConVal = $.trim($wordCon.val());
			    	return $.guang.util.getStrLength(wordConVal);
			    }
			    updateCounter();
			    function updateCounter(){
			        $wordNum.text(thelimit - parseInt(getLen()));
			    };
			
			    $wordCon.bind("keypress", function(e) {
			        if (getLen() >= thelimit && e.charCode != '0') e.preventDefault()
			    });
			    $wordCon.bind("keyup", function(e) {
			        updateCounter();
			        if (getLen() >= thelimit && toggleTrim) {
			            if (toggleCharDel) {
			                that.value = that.value.substr(0, thelimit * 2 + 100);
			                var init = setInterval(function() {
			                    if (getLen() <= thelimit) {
			                        init = clearInterval(init);
			                        updateCounter()
			                    } else {
			                        that.value = that.value.substring(0, that.value.length - 1);
			                        $.guang.wordCount.conf.errorClk(that.value.length);
			                        //$wordNum.text('trimming...  ' + (thelimit - that.value.length));
			                    };
			                },
			                charDelSpeed);
			            } else {
			            	$wordCon[0].value = that.value.substr(0, thelimit);
			            }
			        }
			    }).focus(function() {
			        updateCounter();
			    });
			}			
	}
	
	/*
	 * 需功能性操作的成功提示
	 */
	$.guang.tipForOper = {
		conf : {
			html : ""
		},
		init: function(){
			if(!$("#J_TipForOper")[0]){
				var html = "";
				html += '<div id="J_TipForOper" class="g-dialog tip-for-oper">';
				html += '<div class="dialog-content">';
				html += '<div class="bd clearfix">';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				$("body").append(html);
				$("#J_TipForOper").overlay({
					top: 'center',
					mask: {
						color: '#000',
						loadSpeed: 200,
						opacity: 0.3
					},
					closeOnClick: false,
					load: true			
				});
			}else{
				$("#J_TipForOper").data("overlay").load();
			}
			$("#J_TipForOper").find(".bd").html($.guang.tipForOper.conf.html);
			$("#J_TipForOper .closeD").click(function(){
				$("#J_TipForOper").overlay().close();
			});	
		}
	}
	/*
	 * 绑定的第三方分享
	 */
	$.guang.bindSnsShare = {
		init : function($bindSnsShare){
			//ajax填充分享平台
			var sns2ClassName = {
				sina:'ss-sina',
				tec_weibo:'ss-tencent',
				qzone:'ss-qzone'
			}
			$.ajax({
				url: GUANGER.path+"/account/getUserSns.html",
				type : "post",
				dataType: "json",
				success: function(data){
					if(data.code==100){
						var shareHTML = "";
						var json = data.userSns;
						for(var i in json){
								if(sns2ClassName[i]){
									shareHTML +='<li class="share-switch '+sns2ClassName[i]+'-btnclick-'+json[i]+' btnclick" data-status="'+json[i]+'" data-snsid="'+i+'" data-webname="'+sns2ClassName[i]+'"></li>';
								}
							}
						$bindSnsShare.html(shareHTML);
						$(".btnclick").bind("click",function(){
							var $this = $(this);
							var classOn = $this.attr("data-webname")+"-btnclick-on";
							var classOff = $this.attr("data-webname")+"-btnclick-off";
							if($this.data("status")=="on"){
								$this.removeClass(classOn).addClass(classOff).data("status","off");
							}else{
								$this.removeClass(classOff).addClass(classOn).data("status","on");
							}
						});
					}
				}
			});
		}
	}
//})(jQuery);

/*
 * 文字上下滚动
 */
//(function($) { 
	$.fn.textSlider = function(conf){  
		conf = $.extend({
			speed: "normal",
			step: 1,
			max:5,
			timer: 1000
		},conf || {});  
		
		return this.each(function() {
			$.fn.textSlider.scllor($(this), conf);
    	});
    } 
	$.fn.textSlider.scllor = function(obj, conf){
		var ul = obj.find("ul:eq(0)"),
		timerID,
		li = ul.children(),
		liHeight=$(li[0]).outerHeight(),
		upHeight=0-conf.step*liHeight;//滚动的高度；
		var scrollUp=function(){
			ul.animate({marginTop:upHeight}, conf.speed, function(){
				for(i=0;i<conf.step;i++){
               		 ul.find("li:first").removeClass("fade");
					 ul.find("li:first").appendTo(ul);
                }
               	ul.css({marginTop:0});
               	ul.find("li:first").addClass("fade");
			});	
		};
		var scrollDown=function(){		
			ul.animate({marginTop:-1*upHeight}, conf.speed, function(){
                for(i=0;i<conf.step;i++){
					ul.find("li:last").prependTo(ul);
           	 	}
           	 	ul.css({marginTop:0});
			});	
		};
		var autoPlay=function(){
			timerID = window.setInterval(scrollUp,conf.timer);
		};
		var autoStop = function(){
            window.clearInterval(timerID);
        };
        if(li.length>conf.max){
			autoPlay();
		}
		ul.hover(autoStop,autoPlay);
	}
//})(jQuery);
/*
 * 提示框
 */
//(function($) { 
	$.guang.tip = {
		conf: {
			timer: null,
    		timerLength: 3000,
    		tipClass : ""
    	},
		show: function(o,text){
			clearTimeout($.guang.tip.conf.timer);
			var position = $.guang.util.getPosition(o).topMid();
			if(!$(".tipbox")[0]){
				$("body").append('<div class="tipbox"></div>');
			}
			$(".tipbox").attr("class",'tipbox ' + $.guang.tip.conf.tipClass)
			$(".tipbox").html(text);
			var W = $(".tipbox").outerWidth(),
			H = $(".tipbox").outerHeight();
			$(".tipbox").css({
				left: position.x - W/2 + "px",
				top: position.y - H - 10 + "px"
			}).fadeIn();
			$.guang.tip.conf.timer = setTimeout(function(){
				$(".tipbox").fadeOut();
			},$.guang.tip.conf.timerLength);
		}
	}
//})(jQuery);



/* 用户分享宝贝 */
//(function($) { 
	$.fn.addPic = function(conf){
		conf = $.extend({
			handler: function(){
			
			}
		},conf || {}); 
		var $add = this;
		if(!$("#J_AddPicD")[0]){
			var html = "";
			html += '<div id="J_AddPicD" class="g-dialog ap-dialog">';
			html += '<div class="content">';
			html += '<p class="pb5">将图片网址粘贴到下面的框中：</p>';
			html += '<form class="ap-form" name="addPic" action="">';
			html += '<div class="clearfix"><input class="base-input ap-input" name="photos" value="" placeholder="http://" />';
			html += '<input type="submit" class="sbl-btn src-sub" value="添加" /></div>';
			html += '<div class="text-tip"></div>';
			html += '</form>';
			html += '<a class="close" href="javascript:;"></a>';
			html += '</div>';
			html += '</div>';
			$("body").append(html);
			$(".ap-dialog .close").click(function(){
				$("#J_AddPicD").fadeOut("fast");
			});
			$("#J_AddPicD .ap-form").submit(function(){
				var $this = $(this);
				var src = $.guang.util.trim($("#J_AddPicD .ap-input").val());
				if(src==""){
					$(".text-tip").html('<span class="errc">图片网址不能为空~</span>').show();
				}else{
					conf.handler();
					$("#J_AddPicD").fadeOut("fast");
				}
				return false;
			});
		}else{
			$(".ap-input").val("");
			$(".text-tip").html("");
		}
		var position = $.guang.util.getPosition($add).topMid();
		var W = $("#J_AddPicD").outerWidth(),
		H = $("#J_AddPicD").outerHeight();
		$("#J_AddPicD").css({
			left: (position.x - W/2) + "px",
			top: (position.y - H - 10) + "px"
		}).fadeIn("fast");
	}
	
	$.fn.addLocalPic = function(conf){
		/*conf = $.extend({
			handler: function(){
			
			}
		},conf || {}); */
		var $add = this;
		var imgPath = "http://static.guang.com/images/admin/";
		var enableFormFlag = true;
        
		if(!$("#J_AddPicD")[0]){
			var html = "";
			html += '<div id="J_AddPicD" class="g-dialog ap-dialog">';
			html += '<div class="dialog-content">';
			html += '<div class="up-pic J_UpPic" style="position:absolute;top:34px;left:50px;">';
    		html += '<form  id="J_PicUploadForm" target="picUploadTarget" action="' + GUANGER.path + '/ugc/api/uploadPic.html" method="post" enctype="multipart/form-data">';
    		html += '<div class="photo-file-row clearfix">'
    		html += '<button  id="J_BtnPic" class="bbl-btn upload-cover">从电脑选择图片</button>';
    		html += '<input type="file" name="filedata" class="upload-btn" id="J_FileInput" onChange="window.submitPic(this)" size="1" hideFocus="true"/>';
    		html += '</div>';
    		html += '<div style="margin-top:5px;color:#666;"><span>仅支持JPG/JPEG/PNG/BMP图片文件,文件小于2M,<br/>图片尺寸大小250*250～1200*1800.</span></div>';
    		html +=	'<div class="text-tip"></div>';
    		html += '</form>';
    		html += '</div>';
    		html += '<div class="loadding J_PicLoadding" style="visibility:hidden;position: absolute;bottom: 0px;left:50px;"></div>';
    		html += '<iframe name="picUploadTarget" id="picUploadTarget" width="0" height="0" style="display:none" frameborder="0" allowtransparent="yes" scrolling="no"></iframe>';
			html += '<a class="close" href="javascript:;"></a>';
			html += '</div>';
			html += '</div>';
			$("body").append(html);
			$(".ap-dialog .close").click(function(){
				$("#J_AddPicD").fadeOut("fast");
			});
			
		}
		$(".text-tip").html('').hide();
		 $(".J_PicLoadding:first").css("visibility","hidden");
		var position = $.guang.util.getPosition($add).topMid();
		var W = $("#J_AddPicD").outerWidth(),
		H = $("#J_AddPicD").outerHeight();
		$("#J_AddPicD").css({
			left: (position.x - W/2) + "px",
			top: (position.y - H - 10) + "px"
		}).fadeIn("fast");
		
		

        function validata(val){
            if (!/\.(jpg|jpeg|png|bmp)$/i.test(val)) {
                return false;
            }
            return true;
        }
		
		 window.submitPic = function(obj){
			 $(".text-tip").html('').hide();
			 $(".J_PicLoadding:first").css("visibility","hidden");
			 if(!enableFormFlag){
				 return false;
			 }
			var $loading = $(".J_PicLoadding:first");
			var loaddingHtml = '<img src="' + imgPath + 'loading.gif"/><br/>';
			
			
			
	        if (validata( $(obj).val())) {
	            $(obj).closest('form').submit();
	            enableFormFlag=false;
	            $loading.html(loaddingHtml).css("visibility", "visible"); 
	        }else{
	        	$(".text-tip").html('<span class="errc">亲,图片格式不对.</span>').show();
	        	enableFormFlag=true;
	        }
	        
	    	}
		 
		 //返回提交成功后的操作
			window.publishPicSuccess =  function(code,imgUrl,width,height){
				var $loading = $(".J_PicLoadding:first");
				var $scrollable = $("#J_GoodsPubD .gallery-bd").scrollable();
				enableFormFlag=true;
				switch(code){
					case "100" : //成功
					setTimeout(function(){
						$("#J_AddPicD").fadeOut("fast");
						var img = new Image();
						img.src = imgUrl;
						if($("#J_GoodsPubD .items img").length>0){
							if($("#J_GoodsPubD .items img").length<8){
								var html= '<li class="selected"><a href="javascript:;"><img src="' +imgUrl + '" alt="" /></a><i></i></li>';
								$("#J_GoodsPubD .items ul:last").append(html);
								$("#J_GoodsPubD .items img").resizeImage(94,94);
							}else {
								if($("#J_GoodsPubD .items img").length%8!=0){
									var html= '<li class="selected"><a href="javascript:;"><img src="' +imgUrl + '" alt="" /></a><i></i></li>';
									$("#J_GoodsPubD .items ul:last").append(html);
									$("#J_GoodsPubD .items img").resizeImage(94,94);
								}else{
									var html= '<ul><li class="selected"><a href="javascript:;"><img src="' +imgUrl + '" alt="" /></a><i></i></li></ul>';
									$("#J_GoodsPubD .items").append(html);
									$("#J_GoodsPubD .items img").resizeImage(94,94);
									var totalPage = parseInt($(".totalP").text())+1;
									$(".totalP").text(totalPage);
									$(".curP").text(totalPage);
								}
								$scrollable.end();
								
								
							}
							
						}else{
							var html= '<ul><li><a href="javascript:;"><img src="' +imgUrl + '" alt="" /></a><i></i></li></ul>';
							$("#J_GoodsPubD .items").append(html);
							$("#J_GoodsPubD .items img").resizeImage(94,94);
						}
					}, 1000);
					break;
					case "101" : 
					$(".text-tip").html('<span class="errc">亲,请求出错，请重新发送请求试试!</span>').show();	
	 				$loading.css("visibility", "hidden"); 
					break;
					case "105" :
					$(".text-tip").html('<span class="errc">亲,没有上传图片的权限.</span>').show();	
	 				$loading.css("visibility", "hidden"); 
					break;
					case "300" :
					$(".text-tip").html('<span class="errc">亲,没登录.</span>').show();	
	 				$loading.css("visibility", "hidden"); 
					break;
					case "800" :
					$(".text-tip").html('<span class="errc">亲,图片图片大小超过2M.</span>').show();
					$loading.css("visibility", "hidden"); 
					break;
					case "801" :
					$(".text-tip").html('<span class="errc">亲,图片格式不对.</span>').show();
					$loading.css("visibility", "hidden"); 
					break;
					case "802" :
					$(".text-tip").html('<span class="errc">亲,图片尺寸不符合.</span>').show();
					$loading.css("visibility", "hidden"); 
					break;
				}
			}
			 
		}	
	
	$.guang.ugc = {
		pubJson: {
			
		},
		getCmt: function(str){
			var cmtV = $.guang.util.trim($(str+" textarea[name=proComment]").val());
			if($.guang.util.getStrLength(cmtV)>1000){
				$(str+" .goods-act").find(".errc").show().html("评论数不能超过1000字");
				return false;		
			}else if(cmtV==""){
				return "none";
			}else{
				return cmtV;
			}
		},
		//组装标签为json串以及校验
		getTags: function(str){
			var tagsV =  $.guang.util.trim($(str+" input[name=tags]").val()),
				tagsVArr = tagsV.replace(/&/g,"＆").replace(/\//g,"／").replace(/#/g,"＃").replace(/\，|\s+/g,",").split(","),
				tagsArr = [];
			for(var i=0,len=tagsVArr.length;i<len;i++){
				if(tagsVArr[i]!=""){
					var json = {"tagKeyword":tagsVArr[i]};
					tagsArr.push(json);
				}
			}
			if($.inArray("精品", tagsVArr)!=-1){
    			$(str+" .goods-act").find(".errc").show().html("标签中不能包含“精品”");
				return false;
			}else if($.guang.util.getStrLength(tagsV)>200){
				$(str+" .goods-act").find(".errc").show().html("标签不能超过200字");
				return false;
			}else{
				return tagsArr;
			}
		},
		//分享宝贝成功弹出层
		pubSuccess: function(){
			if(!$("#J_PubSuccessD")[0]){
				var html = "";
				html += '<div id="J_PubSuccessD" class="g-dialog">';
				html += '<div class="dialog-content">';
				html += '<div class="bd clearfix">';
				html += '<p class="success-text"><span class="correct">宝贝发布成功！</span></p>';
				html += '<p class="clearfix"><a class="bbl-btn goCheck" href="' + GUANGER.path + '/u/' + GUANGER.userId + '/share">前往查看宝贝</a>';
				html += '<a class="bgr-btn closeD ml10" href="javascript:;">关闭</a></p>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				$("body").append(html);
				$("#J_PubSuccessD").overlay({
					top: 'center',
					mask: {
						color: '#000',
						loadSpeed: 200,
						opacity: 0.3
					},
					closeOnClick: false,
					load: true			
				});
			}else{
				$("#J_PubSuccessD").data("overlay").load();
			}
			$("#J_PubSuccessD .closeD").click(function(){
				$("#J_PubSuccessD").overlay().close();
			});
			
		},
		//生成同步分享按钮
		setSnsSync: function(json){
				var sns2ClassName = {
					sina:'ss-sina',
					tec_weibo:'ss-tencent',
					qzone:'ss-qzone'
				}
				var snsSyncDom = $(".sns-sync ul");
				var shareHTML = "";
				for(var i in json){
					if(sns2ClassName[i]){
						shareHTML +='<li class="share-switch '+sns2ClassName[i]+'-btnclick-'+json[i]+' btnclick" data-status="'+json[i]+'" data-snsid="'+i+'" data-webname="'+sns2ClassName[i]+'"></li>';
					}
				}
				snsSyncDom.append(shareHTML);
				
				$(".btnclick").unbind().bind("click",function(){
					var $this = $(this);
					var classOn = $this.attr("data-webname")+"-btnclick-on";
					var classOff = $this.attr("data-webname")+"-btnclick-off";
					if($this.data("status")=="on"){
						$this.removeClass(classOn).addClass(classOff).data("status","off");
					}else{
						$this.removeClass(classOff).addClass(classOn).data("status","on");
					}
				});
						
		},
		//宝贝已存在
		goodsExist: function(jsonObj,userJson,_callback){
			$.guang.ugc.pubJson = {
				proId: jsonObj.proId,
				productVoId: jsonObj.productVoId,
				productName: "",
				productMerchant: "",
				url: "",
				price: "",
				salesVolume: "",
				proComment: "",
				tags: null,
				photos: [],
				favor: "false",
				typeVO: jsonObj.typeVO,
				statusVO: jsonObj.statusVO,
				targetSiteName:jsonObj.targetSiteName
			};
			//判断商品图片
			var mainPic = jsonObj.pictures.length>0?jsonObj.pictures[0].src:"http://static.guang.com/images/user/photo/avatar-80.png";
			if(!$("#J_GoodsExistD")[0]){
				var html = "";
				html += '<div id="J_GoodsExistD" class="g-dialog ugc-dialog">';
				html += '<div class="dialog-content">';
				html += '<div class="hd"><h3>逛逛上已经有这个宝贝啦</h3></div>';
				html += '<div class="bd clearfix">';
				html += '<form id="J_GoodsExistForm" action="' + GUANGER.path + '/ugc/api/upateProduct" method="POST">';
				html += '<div class="clearfix">';
				html += '<div class="goods-avatar">';
				html += '<a href="' + GUANGER.path + '/baobei/' + jsonObj.productVoId + '" target="_blank" title="' + jsonObj.productName + '"><img src="' + mainPic + '" alt="' + jsonObj.productName + '" /></a>';
				html += '</div>';
				html += '<div class="goods-info">';
				html += '<p class="goodsNm"><a href="' + GUANGER.path + '/baobei/' + jsonObj.productVoId + '" target="_blank" title="' + jsonObj.productName + '">' + jsonObj.productName + '</a></p>';
				html += '<p class="pb5">评论一下：</p>';
				html += '<p><textarea class="base-txa" name="proComment" placeholder="喜欢它什么呢？"></textarea></p>';
				html += '<p class="pt10 pb5">宝贝标签：</p>';
				html += '<p><input type="text" rel="tagsInput" class="base-input" name="tags" value="" /></p>';
				html += '<p class="pt5 gc">多个标签用空格、中文或英文逗号隔开</p>';
				html += '</div>';
				html += '</div>';
				html += '<div class="goods-act">';
				html += '<div class="clearfix"><a class="bbl-btn" id="J_GoodsSave" href="javascript:;">确定</a>';
				html += '<label class="fl mt15 ml15 gc6"><input type="checkbox" name="tomyfav" /> 加入我喜欢的宝贝</label>';
				html += '<div class="sns-sync"><span class="gc">同步分享：</span><ul></ul><span><a href="'+GUANGER.path+'/account/sns" target="_blank">设置</a></span></div></div>';
				html += '<div class="errc mt10"></div>';
				html += '</div>';
				html += '</form>';
				html += '</div>';
				html += '<a class="close" href="javascript:;"></a>';
				html += '</div>';
				html += '</div>';
				$("body").append(html);
				$("#J_GoodsExistD").overlay({
					top: 'center',
					mask: {
						color: '#000',
						loadSpeed: 200,
						opacity: 0.3
					},
					closeOnClick: false,
					load: true			
				});
				//生成sns同步
				$.guang.ugc.setSnsSync(userJson);
				
				$("#J_GoodsSave").unbind().bind("click",function(){
					$this = $(this);
					if($this.hasClass("disabled")){
						return false;
					}
					var comment = $.guang.ugc.getCmt("#J_GoodsExistD");
					if(comment=="none"){
						comment = "";
					}else if(!comment){
						return false;
					}
					var tagJson = $.guang.ugc.getTags("#J_GoodsExistD");
					if(!tagJson){
						return false;
					}
					$.guang.ugc.pubJson.proComment = comment;
					$.guang.ugc.pubJson.tags = tagJson;
					$.guang.ugc.pubJson.favor = $("#J_GoodsExistForm input[name=tomyfav]")[0].checked?"true":"false";
					var snsSiteArr = [];
					$(".sns-sync li").each(function(){
						var $this = $(this);
						if($this.data("status")=="on"){
							snsSiteArr.push($this.data("snsid"));
						}
					});
					var pubSites = snsSiteArr.join(",");
					
					$.ajax({
						url: $("#J_GoodsExistForm").attr("action"),
						type : "post",
					    dataType: "json",
						data: {
							"data": JSON.stringify($.guang.ugc.pubJson),
							"sites": pubSites
						},
						beforeSend: function(){
							$this.disableBtn("bbl-btn");
							$(".goods-act").find(".errc").show().html('<p class="ajaxvali pl20">保存中...</p>');
						},
						success: function(data){
    						if(data.code==100){
    							$("#J_GoodsExistD").overlay().close();
								$("#J_GoodsExistD").empty().remove();
								if(window.location.href.indexOf("/share")!=-1){
    								$.guang.tip.conf.tipClass = "tipmodal tipmodal-ok";
									$.guang.tip.show($this,"宝贝发布成功！");
									window.location.href = window.location.href;
								}else{
									if(_callback){
										_callback($.guang.ugc.pubJson.productVoId,comment);
									}else{
										$.guang.ugc.pubSuccess();
									}
								}
    						}else if(data.code==101){
    							$("#J_GoodsExistD").find(".errc").show();
    							$("#J_GoodsExistD").find(".errc").html("出错了，请重试…");
    							$this.enableBtn("bbl-btn");
    						}else if(data.code==102){
    							$(".text-tip").html('<span class="errc">输入的标签或评论过长</span>').show();
    							$this.enableBtn("bbl-btn");
    						}
    					}
					});
					return false;
				});
				$("#J_GoodsExistForm").submit(function(){
					return false;
				});
				$("#J_GoodsExistD").overlay().getClosers().bind("click",function(){
					$("#J_GoodsExistD").empty().remove();
				});
			}else{
				$("#J_GoodsExistD").data("overlay").load();
			}
		},
		goodspub: function(jsonObj,uploadFlag,userJson,_callback){
			$.guang.ugc.pubJson = {
				proId: jsonObj.proId,
				productVoId: jsonObj.productVoId,
				productName: jsonObj.productName,
				productMerchant: jsonObj.productMerchant,
				url: jsonObj.url,
				price: jsonObj.price,
				salesVolume: jsonObj.salesVolume,
				proComment: "",
				tags: null,
				photos: [],
				favor: "false",
				typeVO: jsonObj.typeVO,
				statusVO: jsonObj.statusVO,
				likeNumber: jsonObj.likeNumber,
				collectionNumber: jsonObj.collectionNumber,
				commentNumber: jsonObj.commentNumber,
				targetSiteName:jsonObj.targetSiteName
			};
			var uploadPicRole=false;
			if(uploadFlag){
				uploadPicRole=uploadFlag;
			}
			if(!$("#J_GoodsPubD")[0]){
				var html = "";
				html += '<div id="J_GoodsPubD" class="g-dialog ugc-dialog">';
				html += '<div class="dialog-content">';
				html += '<div class="hd"><h3>嗯~ 就是它吧</h3></div>';
				html += '<div class="bd clearfix">';
				html += '<form id="J_GoodsPubForm" action="' + GUANGER.path + '/ugc/api/saveProduct" method="POST">';
				html += '<div class="form-row"><label>宝贝名称：</label>';
				html += '<span class="goodsNm">' + jsonObj.productName + '</span>';
				html += '</div>';
				html += '<div class="form-row"><label>评论一下：</label>';
				html += '<textarea class="base-txa" name="proComment" placeholder="喜欢它什么呢？"></textarea>';
				html += '</div>';
				html += '<div class="form-row"><label>宝贝标签：</label>';
				html += '<div class="inlineblock"><input type="text" rel="tagsInput" class="base-input" name="tags" value="" />';
				html += '<p class="pt5 gc">多个标签用空格、中文或英文逗号隔开</p></div>';
				html += '</div>';
				html += '<div class="form-row clearfix"><label>宝贝图片：</label>';
				html += '<div class="goods-gallery">';
				html += '<div class="gallery-bd">';
				html += '<div class="items">';
				html += '</div>';
				html += '</div>';
				html += '<div class="gallery-ft clearfix">';
				html += '<span class="status">已选 <em>0</em> 张</span><span class="errc"></span>';
				html += '<div class="gallery-pagin"><a href="javascript:;" class="sgr-btn prev">上页</a>';
				html += '<span class="num-box"><em class="curP">1</em>/<em class="totalP"></em></span>';
				html += '<a href="javascript:;" class="sgr-btn next">下页</a></div>';
				html += '<a href="javascript:;" id="J_AddPicBtn" class="ap-btn sgr-btn" style="">上传本地图片</a>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '<div class="goods-act">';
				html += '<div class="clearfix"><a class="bbl-btn" id="J_GoodsPub" href="javascript:;">发布</a>';
				html += '<label class="fl mt15 ml15 gc6"><input type="checkbox" name="tomyfav" /> 加入我喜欢的宝贝</label>';
				html += '<div class="sns-sync"><span class="gc">同步分享：</span><ul></ul><span><a href="'+GUANGER.path+'/account/sns" target="_blank">设置</a></span></div></div>';
				html += '<div class="errc mt10"></div>';
				html += '</div>';
				html += '</form>';
				html += '</div>';
				html += '<a class="close" href="javascript:;"></a>';
				html += '</div>';
				html += '</div>';
				$("body").append(html);
				if(uploadPicRole==true){
					$("#J_AddPicBtn").show();
					//上传本地图片
					$("#J_AddPicBtn").live('click',function(){
						$(this).addLocalPic();
					});
					//关闭按钮
					$("#J_GoodsPubD .close").bind('click',function(){
						$("#J_AddPicD").fadeOut("fast");
					});
				}else{
					$("#J_AddPicBtn").hide();
				}
				$("#J_GoodsPubD").overlay({
					top: 'center',
					fixed : false,
					mask: {
						color: '#000',
						loadSpeed: 200,
						opacity: 0.3
					},
					closeOnClick: false,
					load: true			
				});
				//生成sns同步
				$.guang.ugc.setSnsSync(userJson);
				
				//宝贝图片
				var photoArr = jsonObj.photos,
				photoHtml = "";
				if(photoArr.length>0){
					photoHtml += '<ul>';
					//插入图片HTML
					var qqFlag = $.guang.util.getDomain(jsonObj.url)=="item.buy.qq.com"?true:false;
					if(qqFlag){
						photoHtml += '<li><a href="javascript:;"><img src="' + photoArr[0] + '" alt="" /></a><i></i></li>';
					}else{
						for(var i=0,length=photoArr.length;i<length;i++){
							photoHtml += '<li><a href="javascript:;"><img src="' + photoArr[i] + '" alt="" /></a><i></i></li>';
							if((i+1)%8==0 && i!=photoArr.length-1){
								photoHtml += '</ul><ul>';
							}
						}
					}
					photoHtml += '</ul>';
					$("#J_GoodsPubD .items").append(photoHtml);
					//$("#J_GoodsPubD .items img").resizeImage(94,94);
					//图片分页滚动
					$("#J_GoodsPubD .gallery-bd").scrollable({vertical: true});
					$("#J_GoodsPubD .prev").click(function(){
						var curPage = parseInt($(".curP").text()),
						totalPage = parseInt($(".totalP").text());
						if(curPage>1){
							$(".curP").text(curPage-1);
						}
					});
					$("#J_GoodsPubD .next").click(function(){
						var curPage = parseInt($(".curP").text()),
						totalPage = parseInt($(".totalP").text());
						if(curPage<totalPage){
							$(".curP").text(curPage+1);
						}
					});
					$("#J_GoodsPubD .totalP").text($("#J_GoodsPubD .gallery-bd ul").length);
				}
				//图片选择操作
				$("#J_GoodsPubD li a, #J_GoodsPubD li i").die().live("click",function(e){
					e.preventDefault();
					$("#J_GoodsPubD .gallery-ft").find(".status").show();
					$("#J_GoodsPubD .gallery-ft").find(".errc").hide();
					var selectedFlag = $(this).parent("li").hasClass("selected");
					if(selectedFlag){
						$(this).parent("li").removeClass("selected");
					}else{
						$(this).parent("li").addClass("selected");
					}
					$("#J_GoodsPubD .status em").text($("#J_GoodsPubD li.selected").length);
				});
				//宝贝发布
				$("#J_GoodsPub").unbind().bind("click",function(){
					$this = $(this);
					if($this.hasClass("disabled")){
						return false;
					}
					var selectedArr = [];
					$("#J_GoodsPubD li.selected").each(function(){
						selectedArr.push($(this).find("img").attr("src"));
					});
					var comment = $.guang.ugc.getCmt("#J_GoodsPubD");
					if(comment=="none"){
						comment = "";
					}else if(!comment){
						return false;
					}
					var tagJson = $.guang.ugc.getTags("#J_GoodsPubD");
					if(!tagJson){
						return false;
					}
					$.guang.ugc.pubJson.proComment = comment;
					$.guang.ugc.pubJson.tags = tagJson;
					$.guang.ugc.pubJson.photos = selectedArr;
					$.guang.ugc.pubJson.favor = $("#J_GoodsPubForm input[name=tomyfav]")[0].checked?"true":"false";
					if(selectedArr.length==0){
						$("#J_GoodsPubD .gallery-ft").find(".status").hide();
						$("#J_GoodsPubD .gallery-ft").find(".errc").show();
    					$("#J_GoodsPubD .gallery-ft").find(".errc").html("至少要选一张哦");
						return false;
					}
					var snsSiteArr = [];
					$(".sns-sync li").each(function(){
						var $this = $(this);
						if($this.data("status")=="on"){
							snsSiteArr.push($this.data("snsid"));
						}
					});
					var pubSites = snsSiteArr.join(",");
					$.ajax({
						url: $("#J_GoodsPubForm").attr("action"),
						type : "post",
					    dataType: "json",
						data: {
							"data": JSON.stringify($.guang.ugc.pubJson),
							"sites": pubSites
						},
						beforeSend: function(){
							$this.disableBtn("bbl-btn");
							$(".goods-act").find(".errc").show().html('<p class="ajaxvali pl20">发布中...</p>');
						},
						success: function(data){
							$("#J_AddPicD").fadeOut("fast");
    						if(data.code==100){
    							$("#J_GoodsPubD").overlay().close();
								$("#J_GoodsPubD").empty().remove();
								if(window.location.href.indexOf("/share")!=-1){
									$.guang.tip.conf.tipClass = "tipmodal tipmodal-ok";
									$.guang.tip.show($this,"宝贝发布成功！");
									window.location.href = window.location.href;
								}else{
									if(_callback){
										_callback(data.productId,comment);
									}else{
										$.guang.ugc.pubSuccess();
									}
								}
    						}else if(data.code==101){
    							$("#J_GoodsPubD .goods-act").find(".errc").show();
    							$("#J_GoodsPubD .goods-act").find(".errc").html("出错了，请重试…");
    							$this.enableBtn("bbl-btn");
    						}else if(data.code==102){
    							$("#J_GoodsPubD .goods-act").find(".errc").html("输入的标签或评论过长").show();
    							$this.enableBtn("bbl-btn");
    						}else if(data.code==112){
    							$("#J_GoodsPubD .goods-act").find(".errc").html("请认真填写商品评论").show();
    							$this.enableBtn("bbl-btn");
    						} 
    					}
					});
					return false;
				});
				$("#J_GoodsPubForm").submit(function(){
					return false;
				});
				$("#J_GoodsPubD").overlay().getClosers().bind("click",function(){
					$("#J_GoodsPubD").empty().remove();
				});
			}else{
				$("#J_GoodsPubD").data("overlay").load();
			}
		}
	}
	
	if($("a[rel=shareGoods]")[0]){
		$("a[rel=shareGoods]").click(function(){
			if(!$.guang.dialog.isLogin()){
				return false;
			}
			if(GUANGER.isBlack=="true"){
				alert("您的分享功能已被禁用");
				return false;
			}
			var $this = $(this);
			if(!$("#J_ShareGoodsD")[0]){
				var html = "";
				html += '<div id="J_ShareGoodsD" class="g-dialog sg-dialog">';
				html += '<div class="content">';
				html += '<p class="title">将宝贝网址粘贴到下面框中：</p>';
				html += '<form class="sg-form" name="shareGoods" action="' + GUANGER.path + '/ugc/api/findProduct">';
				html += '<div class="clearfix"><input class="base-input sg-input" name="url" value="" placeholder="http://" autocomplete="off" />';
				html += '<input type="submit" id="J_GoodsUrlSubmit" class="bbl-btn url-sub" value="确定" /></div>';
				html += '<div class="text-tip"></div>';
				html += '</form>';
				html += '<div class="sg-source">';
				html += '<p class="pt5 pb5">已支持网站：</p>';
				html += '<div class="source-list clearfix">';
				html += '<a class="icon-source icon-taobao" href="http://www.taobao.com/" target="_blank">淘宝网</a>';
				html += '<a class="icon-source icon-tmall" href="http://www.tmall.com/" target="_blank">天猫商城</a>';
				html += '<a class="icon-source icon-paipai" href="http://buy.qq.com/" target="_blank">QQ网购</a>';
				html += '<a class="icon-source icon-mbaobao" href="http://www.mbaobao.com/" target="_blank">麦包包</a>';
				//html += '<a class="icon-source icon-jingdong" href="http://www.jingdong.com/" target="_blank">京东商城</a>';
				html += '<a class="icon-source icon-vancl" href="http://www.vancl.com/" target="_blank">凡客诚品</a>';
				html += '<a class="icon-source icon-paipai0" href="http://www.paipai.com/" target="_blank">拍拍</a>';
				html += '</div>';
				html += '<p class="contact"><strong>不欢迎商家分享，合作请<a href="http://guang.com/contact" target="_blank">点击此处</a>。</strong></p>';
				html += '</div>';
				//html += '<div class="manual-upload">';
				//html += '<a href="javascript:;">手动上传宝贝</a>';
				//html += '</div>';
				html += '<div class="tipbox-up"><em>◆</em><span>◆</span></div>';
				html += '<a class="close" href="javascript:;"></a>';
				html += '</div>';
				html += '</div>';
				$("body").append(html);
				$(".sg-dialog .close").click(function(){
					$("#J_ShareGoodsD").fadeOut("fast");
				});
				$(".sg-form").submit(function(){
					var $this = $(this);
					var url = $.guang.util.trim($(".sg-input").val());
					if(url==""){
						$(".text-tip").html('<span class="errc">宝贝网址不能为空~</span>').show();
					}else if(!$.guang.util.validSite(url)){	
						$(".text-tip").html('<span class="errc">暂时还不支持这个网站呢~</span>').show();
					}else{
						$(".text-tip").html('<span class="gc6">宝贝信息抓取中…</span>').show();
						$("#J_GoodsUrlSubmit").disableBtn("bbl-btn");
						$.post($this.attr("action"),$this.serializeArray(),function(data){
    						if(data.code==100){
    							$("#J_ShareGoodsD").hide();
    							$.guang.ugc.goodspub(data.product,data.isUploadRole,data.userSns);
    						}else if(data.code==105){
    							$("#J_ShareGoodsD").hide();
    							$.guang.ugc.goodsExist(data.product,data.userSns);
    						}else if(data.code==101 || data.code==106){
    							$(".text-tip").html('<span class="errc">宝贝信息抓取失败，请重试…</span>').show();
    						}else if(data.code==107){
    							$(".text-tip").html('<span class="errc">暂时还不支持这个宝贝…</span>').show();
    						}else if(data.code==108){
    							$(".text-tip").html('<span class="errc">你已经分享过这个宝贝啦…</span>').show();
    						}else if(data.code==110){
    							$(".text-tip").html('<span class="errc">亲，该商品所在商家已列入黑名单，申诉请联系GCTU@guang.com</span>').show();
    						}else if(data.code==444){
    							alert("你已被禁止登录！");
    							window.location.href="http://guang.com/logout";
    						}else if(data.code==442){
    							alert("请不要频繁分享同一店铺的商品，否则帐户可能会被冻结。如果你是优质商户，请联系我们（bd@guang.com）");
    						}else if(data.code==443){
    							alert("由于你频繁分享同一店铺商品，分享功能已被禁用。有疑问请联系 GCTU@guang.com（注：邮件附上用户名）");
    						}else if(data.code==445){
    							alert("城管大队怀疑你恶意发广告，将禁止你发布商品的权利，申诉请联系GCTU@guang.com");
    						}
    						$("#J_GoodsUrlSubmit").enableBtn("bbl-btn");
    					});
					}
					return false;
				});
			}else{
				$(".sg-input").val("");
				$(".text-tip").html("");
			}
			if($this.hasClass("hd-share-goods")){
				$(".shareIt").append($("#J_ShareGoodsD"));
			}else{
				$("body").append($("#J_ShareGoodsD"));
			}				
			var position = $.guang.util.getPosition($this).leftBottom();
			var W = $("#J_ShareGoodsD").outerWidth(),
			H = $("#J_ShareGoodsD").outerHeight(),
			btnW = $this.outerWidth(),
			dLeft = position.x,
			tipLeft = btnW/2 - 8;
			if((position.x + W) > 960){
				dLeft = position.x - (W - btnW);
				tipLeft = W - btnW/2 - 8;
			}
			$("#J_ShareGoodsD .tipbox-up").css({
				left: tipLeft + "px"
			});
			if($this.hasClass("hd-share-goods")){
				$("#J_ShareGoodsD").css({
					left: "auto",
					right: "0",
					top: "33px"
				}).fadeIn("fast");
			}else{
				$("#J_ShareGoodsD").css({	
					right: "auto",			
					left: dLeft + "px",
					top: position.y + 10 + "px"
				}).fadeIn("fast");
			}
			$(".sg-input").focus();
		});
	}
	//标签输入框自动转换“,”
	$("input[rel=tagsInput]").live("keyup",function(){
		//限制每个标签的中文长度
		var MaxSingleTagLength = 14,
		MaxAllTagsLength = 64,
		thisVal = $(this).val();
		if($.guang.util.getStrLength($.guang.util.htmlToTxt(thisVal))<=MaxAllTagsLength){
			var $this = $(this);
			thisVal = thisVal.replace(/\uff0c|\s+/g,",");
			while(thisVal.indexOf(',,')>=0){
				thisVal = thisVal.replace(',,',',');
			}
			var thisValueArr = thisVal.split(","),
			thisValueArrIndex = 0,
			istoolong = false;
			for(;thisValueArrIndex<thisValueArr.length;thisValueArrIndex++){
				var val = thisValueArr[thisValueArrIndex]
				if($.guang.util.htmlToTxt(val).length>MaxSingleTagLength){
					istoolong = true;
					thisValueArr[thisValueArrIndex] = $.guang.util.substring4ChAndEn(val,MaxSingleTagLength);
				}
			}
			if(istoolong){
				thisVal = thisValueArr.join(",");
			}
			if(thisVal != this.value){
				this.value = thisVal;
			}
		}else{
			this.value = $.guang.util.substring4ChAndEn(thisVal,64);
		}
	});
//})(jQuery);

$(function() {
	var checkInTimeout = null;
	//0or1,0未签，1已签
	var changeCheckInIcon = function(status){
		if(status){
			$("a[rel=signIn]").addClass("checked").text("已签");
		}else{
			$("a[rel=signIn]").removeClass("checked").text("签到");
		}
	}
	var singinOnClickCallBack = function(o,data,show){
		$("#checkin_intro").unbind().remove();
		var userCheckinDays = (data.userCheckinDays+'').length==1?('0'+data.userCheckinDays):data.userCheckinDays;
		var HTML = ""
			+'<div id="checkin_intro">'
				+'连签：<b class="checkin_days">'+userCheckinDays+'</b>&nbsp;天<br/>'
				+'积分：<b id="jifen">'+data.userScore+'</b>&nbsp;分<br/>'
				//+'<a href="'+GUANGER.path+'/huodong/event3" target="_blank"><img src="http://static.guang.com/images/ui/qiandao.png" alt="签到有奖" /></a>'
				+'<p>'
				+'签到：10积分/天<br/>'
				+'连签7天：送100<br/>'
				+'连签15天：送300<br/>'
				+'连签22天：送1000<br/>'
				+'<a href="'+GUANGER.path+'/account/invitation" target="_blank">邀请可获更多积分</a>'
				+'</p>'
			+'</div>';
		o.after(HTML);
		$("#checkin_intro").hover(function(){
			if(checkInTimeout != null){
				clearTimeout(checkInTimeout);
			}
		},function(){
			checkInTimeout = setTimeout(function(){
				$("#checkin_intro").remove();
			},500);
		})
		var jifenShow = function(start,end,length){
			if(start>=end&&$("#jifen")[0]){
				$("#jifen").html(end)
				return;
			}
			$("#jifen").html(start+length)
			setTimeout(function(){
				jifenShow(start+length,end,length)
			},50)
		}
		if(show=="show"){
			var minlength = (data.userScore/20<1)?1:Math.floor(data.userScore/20);
			jifenShow(data.userScore/2,data.userScore,minlength);
		}
	}
	
	//签到轮询函数
	var timeJudgment = function(){
		if(GUANGER.userId.length<=1){
			return "Not login";
		}
		$.ajax({
			url: GUANGER.path+"/user_score",
			type : "post",
			dataType: "json",
			success: function(data){
				if(data.code==100){
					changeCheckInIcon(data.status);
				}else if(data.code==101){
					//积分获取失败
					//$.guang.tip.conf.tipClass = "tipmodal tipmodal-error3";
					//$.guang.tip.show($this,">_<积分获取失败");
				}else if(data.code==300){
					//未登录
					changeCheckInIcon(false);
				}
			}
		});
	}
	timeJudgment();
	
	$("a[rel=signIn]").click(function(){
		if(!$.guang.dialog.isLogin()){
			return false;
		}
		if($("a[rel=signIn]").hasClass("checked")){
			return false;
		}
		var $this = $(this);
		$.ajax({
			url: GUANGER.path+"/user_checkin",
			type : "post",
			dataType: "json",
			success: function(data){
				if(data.code==100){
					singinOnClickCallBack($this,data,"show")
					changeCheckInIcon(true);
				}else if(data.code==101){
					//签到失败
					$.guang.tip.conf.tipClass = "tipmodal tipmodal-error3";
					$.guang.tip.show($this,">_< 签到失败！");
				}else if(data.code==103){
					//已签到
					singinOnClickCallBack($this,data)
					changeCheckInIcon(true);
				}else if(data.code==300){
					//未登录
					$.guang.dialog.login();
				}
			}
		});
	})

	$("a[rel=signIn]").hover(function(){
		if(GUANGER.userId.length<=1){
			return "Not login";
		}
		$this = $(this);
		$.ajax({
			url: GUANGER.path+"/user_score",
			type : "post",
			dataType: "json",
			success: function(data){
				if(data.code==100){
					singinOnClickCallBack($this,data);
				}else if(data.code==101){
					//积分获取失败
					data.userScore = 0;
					data.userCheckinDays = 0;
					singinOnClickCallBack($this,data)
				}else if(data.code==300){
					//未登录
					$.guang.dialog.login();
				}
			}
		});
	},function(){
		if($("#checkin_intro")[0]){
			checkInTimeout = setTimeout(function(){
				$("#checkin_intro").remove();
			},500);
		}
	});
	
	//求鉴定弹窗
	$("a[rel=J_InviteFellowJudge]").click(function(){
		
	});
	
	//创作主题入口
	$(".hd-create-topic").click(function(){
		if(!$.guang.dialog.isLogin()){
			return false;
		}
	});
});
/* 分享按钮 */
//(function($) { 
	$.fn.shareBtn = function(){
		if(!$(".share-dropdown")[0]){
			var html = '';
			html += '<ul class="share-link share-dropdown">';
			html += '<li><a class="s-sina" href="javascript:;">分享到新浪微博</a></li>';
			html += '<li><a class="s-qzone" href="javascript:;">分享到QQ空间</a></li>';
			html += '<li><a class="s-tencent" href="javascript:;">分享到腾讯微博</a></li>';
			html += '<li><a class="s-douban" href="javascript:;">分享到豆瓣</a></li>';
			html += '<li><a class="s-renren" href="javascript:;">分享到人人网</a></li>';
			html += '<li><a class="s-163" href="javascript:;">分享到网易微博</a></li>';
			html += '</ul>';
			$("body").append(html);
		}
		return this.each(function() {
			var $this = $(this);
			$this.bind("mouseover",function(){
			$(".share-dropdown a").unbind("click").click(function(){
				var type = $(this).attr("class"),
				shareTxt = encodeURIComponent($this.data("sharetxt")),
				shareLink = $this.data("sharelink"),
				sharePic = encodeURIComponent($this.data("sharepic"));
				if(shareLink.indexOf("http://guang.com")==-1){
					shareLink = encodeURIComponent("http://guang.com" + shareLink);
				}
				switch(type){
					case "s-sina":
						window.open('http://service.t.sina.com.cn/share/share.php?appkey=1207757825&title='+shareTxt+'&pic='+sharePic+'&url='+shareLink);
						break;
					case "s-tencent":
						window.open('http://v.t.qq.com/share/share.php?appkey=801128565&url='+shareLink+'&title='+shareTxt+'&pic='+sharePic+'&site='+shareLink);
						break;
					case "s-douban":
						window.open('http://www.douban.com/recommend/?url='+shareLink+'&title='+shareTxt);
						break;
					case "s-qzone":
						window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+shareLink);
						break;
					case "s-renren":
						window.open('http://share.renren.com/share/buttonshare.do?link='+shareLink+'&title='+shareTxt);
						break;
					case "s-163":
						window.open('http://t.163.com/article/user/checkLogin.do?link='+shareLink+'&source=&info='+shareTxt+'&images='+sharePic);
				}
			});
			});
			$this.dropDown({
				classNm: ".share-dropdown",
				offsetX: 122,
            	offsetY: 0,
				isLocation: true
			});
    	});
		
	}
//})(jQuery);

$(function() {
	//消息提示
	if(GUANGER.userId.length>0&&$("a[rel=xiaoxi]")[0]){
		var xiaoxiTipCallBack = function(data){
			var hasMessage = false;
			var HTML = "";
			HTML += "<div class='xiaoxi-tip'><a href='javascript:;' class='closetip'>x</a>";
			if(data.fansMessageNum){
				hasMessage = true;
				HTML += "<div class='xiaoxi-item' data-type='fans'><a href='"+GUANGER.path+"/u/"+GUANGER.userId+"/fans'>"+data.fansMessageNum+" 位新粉丝</a></div>";
			}
			if(data.commentMessageNum){
				hasMessage = true;
				HTML += "<div class='xiaoxi-item' data-type='comments'><a href='"+GUANGER.path+"/xiaoxi/comment'>"+data.commentMessageNum+" 条新评论</a></div>";
			}
			if(data.replyMessageNum){
				hasMessage = true;
				HTML += "<div class='xiaoxi-item' data-type='reply'><a href='"+GUANGER.path+"/xiaoxi/reply'>"+data.replyMessageNum+" 条新回复</a></div>";
			}
			if(data.atMessageNum){
				hasMessage = true;
				HTML += "<div class='xiaoxi-item' data-type='at'><a href='"+GUANGER.path+"/xiaoxi/at'>"+data.atMessageNum+" 条新@我</a></div>";
			}
			if(data.appraisalMessageNum){
				hasMessage = true;
				HTML += "<div class='xiaoxi-item' data-type='appraisal'><a href='"+GUANGER.path+"/xiaoxi/appraisal'>"+data.appraisalMessageNum+" 条新鉴定</a></div>";
			}
			if(data.systemMessageNum){
				hasMessage = true;
				HTML += "<div class='xiaoxi-item' data-type='sys'><a href='"+GUANGER.path+"/xiaoxi/system'>"+data.systemMessageNum+" 个新通知</a></div>";
			}

			HTML += "</div>";
			if (hasMessage){
			$("#header .person").after(HTML);
			}
			
			if(data.feedsMessageNum>0){
				var FEEDSHTML = "<div class='xiaoxi-sum'>"+(data.feedsMessageNum>99?"N":data.feedsMessageNum)+"</div>";
				$("#header #feeds-xiaoxi").append(FEEDSHTML);
			}
			
			$("#header .xiaoxi-tip .closetip").click(function(){
				var $tipParent = $(this).parent(".xiaoxi-tip");
				//noticeType = $tipParent.data("type");
				$.ajax({
					url: GUANGER.path+"/cancel_notify",
					type : "post",
					dataType: "json",
					data: {},
					success: function(data){
						$tipParent.fadeOut(500);
					}
				});
			});
		}
		$.ajax({
			url: GUANGER.path+"/message_count",
			type : "post",
			dataType: "json",
			success: function(data){
				if(data.code==100){
					if(data.fansMessageNum>0 || data.commentMessageNum>0 || data.replyMessageNum>0 || data.atMessageNum>0 || data.appraisalMessageNum>0 || data.systemMessageNum>0 || data.feedsMessageNum>0){
						xiaoxiTipCallBack(data);
					}
				}
			}
		});
	}
});

$(function() {	
	
	$(window).bind("scroll",function(){
		var docScrollTop = $(document).scrollTop();
		//IOS平台如iphone、ipad、ipod不执行导航滚动
		if(!$.guang.util.isIOS()){
			if(docScrollTop > 83){
				$(".m-nav").addClass("fixed")
				$(".header-nav-search").show();
			}else
			{
				$(".m-nav").removeClass("fixed");
				$(".header-nav-search").hide();
			};
			
		}
		//IE6下的定位
		/* ie6导航栏不做定位 by luyao
		if ($.guang.util.isIE6()) {
			if(docScrollTop > 83) {
				$(".m-nav").css("top", docScrollTop) 
				$(".header-nav-search").show();
			}else{ 
				$(".m-nav").css("top", "83px");
				$(".header-nav-search").hide();
			}
		}
		*/
	});		
	
	
	$(".login-dropdown a").unbind("click").click(function(){
		if($(this).hasClass("s-douban")){
			$.guang.dialog.doubanTip();
		}else{
			var snsurl = $(this).attr("href");
			$.guang.util.openWin(snsurl);
		}
		return false;
	});
	
	$(".regLogin").dropDown({
		classNm: ".login-dropdown"
	});
	
	$(".unlogin-login").dropDown({
		classNm: ".unlogin-dropdown"
	});
	
	$(".gohome").dropDown({
		classNm: ".set-dropdown"
	});
	$(".xiaoxi").dropDown({
		classNm: ".xiaoxi-dropdown"
	});
	$(".btn-sg").dropDown({
		classNm: ".shareit-dropdown"
	});
    $(".weibo-login").dropDown({
		classNm: ".weibo-dropdown"
	});
	$(".btn-sg").bind("mouseover",function(){
		if($("#checkin_intro")[0]){
			$("#checkin_intro").remove();
		}
	});
	
	$("#returnTop").returntop();
});

//广告位点击数
function countAdNum(obj){
	var $this=$(obj);
	$.ajax({
		 url:GUANGER.path+"/advertisement/clickAdv",
		 type : "post",
			 dataType: "json",
       	 data: {
       		   id: $this.attr("data")
       	   },
		 success:function(data){
			 	
			 }
	});
}



});
