/* ============================================================
 * 작성자 : 노종민(nomisoul@gmail.com)
 * 파일명 : ui.js
 * 설  명 : 화면 공통 js
 * 최초 작성일 : 2016.04.28
 ============================================================ */

$(function() {
	//GNB
	var $gnb = $(".gnb > li");

	$gnb.children("a").on("click", function() {
		var lnbBg = $(".lnb_bg");

		$gnb.children("a").removeClass("on");

		if ( $(this).siblings("ul").length > 0 ) {
			var $that = $(this);
			var $lnb = $(this).siblings("ul");

			lnbBg.animate({
				left: 0
			}, "fast");

			if ($lnb.is(":visible")) {
				$that.removeClass("on");
				$lnb.hide("fast");
				lnbBg.animate({
					left: 0
				}, "fast");
			} else {
				$gnb.children("ul").hide();
				$that.addClass("on");
				lnbBg.animate({
					left: 200
				}, "fast", function() {
					$lnb.show("fast");
				});
			}

			return false;
		}
	});

	$("html, body").not(".gnb").on("click", function() {
		$(".gnb > li").children("ul").hide();
		$(".lnb_bg").animate({
			left: 0
		}, "fast");
	});
});
