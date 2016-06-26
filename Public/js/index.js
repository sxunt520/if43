function changeSearchIndex(obj,names)
	{
		document.getElementById('actStr').innerHTML=names;
		document.getElementById('soform').action='http://xxxx/'+obj+'.php';
		Hslide()
	}
function Hslide()
	{	
		if (document.getElementById('actWeb').style.display=='block')
		{
		//getId('seleItem').className='current';
		document.getElementById('actWeb').style.display='none';
		}
	}

/*首页幻灯片*/
$(function(){
	if( jQuery.isFunction(jQuery.fn.kinMaxShow) ){ 
	
	$("#kinMaxShow").kinMaxShow({
			height:330,
			button:{
					showIndex:false,
					normal:{background:'#fff',width:'12px',height:'12px',marginRight:'10px',border:'0',right:'30px',bottom:'15px'},
					focus:{background:'#EE2266',border:'0'}
				}
				
	});
	
	}
	
});


/*内页首页幻灯片*/
$(function(){
	if( jQuery.isFunction(jQuery.fn.carouFredSel) ){ 
	
	$('.itemList ul').carouFredSel({
					prev: '.prevList',
					next: '.nextList',
					items: 6,//滚动个数
					//pagination: "#pager",
					scroll: 700
				});		
	
	}
	
});

$(document).ready(function(){
	
/*搜索框_Action*/
	var MoveTimeObj;
	$("#seleItem,#actWeb").mouseover(function(){
		clearInterval(MoveTimeObj);			
		$('#actWeb').css("display","block");
	}).mouseout(function(){
		MoveTimeObj=setTimeout("$('#actWeb').css(\"display\",\"none\")",500);
	});
	
//公用显视隐藏
	$(".showHide").mouseover(function(){
		$(this).find('.showHideIng').show();
	}).mouseout(function(){
		$(this).find('.showHideIng').hide();	
	});	

//公用显视隐藏淡入淡出
	$(".showHide2").mouseover(function(){
		$(this).find('.showHide2Ing').stop().fadeToggle(400);
		$(this).find('.hideXX').stop().fadeToggle();
	}).mouseout(function(){
		$(this).find('.showHide2Ing').stop().fadeToggle();
		$(this).find('.hideXX').stop().fadeToggle(400);
	});		

//导航浮动
$(window).bind("scroll",function(){
	var docScrollTop = $(document).scrollTop();
	//IOS平台如iphone、ipad、ipod不执行导航滚动
		if(docScrollTop > 0){//83
			$(".m-nav").addClass("fixed")
			$(".header-nav-search").show();
		}else
		{
			$(".m-nav").removeClass("fixed");
			$(".header-nav-search").hide();
		};
	});		
    
///////首页导航筛选
	var a = null;
	$(".main-focus-tags .tags-bd").hover(function() {
		var d = $(this),
		b = d.data("popup"),
		e = $("." + b),
		c = d.find(".popup-arr-lf");
		if (a) {
			clearTimeout(a);
		}
		$(".tags-popup, .popup-arr-lf").hide();
		c.show();
		e.show();
	},
	function() {
		var d = $(this),
		b = d.data("popup"),
		e = $("." + b),
		c = d.find(".popup-arr-lf");
		a = setTimeout(function() {
			c.hide();
			e.hide();
		},
		500);
	});
	$(".tags-popup").hover(function() {
		var c = $(this),
		b = c.index();
		clearTimeout(a);
	},
	function() {
		var d = $(this),
		b = d.attr("class").replace("tags-popup", ""),
		b = $.trim(b),
		c = $(".main-focus-tags .tags-bd[data-popup=" + b + "]");
		c.find(".popup-arr-lf").hide();
		d.hide();
	});

//////今选主题
 $(".topic-recommend").hover(function() {
        var c = $(this);
        var b = $(window).width();
        if (b > 1200) {
            delay = setTimeout(function() {
                c.find(".J_picGrid").animate({
                    top: "171px"
                },
                150);
            },
            200);
        } else {
            delay = setTimeout(function() {
                c.find(".J_picGrid").animate({
                    top: "163px"
                },
                150);
            },
            200);
        }
    },
    function() {
        clearTimeout(delay);
        var b = $(window).width();
        if (b > 1200) {
            $(this).find(".J_picGrid").animate({
                top: "274px"
            },
            150);
        } else {
            $(this).find(".J_picGrid").animate({
                top: "242px"
            },
            150);
        }
    });
	
	//更多评论
	$(".gengduo").click(function(){
		$("#J_ShowResult").find(".hideDiv").toggle(500);
		$(this).hide();
		$(".showqi").show();	
	})	
	$(".showqi").click(function(){
			$("#J_ShowResult").find(".hideDiv").toggle(1000);
			$(this).hide();
			$(".gengduo").show();	
		})	
	//回复
	$(".cmt-doc .hf").click(function(){
			$(this).parent().parent().find('.hf2').toggle(1000);
		})		
	
	
});


//头部顶部图片导航
$(function() {
    $('#bar-i-wx').hover(function(){
	$("#bar-c-wx").stop().fadeToggle(400);
    });
    $('.nav .logo').hover(function(){
        $(this).find("div").stop().fadeToggle(400);
    });
    $('#bar-i-wb').hover(function(){
	$("#bar-c-wb").stop().fadeToggle(400);
    });
    $('.bar .search').click(function(){
        $(this).hide();
	$('.input-wrap').show().find('input[name=q]')[0].focus();
    });
    $('.input-wrap').find('input[name=q]').blur(function(){
        $('.input-wrap').hide();
        $('.bar .search').show();
    });
    $('#tn>li').mouseover(function(){
        $('#tm>div').hide().eq($(this).index()).show();
    });
    $('.wrap').hover(function(){
            $("#tm").stop().fadeIn(100);
        },
        function(){
            $("#tm").stop().fadeOut(100);
    });
    
});