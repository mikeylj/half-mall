//一键夺宝或十期连购标识
var type;
function initSnatch() {
	// 选择大小期号的效果
	$('.mod-iB-lUl').delegate(".mod-iB-lLi a", "click", function(e) {
		chooseNum($(this));
		var iptIndex = $(this).index();
		$(this).parent().find('input').val(iptIndex);
	});
	// 点击关闭按钮
	$('.mod-idn-close').click(function() {
		$('.mod-buyPop').hide();
		$('#sumSmall').html("0");
		$('#sumBig').html("0");
		$('#needSDB').html("0");
		$('#needMoney').html("￥ 0");

	});

	/*
	 * var showNum = $('.mod-iB-BtnNum').html(); var firstNum = showNum;
	 */
	// 点击加号touchend
	$('.mbPbc-ob-btn-p').on(
			'click',
			function(e) {
				$(this).parents('li').siblings().find('p').html('0');
				var sum = parseInt($(this).parent().children(".mbPbc-ob-btn p")
						.html());
				// 设置一次最多购买期数
				if (sum < 100) {
					// 判断是从一起购买还是十期连购进来的
					sum += type;
				} else {
					return;
				}
				//
				$(this).parent().children(".mbPbc-ob-btn p").html(sum);
				var sumCount = accAdd($('.mbPbc-ob-btn p').eq(0).html()
						* $("#perPrice").val(), $('.mbPbc-ob-btn p').eq(1)
						.html()
						* $("#perPrice").val());
				sumCount = Math.round(sumCount * 100) / 100;
				$('#needSDB').html(sumCount);
				$('#needMoney').html("￥ " + sumCount);
				$('#totalAmount').val(sumCount);
			});
	// 点击减号
	$('.mbPbc-ob-btn-r').on(
			'click',
			function(e) {
				$(this).parents('li').siblings().find('p').html('0');
				var sum = parseInt($(this).parent().children(".mbPbc-ob-btn p")
						.html());
				if (sum > 0) {
					sum -= type;
				} else {
					$('#needSDB').html(0);
					$('#needMoney').html("￥ 0");
					return;
				}
				$(this).parent().children(".mbPbc-ob-btn p").html(sum);
				var sumCount = accAdd($('.mbPbc-ob-btn p').eq(0).html()
						* $("#perPrice").val(), $('.mbPbc-ob-btn p').eq(1)
						.html()
						* $("#perPrice").val());
				sumCount = Math.round(sumCount * 100) / 100;
				$('#needSDB').html(sumCount);
				$('#needMoney').html("￥ " + sumCount);
				$('#totalAmount').val(sumCount);
			});

}

// js相加
function accAdd(arg1, arg2) {
	var r1, r2, m;
	try {
		r1 = arg1.toString().split(".")[1].length
	} catch (e) {
		r1 = 0
	}
	try {
		r2 = arg2.toString().split(".")[1].length
	} catch (e) {
		r2 = 0
	}
	m = Math.pow(10, Math.max(r1, r2));
	return (arg1 * m + arg2 * m) / m;
}

// js相减
function accSub(arg1, arg2) {
	var r1, r2, m;
	try {
		r1 = arg1.toString().split(".")[1].length
	} catch (e) {
		r1 = 0
	}
	try {
		r2 = arg2.toString().split(".")[1].length
	} catch (e) {
		r2 = 0
	}
	m = Math.pow(10, Math.max(r1, r2));
	return (arg1 * m - arg2 * m) / m;
}

function boBtm() {
	if ($('.aNew-box').css('bottom') == "43px") {
		$('.aNew-box').css('bottom', '1.45rem');
	} else {
		$('.aNew-box').css('bottom', '.43rem');
	}
}

function addFastSnatch(num) {
	var date = new Date(); // 实例一个时间对象；
	var hour = date.getHours(); // 获取系统时，
	// if("false"==$("#snatchSwitch").val()){
	// alert("双人夺宝暂时停售，请稍后重试！！");
	// return;
	// }
	// if(hour > 1 && hour < 10){
	// alert("系统暂停购买，请于早10点至凌晨2点之间购买！！！");
	// return;
	// }
	$.ajax({
		type : 'post',
		url : '/store/getOrderSwitch',
		dataType : 'json',
		success : function(data) {
			if (data.code == 1) {
				alert("系统维护中,请稍候再试!!!");
				return;
			} else {
				$('#sectionNo').val('');

				var limit = $('.qieshang').attr('title');

				if (parseInt(limit) > 5) {
					setOrder(parseInt(limit));
				} else {
					setOrder(5);
				}
				
				if (num == '0') {
					$(".dx").html("小");
					$('#sectionNo').val("0");
					ddx();
				} else {
					$(".dx").html("大");
					$('#sectionNo').val("1");
					ddx();
				}
				$(".fx").show();
				if($('.qian1')){
				getBalance();
				}
			}
		},
		error : function(xhr, type) {
			alert('Ajax error!');
		}
	});
}

function chooseNum(element) {
	element.addClass('mod-iBlLITS-curr').siblings().removeClass(
			'mod-iBlLITS-curr');
};
