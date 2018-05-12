<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/css/base.css">
    <!-- 下拉加载样式 -->
    <link rel="stylesheet" href="/css/dropload.min.css">
    <!-- bannner滑动样式 -->
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/person.css">
    <link rel="stylesheet" href="/css/barrager.css">
    <link rel="stylesheet" href="/css/menu.css">
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/tantan2.js"></script>
<!--    <script src="/js/websocket.js"></script>-->
    <script src="/js/jquery.json.js"></script>

    <style>
        .outer{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction:column;
            -webkit-box-orient:vertical;
            box-orient:vertical;
            -webkit-flex-direction:column;
            flex-direction:column;
            font-size: .12rem;
        }
        .header{
            position: relative;
            height: .2rem;
        }
        .inner{
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            /*background-color: #fff;*/
            overflow-y: scroll;
            -webkit-overflow-scrolling: touch;
        }
        .dropload-down {
            /*padding-bottom: 44px;*/
            width: 100%;
        }

        /*banner样式*/
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
    </style>
</head>
<body>
<!-- 首页 -->
<!--<div class="mod-commonBtn">-->
<!--    <a class="mod-shishiBtn" href="/jump/toSsc?srcFrom=SRDB-TEST-001"></a>-->
<!--    <a class="mod-perCenterBtn" href="/account/index?srcFrom=SRDB-TEST-001"></a>-->
<!--    <a class="mod-perCenterw" href="/srdb_good/rankingList?srcFrom=SRDB-TEST-001"></a>-->
<!--</div>-->
<!-- 弹出框 start-->
<div class="tishi" style="display:none">
    <div>
        <br/>
        <p id="message"></p>
        <a href="javascript:;"  onclick="$('.tishi').hide();">确定</a>
    </div>
</div>
<!-- 弹出框 end-->

