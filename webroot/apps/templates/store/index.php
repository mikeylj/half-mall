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
    <script src="/js/sdk/webim.js"></script>
    <script src="/js/sdk/strophe.js"></script>
    <script src="/js/sdk/easemob.im-1.1.js"></script>
    <script src="/js/sdk/easemob.im-1.1.shim.js"></script><!--兼容老版本sdk需引入此文件-->
    <script src="/js/sdk/easemob.im.config.js"></script>
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/tantan2.js"></script>
    <script src="/js/websocket.js"></script>
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
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://www.zzgwsc.com/headImageUrl/2017-10-22/17102212422812953.png" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>A就lo</span><span>2017-12-11 11:53:57</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">2</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://www.zzgwsc.com/headImageUrl/2017-10-11/17101115070019217.png" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>美美</span><span>2017-12-11 11:53:52</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">1</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://www.zzgwsc.com/headImageUrl/2017-11-23/17112315074071385.png" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>人心不足蛇...</span><span>2017-12-11 11:53:51</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">1</span>单--50元充值卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/icJCIVzDOTmweQxPEJXhNS2yBWYT8lTfCYfvic5vV0e2ynhCTLg5y6L5hLWeY1YxX0fyAkItuCKaE6MQghbtLUsA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>柠檬的芯</span><span>2017-12-11 11:53:48</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">1</span>单--100元充值卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKG03cIx2HyPR09vgia2GVJHVkHaomHC2Bezy42tlFXt9Sw1qTW69jShgrE0jCCAfnq9lYKySGLFWw/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>文</span><span>2017-12-11 11:53:31</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">1</span>单--50元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://www.zzgwsc.com/headImageUrl/2017-11-23/17112315074071385.png" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>人心不足蛇...</span><span>2017-12-11 11:53:16</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">10</span>单--50元充值卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmhead/rqvn1hjHyte6T40HBUUB0mbZeUYaicJ5Wu5YiciaP0xFibyAdK5Am49Q0g/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>民</span><span>2017-12-11 11:52:59</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">2</span>单--50元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/PiajxSqBRaEKekic8wK5cDEXdq4WibEibicVxEChHlGj6zHuCJV3U7icQpoOAXZV7BvVmOibPmibxiauloXUE0tw52VoneA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>未曾相识~</span><span>2017-12-11 11:52:49</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">6</span>单--100元骏卡一卡通</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/IxNvZ5yZCSP5rEFwDX52hicmZIOVZwZ13SIJ81k3B8khTIZdyibAnQ4aqZP138q0ia93iaiavsFmD4arE8OC7Y0d3tA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>今夕是何夕</span><span>2017-12-11 11:52:37</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">20</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmhead/rqvn1hjHyte6T40HBUUB0mbZeUYaicJ5Wu5YiciaP0xFibyAdK5Am49Q0g/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>民</span><span>2017-12-11 11:52:02</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">2</span>单--50元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83eqHqw9gU7QzTlagAw3HUwUNs0gp9trPgnLVWfhZDgggwN38w6mR0gvcgL9rTialHl76mwrxoCDYyibw/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>老刘135...</span><span>2017-12-11 11:51:59</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">5</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/78vDM2vOOAgMtRtJjIxR9KUkhWmzRzUT76j3OjyyUSyqrVkrKT36mc2SzDEb7ojVAAnIeicZOLDGG6JKVU1Wh6Q/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>赌徒、</span><span>2017-12-11 11:51:53</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">1</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIsWXJj9xYnYaicT1icIicqAlTcUJnSjnsPibu6gRxulLBKpP6viaf9NwtjEVlQf10W1CXPTXlgp2I9rGA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>巧克力</span><span>2017-12-11 11:49:59</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">1</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/icIlCxeNQgtciba9tEyCeUINvyySC43wZhuaibPeyjb4GLrn672icGT2Jc6pBIaibUAkgaNXZfDichSWKia2XVbricR3DyeKmPLYxGPJ/" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>一路阳光</span><span>2017-12-11 11:49:58</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">1</span>单--50元京东卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Jv87fDfc1giaw4HzcVhDVXrXabpr77WOzbeWq24RM8BY9N02SYMlDvAjUBQdFOTnWCicHLFGQaFy5OqPWEcvhHRQ/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>影子</span><span>2017-12-11 11:49:55</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">1</span>单--100元骏卡一卡通</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/UiaHseVLMdboF2WQia2hUTdoFMcp2g8w6hUuj1Zwg6HJYhfVJ4KI3yNLjZ9oLtusv2COHqPwXqPWwqXCqTtZjibGw/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>宇欣</span><span>2017-12-11 11:49:48</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">4</span>单--50元充值卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://www.zzgwsc.com/headImageUrl/2017-10-21/1710211002373173.png" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>一棵草</span><span>2017-12-11 11:49:41</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">5</span>单--100元京东卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLy616jF4SzHjvjeHkbgsKG0FHR3OJVeMguzqZqQibWhyhzSAgBL1yRQKoIKEbyFHHz7vKJuANgwrA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>尹芝</span><span>2017-12-11 11:49:36</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">5</span>单--50元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://www.zzgwsc.com/headImageUrl/2017-10-19/17101921591556402.png" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>笑看人</span><span>2017-12-11 11:49:29</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">5</span>单--100元充值卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/AdsNHBicX6HtnIicUiaiatxJTiag9NnxepO56lxPialISU1EckkanS22qregab6K9w5iaYEia3fiammRpXcyyJT1s8RH0KA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>总是输</span><span>2017-12-11 11:49:22</span></p>
                                <p class="mArea-clir-bottom">刚刚参与<span class="cr">1</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <div style="height: 0.4rem"></div>
