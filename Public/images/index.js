$(function() {
    Do("scrollImg",
    function() {
        $(".scrollable").scrollImg({
            timer: 5000,
            startHandle: function(b) {
                if (b) {
                    b.playlol(0);
                    b.changeClass(0);
                    b.autoPlay();
                }
                var c = null;
                $(".item-mask li").each(function(d) {
                    $(this).unbind();
                    $(this).hover(function() {
                        if (c != null) {
                            clearTimeout(c);
                        }
                        c = setTimeout(function() {
                            b.changeClass(d);
                            b.stopAuto();
                            b.playlol(d);
                        },
                        200);
                    },
                    function() {
                        if (c != null) {
                            clearTimeout(c);
                        }
                        b.autoPlay();
                    });
                });
            }
        });
    });
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
    $.easing.custom = function(f, g, e, j, i) {
        var h = 1.70158;
        if ((g /= i / 2) < 1) {
            return j / 2 * (g * g * (((h *= (1.525)) + 1) * g - h)) + e;
        }
        return j / 2 * ((g -= 2) * g * (((h *= (1.525)) + 1) * g + h) + 2) + e;
    };
    $("#J_Reach").scrollable({
        easing: "custom",
        speed: 700,
        circular: true
    }).autoscroll(5000);
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
});