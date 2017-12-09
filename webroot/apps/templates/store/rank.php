<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>排行榜</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/area.css">
    <style type="text/css">
        .pnt-list {
            height: .67rem;
        }

        .dai1 {
            width: .67rem;
            height: .67rem;
            padding: .08rem;
            background: url(/images/paitou_1.png) no-repeat;
            background-size: .67rem;
        }

        .dai2 {
            width: .67rem;
            height: .67rem;
            padding: .08rem;
            background: url(/images/paitou_2.png) no-repeat;
            background-size: .67rem;
        }

        .dai3 {
            width: .67rem;
            height: .67rem;
            padding: .08rem;
            background: url(/images/paitou_3.png) no-repeat;
            background-size: .67rem;
        }

        .pnt-l-img {
            width: .52rem;
            height: .52rem;
        }

        .pnt-l-img img {
            width: .52rem;
            margin: auto;
            border-radius: 50%;
        }

        .text_a {
            box-sizing: border-box;
            width: 2.5rem;
            margin: 0px auto;
        }

        .dao-d {
            position: fixed;
            bottom: 0px;
            width: 100%;
            height: .44rem;
            background-color: #ff3333;
            font-size: .15rem;
            box-sizing: border-box;
        }

        .dao-d ul {
            list-style: none;
            width: 100%;
            height: .3rem;
            width: 100%;
        }

        .dao-li {
            width: 50%;
            float: left;
            background-color: #ff3333;
            color: #fff;
            font-size: .15rem;
            text-align: center;
            padding: .1rem 0rem;
        }

        .bian-l {
            box-sizing: border-box;
            width: 50%;
            font-size: .15rem;
            text-align: center;
            border: .01rem solid #fff;
            background-color: #fff;
            color: #ff3333;
            padding: .1rem;
        }
    </style>
</head>
<body>
<!-- 导航  start-->
<div class="mod-commonBtn">
    <a class="mod-perCenterBtn"
       href="/account/index?srcFrom=SRDB-TEST-001"></a> <a
        class="mod-homePageBtn"
        href="/srdb_index/index?srcFrom=SRDB-TEST-001"></a>
