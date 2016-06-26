var length = $(".article-block-overlay").length,
	slideTimer = null,
	preIndex = 0;

function autoRun(index) {
	slideTimer = setInterval(function() {
		if (index < length) {
			index++;
			preIndex = index;
			slide2Right(index); //默认向右滑动
			if (index == length) {
				index = 0;
			}
		}
	}, 6000);
}
autoRun(0);
//向右滑动
function slide2Right(ind) {
	if (ind == 1) {
		$("#slideDiv1").removeClass("slideDiv1").addClass("slideDiv4");
		$("#slideDiv2").removeClass("slideDiv2").addClass("slideDiv1");
		$("#slideDiv3").removeClass("slideDiv3").addClass("slideDiv2");
		$("#slideDiv4").removeClass("slideDiv4").addClass("slideDiv3");
	} else if (ind == 2) {
		$("#slideDiv1").removeClass("slideDiv4").addClass("slideDiv3");
		$("#slideDiv2").removeClass("slideDiv1").addClass("slideDiv4");
		$("#slideDiv3").removeClass("slideDiv2").addClass("slideDiv1");
		$("#slideDiv4").removeClass("slideDiv3").addClass("slideDiv2");
	} else if (ind == 3) {
		$("#slideDiv1").removeClass("slideDiv3").addClass("slideDiv2");
		$("#slideDiv2").removeClass("slideDiv4").addClass("slideDiv3");
		$("#slideDiv3").removeClass("slideDiv1").addClass("slideDiv4");
		$("#slideDiv4").removeClass("slideDiv2").addClass("slideDiv1");
	} else if (ind == 4) {
		$("#slideDiv1").removeClass("slideDiv2").addClass("slideDiv1");
		$("#slideDiv2").removeClass("slideDiv3").addClass("slideDiv2");
		$("#slideDiv3").removeClass("slideDiv4").addClass("slideDiv3");
		$("#slideDiv4").removeClass("slideDiv1").addClass("slideDiv4");
	}
}

//向左滑动
function slide2Left(ind) {
	if (ind == 0) {
		$("#slideDiv1").removeClass("slideDiv4").addClass("slideDiv1");
		$("#slideDiv2").removeClass("slideDiv1").addClass("slideDiv2");
		$("#slideDiv3").removeClass("slideDiv2").addClass("slideDiv3");
		$("#slideDiv4").removeClass("slideDiv3").addClass("slideDiv4");
	} else if (ind == 1) {
		$("#slideDiv1").removeClass("slideDiv3").addClass("slideDiv4");
		$("#slideDiv2").removeClass("slideDiv4").addClass("slideDiv1");
		$("#slideDiv3").removeClass("slideDiv1").addClass("slideDiv2");
		$("#slideDiv4").removeClass("slideDiv2").addClass("slideDiv3");
	} else if (ind == 2) {
		$("#slideDiv1").removeClass("slideDiv2").addClass("slideDiv3");
		$("#slideDiv2").removeClass("slideDiv3").addClass("slideDiv4");
		$("#slideDiv3").removeClass("slideDiv4").addClass("slideDiv1");
		$("#slideDiv4").removeClass("slideDiv1").addClass("slideDiv2");
	} else if (ind == 3) {
		$("#slideDiv1").removeClass("slideDiv1").addClass("slideDiv2");
		$("#slideDiv2").removeClass("slideDiv2").addClass("slideDiv3");
		$("#slideDiv3").removeClass("slideDiv3").addClass("slideDiv4");
		$("#slideDiv4").removeClass("slideDiv4").addClass("slideDiv1");
	}
}

$(".site-body-container").on("mouseenter", function() {
	clearInterval(slideTimer);
	$(".arrow-control-prev,.arrow-control-next").fadeIn();
});

$(".site-body-container").on("mouseleave", function() {
	$(".arrow-control-prev,.arrow-control-next").fadeOut();
	if (preIndex == length) {
		preIndex = 0;
		autoRun(0);
	} else {
		autoRun(preIndex);
	}
});

//上一张
$(".arrow-control-prev").on("click", function() {
   if (preIndex == 1) {
		preIndex = 0;
		slide2Left(0);
	} else {
		if (preIndex==0) {
			slide2Left(3);
			preIndex=3;
		}else{
			slide2Left(preIndex - 1);
			if (preIndex > 1) {
				preIndex--;
			}
		}
	}
});
//下一张
$(".arrow-control-next").on("click", function() {
	if (preIndex == length) {
		preIndex = 1;
		slide2Right(1);
	} else {
		slide2Right(preIndex + 1);
		if (preIndex < length) {
			preIndex++;
		}
	}
});