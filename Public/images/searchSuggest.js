/*
 * 搜索下拉框关联 
 * heiniu@guang.com 
 * 2012-08-10
 * 世界有我更精彩,相信自己,加油!
 */
define(function(require, exports) {
 var $ = require('jquery');

//(function($){
	//自动匹配下拉列表
	$.suggest = function(input, options) {
		var $input = input, $results;
		
		if(!$("#"+options.containerId)[0]){
			$input.closest("div").append('<div class="suggest-wrap"><div id="'+options.containerId+'" class="suggest" style="top:29px;left:8px"><div class="suggest-tip"></div><ol class="autocomplete"></ol></div></div>');
		}
		$results = $("#"+options.containerId);
		//resetPosition();
		$results.hide();
		var inputTimer = null;
		$input.live("keyup", function(e){
			if ((/27$|38$|40$/.test(e.keyCode) && $results.is(':visible')) ||
					(/^13$|^9$/.test(e.keyCode) && getCurrentResult())) {
		            
		            if (e.preventDefault)
		                e.preventDefault();
					if (e.stopPropagation)
		                e.stopPropagation();

	                e.cancelBubble = true;
	                e.returnValue = false;
				
					switch(e.keyCode) {

						case 38: // up
							prevResult();
							break;
				
						case 40: // down
							nextResult();
							break;
						case 13: // return
							selectCurrentResult();
							break;
							
						case 27: //	escape
							$results.hide();
							break;
					}
					
			}else{
				var searchV = $.trim($input.val());
				if(inputTimer){
					clearTimeout(inputTimer);	
				}
				
				$results.hide();
				if(searchV==""){
					return false;
				}
				inputTimer = setTimeout(function(){
					$.ajax({
						type : "post",
			   			dataType: "json",
			  			data: $.extend({
							keywords: searchV,
							limit: options.limit,
							from : "front"
						}, options.ajaxData),
						url: options.ajaxUrl,
						success: function(d){
						
							$(".autocomplete").empty().html("");
							$(".suggest-tip").html("");
							if(d.code == 110){
								$(".suggest-tip").html("无匹配项~");
								$("#"+options.containerId).hide();
							}else if(d.code == 100){
								$("#"+options.containerId).show();
								var len = d[options.listName].length;
								//console.log(len);
								
								options.successClk(d);
								
								if(len == 0){
									$(".suggest-tip").html("无匹配项~");
								}else{
									
									$(".suggest-tip").html("共 "+ len +" 条匹配项");
									
									$results.children('ol').children('li:first-child').addClass(options.selectClass);
							
									$results.children('ol').children('li').mouseover(function() {
										$results.children('ol').children('li').removeClass(options.selectClass);
										$(this).addClass(options.selectClass);
									}).click(function(e) {
										e.preventDefault(); 
										selectCurrentResult();
									});									
								}
							}else{
								$(".suggest-tip").html("服务器返回异常~");
							}
							
							
							//$results.show();
						}
					});
				},options.delay);
			}
		});
		/*
			$input.live("blur", function() {
				setTimeout(function() { 
					$results.hide();
				}, 200);
			});
		*/
		//点击非选框区可直接关闭选框
		document.onclick = function (event) {
			var $box  = $("#" + options.containerId);
			var e = event || window.event; //兼容ie和非ie的event
			var aim = e.srcElement || e.target; //兼容ie和非ie的事件源
			if (e.srcElement) {
		        var aim = e.srcElement;
		        if (aim != $box[0] && aim.tagName != "LI") {
		            $box.hide();
		        }
		    } else {
		        var aim = e.target;
		        if (aim != $box[0] && aim.tagName != "LI") {
		            $box.hide();
		        }
		    }	
		}
		
			function getCurrentResult() {			
				if (!$results.is(':visible'))
					return false;
			
				var $currentResult = $results.children('ol').children('li.' + options.selectClass);
				if (!$currentResult.length)
					$currentResult = false;
					
				return $currentResult;

			}
			
			function selectCurrentResult() {			
				$currentResult = getCurrentResult();
			
				if ($currentResult) {
					
					var selectA = $currentResult.children('a');
					//console.log(selectA.text());
					//console.log($input);
					$input.val(selectA.text());
					if(selectA.attr("data-id") && selectA.attr("data-id") != ""){
						$input.attr("data-id", selectA.attr("data-id"));
					}
					options.selectedCurrentClk(selectA.text());
					$results.hide();
				}
			
			}
			
			function nextResult() {			
				$currentResult = getCurrentResult();
			
				if ($currentResult){
					$currentResult.removeClass(options.selectClass).next().addClass(options.selectClass);
				}else{
					$results.children('ol').children('li:first-child').addClass(options.selectClass);
				}
			}
			
			function prevResult() {			
				$currentResult = getCurrentResult();
			
				if ($currentResult){
					$currentResult.removeClass(options.selectClass).prev().addClass(options.selectClass);
				}else{
					$results.children('ol').children('li:last-child').addClass(options.selectClass);
				}
			}
	}
			
	$.fn.suggest = function(conf){  
		
		conf = $.extend({
			type : "tag",
			limit : 50,
			listName : "tagList",
			ajaxUrl: "",
			ajaxData : {},
			delay: 500,
			selectClass: "hover",
			containerId: "J_SuggestResult",
			successClk : function($json){},
			selectedCurrentClk : function(){}
		},conf || {});  
		var self = this;
		this.each(function() {
			new $.suggest(self, conf);
		});
	}

	//搜索扩展
	$.searchSuggest = function(o, opts){
		var $this = o;
		$this.suggest({
			type : "search",
			containerId : opts.containerId,
			listName : "productSearchSuggestVOList",
			ajaxUrl: GUANGER.path + "/search/product/suggest",
			ajaxData : {
				contentType : "search"
			},
			successClk : function($json){
				if($json.productSearchSuggestVOList.length == 0){
					return;
				}
				var html = "";
				$.map($json.productSearchSuggestVOList, function(value, index){
					html += '<li><a class="ofh">' + value.keywords + '</a></li>';
				});
				$("#" + opts.containerId).find(".autocomplete:first").append(html);	
			},
			selectedCurrentClk : function(val){
				//选中选项后回调函数
				$("#J_SearchBarSubmit").click();
			}
		});
	}
//})(jQuery);

$(function(){
	$.searchSuggest($("#J_SearchKeyword"), {
		containerId : "J_SearchSuggestList"
	});
});

});