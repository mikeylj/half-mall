<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>夺宝看盘</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/area.css">
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/person.css">
    <!-- 下拉加载样式 -->
    <link rel="stylesheet"
          href="/css/dropload.min.css">

    <script type="text/javascript"
            src="/js/jquery-1.11.1.min.js"></script>
    <style>
        .outer {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            -webkit-box-orient: vertical;
            box-orient: vertical;
            -webkit-flex-direction: column;
            flex-direction: column;
            font-size: .12rem;
        }

        .header {
            position: relative;
            /*height: .41rem;*/
            border-bottom: 1px solid #ccc;
            background-color: #f6f6f6;
            /*padding-top: .11rem;*/
        }

        .inner {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            background-color: #fff;
            overflow-y: scroll;
            -webkit-overflow-scrolling: touch;
            font-size: .08rem;
        }

        .dropload-down {
            /*padding-bottom: 44px;*/
            width: 100%;
        }
        /*zeng*/
        /*.duobaoanniu{
                   position: fixed;
                right: .1rem;
                bottom: .7rem;
           }*/
        /*.duobaoanniu img{
                   width: .47rem;
           }*/
        /*侧边栏*/
        .tou {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: none;
            z-index: 200;
        }

        .ce {
            width: 85.31%;
            height: 100%;
            background-color: #eee;
            float: left;
        }

        .zuo {
            height: .5rem;
            width: .3rem;
            background: #ff6600;
            margin: auto 0px;
            float: left;
            position: fixed;
            top: 50%;
            margin-top: -.25rem;
            left: 85.31%;
            border-radius: 0px 4px 4px 0px;
            padding: .13rem .07rem;
            box-sizing: border-box;
            z-index: 200;
        }

        .zuo img {
            width: .12rem;
        }

        .tou_header {
            width: 100%;
            height: .46rem;
            padding: .12rem .08rem;
            background-color: #fff;
            box-sizing: border-box;
            position: relative;
        }

        .tou_header p {
            font-size: .17rem;
            float: left;
        }

        .tou_header img {
            width: .35rem;
            border-radius: 50%;
            position: absolute;
            right: .1rem;
            top: .06rem;
        }
        /*轮播*/
        .swiper-container {
            width: 100%;
            height: auto;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .mannounced {
            margin-top: .05rem;
        }
        /*.tou_ul_n{margin-top: .05rem;}*/
        .tou_ul {
            width: 100%;
            background-color: #fff;
            box-sizing: border-box;
            padding: 0px .1rem;
        }

        .tou_ul li {
            padding: .1rem 0px;
            border-bottom: 1PX solid #eee;
            position: relative;
        }

        .tou_ul_p1 {
            font-size: .16rem;
            margin-bottom: .09rem;
        }

        .tou_ul_p11 {
            font-size: .16rem;
            height: .3rem;
            line-height: .3rem;
        }

        .tou_ul_p2 {
            font-size: .14rem;
            color: #666;
        }

        .tou_ul_li_a {
            border: 1px solid #ff6600;
            color: #ff6600;
            font-size: .16rem;
            padding: .05rem .15rem;
            border-radius: .025rem;
            position: absolute;
            right: .1rem;
            top: 50%;
            margin-top: -.19rem;
        }

        .tou_ul_li_a1 {
            border: 1px solid #ff6600;
            color: #ff6600;
            font-size: .16rem;
            padding: .05rem .15rem;
            border-radius: .025rem;
            position: absolute;
            right: .1rem;
            top: 50%;
            margin-top: -.17rem;
        }

        .drag {
            position: absolute;
            right: .1rem;
            bottom: .7rem;
            background: url(/images/duobaoenniu.png) no-repeat;
            background-size: .7rem;
            width: .75rem;
            height: .75rem;
            border-radius: 50%;
            cursor: pointer;
        }

        @
        -webkit-keyframes fade-in { 0% {
            opacity: 0;
        }

        50%
        {
            opacity






            :







                0
                .5






        ;
        }
        100%
        {
            opacity






            :







                1;
        }
        }
        .tou, .zuo {
            animation: fade-in;
            animation-duration: 5s;
            -webkit-animation: fade-in 1s;
        }
    </style>
</head>
<body>
<div class="outer">
    <div class="header">
        <div class="ssc-notice">
            <p>通知：北京时时彩 22:00 — 02:00五分钟开奖一次 10:00 —
                22:00十分钟开奖一次。网址：www.qunmix.com</p>
        </div>
        <ul class="ssc-title">
            <li>开奖时间</li>
            <li>开奖号码</li>
            <li>(56除余+1)</li>
            <li>(110除余+1)</li>
        </ul>
    </div>
    <div class="inner">
        <div class="ssc-nextCd">
            <!-- <p></p> -->
            <p class="fnTimeCountDown" data-end="<?php echo $next_open_time;?>">
                距离下期开奖时间： <span class="mini"></span>:<span class="sec"></span>:<span
                    class="hm"></span>
            </p>
            <p class="fnTimeCountDown1" data-end="<?php echo $next_open_time;?>" style="display: none">
                距离下期开奖时间： <span class="mini"></span>:<span class="sec"></span>:<span
                    class="hm"></span>
            </p>

        </div>
        <ul class="ssc-con">

            <?php
            foreach ($list as $row) {
                ?>
                <li>
                    <div class="ssc-c-time">
                        <p><?php echo $row['time'];?>
                        </p>
                    </div>
                    <div class="ssc-c-num">
                        <span><?php echo $row['value'];?> / <?php echo $row['total'];?></span>
                    </div>
                    <div class="ssc-c-srlt2">
                        <span><?php echo $row['v56'];?></span>
                    </div>
                    <div class="ssc-c-brlt2">
                        <span><?php echo $row['v110'];?></span>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
<!--        <a class="ssc-moreBtn" onClick="more()">查看更多>></a>-->
        <!--按钮-->
    </div>
</div>
<!--<a id="drag2" class="duobaoanniu drag" href="javascript:;"></a>-->
<div class="tou">
    <div class="ce">
        <div class="tou_header">
            <p>热门商品推荐</p>
        </div>
        <!--lunbo-->
        <!-- 最新揭晓 -->
        <div class="mannounced">
            <div class="swiper-container swiper2">
                <div class="swiper-wrapper">

                    <div class="swiper-slide mannounced-c">

                        <div class="mannounced-list">
                            <a
                                onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=2&type=0')"
                                href="javaScript:;"> <img class="mannounced-l-img"
                                                          src="/images/LT50.png" alt="">
                            </a>
                        </div>

                        <div class="mannounced-list">
                            <a
                                onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=3&type=0')"
                                href="javaScript:;"> <img class="mannounced-l-img"
                                                          src="/images/YX50.png" alt="">
                            </a>
                        </div>

                        <div class="mannounced-list">
                            <a
                                onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=5&type=0')"
                                href="javaScript:;"> <img class="mannounced-l-img"
                                                          src="/images/JD50.png" alt="">
                            </a>
                        </div>

                    </div>

                    <div class="swiper-slide mannounced-c">

                        <div class="mannounced-list">
                            <a
                                onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=7&type=0')"
                                href="javaScript:;"> <img class="mannounced-l-img"
                                                          src="/images/ZSY50.png" alt="">
                            </a>
                        </div>

                        <div class="mannounced-list">
                            <a
                                onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=1&type=0')"
                                href="javaScript:;"> <img class="mannounced-l-img"
                                                          src="/images/YD100.png" alt="">
                            </a>
                        </div>

                        <div class="mannounced-list">
                            <a
                                onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=4&type=0')"
                                href="javaScript:;"> <img class="mannounced-l-img"
                                                          src="/images/YX100.png" alt="">
                            </a>
                        </div>

                    </div>

                    <div class="swiper-slide mannounced-c">

                        <div class="mannounced-list">
                            <a
                                onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=6&type=0')"
                                href="javaScript:;"> <img class="mannounced-l-img"
                                                          src="/images/JD100.png" alt="">
                            </a>
                        </div>

                        <div class="mannounced-list">
                            <a
                                onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=8&type=0')"
                                href="javaScript:;"> <img class="mannounced-l-img"
                                                          src="/images/ZSH100.png" alt="">
                            </a>
                        </div>

                        <div class="mannounced-list">
                            <a
                                onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=2&type=0')"
                                href="javaScript:;"> <img class="mannounced-l-img"
                                                          src="/images/LT50.png" alt="">
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <ul style="overflow: auto; margin-top: .05rem; height: 78.54%;"
            class="tou_ul">

            <li>
                <p class="tou_ul_p1">
                    <span style="color: #00a0e9;">50</span><span>元充值卡</span>
                </p>
                <a
                    onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=2&type=0')"
                    class="tou_ul_li_a" href="javaScript:;">夺宝</a>
            </li>
            <li>
                <p class="tou_ul_p1">
                    <span style="color: #00a0e9;">50</span><span>元骏卡一卡通</span>
                </p>
                <a
                    onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=3&type=0')"
                    class="tou_ul_li_a" href="javaScript:;">夺宝</a>
            </li>
            <li>
                <p class="tou_ul_p1">
                    <span style="color: #00a0e9;">50</span><span>元京东卡</span>
                </p>
                <a
                    onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=5&type=0')"
                    class="tou_ul_li_a" href="javaScript:;">夺宝</a>
            </li>
            <li>
                <p class="tou_ul_p1">
                    <span style="color: #00a0e9;">50</span><span>元加油卡</span>
                </p>
                <a
                    onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=7&type=0')"
                    class="tou_ul_li_a" href="javaScript:;">夺宝</a>
            </li>
            <li>
                <p class="tou_ul_p1">
                    <span style="color: #db3652;">100</span><span>元充值卡</span>
                </p>
                <a
                    onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=1&type=0')"
                    class="tou_ul_li_a" href="javaScript:;">夺宝</a>
            </li>
            <li>
                <p class="tou_ul_p1">
                    <span style="color: #db3652;">100</span><span>元骏卡一卡通</span>
                </p>
                <a
                    onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=4&type=0')"
                    class="tou_ul_li_a" href="javaScript:;">夺宝</a>
            </li>
            <li>
                <p class="tou_ul_p1">
                    <span style="color: #db3652;">100</span><span>元京东卡</span>
                </p>
                <a
                    onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=6&type=0')"
                    class="tou_ul_li_a" href="javaScript:;">夺宝</a>
            </li>
            <li>
                <p class="tou_ul_p1">
                    <span style="color: #db3652;">100</span><span>元加油卡</span>
                </p>
                <a
                    onclick="online('http://www.zzgwsc.com/srdb_good/detail?srcFrom=SRDB-TEST-001&goodId=8&type=0')"
                    class="tou_ul_li_a" href="javaScript:;">夺宝</a>
            </li>
        </ul>
    </div>
</div>
<a style="display: none; z-index: 220;" href="javascript:;" class="zuo"><img
        src="/images/left.png" /></a>
<input type="hidden" id="start" name="start" value="0" />
<input type="hidden" id="limit" value='50' />
<script src="/js/zepto.min.js"></script>
<!-- 倒计时js -->
<script src="/js/countdown.js"></script>
<!-- banner实现滑动效果 -->
<script src="/js/swiper.min.js"></script>
<!--拖拽-->
<script src="/js/jquery.hammer.js"></script>
<script src="/js/dropload.min.js"></script>
<script>
    /* 夺宝连接 */
    function online(url) {
        window.location.href = url;
    }

    /* 点击 */
    $('.ce').click(function() {
        $('.zuo').show();
        $('.tou').show();
        return false;
    });

    $('.zuo,.tou').click(function() {
        $('.tou').css("display", "none");
        $('.zuo').css("display", "none");
    });

    $(".duobaoanniu").click(function() {
        $('.zuo').show();
        $('.tou').show();
    });
    /* 拖拽 */
    $(".drag").hammer({
        drag_max_touches : 0
    }).on("drag", function(ev) {
        var touches = ev.gesture.touches;
        ev.gesture.preventDefault();
        for (var t = 0, len = touches.length; t < len; t++) {
            var target = $(touches[t].target);
            target.css({
                zIndex : 100,
                left : touches[t].pageX - 35,
                top : touches[t].pageY - 30,
            });
        }
    });
    //轮播
    $('.duobaoanniu').click(function() {
        if ($('.tou').show()) {
            var swiper1 = new Swiper('.swiper1', {
                pagination : '.swiper-pagination1',
                paginationClickable : true,
                spaceBetween : 30,
                centeredSlides : true,
                autoplay : 2500,
                autoplayDisableOnInteraction : false
            });
            var swiper2 = new Swiper('.swiper2', {
                pagination : '.swiper-pagination2',
                paginationClickable : true,
                spaceBetween : 30,
                centeredSlides : true,
                autoplay : 2500,
                autoplayDisableOnInteraction : false
            });
        }
    });

    var sum = 2;
    function tCDThml(element) {
        var second = 9;
        var time = setInterval(function(){
            second--;
            element.html("正在揭晓&nbsp;&nbsp;"+second);
            if (second == 0) {
                clearInterval(time);
            };
        },1000);
    };
    function mat(date) {
        var datetime = date.getFullYear()
            + "-"// "年"
            + ((date.getMonth() + 1) > 10 ? (date.getMonth() + 1) : "0"
                + (date.getMonth() + 1))
            + "-"// "月"
            + (date.getDate() < 10 ? "0" + date.getDate() : date
                .getDate());
        return datetime;
    }

    Date.prototype.Format = function(fmt) { //author: meizz
        var o = {
            "M+" : this.getMonth() + 1, //月份
            "d+" : this.getDate(), //日
            "h+" : this.getHours(), //小时
            "m+" : this.getMinutes(), //分
            "s+" : this.getSeconds(), //秒
            "q+" : Math.floor((this.getMonth() + 3) / 3), //季度
            "S" : this.getMilliseconds()
            //毫秒
        };
        if (/(y+)/.test(fmt))
            fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "")
                .substr(4 - RegExp.$1.length));
        for ( var k in o)
            if (new RegExp("(" + k + ")").test(fmt))
                fmt = fmt.replace(RegExp.$1,
                    (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k])
                        .substr(("" + o[k]).length)));
        return fmt;
    }
    function more() {
        var start = $("#start").val();
        var limit = $("#limit").val();
        start = parseInt(start) + parseInt(limit);
        loadData(start);
    }
    function loadData(start) {
        var htl = "";
        var limit = $('#limit').val();
        var parms = {
            "start" : start
        };
        var url = '/ssc_wechat/ssc_index/list.do';
        $.ajax({
            type : "post",
            url : url,
            data : parms,
            dataType : 'json',
            cache : false,
            success : function(data) {
                var datas = data.data;
                $.each(datas, function(i, list) {
                    var JsonDateValue = new Date(list.drawDateTime);
                    if (JsonDateValue.getMonth() + 1 <= 9) {
                        var asd = "0" + (JsonDateValue.getMonth() + 1);
                    } else {
                        var asd = (JsonDateValue.getMonth() + 1);
                    }
                    if (JsonDateValue.getDate() <= 9) {
                        var qwe = "0" + JsonDateValue.getDate();
                    } else {
                        var qwe = JsonDateValue.getDate();
                    }
                    if (JsonDateValue.getHours() <= 9) {
                        var hour = "0" + (JsonDateValue.getHours());
                    } else {
                        var hour = JsonDateValue.getHours();
                    }
                    if (JsonDateValue.getMinutes() <= 9) {
                        var minute = "0" + (JsonDateValue.getMinutes());
                    } else {
                        var minute = JsonDateValue.getMinutes();
                    }
                    if (JsonDateValue.getSeconds() <= 9) {
                        var second = "0" + (JsonDateValue.getSeconds());
                    } else {
                        var second = JsonDateValue.getSeconds();
                    }
                    var drawDate = JsonDateValue.getFullYear() + "-" + asd
                        + "-" + qwe;
                    var drawTime = hour + ":" + minute + ":" + second;
                    htl += ' <li><div class=\"ssc-c-time\">' + "<p>"
                        + drawDate + " <br> " + drawTime + "</p>"
                        + " </div>" + " <div class=\"ssc-c-num\">"
                        + "     <span>" + list.drawNo + "</span>"
                        + " </div>"
                        + " <div class=\"ssc-c-srlt"+list.color1+"\">"
                        + "     <span>" + list.drawSimalResult
                        + "</span>" + "</div>"
                        + " <div class=\"ssc-c-brlt"+list.color2+"\">"
                        + "   <span>" + list.drawBigResult + "</span>"
                        + "</div> </li>"
                });
                if (start == 0) {
                    $(".ssc-con").html(htl);
                } else {
                    $(".ssc-con").append(htl);
                }
                if (datas.length > 0) {
                    $("#start").val(parseInt(start));
                }
            }
        });
    }
    $(function() {
        // 倒计时
        var date = new Date();
        var as=10;
        if((date.getHours()>=22||date.getHours()<1||(date.getHours()==1&&date.getMinutes()<=55))){
            as=5;
        }
        if((date.getHours()>=2&&date.getHours()<10)||(date.getHours()==1&&date.getMinutes()>55)){
            $(".fnTimeCountDown").fnTimeCountDown(tCDThml);

            $(".fnTimeCountDown1").fnTimeCountDown(function() {
                location.href = location;
            });
        }else{
            if (date.getMinutes()%as==0&&date.getSeconds() < 8) {
                var second = 8 - date.getSeconds();
                console.log(second);
                var time = setInterval(function(){
                    second--;
                    $(".fnTimeCountDown").html("正在揭晓&nbsp;&nbsp;"+second);
                    if (second == 0) {
                        clearInterval(time);
                    };
                },1000);
                setTimeout(function() {
                    location.href = location;
                }, (8 - date.getSeconds()) * 1000);
            }else{
                $(".fnTimeCountDown").fnTimeCountDown(tCDThml);

                $(".fnTimeCountDown1").fnTimeCountDown(function() {
                    location.href = location;
                });
            }
        }
        // 头部滚动
        var i = -1;
        var oddL = parseInt($('.ssc-notice p').css('left'));
        var nowL = oddL;
        // alert(nowL);
        var timer = setInterval(function() {

            nowL = nowL + i;
            if (nowL <= -436) {
                nowL = $(window).width();
            }
            ;
            $('.ssc-notice p').css('left', '' + nowL + 'px');
        }, 20);

    })
</script>
</body>
</html>