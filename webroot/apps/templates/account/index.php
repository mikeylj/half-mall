<html>
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/person.css">
    <link rel="stylesheet" href="/css/menu.css">
    <script type="text/javascript" src="/js/zepto.min.js"></script>
</head>
<body>
<!-- 个人中心 首页 start-->
<!--<div class="mod-commonBtn">-->
<!--    <a class="mod-homePageBtn" href="/srdb_index/index?srcFrom=SRDB-TEST-001"></a>-->
<!--</div>-->
<!-- 个人中心 首页 end-->
<section class="mod-popup yan" style="display: none;">
    <div style="width: 80%; text-align: center;" class="mod-popup-txt">
        <p style="margin:.2rem 0px; color: #999;font-size: .16rem;">验证码已发送至您注册的手机,请查收 &nbsp;&nbsp;<span></span></p>
        <p style="margin:.2rem 0px; color: #999;font-size: .16rem;">188****9066<span></span></p>
        <input id="sendCode" name="sendCode" style=" float:left;margin-top: .15rem;border-radius: .03rem; height: .4rem;width: 55.5%; padding-left:.15rem ; border-radius: .025rem;border:1px solid #eee ;color: #c2c2c2;" type="tel"placeholder="请输入您的验证码"/>
        <a class="daoshou" style=" letter-spacing:2px;margin-top: .15rem;border-radius:.03rem;margin-left:2%;float:left;background-color: #db3652;width: 35%;height:.42rem;line-height:.42rem;display: inline-block;text-align: center;color: #fff;"  href="javascript:;" onclick="getY()">获取验证码</a>
        <span style="display:block; width:100%;line-height: .6rem;height:.6rem; float: left; color: #f30; display: none;" id="error">错误提醒</span>
        <a class="non" style=" float: left; font-size: .16rem; margin-top: .4rem;border-radius:.03rem;float:left;background-color: #db3652;width: 49%;height:.4rem;line-height:.4rem;display: inline-block;text-align: center;color: #fff;" href="javascript:;">确 定</a>
        <a class="no" style=" float: left; font-size: .16rem; margin-top: .4rem;border-radius:.03rem;float:left;background-color: #db3652;width: 49%;margin-left: 2%; height:.4rem;line-height:.4rem;display: inline-block;text-align: center;color: #fff;" href="javascript:;">取 消</a>
        <p class="xiao1" style="display: none;" class="fnTimeCountDown" data-end="2017/09/20 15:10:00">
            <span class="sec second">60</span>
        </p>
    </div>
</section>
<section class="mod-popup shi" style="display: none;">
    <div style="width: 80%;" class="mod-popup-txt">
        <img style="width: 1rem;" src="/images/tan.png"/>
        <p  style="color: #999; margin: .05rem; margin-top: .2rem;">您即将清除购买记录！</p>
        <p style="color: #999; margin: .05rem;">您的购买记录将全部删除</p>
        <p style="color: #f30; margin: .05rem;margin-bottom: .3rem;">请您核对好您的兑换码</p>
        <a class="queding2" href="javascript:;">确定</a>
        <a class="quxiao1" href="javascript:;">取消</a>
    </div>
</section>
<section class="mod-popup zhuxiaochenggong" style="display: none;">
    <div style="width: 80%;" class="mod-popup-txt">
        <p style="color: #f38; font-size: .18rem; margin: .05rem;">清除成功！</p>
        <p style="color: #999; margin: .05rem;">欢迎再次登录半价商城</p>
        <a class="tiaochu gg" href="javascript:;">确定</a>
    </div>
</section>
<section class="mod-popup yijianj" style="display: none;">
    <div style="width: 80%;" class="mod-popup-txt">
        <p style="color: #999; margin: .05rem;">您当前没有未兑换奖品</p>
        <a class="tiaochu ff" href="javascript:;">确定</a>
    </div>
</section>
<header class="person-header">
    <img class="person-headBg" src="/images/person_banner.jpg" alt="">
    <div class="person-headInfo">
        <div class="person-headImg">
            <img src="http://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83erNaYn0tEWiac65GIlqdR7T2un2KKxq5uULRibWzvgCIVl2UmyXpxibrdummQTibnNRrAaXxutRNk5fyw/0" alt="">
        </div>
        <div class="person-headTxt">
            <p class="person-hT-name">俞立军</p>
            <div class="person-hT-num">
                <p class="person-hT-id">推广ID：174398</p>
                <p class="person-hT-integral" onclick="jifen()">积分：0.00</p>
            </div>
        </div>
    </div>
