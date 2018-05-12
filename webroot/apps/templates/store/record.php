<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购买清单</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/css/agent.css">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/person.css">
    <link rel="stylesheet" href="/css/dropload.min.css">
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
            /*border-bottom: 1px solid #ccc;
            background-color: #f6f6f6;
            padding-top: .11rem;*/
        }
        .inner{
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            /*background-color: #fff;*/
            overflow-y: scroll;
            -webkit-overflow-scrolling: touch;
            padding-bottom: .44rem;
        }
        .win-nav-cur{
            color: #f30 !important;
            border-bottom:2px solid #f30;
        }
        .dropload-down {
            padding-bottom: 44px;
            width: 100%;
        }
        html,body {
            background-color:#fff;
        }
        .qidao{
            color: #ccc;
            font-size: .1rem;
            text-align: right;

        }
        .leftx{
            width: .2rem;
            height: .2rem;
            z-index: 9;
            line-height: .2rem;
            display: inline-block;
            border-radius:50% ;
            color: #fff;
            font-size:.14rem ;
            margin-left:.02rem;
            border: 1px solid #fff;
            text-align: center;
        }
        .rightx{
            width: .2rem;
            height: .2rem;
            text-align: center;
            line-height: .2rem;
            font-size:.14rem;
            margin:.01rem;
            display: inline-block;
            border: 1px solid #fff;
            border-radius:50% ;
            color: #fff;
            margin-left:.02rem;
            z-index: 9;
        }
        .leftx1{
            width: .21rem;
            height: .21rem;
            z-index: 9;
            line-height: .21rem;
            display: inline-block;
            border-radius:50% ;
            color: #fff;
            font-size:.14rem ;
            margin-left:.02rem;
            border: 1px solid #fff;
            text-align: center;
        }
        .rightx1{
            width: .21rem;
            height: .21rem;
            text-align: center;
            line-height: .21rem;
            font-size:.14rem;
            margin:.01rem;
            display: inline-block;
            border: 1px solid #fff;
            border-radius:50% ;
            color: #fff;
            margin-left:.02rem;
            z-index: 9;
        }
        .widw{width: 100%; }
        @media only screen and (min-width: 320px) and (max-width:370px) {
            .fangw{margin-top: .48rem;}
            .fangw1{margin-top: .45rem;}
        }
        @media only screen and (min-width: 371px) and (max-width: 413px) {
            .fangw{margin-top: .48rem;}
            .fangw1{margin-top: .45rem;}
        }
        @media only screen and (min-width: 414px) and (max-width: 640px) {
            .fangw{margin-top: .48rem;}
            .fangw1{margin-top: .45rem;}
        }

    </style>
</head>
<body>