<div class="outer">
    <div class="inner">
        <!-- <div class="lists"> -->
        <!-- </div> -->
        <!-- 头部banner -->
        <div class="swiper-container swiper1">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="/store/introduction"><img src="/images/banner.png" alt="" width="100%"></a></div>
            </div>
            <!-- Add Pagination -->
            <!-- <div class="swiper-pagination swiper-pagination1"></div> -->
        </div>
        <!-- 最新揭晓 -->
        <div class="mannounced">
            <div class="swiper-container swiper2">
                <div class="hua_wu">
                    <ul class="hua_wu_ul">
                        <?php
                        foreach ($goods_1 as $goods) {
                            ?>
                            <li>
                                <a href="/store/goods?id=<?php echo $goods['id'];?>">
                                    <img class="mannounced-l-img" src="<?php echo $goods['small_image']?>" alt="">
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mannounced">
            <div class="swiper-container swiper2">
                <div class="hua_wu">
                    <ul class="hua_wu_ul">
                        <?php
                        foreach ($goods_2 as $goods) {
                            ?>
                            <li>
                                <a href="/store/goods?id=<?php echo $goods['id'];?>">
                                    <img class="mannounced-l-img" src="<?php echo $goods['small_image']?>" alt="">
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- 专区 -->
        <div class="mArea">
            <div class="mArea-title">
                <a class="mArea-title-item mA-TI-select" href="javascript:;">最新参与记录</a>
                <a class="mArea-title-item " href="javascript:;">最新购买</a>
            </div>
            <div class="mArea-con">
                <ul class="mArea-cul" >
                    <?php
                    foreach ($arrTakePartInOrders as $order) {
                        ?>
                        <a href="/users/orderlist?id=<?php echo $order['userid'];?>">
                            <li class="mArea-cli">
                                <div class="mArea-cli-img">
                                    <img src="<?php echo $arrUserIds[$order['userid']]['pic']?>"
                                         alt="">
                                </div>
                                <div class="mArea-cli-right">
                                    <p class="mArea-clir-top"><span><?php echo $arrUserIds[$order['userid']]['name']?></span><span><?php echo $order['ctime']?></span></p>
                                    <p class="mArea-clir-bottom">刚刚参与<span class="cr"><?php echo $order['num']?></span>单--<?php echo $arrGoods[$order['goods_id']]['name']?></p>
                                </div>
                            </li>
                        </a>
                        <?php
                    }
                    ?>

                    <div style="height: 0.4rem"></div>
<!--                    <a href="/srdb_index/loadMoreOld?srcFrom=SRDB-TEST-001"  style="width: 100%;font-size: .14rem;text-align: center;display: block; color: #0000FF;padding:.05rem 0rem;" >查看更多</a>-->
                </ul>
                <ul class="mArea-cul" style="display:none;">
                    <?php
                    foreach ($arrWinOrders as $order) {
                        ?>
                        <a href="/users/orderlist?id=<?php echo $order['userid'];?>">
                            <li class="mArea-cli">
                                <div class="mArea-cli-img">
                                    <img src="<?php echo $arrUserIds[$order['userid']]['pic']?>"
                                         alt="">
                                </div>
                                <div class="mArea-cli-right">
                                    <p class="mArea-clir-top"><span><?php echo $arrUserIds[$order['userid']]['name']?></span><span><?php echo $order['ctime']?></span></p>
                                    <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr"><?php echo $order['num']?></span>单--<?php echo $arrGoods[$order['goods_id']]['name']?></p>
                                </div>
                            </li>
                        </a>
                        <?php
                    }
                    ?>
                    <div style="height: 0.4rem"></div>
<!--                    <a href="/srdb_index/loadMoreOld?srcFrom=SRDB-TEST-001"  style="width: 100%;font-size: .14rem;text-align: center;display: block; color: #0000FF;padding:.05rem 0rem;" >查看更多</a>-->
                </ul>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="srcFrom" name="srcFrom" value='SRDB-TEST-001' />
<input type="hidden" id="jumpUrl" name="jumpUrl" value='http://www.zjjinjier.com/chat/hall.htm' />
<input type="hidden" id="userId" name="userId" value='174398' />
<input type="hidden" id="wechatName" name="wechatName" value='俞立军' />
<input type="hidden" id="headImgUrl" name="headImgUrl" value='http://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83erNaYn0tEWiac65GIlqdR7T2un2KKxq5uULRibWzvgCIVl2UmyXpxibrdummQTibnNRrAaXxutRNk5fyw/0' />
<input type="hidden" id="nickName" name="nickName" value='1511075579687' />
<footer class="ftFixd">
    <p  class="fnTimeCountDown" data-end="<?php echo $next_open_time;?>">下期开战时间：
        <span class="mini"></span>分<span class="sec"></span>秒<span class="hm"></span>
    </p>
    <?php
    require_once (dirname(__DIR__) . "/menu.php");
    ?>
</footer>
<input type="hidden" id="path" name="path" value='' />
<!-- banner实现滑动效果 -->

<script src="/js/swiper.min.js"></script>
<script src="/js/countdown.js"></script>
<script>
//    var websocket;
//
//    $(function(){
//        var userId=$('#userId').val();
//        var user = {name:"AAAA", avatar:"BBBBB"};
//        websocket=initWebSocket(fn,user,'127.0.0.1:9501');
//    });
//
//    function fn(message){
////        $('#message').html(message);
////        $('.tishi').show();
//        var message = $.evalJSON(message);
//        var cmd = message.cmd;
//        //处理登录
//        if (cmd == 'login')
//        {
//
//        }
//        else if (cmd == 'openssc')      ////处理开奖
//        {
//
////            showNewUser(message);
//        }
//
//
//
//
//
////        if(message.indexOf('FHadminSilence')>-1){
////            $('#message').html("您的当日订单还未达到弹幕开通标准，请增加订单量开通该权限。");
////            $('.tishi').show();
////        }else if(message.indexOf('FHadminqq313596790')>-1){
////            var datas=message.split("FHadminqq313596790");
////            get(datas[1],datas[0]);
////        }
//    }

    function tCDThml(element){
        element.html("正在揭晓...");
        setTimeout(function(){
            location.href = location;
        },2000);
    }


    $(function(){
        if("0" == $("#isRegister").val()){
            regist($("#nickName").val(),$("#path").val());
        }
        // 专区导航
        $('.mArea-title-item').click(function(){
            $(this).addClass('mA-TI-select').siblings().removeClass('mA-TI-select');
            $('.mArea-cul').eq($(this).index()).show().siblings().hide();
        });

        // 倒计时
        for (var i = 0; i < $(".fnTimeCountDown").length; i++) {
            // $(".fnTimeCountDown").html('正在揭晓');
            $(".fnTimeCountDown").eq(i).fnTimeCountDown(tCDThml);
        }
        // 头部滚动
        var j = -1;
        var k = -1;
        var oddL = parseInt($('.ssc-notice p').css('left'));
        var oddL1 = parseInt($('.ssc-notice1 p').css('left'));
        var nowL = oddL;
        var nowL1 = oddL1;
        // alert(nowL1);
        var timer = setInterval(function() {
            nowL = nowL + j;
            nowL1 = nowL1 + k;
            if (nowL <= -$('.ssc-notice p').width()) {
                nowL = $(window).width();
            }
            if (nowL1 <= -$('.ssc-notice1 p').width()) {
                nowL1 = $(window).width();
            }
            ;
            $('.ssc-notice p').css('left', '' + nowL + 'px');
            $('.ssc-notice1 p').css('left', '' + nowL1 + 'px');
        }, 20);
    });

    function getY(){
        $('.daoshou').attr('onclick','');
        var timer = null;
        var second = 60;
        // $('.modT-yzm').addClass('modT-yzm-time');
        timer = setInterval(function(){
            $('.daoshou').html(''+second+'秒后重发');
            second--;
            if (second < 0) {
                $('.daoshou').html('获取验证码');
                clearInterval(timer);
                timer = null;
                second = 60;
                $('.daoshou').attr('onclick','getY()');
            };
        },1000);
    };

    function jump(){
        var jumpUrl=$("#jumpUrl").val();
        var srcFrom=$("#srcFrom").val();
        var userId=$("#userId").val();
        var wechatName=encodeURI(encodeURI($("#wechatName").val()));
        var headImgUrl=$("#headImgUrl").val();
        var nickName=$("#nickName").val();
        var roomId=$("#roomId").val();
        window.location.href=jumpUrl+"?srcFrom="+srcFrom+"&userId="+userId+"&nickName="+wechatName+"&headImgUrl="+headImgUrl+"&nick="+nickName+"&roomId="+roomId;
    };

</script>
</body>
</html>