</div>
<!-- 导航  end-->
<input type="hidden" id="srcFrom" name="srcFrom" value='SRDB-TEST-001' />
<input type="hidden" id="goodId" name="goodId" value='' />
<ul class="panking-next">

    <li class="pnt-list"><a
            href="/account/record?userId=167904&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;">
            <span style="margin:0px .15rem;" class="pnt-l-num"><img style="width: .3rem;margin-top:.15rem ;margin-right: .1rem;" src="/images/pai_1.png"/></span>
            <div class="pnt-l-img dai1">
                <img class="waipi" src="http://wx.qlogo.cn/mmhead/rqvn1hjHyte6T40HBUUB0mbZeUYaicJ5Wu5YiciaP0xFibyAdK5Am49Q0g/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p style="margin-top: .08rem;" class="pnt-lc-id"><span  style="font-size: .16rem; color: #000;">民</p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">已获胜：<span class="cr">229</span>单</p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=179894&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;">
            <span style="margin:0px .15rem;" class="pnt-l-num"><img style="width: .3rem;margin-top:.15rem ;margin-right: .1rem;" src="/images/pai_2.png"/></span>
            <div class="pnt-l-img dai2">
                <img class="waipi" src="http://www.zzgwsc.com/headImageUrl/2017-11-24/1711241435416953.png" alt="">
            </div>
            <div class="pnt-l-con">
                <p style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id"><span  style="font-size: .16rem; color: #000;"></p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">已获胜：<span class="cr">164</span>单</p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=179091&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;">
            <span style="margin:0px .15rem;" class="pnt-l-num"><img style="width: .3rem;margin-top:.15rem ;margin-right: .1rem;" src="/images/pai_3.png"/></span>
            <div class="pnt-l-img dai3">
                <img class="waipi" src="http://www.zzgwsc.com/headImageUrl/2017-11-09/17110915541340320.png" alt="">
            </div>
            <div class="pnt-l-con">
                <p style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id"><span  style="font-size: .16rem; color: #000;">来钱了</p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">已获胜：<span class="cr">160</span>单</p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=158735&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem .22rem; font-size: .25rem " class="pnt-l-num">4</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83eqHqw9gU7QzTlagAw3HUwUNs0gp9trPgnLVWfhZDgggwN38w6mR0gvcgL9rTialHl76mwrxoCDYyibw/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">老刘135...
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">156</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=179163&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem .22rem; font-size: .25rem " class="pnt-l-num">5</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/vi_32/FD9b1uZ2UsPOD4xWDZTo4owERn7Wh6lmstXwRriagw7ZyUvRZUSIaCVicic8DoNib8h9zqD4icqb7H7CsvQdI6FjEvA/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">加
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">101</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=162322&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem .22rem; font-size: .25rem " class="pnt-l-num">6</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://www.zzgwsc.com/headImageUrl/2017-10-27/17102723065517976.png" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">情
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">92</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=179707&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem .22rem; font-size: .25rem " class="pnt-l-num">7</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/vi_32/AR6UTBhqOpPcgEeHOXzVck0za8tH3qJmchlEouH4BXmHoULfd7hMtgTia0FzbD6DEdmiaDXSoh3ujTrdWHLRPdpA/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">FBI
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">91</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=179420&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem .22rem; font-size: .25rem " class="pnt-l-num">8</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://www.zzgwsc.com/headImageUrl/2017-11-27/17112712472789664.png" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">死胖子
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">83</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=179995&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem .22rem; font-size: .25rem " class="pnt-l-num">9</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://www.zzgwsc.com/headImageUrl/2017-11-24/1711241435416953.png" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">81</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=120922&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">10</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/vi_32/WsCLibPkG78aOuwdW33Ah6ZsD8tkVWQ7Ces5ic8PBoc4yUq0PUXMWTYIxnkjcLlWMfHZ60tKgE7UJKk68f0YCxvg/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">东跃
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">69</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=114490&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">11</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIllOQsNSuLe0icbvhWFrsAq7paWJHJHsAzKedUJJZ8RXhBic7nS8TQMNcjr1fwyAwfHqJlTHBVqKLQ/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">阳光
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">58</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=173239&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">12</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://www.zzgwsc.com/headImageUrl/2017-11-08/17110814553538718.png" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">仄
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">55</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=165615&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">13</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://www.zzgwsc.com/headImageUrl/2017-10-19/17101916092319403.png" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">划愣划愣
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">54</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=83&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">14</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/ajNVdqHZLLDrgmXVic3fvDeBk8c0Fkvfyg8iaGVMjDVKVk0c4bpcg5MHGiaPOBXcXwdt60ezDYyaXOFGrklZpgAIBMJcGIhx15LSH2cHOtJMhY/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">方言
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">53</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=81&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">15</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/UPe93KGaRQLzAt8z1vhACeaeLyU8VticpsNTUCorFPseZQHt4f6FCKfLTMYfg05Z2uGeDyia4mDqsa1F9qgzQF40I1NS0fhZRb/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">峰回夕阳
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">52</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=179893&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">16</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://www.zzgwsc.com/headImageUrl/2017-11-23/17112315074071385.png" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">人心不足蛇...
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">51</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=55271&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">17</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/gHtet1U8y2KFVTnSZYfLUruBO9IZenwxHjVMwh8tkuu71EoZjMoJlvGYqbI8SlLYtOcP4m7ZZ6zk6Melz6Np8cVcNuCrxHna/" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">低调
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">50</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=23&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">18</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/gHtet1U8y2LeuxIL9HRsAiaCOYydpD2yxB2An1JLsGEMGmE9TczzzODoOjtGZ14B0m2GhJ947SZBriaTctqVCyBplgano5hE4G/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">只看见
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">50</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=128644&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">19</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/vi_32/Ljzwqyst2y507Bmzv5Uib032RkoFBm8PvouibhLZumqoSCLwaDnpBNB3tIP9j9UykCOs4LCyDpuOLeSKLESfCM8Q/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">联创手机维...
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">42</span>单
                </p>
            </div>
        </a></li>

    <li class="pnt-list"><a
            href="/account/record?userId=178396&srcFrom=SRDB-TEST-001"
            style="display: box; display: -webkit-box; display: flex;"> <span
                style="color: #000;margin: .14rem;font-size: .25rem;" class="pnt-l-num">20</span>
            <div style="margin:.06rem .15rem;" class="pnt-l-img">
                <img class="waipi" src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJ5SU3r6reMth7FH3MHnb8tdQYz51oib9tkdYb6tY8aulo9pF5XCnlxpQiczupgNRCLibN3LVk8RZ9pA/0" alt="">
            </div>
            <div class="pnt-l-con">
                <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;">晴天
                </p>
                <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                    获胜：<span class="cr">41</span>单
                </p>
            </div>
        </a></li>
</ul>
<script src="../../js/zepto.min.js"></script>
<script type="text/javascript">
    //	导航切换
    $(".dao-d").delegate("li","click",function(){
        $(this).addClass("bian-l").siblings().removeClass("bian-l");
        var time = $(".bian-l").html();
        if(time=="老半价商城"){
            window.location.href="/srdb_good/rankingList?srcFrom=SRDB-TEST-001&goodId=&days=1";
        }else if(time=="新半价商城"){
            window.location.href="/srdb_good/rankingList?srcFrom=SRDB-TEST-001&goodId=&days=7";
        }
    });

    $(function(){
        if('index3'=='index4'&&'1'==1){
            window.location.href="/srdb_good/rankingList?srcFrom=SRDB-TEST-001&goodId=&days=7";
        }
    });
</script>
</body>
</html>