<div class="outer">
    <div class="mod-commonBtn">
        <a class="mod-perCenterBtn" href="/account/index?srcFrom=SRDB-TEST-001"></a>
        <a class="mod-homePageBtn" href="/srdb_index/index?srcFrom=SRDB-TEST-001"></a>
    </div>
    <div class="dao-d">
        <ul class="win-nav">
            <li class="dus duobpk"><p class="hw win-nav-cur">半价商城</p></li>
            <a href="/yydbRecord/record?srcFrom=SRDB-TEST-001&userId=179091"><li class="dus duobpk1"><p class="hw1">一元商城</p></li></a>
        </ul>
    </div>
    <div class="inner">
        <ul class="buyItem">
            <li class="buyList" style="padding-bottom:0px; border-bottom:2px solid #f1f1f1;">
                <div class="buyList-w"  >
                    <div style="z-index: 990;" class="buyList-w-left">
                        <a class="bl-w-l-img" href="javascript:void(0);">
                            <img src="/images/ZSY50.png" alt="">
                        </a>
                        <p class="bl-w-l-txt cr">等待开战</p>
                    </div>

                    <a style="position: relative;z-index: 10;" class="buyList-w-right" href="/account/record/detail?id=5923361&userId=179091&srcFrom=SRDB-TEST-001">
                        <h3>50元加油卡</h3>
                        <p>本期参与：<span style="color: #3b84dd;">
	        						来钱了
	        					</span></p>
                        <p style="top: -.03rem; width: .5rem;position: absolute; text-align: center; right: .05rem;color:#ff0033;border-radius:.04rem;background-color:#fff;border: 1px solid #FF0033;">查看</p>
                        <p class=" ">购买时间：2017-12-11 17:50:02</p>
                        <p class="bl-wr-duan">购买号段：<span class="cr">29-56</span><span class="bl-wr-ride cr"><img  src="/images/ride.png" alt=""></span><span class="cr">11</span><span class="cr">单</span></p>
                    </a>
                </div>
            </li>




            <li class="buyList" style="padding-bottom:0px; border-bottom:2px solid #f1f1f1;">
                <div class="buyList-w" >
                    <div style="z-index: 990;" class="buyList-w-left">
                        <a class="bl-w-l-img" href="javascript:void(0);">
                            <img src="/images/YX100.png" alt="">
                        </a>
                        <p class="bl-w-l-txt">已失败</p>
                    </div>

                    <a style="position: relative;z-index: 10;" class="buyList-w-right"  href="/account/record/detail?id=5922620&userId=179091&srcFrom=SRDB-TEST-001" >
                        <h3>100元骏卡一卡通</h3>
                        <p>本期参与：<span style="color: #3b84dd;">
	        						来钱了
	        					</span></p>
                        <p style="top: -.03rem; width: .5rem;position: absolute; text-align: center; right: .05rem;color:#ff0033;border-radius:.04rem;background-color:#fff;border: 1px solid #FF0033;">查看</p>
                        <p class=" ">参与时间：2017-12-11 16:49:55</p>
                        <p class="bl-wr-duan">参与号段：<span class="cr">56-110</span><span class="bl-wr-ride cr"><img src="/images/ride.png" alt=""></span><span class="cr">7</span><span class="cr">单</span></p>
                        <p class=" ">开战时间：2017-12-11 16:50:00</p>
                        <p>获胜号码：<span class="cr">46</span></p>
                    </a>
                </div>
            </li>



            <li class="buyList" style="padding-bottom:0px; border-bottom:2px solid #f1f1f1;">
                <div class="buyList-w buyList-w-win" >
                    <div style="z-index: 990;" class="buyList-w-left">
                        <a class="bl-w-l-img" href="javascript:void(0);">
                            <img src="/images/ZSY50.png" alt="">
                        </a>
                        <p class="bl-w-l-txt">恭喜获胜</p>
                    </div>
                    <a style="overflow: hidden;  position: relative;z-index: 10; display:inline-block;width:100%;height: 1.65rem;" class="buyList-w-right" href="/account/record/detail?id=5919987&userId=179091&srcFrom=SRDB-TEST-001" >
                        <div class="fangw" style="width:100%;width: 2rem;">
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="leftx">夺</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="leftx">夺</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="leftx">夺</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="leftx">夺</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                        </div>
                        <div class="widw"  style="position: absolute;top: 0rem;">
                            <h3>50元加油卡</h3>
                            <p>本期参与：<span style="color: #3b84dd;">
		        						来钱了
		        					</span></p>
                            <p style="top: 0rem; width: .5rem;position: absolute; text-align: center; right: 1.11rem;color:#ff0033;border-radius:.04rem;background-color:#fff;border: 1px solid #FF0033;">查看</p>
                            <p class=" ">参与时间：2017-12-11 13:19:41</p>
                            <p class="bl-wr-duan">参与号段：<span class="cr">1-28</span><span class="bl-wr-ride cr"><img src="/images/ride.png" alt=""></span><span class="cr">14</span><span class="cr">单</span></p>
                            <p class=" ">开战时间：2017-12-11 13:20:00</p>
                            <p>获胜号码：<span class="cr">24</span></p>
                        </div>
                    </a>
                </div>
                <a style="z-index: 20;" class="buyList-getBtn"  href="/PswCheck/toPwLogin?srcFrom=SRDB-TEST-001">点击领取</a>
            </li>


            <li class="buyList" style="padding-bottom:0px; border-bottom:2px solid #f1f1f1;">
                <div class="buyList-w buyList-w-win" >
                    <div style="z-index: 990;" class="buyList-w-left">
                        <a class="bl-w-l-img" href="javascript:void(0);">
                            <img src="/images/YX100.png" alt="">
                        </a>
                        <p class="bl-w-l-txt">恭喜获胜</p>
                    </div>
                    <a style="overflow: hidden;  position: relative;z-index: 10; display:inline-block;width:100%;height: 1.65rem;" class="buyList-w-right" href="/account/record/detail?id=5915541&userId=179091&srcFrom=SRDB-TEST-001" >
                        <div class="fangw" style="width:100%;width: 2rem;">
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="leftx">夺</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="leftx">夺</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="leftx">夺</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="leftx">夺</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                            <p class="rightx">宝</p>
                            <p class="leftx">双</p>
                            <p class="rightx">人</p>
                        </div>
                        <div class="widw"  style="position: absolute;top: 0rem;">
                            <h3>100元骏卡一卡通</h3>
                            <p>本期参与：<span style="color: #3b84dd;">
		        						来钱了
		        					</span></p>
                            <p style="top: 0rem; width: .5rem;position: absolute; text-align: center; right: 1.11rem;color:#ff0033;border-radius:.04rem;background-color:#fff;border: 1px solid #FF0033;">查看</p>
                            <p class=" ">参与时间：2017-12-10 23:44:53</p>
                            <p class="bl-wr-duan">参与号段：<span class="cr">56-110</span><span class="bl-wr-ride cr"><img src="/images/ride.png" alt=""></span><span class="cr">30</span><span class="cr">单</span></p>
                            <p class=" ">开战时间：2017-12-10 23:45:00</p>
                            <p>获胜号码：<span class="cr">80</span></p>
                        </div>
                    </a>
                </div>
                <a style="z-index: 20;" class="buyList-getBtn"  href="/PswCheck/toPwLogin?srcFrom=SRDB-TEST-001">点击领取</a>
            </li>


            <li class="buyList" style="padding-bottom:0px; border-bottom:2px solid #f1f1f1;">
                <div class="buyList-w" >
                    <div style="z-index: 990;" class="buyList-w-left">
                        <a class="bl-w-l-img" href="javascript:void(0);">
                            <img src="/images/ZSY50.png" alt="">
                        </a>
                        <p class="bl-w-l-txt">已失败</p>
                    </div>

                    <a style="position: relative;z-index: 10;" class="buyList-w-right"  href="/account/record/detail?id=5915524&userId=179091&srcFrom=SRDB-TEST-001" >
                        <h3>50元加油卡</h3>
                        <p>本期参与：<span style="color: #3b84dd;">
	        						来钱了
	        					</span></p>
                        <p style="top: -.03rem; width: .5rem;position: absolute; text-align: center; right: .05rem;color:#ff0033;border-radius:.04rem;background-color:#fff;border: 1px solid #FF0033;">查看</p>
                        <p class=" ">参与时间：2017-12-10 23:44:20</p>
                        <p class="bl-wr-duan">参与号段：<span class="cr">29-56</span><span class="bl-wr-ride cr"><img src="/images/ride.png" alt=""></span><span class="cr">30</span><span class="cr">单</span></p>
                        <p class=" ">开战时间：2017-12-10 23:45:00</p>
                        <p>获胜号码：<span class="cr">26</span></p>
                    </a>
                </div>
            </li>



        </ul>
        <p id = "mores" style="text-align: center; height:.4rem; line-height:.4rem; font-size:.14rem; "><a onclick="runs(179091)">点击加载更多...</a></p>
    </div>

