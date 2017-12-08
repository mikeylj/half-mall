function tan() {

	$(".tanchulai").hide();
	$(".lengt").show();
	$("#custom").css("margin-left", "0%");
}
function shou() {
	$("#custom").css("margin-left", "110%");
	$(".lengt").hide();
	setTimeout(function() {
		$(".tanchulai").show();
	}, 2001)
};
function init_barrage() {
	var _top = 0;
	$(".mask div").show().each(function() {
		var _left = $(window).width() - $(this).width()+200;// 浏览器最大宽度，作为定位left的值
		var _height = $(window).height();// 浏览器最大高度
		_top += 35;
		if (_top >= (_height - 130)) {
			_top = 0;
		}
		$(this).css({
			left : _left,
			top : _top
		});

		// 定时弹出文字
		var time = 12000;
		if ($(this).index() % 2 == 0) {
			time = 10000;
		}
		$(this).animate({
			left : "-" + _left + "px"
		}, time, function() {
			$(this).remove();
		});

	});
}
function get(text, images) {
	var _top = 0;
	var leng = text.length;

	var sun = leng * 16;

	if (sun > 250) {
		sun = 250;
	}
	var _lable = $("<div class='lengt' style='display: none; z-index:9999; word-break:break-all; white-space:normal; font-size:15px; padding-left:20px; border-radius:20px; text-align: center; color:#fff;background:rgba(0,0,0,0.6);width:"
			+ sun
			+ "px;'>"
			+ "<img src='"
			+ images
			+ "' style='width:.2rem;border-radius:50%;position:absolute;left:0px;'>"
			+ text + "</div>");
	$(".mask").append(_lable.show());
	init_barrage();
};

function send(url) {
	var text = $(".s_text").val();
	if (text == "") {
		return;
	}

	var userId = $('#userId').val();

	websocket.send(userId + "FHadminqq313596790" + text);
	// $.ajax({
	// type: 'post',
	// url: url,
	// data : text,
	// dataType: 'json',
	// success: function(data){
	// },
	// error: function(xhr, type){
	// alert('Ajax error!');
	// }
	// });
	// })
	$(".s_text").val("");
}
function qingping() {
	$(".lengt").html("");
}
