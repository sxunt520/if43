!function(a){a.guang.pinterest={conf:{container:".faxian_goods_wall",unit:".f_goods",page:1,showNum:20,limitNum:100,columns:4,colArray:[],containerW:1200,columnWithSpace:243,columnTopSpace:20,hoverClass:"current",fillClass:"f_goods_fill"},init:function(){var b=a.guang.pinterest,c=b.conf;if(0==c.colArray.length)for(var d=0;d<c.columns;d++)c.colArray[d]=0;b.load(),a(window).bind("scroll",b.load)},load:function(){var b=a.guang.pinterest,c=b.conf,d=a(c.container),e=(c.page-1)*c.showNum,f=c.page*c.showNum,g=c.unit,h=d.find(g).slice(e,f),i=d.find(g).slice(f,c.limitNum),j=a.trim(c.hoverClass);i.each(function(){a(this).hide()}),h.each(function(){var d=a(this),e=jQuery.inArray(Math.min.apply(Math,c.colArray),c.colArray),f=c.colArray[e];if(d.css("top",f+"px"),d.css("left",e*c.columnWithSpace+"px"),d.show(),c.page>1){var g=d.find("img:first");g.attr("src",g.data("original")),g.removeAttr("data-original")}c.colArray[e]=f+d.innerHeight()+c.columnTopSpace,""!=j&&d.hover(function(){d.addClass(c.hoverClass)},function(){d.removeClass(c.hoverClass)})}),d.height(Math.max.apply(Math,c.colArray)),c.page+=1,(6==c.page||h.length<20||d.find(g).length<=20)&&(b.fill(),a(window).unbind("scroll",b.load))},fill:function(){for(var b=a.guang.pinterest,c=b.conf,d=Math.max.apply(Math,c.colArray),e=jQuery.inArray(d,c.colArray),f=0;f<c.columns;f++)f!=e&&a(c.container).append('<div class="'+c.fillClass+'" style="top:'+c.colArray[f]+"px;left:"+f*c.columnWithSpace+"px;height:"+(d-c.colArray[f]-c.columnTopSpace)+'px"></div>')}}}(jQuery);