</header>
<div class="person-recharge">
    <div class="">
        <p class="person-rcTxt"><span class="cr fr">累计获胜:0 单 &nbsp;&nbsp;&nbsp;</span></p>

    </div>
</div>
<ul class="person-menu">
    <li class="">
        <a href="/account/buyrecord">
            <p class="person-indiana">购买记录</p>
            <span class="person-mArrow"></span>
        </a>
    </li>
<!--    <li class="">-->
<!--        <a href="/">-->
<!--            <p class="person-winning">兑换记录</p>-->
<!--            <span class="person-mArrow"></span>-->
<!--        </a>-->
<!--    </li>-->
    <li class="">
        <a href="/store/rank">
            <p class="person-ranking">总排行榜</p>
            <span class="person-mArrow"></span>
        </a>
    </li>
    <li class="">
        <a href="/store/introduction">
            <p class="person-set">玩法介绍</p>
            <span class="person-mArrow"></span>
        </a>
    </li>
    <li class="">
        <a href="/store/ssc">
            <p class="person-set">夺宝看盘</p>
            <span class="person-mArrow"></span>
        </a>
    </li>
<!--    <li class="">-->
<!--        <a href="javascript:;" onclick="unRegist()" class="zhuxiao">-->
<!--            <p class="person-sethhoqc">清除记录</p>-->
<!--            <span class="person-mArrow"></span>-->
<!--        </a>-->
<!--    </li>-->
</ul>
<form action="/account/jishou" method="post"  id="jishouform">
    <input type="hidden" id="srcFrom" value="SRDB-TEST-001" name="srcFrom" >
    <input type="hidden"  id="isFirstJs" value="0" name="isFirstJs" >
</form>

<?php
require_once (dirname(__DIR__) . "/menu.php");
?>
</body>
<script type="text/javascript">

    $(function(){
        $(".zhuxiao").click(function(){
            $(".shi").show();
        });

        $(".non").click(function(){
            var code = $("#sendCode").val();
            if (code == "") {
                alert("请输入验证码");
                return false;
            }
            var parms = {
                "code" : code,
                srcFrom:'SRDB-TEST-001'
            };
            $.ajax({
                type: 'post',
                url: '/account/abunRegist',
                data : parms,
                dataType: 'json',
                success: function(data){
                    if(data.code==0){
                        //注销成功
                        $(".zhuxiaochenggong").show();
                        $(".yan").hide();
                    }else if(data.code==1||data.code==2){
                        //注销失败
                        alert("注销失败，请稍后重试......");
                    }else if(data.code==3){
                        alert(data.message);
                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!');
                }
            });
        });
        $(".no").click(function(){
            $(".yan").hide();
        });
        $(".quxiao1").click(function(){
            $(".shi").hide();
        });
        $(".gg").click(function(){
            WeixinJSBridge.call('closeWindow');
        });
        $(".queding2").click(function(){
            $(".yan").show();
            $(".shi").hide();
        });
    });
    function getY(){
        $('.daoshou').attr('onclick','');
        var timer = null;
        var second = 60;
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
        var par = {
            "type" : 5,
            "srcFrom":'SRDB-TEST-001',
            "smsType":2
        };
        $.ajax({
            url:'/PswCheck/setgoBackCode.do',
            type:'POST',
            data:{'param':JSON.stringify(par)},
            dataType:'json',
            success:function(data){
                if(data.code==1){
                    $('.daoshou').html('获取验证码');
                    clearInterval(timer);
                    timer = null;
                    second = 60;
                    $('.daoshou').attr('onclick','getY()');
                    $(".non").css("margin-top",".1rem");
                    $(".no").css("margin-top",".1rem");
                    $("#error").html(data.message);
                    $("#error").show();
                }
            }
        });
    }


    //头部订单信息显示
    function orderShow(){
        var url = '/srdb_index/buyInfo';
        $.ajax({
            type : "post",
            url : url,
            data:{srcFrom:'SRDB-TEST-001'},
            dataType : 'json',
            cache : false,
            success : function(data) {
                var datas = data.data;
                if(datas.unuse>=0||'0'=='1'){
                    $("#jishouform").submit();
                }else{
                    $(".yijianj").show();
                }
            }
        });
    }

    //积分查看
    function jifen(){
        window.location.href="/recharge/index/db?srcFrom=SRDB-TEST-001";
    }

    function openAgent(){
        window.location.href="/new_agent/agent_new_index?srcFrom=SRDB-TEST-001";
    }
</script>
</html>