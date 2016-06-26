$(document).ready(function(){

	$(".sidebar-list li h3").click(function(){
		$(this).siblings('.sub-menu').slideToggle();
	});	
	
	//画册删除XX
	$(".galaryBox dl dt").mouseover(function(){
		$(this).find('a.deleteImg').show();
	}).mouseout(function(){
		$(this).find('a.deleteImg').hide();	
	});	
    
});