</div>
<footer style="z-index: 999;" class="buyList-footer">
    <ul>
        <footer style="z-index: 999;" class="buyList-footer">
            <ul>
                <li>当日参与:32 单</li>
                <li>当日获胜:14 单</li>
                <li>当日失败:7 单</li>
            </ul>
        </footer>

    </ul>
</footer>
<!-- 上拉加载刷新 -->
<script src="/js/zepto.min.js"></script>
<script src="/js/dropload.min.js"></script>
<script>
    var sum = 1;
    function runs(userId){
        $("#mores").html("正在加载中...");
        $.post('/account/record/more.do',{page:sum,userId:userId,srcFrom:'SRDB-TEST-001'}, function(dates) {
            if (dates.length>0) {
                if(dates.length<5){
                    $("#mores").hide();
                }
                var appendStr ="";
                for(var i=0;i<dates.length;i++){
                    var nickName=dates[i].nickname;
                    if(dates[i].nickname.length>5){
                        nickName=dates[i].nickname.substr(0,5)+"...";
                    }
                    if(dates[i].orderStatus=='0'){
                        appendStr +='<li class="buyList" style="padding-bottom:0px; border-bottom:2px solid #f1f1f1;">'
                            +'<div class="buyList-w" >'
                            +'	<div style="z-index: 999;" class="buyList-w-left">'
                            +'		<a class="bl-w-l-img" href="">'
                            +'			<img src="/'+dates[i].path+'" alt="">'
                            +'		</a>'
                            +'		<p class="bl-w-l-txt cr">等待开战</p>'
                            +'	</div>'
                            +'	<a style="position: relative;" class="buyList-w-right" href="/account/record/detail?id='+dates[i].id+'&userId='+dates[i].userId+'&srcFrom=SRDB-TEST-001" >'
                            +"		<h3>"+dates[i].name+"</h3>"
                            +'	<p>本期参与：<span style="color: #3b84dd;">'+nickName+'</span></p>'
                            +'	<p style="top: -.03rem; width: .5rem;position: absolute; text-align: center; right: .05rem;color:#ff0033;border-radius:.04rem;background-color:#fff;border: 1px solid #FF0033;">查看</p>'
                            +'		<p class=" ">参与时间：'+dates[i].showTime+'</p>'
                            +'		<p class="bl-wr-duan">参与号段：<span class="cr">'+dates[i].sectionNo+'</span><span class="bl-wr-ride cr"><img src="/images/ride.png" alt=""></span><span class="cr">'+dates[i].purchaseCounts+'</span><span class="cr">单</span></p>'
                            +'	</a>'
                            +'</div>'
                            +'</li>'
                    }else if(dates[i].orderStatus=='1'){
                        appendStr +='<li class="buyList" style="padding-bottom:0px; border-bottom:2px solid #f1f1f1;">'
                            +'<div class="buyList-w"  >'
                            +'	<div style="z-index: 999;" class="buyList-w-left">'
                            +'		<a class="bl-w-l-img" href="">'
                            +'			<img src="/'+dates[i].path+'" alt="">'
                            +'</a>'
                            +'		<p class="bl-w-l-txt">已失败</p>'
                            +'	</div>'
                            +'	<a style="position: relative;" class="buyList-w-right" href="/account/record/detail?id='+dates[i].id+'&userId='+dates[i].userId+'&srcFrom=SRDB-TEST-001" >'
                            +"		<h3>"+dates[i].name+"</h3>"
                            +'	<p>本期参与：<span style="color: #3b84dd;">'+nickName+'</span></p>'
                            +'	<p style="top: -.03rem; width: .5rem;position: absolute; text-align: center; right: .05rem;color:#ff0033;border-radius:.04rem;background-color:#fff;border: 1px solid #FF0033;">查看</p>'
                            +'		<p class=" ">参与时间：'+dates[i].showTime+'</p>'
                            +'	<p class="bl-wr-duan">参与号段：<span class="cr">'+dates[i].sectionNo+'</span><span class="bl-wr-ride cr"><img src="/images/ride.png" alt=""></span><span class="cr">'+dates[i].purchaseCounts+'</span><span class="cr">单</span></p>'
                            +'	<p class=" ">开战时间：'+dates[i].drawTime+'</p>'
                            +'	<p>获胜号码：<span class="cr">'+dates[i].result+'</span></p>'
                            +'</a>'
                            +'</div>'
                            +'</li>'
                    }else if(dates[i].orderStatus=='2'){
                        appendStr +='<li class="buyList" style="padding-bottom:0px; border-bottom:2px solid #f1f1f1;">'
                            +'<div class="buyList-w buyList-w-win" >'
                            +'	<div style="z-index: 999;" class="buyList-w-left">'
                            +'		<a class="bl-w-l-img" href="">'
                            +'			<img src="/'+dates[i].path+'" alt="">'
                            +'		</a>'
                            +'		<p class="bl-w-l-txt">恭喜获胜</p>'
                            +'	</div>'
                            +'	<a style="overflow: hidden; position: relative;z-index: 10; display:inline-block;width:100%;height: 1.65rem;" class="buyList-w-right" href="/account/record/detail?id='+dates[i].id+'&userId='+dates[i].userId+'&srcFrom=SRDB-TEST-001" >'
                            +'<div class="fangw1" style="width:100%;width: 2rem;">'
                            +'<p class="leftx1">双</p>'
                            +'<p class="rightx1">人</p>'
                            +'<p class="leftx1">夺</p>'
                            +'<p class="rightx1">宝</p>'
                            +'<p class="leftx1">双</p>'
                            +'<p class="rightx1">人</p>'
                            +'<p class="leftx1">夺</p>'
                            +'<p class="rightx1">宝</p>'
                            +'<p class="leftx1">双</p>'
                            +'<p class="rightx1">人</p>'
                            +'<p class="leftx1">夺</p>'
                            +'<p class="rightx1">宝</p>'
                            +'<p class="leftx1">双</p>'
                            +'<p class="rightx1">人</p>'
                            +'<p class="leftx1">夺</p>'
                            +'<p class="rightx1">宝</p>'
                            +'<p class="leftx1">双</p>'
                            +'<p class="rightx1">人</p>'
                            +'<p class="rightx1">宝</p>'
                            +'<p class="leftx1">双</p>'
                            +'<p class="rightx1">人</p>'
                            +'</div>'
                            +'<div class="widw" style="position: absolute;top: 0rem;">'
                            +"		<h3>"+dates[i].name+"</h3>"
                            +'	<p>本期参与：<span style="color: #3b84dd;">'+nickName+'</span></p>'
                            +'	<p style="top: 0rem; width: .5rem;position: absolute; text-align: center; right: 1.11rem;color:#ff0033;border-radius:.04rem;background-color:#fff;border: 1px solid #FF0033;">查看</p>'
                            +'		<p class=" ">参与时间：'+dates[i].showTime+'</p>'
                            +'	<p class="bl-wr-duan">参与号段：<span class="cr">'+dates[i].sectionNo+'</span><span class="bl-wr-ride cr"><img  src="/images/ride.png" alt=""></span><span class="cr">'+dates[i].purchaseCounts+'</span><span class="cr">单</span></p>'
                            +'	<p class=" ">开战时间：'+dates[i].drawTime+'</p>'
                            +'	<p>获胜号码：<span class="cr">'+dates[i].result+'</span></p>'
                            +'</div>'
                            +'</a>'
                            +'<a style="z-index: 20;" class="buyList-getBtn"  href="/PswCheck/toPwLogin?srcFrom=SRDB-TEST-001">点击领取</a>'
                            +'</li>'
                            +'</div>'
                    }

                }
                sum = sum+1;
                $(".buyItem").append(appendStr);
                $("#mores").html('<a onclick="runs(179091)">点击加载更多...</a>');
            } else{
                $("#mores").hide();
            }
        });


    }
    var push = 0;
    $(function(){
        var i = 10;
        var timer;
        timer = setInterval(function(){
            i--;
            if (i <1) {
                clearInterval(timer);
                timer = null;
                push = 1;
            };
        },1000);
    });
    // dropload
    var dropload = $('.inner').dropload({
        domUp : {
            domClass   : 'dropload-up',
            domRefresh : '<div class="dropload-refresh">↓下拉刷新</div>',
            domUpdate  : '<div class="dropload-update">↑释放更新</div>',
            domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>'
        },
        loadUpFn : function(me){
            if(push ==1){
                window.location.reload();//刷新当前页面.
            }
            me.resetload();
        }
    });


</script>
</body>
</html>