define(function(require, exports) {
 var $ = jQuery = require('jquery');

//友情链接随机显示
$(function() {	
	var friendlinks = $(".friendlinks dd")
	var randomlink = function(){
		var pickNum = Math.floor(friendlinks.length*Math.random());
		var pickOne = friendlinks.slice(pickNum,pickNum+1);
		friendlinks = friendlinks.not(pickOne[0]);
		return pickOne;
	}
	//将剩下的链接隐藏
	for(var i=0;i<8;i++){
		randomlink();
	}
	friendlinks.css({
		position:"absolute",left:"-4000px"
	});
	
	//header 搜索框
	$(".header-search-button").bind("click",function(){
		var self=$(this);
		var form=self.closest("form");
		var input=$(".search-input-keyword");
		var inputVal=input.val();
		inputVal=$.guang.util.trim(inputVal);
		if(inputVal=="懒得逛了，我搜～"){
			input.val("");
			input.focus();
			return false;
		}
		if(inputVal==""){
			input.focus();
			return false;
		}
		form.submit();
	});
	
	$(".search-input-keyword").bind("click",function(){
		var self=$(this);
		var inputVal=$.guang.util.trim(self.val());
		if(inputVal=="懒得逛了，我搜～"){
			self.val("");
		}
	});
	
	$(".search-input-keyword").bind("keydown",function(event){
		var keycode=event.which;
		var self=$(this);
		self.css("color","#fff");
		$(".header-search-button").css("opacity","1")
		var form=self.closest("form");
		var inputVal=self.val();
		inputVal=$.guang.util.trim(inputVal);
		if(keycode=="13"){
			if(inputVal==""){
    			self.focus();
    			return false;
    		}
			form.submit();
		}
	});
	
	$(".search-input-keyword").bind("blur",function(){
		var self=$(this);
		var inputVal=$.guang.util.trim(self.val());
		if(inputVal==""){
			self.val("懒得逛了，我搜～");
		}
	});
	
	$(".header-nav-search").bind("click",function(){
		$(".search-input-keyword").val("");
		$(document).scrollTop(0);
		$(".search-input-keyword").focus();
	});


	//授权登录后关注逛逛弹出层
	window.followGuang = function(code,msg,site,flag,refresh){	
		if(code==444){
			alert(msg);
			return false;
		}
		if((site!="sina" && site!="qzone" && site!="tec_weibo") || flag=="true" || jQuery.cookie("noMoreTip")=="n"){
			if(refresh){
				window.location.reload();
			}
			return false;
		}
		var bdClass = "",
		frameHtml = "";
		if(site=="sina"){
			bdClass = "sinaBd";
			frameHtml = '<iframe width="63" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" border="0" src="http://widget.weibo.com/relationship/followbutton.php?language=zh_cn&width=63&height=24&uid=2439301091&style=1&btn=red&dpc=1"></iframe>';
		}else if(site=="qzone"){
			bdClass = "qzoneBd";
			frameHtml = '<iframe src="http://open.qzone.qq.com/like?url=http%3A%2F%2Fuser.qzone.qq.com%2F2408899511&type=button&width=400&height=30&style=2" allowtransparency="true" scrolling="no" border="0" frameborder="0" style="width:65px;height:30px;border:none;overflow:hidden;"></iframe>';
		}else if(site=="tec_weibo"){
			bdClass = "tencentBd";
			frameHtml = '<iframe src="http://follow.v.t.qq.com/index.php?c=follow&a=quick&name=iguang2011&style=5&t=1336569088774&f=0" frameborder="0" scrolling="auto" width="125" height="24" marginwidth="0" marginheight="0" allowtransparency="true"></iframe>';
		}
		if(!$("#followDialog")[0]){
			var html = '<div id="followDialog" class="g-dialog">';
			html +=	'<div class="dialog-content">';
			html +=	'<div class="hd"><h3></h3></div>';
			html +=	'<div class="bd clearfix '+bdClass+'">';
			html +=	'<div class="btnFrame">';
			html +=	frameHtml;		
			html +=	'</div>';
			html +=	'</div>';
			html +=	'<i></i>';
			html +=	'<label><input type="checkbox" class="check" name="noMore" />不再提示</label>';
			html +=	'<a class="close" href="javascript:;"></a>';
			html +=	'</div>';
			html +=	'</div>';
			$("body").append(html);
			if($("#loginDialog:visible")[0]){
				$("#loginDialog").empty().remove();
				$("#exposeMask").empty().remove();
			}
			$("#followDialog").overlay({
				top: 'center',
				mask: {
					color: '#000',
					loadSpeed: 200,
					opacity: 0.3
				},
				closeOnClick: false,
				load: true			
			});
			$("#followDialog").overlay().getClosers().bind("click",function(){
				if($("input[name=noMore]")[0].checked){
					jQuery.cookie("noMoreTip","n");
				}
				if(refresh){
					window.location.reload();
				}
			});
		}	
	}
	
	if(GUANGER.userId==""){
		function getCookie(cookieName) {
			var start = document.cookie.indexOf(cookieName+"=");
			if (start ==-1) {return "";}
			 var arrStr = document.cookie.split("; ");
		   for(var i = 0;i < arrStr.length;i ++){
		    var temp = arrStr[i].split("=");
		    if (temp[0] == cookieName) {
				return unescape(temp[1]);
			};
		   } 
		}
		
		var likeProduct= getCookie("productFavor");
		var flag=likeProduct.length;
		if(flag > 2){
			var likeProductLength = likeProduct.split(",").length;
			$(".unlogin-like-text .count").text(likeProductLength);
			$(".unlogin-like").show();
		}else{
			$(".unlogin-like").hide();
		}
		
			
		

		
	}	
	
	
})

});