<!--                    <a href="/srdb_index/loadMoreOld?srcFrom=SRDB-TEST-001"  style="width: 100%;font-size: .14rem;text-align: center;display: block; color: #0000FF;padding:.05rem 0rem;" >查看更多</a>-->
                </ul>
                <ul class="mArea-cul" style="display:none;">
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/icIlCxeNQgtciba9tEyCeUINvyySC43wZhuaibPeyjb4GLrn672icGT2Jc6pBIaibUAkgaNXZfDichSWKia2XVbricR3DyeKmPLYxGPJ/" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>一路阳光</span><span>2017-12-11 11:49:58</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--50元京东卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKeVNlvQXOVqAkXNNzN1fh7yocicG8e6TDmjZTmIZEZ6o2iaYW2otIiakliaQy6IpYXOEfue4ibvJyJulw/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>忘不掉的过...</span><span>2017-12-11 11:49:56</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="/account/record?userId=176141&srcFrom=SRDB-TEST-001">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Jv87fDfc1giaw4HzcVhDVXrXabpr77WOzbeWq24RM8BY9N02SYMlDvAjUBQdFOTnWCicHLFGQaFy5OqPWEcvhHRQ/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>影子</span><span>2017-12-11 11:49:55</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--100元骏卡一卡通</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/UiaHseVLMdboF2WQia2hUTdoFMcp2g8w6hUuj1Zwg6HJYhfVJ4KI3yNLjZ9oLtusv2COHqPwXqPWwqXCqTtZjibGw/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>宇欣</span><span>2017-12-11 11:49:48</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">4</span>单--50元充值卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://www.zzgwsc.com/headImageUrl/2017-10-21/1710211002373173.png" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>一棵草</span><span>2017-12-11 11:49:41</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">5</span>单--100元京东卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLy616jF4SzHjvjeHkbgsKG0FHR3OJVeMguzqZqQibWhyhzSAgBL1yRQKoIKEbyFHHz7vKJuANgwrA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>尹芝</span><span>2017-12-11 11:49:36</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">5</span>单--50元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/bNqVZcia7iaBxd2SHNhTiatSknRfPbaibibQOtkEGV9AYhGk8bgeicOMs5uLvUbKzA9MWvnYKPeGiawbM2O7p3NxGkTBfuT7StPIK5Q/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>余生</span><span>2017-12-11 11:49:25</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--200元京东卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLVSicU6zXExkJNicwUCS5cj4ndoBtxdiaC67fGKL75ZtwOlg3jFeYZqgxPrGCwefuPibcgxCkIKJicJhw/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>L.</span><span>2017-12-11 11:49:25</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--50元京东卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/AdsNHBicX6HtnIicUiaiatxJTiag9NnxepO56lxPialISU1EckkanS22qregab6K9w5iaYEia3fiammRpXcyyJT1s8RH0KA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>总是输</span><span>2017-12-11 11:49:22</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/cPCyHQyGWMFWLBY7AZOTHMx5bFseD7UsIliaYjBib9jKyEgs1Mh42dk6boFicycaXYNLMd7cP67eYaEomicFCnFnPswMEGnueElr/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>裝作兂所</span><span>2017-12-11 11:49:19</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--200元京东卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/gHtet1U8y2JKPzFO0nrdyopHVmQsXZ1Z9QMMTGJP7YYZ6kuRUljksALJbrIN4VMOkOmllaM09tND6c27XGiaD3oyzOvR2wiaiaJ/" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>Staye...</span><span>2017-12-11 11:49:15</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">2</span>单--100元充值卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/ajNVdqHZLLD3zhCT7raU3raib3cxywjBqyvfBtiaxtkhU0diaia4RPMuHUFfib5d67fgx8yr4HGFSZBUtib4ruKFZq3MK9bTWGxlwIOSlxlKeALD0/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>fiona...</span><span>2017-12-11 11:49:10</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">2</span>单--200元京东卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKpgOYib8MqAYWTfanpfbzpxlZfX5YTrjNQtV9dm9INqyZ4rS9n1aibKEQribywpKqY4TAzaxGCYU8TA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>心灵的驿站</span><span>2017-12-11 11:48:59</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--100元京东卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/Q3auHgzwzM4GWpW9ONOqZJlfCAlia0lKXu3hianmSVZcXoWI1XAHkDZC9Z8qESa9bRTq2mUPuHicIKnvGlD8bLIXRTooEibibsXdYb9VwYmqOgOI/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>不忘初心</span><span>2017-12-11 11:48:39</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">3</span>单--200元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://www.zzgwsc.com/headImageUrl/2017-11-08/17110814553538718.png" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>仄</span><span>2017-12-11 11:48:38</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJ5SU3r6reMth7FH3MHnb8tdQYz51oib9tkdYb6tY8aulo9pF5XCnlxpQiczupgNRCLibN3LVk8RZ9pA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>晴天</span><span>2017-12-11 11:48:38</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">1</span>单--50元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKOCS1HBgCPBeaa50BXPyLkrbKqop37aV5bcLKkHA721hELtj37c0ahe8KjAFmfb6vh48gzn4sX4Q/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>枢枢</span><span>2017-12-11 11:48:29</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">4</span>单--50元充值卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/IxNvZ5yZCSP5rEFwDX52hicmZIOVZwZ13SIJ81k3B8khTIZdyibAnQ4aqZP138q0ia93iaiavsFmD4arE8OC7Y0d3tA/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>今夕是何夕</span><span>2017-12-11 11:48:21</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">20</span>单--50元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/cPCyHQyGWMF65ZUjvqABicq8v6fQ39x64YB6Lwusd08D5ZW3Mc3sjGMwRKL0zHTUiaTnquB7siaOAVibdYobsv4gqvn09mgzVZvS/" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>花千骨</span><span>2017-12-11 11:48:13</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">4</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li class="mArea-cli">
                            <div class="mArea-cli-img">
                                <img src="http://wx.qlogo.cn/mmopen/vi_32/Ljzwqyst2y507Bmzv5Uib032RkoFBm8PvouibhLZumqoSCLwaDnpBNB3tIP9j9UykCOs4LCyDpuOLeSKLESfCM8Q/0" alt="">
                            </div>
                            <div class="mArea-cli-right">
                                <p class="mArea-clir-top"><span>联创手机维...</span><span>2017-12-11 11:48:09</span></p>
                                <p class="mArea-clir-bottom">刚刚胜出~夺得<span class="cr">2</span>单--100元加油卡</p>
                            </div>
                        </li>
                    </a>
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
    var websocket;

    $(function(){
        var userId=$('#userId').val();
        var user = {name:"AAAA", avatar:"BBBBB"};
        websocket=initWebSocket(fn,user,'127.0.0.1:9501');
    });

    function fn(message){
//        $('#message').html(message);
//        $('.tishi').show();
        var message = $.evalJSON(message);
        var cmd = message.cmd;
        //处理登录
        if (cmd == 'login')
        {

        }
        else if (cmd == 'openssc')      ////处理开奖
        {

//            showNewUser(message);
        }





//        if(message.indexOf('FHadminSilence')>-1){
//            $('#message').html("您的当日订单还未达到弹幕开通标准，请增加订单量开通该权限。");
//            $('.tishi').show();
//        }else if(message.indexOf('FHadminqq313596790')>-1){
//            var datas=message.split("FHadminqq313596790");
//            get(datas[1],datas[0]);
//        }
    }

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