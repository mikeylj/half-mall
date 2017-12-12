<html>
<head>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <e:pagemeta title="半价商城" />
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/area.css">
    <!-- 下拉加载样式 -->
    <link rel="stylesheet" href="/css/dropload.min.css">
    <link rel="stylesheet" href="/css/person.css">
    <link rel="stylesheet" href="/css/fuxuan.css">
    <link rel="stylesheet" href="/css/dropload.min.css">
    <link rel="stylesheet" href="/css/menu.css">

    <style>
        .fuc{
            position: fixed;
            top: 0rem;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background:rgba(0,0,0,0.6);
        }
        .fuc img{
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left:-.33rem;
            margin-top:-.33rem;
        }
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
            /* padding-bottom:.42rem; */
        }
        /* .header{
            position: relative;
            height: .41rem;
            border-bottom: 1px solid #ccc;
            background-color: #f6f6f6;
            padding-top: .11rem;
        } */
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
            padding-bottom: 42px;
            width: 100%;
        }
        .xfjf{
            color: #f30;
        }
    </style>
</head>
<body>
<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/util.js"></script>
<script src="/js/snatchBuyNew.js"></script>
<!--<script src="/js/sdk/webim.js"></script>-->
<!--<script src="/js/sdk/strophe.js"></script>-->
<!--<script src="/js/sdk/easemob.im-1.1.js"></script>-->
<!--<script src="/js/sdk/easemob.im-1.1.shim.js"></script><!--兼容老版本sdk需引入此文件-->-->
<!--<script src="/js/sdk/easemob.im.config.js"></script>-->
<!-- 个人中心 首页 start-->
<!--<div class="mod-commonBtn">-->
<!--    <a class="mod-shishiBtn" href="/jump/toSsc?srcFrom=SRDB-TEST-001"></a>-->
<!--    <a class="mod-perCenterBtn" href="/account/index?srcFrom=SRDB-TEST-001"></a>-->
<!--    <a class="mod-homePageBtn" href="/srdb_index/index?srcFrom=SRDB-TEST-001"></a>-->
<!--</div>-->
<!-- 个人中心 首页 end-->

<!--支付宝支付-->
<div class="zfb">
    <div class="zfb_d">
        <img class="zfb_d_img1" src=""/>
        <img class="zfb_d_img2" src="/images/zhifubao.png"/>
        <img class="zfb_d_img3" src="/images/zhigan.png"/>
    </div>
</div>
<div  class="fuc1" style="display:none">
    <p>错误提示</p>
</div>
<!-- 页面内容 -->
<div  class="fuc" style="display:none">
    <img src="../images/load.jpg"/>
    <!--<p>错误提示</p>-->
</div>
<div class="outer">
    <div class="inner">
        <!-- 头部banner -->
        <header class="area-banner">
            <img src="<?php echo $goods['big_image'];?>" alt="">
        </header>
        <!-- 进行中 -->
        <input id="resultNo" type="hidden" value="73"/>
        <input id="goodId" type="hidden" value="<?php echo $goods['id']?>"/>
        <div class="area-progress">
            <div class="area-pras-t">
                <div class="area-pt-icon">进行中</div>
                <h2 class="area-pt-txt"><?php echo $goods['name'];?></h2>
            </div>
            <div class="area-winning">
                <ul class="area-winningItem">
                    <li class="area-win-list">战神榜</li>
                    <li class="area-win-algorithms"><a href="/store/rule">购买规则</a></li>
                </ul>
                <div class="area-wNL">
                    <ul class="area-wNLItem">
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/DVxgsQUfMS3f7d1oDWk55Dpv8ShUwibQl3ibc0kH1iacT73dEarDavBxVEliaAXX5pnqF19hURrUsibYZ0ZYngTtbNw/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>苦中作乐</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 17:09:48</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>5</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[中国]223.104.108.199</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/BNuWgnLWtRXe9Lf35BUNlxYZRWauMYeZApYPmib4ibmABKF90FPGo50fCRFMUSST4gOLy2NOJmHvfRibia3CfVbtJw/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>运气</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 17:09:28</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>3</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[浙江省宁波市宁海县]36.22.24.6</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://www.zzgwsc.com/headImageUrl/2017-11-24/17112423290748580.png" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>名字啊</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 17:08:30</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[甘肃省武威市凉州区]27.226.146.122</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://www.zzgwsc.com/headImageUrl/2017-10-15/17101513003919026.png" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>8023</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 17:07:14</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[河北省石家庄市]223.104.13.33</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="/account/record?userId=55266&srcFrom=SRDB-TEST-001">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/gHtet1U8y2KYGZAicBu9E4jX80fw0veH0ghomQKXOkWa0ST64hGnarjibibnxkZl3Kg8hw3TYvdlhy3Wz2A31CKhrjRIlqaAv8J/" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>與世無爭</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 17:07:02</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>10</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[陕西省西安市]117.136.25.75</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/Ljzwqyst2y507Bmzv5Uib032RkoFBm8PvouibhLZumqoSCLwaDnpBNB3tIP9j9UykCOs4LCyDpuOLeSKLESfCM8Q/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>联创手机维...</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 17:06:04</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[山东省临沂市沂水县]60.213.108.141</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://www.zzgwsc.com/headImageUrl/2017-11-08/17110800434056613.png" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>天天开心</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 17:05:44</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>5</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[浙江省杭州市]112.17.235.145</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://www.zzgwsc.com/headImageUrl/2017-11-12/17111221251555913.png" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>向前看</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 17:05:00</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>10</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[山东省青岛市]223.104.189.45</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/6wvUaJ4PjUbBIgblvE907htEoMyTSJkQPrFAvPlPWtX7th3cFCFKrI86xSJkTxuAb50QgJ36E5R9dYDdoibDMa7cGlVd91Fps/" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>Yang?...</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 17:03:15</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[四川省成都市]117.172.26.43</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKmj2hibqrMD5R9y7I0n6v4qSCwcYwqiaNU82K2JX6zp3icLws6sqvg8aEhkYra4vO672c5pPnNbZ6wA/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>小梁</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:59:42</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[江西省上饶市]106.6.35.129</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/bNqVZcia7iaBx2v5HmQm8JxoWhdHljY3UtjDWhLRyZaDtxVtHONdwibABNd4mxt7ktF0eAPbmu95R8bVicUMREEyc2ibDR3V2YZ1a2dEZ1x4uriaY/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>奋斗的路人...</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:59:15</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[广东省佛山市]116.5.2.75</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJUYHWnZz9BGfZeJmHo22qrMAJAaicsNqwA7CRDIvuVHR1914bFs2icocDsZ8pI4ibWyc3ukRJAkBXicw/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>樱花草</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:58:57</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[广东省清远市]116.16.90.137</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/n10YaOC5Gpe8qmx79icrPfxmvPHhRJrCZ9jwicjaWfztdullY8oj4NeA4MDAicJeoMLu3vzxasbMFjmRx55eWUQlQ/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>日月明</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:56:00</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>3</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[山西省太原市]117.136.90.153</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://www.zzgwsc.com/headImageUrl/2017-10-11/17101118105166045.png" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>高新</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:55:15</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[湖北省武汉市]59.175.26.72</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/6wvUaJ4PjUb2ZR1eqMJ9WiaLm1Z6zX7iaKS3jEdlyIngshHibysOlrRviaGbYdIdEsKyOqLR50PSWg2pEAgedHiaNtQ5R4WJ7SicMK/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>SH</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:54:21</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>3</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[四川成都]118.114.77.47</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/Ljzwqyst2y507Bmzv5Uib032RkoFBm8PvouibhLZumqoSCLwaDnpBNB3tIP9j9UykCOs4LCyDpuOLeSKLESfCM8Q/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>联创手机维...</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:53:34</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[山东省临沂市沂水县]60.213.108.141</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIllOQsNSuLe0icbvhWFrsAq7paWJHJHsAzKedUJJZ8RXhBic7nS8TQMNcjr1fwyAwfHqJlTHBVqKLQ/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>阳光</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:53:00</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>2</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[贵州省毕节地区]58.16.178.50</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/QYibzxIXVY5qFQrFxq5gA0oHAxpDgKhG5ibQPUZ9TlunRbM2cOaTAGph8yrRrpE4ArIAHpC0hk5zXCpudgBev68g/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>Beatl...</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:51:02</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>2</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[四川省成都市]110.184.73.66</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://www.zzgwsc.com/headImageUrl/2017-11-25/171125110840415.png" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>阿西吧</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:49:46</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[北京市]106.121.63.60</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li class="area-wNLIlist">
                                <div class="area-wnllImg">
                                    <img src="http://wx.qlogo.cn/mmopen/vi_32/s9wWLIB6vWgCdqkyYrFOIJMAhXHzyyjI8gr6ibpcfbXia274zP2HWUftg9xmKQx4EJFU0x4ic57JicFQSdO0qHytXA/0" alt="">
                                </div>
                                <div class="area-wnllTxt">
                                    <div>
                                        <p class="ar-wnlltt"><span>东北虎</span></p>
                                        <p class="ar-wnlltb-time">2017-12-08 16:49:39</p>
                                    </div>
                                    <div class="ar-wnlltb">
                                        <p class="ar-wnlltb-luckyN">刚刚获胜夺得商品<span>1</span>单;---</p>
                                        <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[广东省东莞市]14.222.45.118</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
            <div style="overflow:hidden; background-color:#db3652;height: .26rem; padding:.04rem .05rem 0;">
                <div style="float:left; width:48%;">
                    <span style="color: white;">上期幸运号段:</span>
                    <span style="display: inline-block;">
<!--                        type3s.png
type3b.png
type4s.png

-->
	            			<img src="/images/type4b.png" style="width:.6rem; vertical-align: middle;">
	   					</span>
                </div>
                <div class="mannounced-lt-time" style="float: right; width:52%; text-align:left; color:#fff; ">
                    <p  class="fnTimeCountDown" data-end="<?php echo $next_open_time;?>">
                        <span style="color: white;">开战时间：</span><span class="mini" style="color: white;"></span><span style="color: white;">分</span><span class="sec" style="color: white;"></span><span style="color: white;">秒</span><span class="hm" style="color: white;"></span>
                    </p>
                </div>
            </div>
        </div>
<!--        <!-- 本页导航 -->
<!--        <ul class="area-sNav">-->
<!--            <li class="area-sNl">-->
<!--                <a class="ar-sNl-w" href="/srdb_good/rankingList?srcFrom=SRDB-TEST-001&goodId=8">-->
<!--                    <p class="ar-sNl-w-txt">战神排行榜</p>-->
<!--                    <span class="ar-sNl-w-arrow"></span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="area-sNl">-->
<!--                <a class="ar-sNl-w" href="/chat_hall/lotteryResult?srcFrom=SRDB-TEST-001&goodId=8">-->
<!--                    <p class="ar-sNl-w-txt ar-jieIcon">历史交战记录</p>-->
<!--                    <span class="ar-sNl-w-arrow"></span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="area-sNl">-->
<!--                <a class="ar-sNl-w">-->
<!--                    <p class="ar-sNl-w-txt ar-joinIcon">近期参战记录</p>-->
<!--                    <span class="ar-sNl-w-arrow"></span>-->
<!--                </a>-->
<!--            </li>-->
<!--        </ul>-->

        <!-- 参与记录的列表 -->
        <ul class="area-partlist" style="padding-bottom:.42rem;">
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/vi_32/r6JxpG3pB7l7kcRREz0FFqDO1YCrwGtDqy81jAAexddpcXiadJBolErRskfLgQibrupw9sribWyFxZAktyWGEVSzQ/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>ddrsx...</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:15:02</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>1</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[浙江省杭州市]112.17.241.175</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/cPCyHQyGWMF65ZUjvqABicrGLnQ1dPdSLI4quLczAjHBXU5THVblMcGsedgQwEnORA1knESfU6hNNib1HOG3YJB5HIU1AYsOmz/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>AA 小云...</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:14:13</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>20</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[北京市]114.255.188.79</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/cPCyHQyGWMGW3Mu3iaPWc4S8ZUhHSW7hBqFh6GgXLlQonGfHehu2ibzwAvEdEIiapZcx8gDibMJbmwWJlFLWyHqDWwKjlh7FqbZv/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>无可替代</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:13:45</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>5</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[江苏省淮安市]180.125.42.162</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLARmiaaNmegW9Cul7MjK1EcFArGpNqwtJ2IEwWskaWxqtYWpA52OxGwOlGWibEIRMT6oWicwEDEb6icw/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>Forge...</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:13:33</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>5</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[北京市通州区]114.242.248.215</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/Q3auHgzwzM7FicWl5Aa1cdPeZyGnmc26of8BymaPRo8vg3BJCckwo2KET103QUHnOzvanuXjPWXv6tk0ibK6PD0icPR2Hz2LCU7oeM9EnYibWC0/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>天才下小雨</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:13:07</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>5</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[河北省廊坊市]60.10.193.2</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://www.zzgwsc.com/headImageUrl/2017-11-23/17112315074071385.png" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>人心不足蛇...</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:12:00</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>5</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[四川省成都市]171.217.98.134</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/vi_32/DVxgsQUfMS3f7d1oDWk55Dpv8ShUwibQl3ibc0kH1iacT73dEarDavBxVEliaAXX5pnqF19hURrUsibYZ0ZYngTtbNw/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>苦中作乐</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:11:42</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>20</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[中国]223.104.108.199</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://www.zzgwsc.com/headImageUrl/2017-11-08/17110817222946895.png" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>HKC</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:09:57</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>2</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[北京市]59.109.114.205</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/gHtet1U8y2KYGZAicBu9E4vJrlm6LHXbiaU09FBHyabttLp2Biaia8ID6YiaLdCytUZttkFn4nuIJdCZJTVbgIYtEckboscQ7hEia3/" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>凉博.</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:09:48</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>1</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[北京市]120.239.12.33</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/vi_32/DVxgsQUfMS3f7d1oDWk55Dpv8ShUwibQl3ibc0kH1iacT73dEarDavBxVEliaAXX5pnqF19hURrUsibYZ0ZYngTtbNw/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>苦中作乐</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:09:48</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>5</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[中国]223.104.108.199</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKmj2hibqrMD5R9y7I0n6v4qSCwcYwqiaNU82K2JX6zp3icLws6sqvg8aEhkYra4vO672c5pPnNbZ6wA/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>小梁</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:09:46</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>1</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[江西省上饶市]106.6.35.129</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="/account/record?userId=179786&srcFrom=SRDB-TEST-001">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/vi_32/BNuWgnLWtRXe9Lf35BUNlxYZRWauMYeZApYPmib4ibmABKF90FPGo50fCRFMUSST4gOLy2NOJmHvfRibia3CfVbtJw/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>运气</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:09:28</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>3</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[浙江省宁波市宁海县]36.22.24.6</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/cPCyHQyGWMHVcHCQk9U90vKwcvK1poLYEOhC2oZQHDOwxsz2DgLiaVHzehBxYplaYBp427v59kPN6udlFr6o56N2vlST2BeUV/" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>hala</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:09:24</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>3</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[湖南省长沙市]220.202.153.34</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://www.zzgwsc.com/headImageUrl/2017-11-24/17112423290748580.png" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>名字啊</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:08:30</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>1</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[甘肃省武威市凉州区]27.226.146.122</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/UPe93KGaRQLzAt8z1vhACXgFd1kVXzmFcNyIhVmqK6s9CpW4Z6GAfRhr9lvoicLOzF00BModgW17805UAzeicic9RqNtSNqyhwP/" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>9?</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:08:20</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>1</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[北京市]39.176.199.126</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/gHtet1U8y2KYGZAicBu9E4iaCasnvQFNiaywmDDJyvNialoeiaQGYBxribSDPn10tzMFrOSYicHtapAoGYVLOItyc0uQZbbcZaVw7wy/" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>颜值课倒数...</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:07:59</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>1</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[江苏省南京市]117.136.45.227</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIsWXJj9xYnYaicT1icIicqAlTcUJnSjnsPibu6gRxulLBKpP6viaf9NwtjEVlQf10W1CXPTXlgp2I9rGA/0" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>巧克力</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:07:43</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>2</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[北京市]106.121.65.53</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://wx.qlogo.cn/mmopen/6wvUaJ4PjUbBIgblvE907htEoMyTSJkQPrFAvPlPWtX7th3cFCFKrI86xSJkTxuAb50QgJ36E5R9dYDdoibDMa7cGlVd91Fps/" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>Yang?...</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:07:24</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>10</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[四川省成都市]117.172.26.43</p>
                        </div>
                    </div>
                </li>
            </a>
            <a href="">
                <li class="area-pL-Item">
                    <div class="area-pLI-img">
                        <img src="http://www.zzgwsc.com/headImageUrl/2017-10-15/17101513003919026.png" >
                    </div>
                    <div class="area-pLI-txt">
                        <div>
                            <p class="area-pLITxtT"><span>8023</span></p>
                            <p class="area-pLITxtBTime">2017-12-08 17:07:14</p>
                        </div>
                        <div class="area-pLITxtB">
                            <p class="area-pLITxtB-pTime">刚刚参与了<span>1</span>单;---</p>
                            <p class="rcd-annoce-totle cb" style="padding:.01rem 0;">[河北省石家庄市]223.104.13.33</p>
                        </div>
                    </div>
                </li>
            </a>
            <div style="height: 0.42rem"></div>
        </ul>
    </div>
</div>
<!-- 固定在底部的三个按钮 -->
<footer class="area-footer">
    <ul class="area-f-list">
        <li style="margin-left: 10%;" class="area-f-l-onekey">
            <a class="a-flok-btn" style="border:1px solid #f7c73f; background-color:#f7c73f; color:white;" href="javascript:;" onclick="addFastSnatch(0)">买小(1~55)</a>
        </li>
        <li class="area-f-l-ten">
            <a class="a-flten-btn" href="javascript:;" onclick="addFastSnatch(1)">买大(56~110)</a>
        </li>
    </ul>

    <?php
    require_once (dirname(__DIR__) . "/menu.php");
    ?>
</footer>

<!--点击购买弹出框-->
<div style="display: none; font-size:.12rem;" class="fx">
    <div class="fx_con">
        <header class="fx_hea">
            谢谢参与：半价商城全网五五折<span style="display: none;" class="dx">小</span>
            <span class="xg">&times;</span>
            <span class="xian"></span>
        </header>
        <div class="fx_cen">
            <ul class="huaqian" style="height:1rem;">
                <li style="width: 48%;text-align: left;">消费总额：<span style="color:#f30;" class="qian">0</span></li>
                <li style="width: 52%;text-align: left;">积分奖励：<span style="color:#f30;" class="qian jfjl">0</span></li>
                <li style="width:48%;text-align: left;">还需支付：<span style="color:#f30;" class="qian hxzf">0</span></li>
                <li style="width: 52%;text-align: left;">积分余额：<span style="color:#f30;" class="qian1">0</span><input type="checkbox" id="isCheck" /></li>
                <li style="width: 100%;text-align: left;font-size:.12rem;height: .4rem;"><span style="color:#f30;" class="qianw">积分说明：</span>该笔消费完成可获得<span class="xfjf">0.00</span>消费积分，积分可用于抵扣现金支付。</li>
            </ul>
            <p class="shangp">参与单数</p>
            <div class="zeng">
                <span class="mod-iB-minusBtn1" >-</span>
                <input id="shu" style="display: none;"  readonly="readonly" style="text-align: center;" class="mod-iB-BtnNum1" type="" name="" id="" value="0" />
                <p style="text-align: center;" class="mod-iB-BtnNum12">0</p>
                <span class="mod-iB-addBtn1">+</span>
            </div>
            <ul class="fx_cen_ul" style="border-bottom:none;height:.8rem;">
                <li class="li_l">
                    <p class="dan"><span class="lia">1</span></p >
                </li>
                <li class="li_l li_c">
                    <p><span class="lia">10</span></p >
                </li>
                <li class="li_l li_r">
                    <p><span class="lia">20</span></p >
                </li>
                <li class="li_l">
                    <p><span class="lia">30</span></p >
                </li>
                <li class="li_l li_c">
                    <p><span class="lia">50</span></p >
                </li>
                <li class="li_l li_c">
                    <p><span class="lia">60</span></p >
                </li>
                <li class="li_l li_c">
                    <p><span class="lia">80</span></p >
                </li>
                <li class="li_l li_r">
                    <p><span class="lia">100</span></p >
                </li>
            </ul>

            <div style="text-align: center;">
                <a class="zhif2" onclick="pay(this,'ALI')" href="javascript:;">支付宝支付</a>
            </div>
            <div class="yihk" style="text-align: center;">
            </div>
<!--            <div class="yihk" style="text-align: center;">-->
<!--                <a style="width:85%;" class="zhif" href="javascript:;" onclick="pay(this,'JD')">-->
<!--                    <div style="position: relative;">-->
<!--                        <img src="/images/jdtp.png"/>&nbsp;&nbsp;&nbsp;&nbsp;京东支付-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
        </div>
    </div>
</div>
<div class="mod-ctnPop" style="display:none;">
    <div class="mod-ctnPop-box">
        <a id="continueBuy">继续购买</a>
        <a href="/account/record?srcFrom=SRDB-TEST-001">查看结果</a>
    </div>
</div>
<div id = "codePay" class="mod-ctnPop" style="display:none;">

</div>
<input type="hidden" id="nickName" name="nickName" value="1511075579687"/>
<input type="hidden" id="isRegister" name="isRegister" value="0"/>
<input type="hidden" id="purchaseCounts" name="purchaseCounts" value=""/>
<input type="hidden" id="sectionNo" name="sectionNo" value=""/>
<input id="perPrice" type="hidden" value="55"/>
<input id="price" type="hidden" value="110"/>
<input id="totalAmount" type="hidden" value=""/>
<script>

    $(".zhif").click(function(){
        //$(".fx").hide();
        var colo = $(this).css("background-color");
        $(".yhkhq_top").css("background",colo);
        $(".yhkhq_que").css("background",colo);
        if(colo == "rgb(220, 53, 79)"){
            $(".yhkhq_top").css("color","#fff");
            $(".yhkhq_que").css("color","#fff");
        }
    });

    $(".gbtp").click(function(){
        $(".yhkhq").css("display","none");
    });

    function asds(){
        var xuanka_po = $(".xuanka_se").val();
        var xuanka_po1 = $(".xuanka_se").find('option').eq(0).text();
        $(".xuanka_p").html(xuanka_po1);
    }
    asds();
    $(".xuanka_se").change(function(){
        var xuanka_po = $(".xuanka_se").val();
        var xuanka_po1 = $(".xuanka_se option[value='"+xuanka_po+"']").text();
        $(".xuanka_p").html(xuanka_po1);
    });
    function xfjl(){
        var xfjl = $(".qian").html();
        var xfjlz = 0;//Number(xfjl*0.01).toFixed(2);
        $(".xfjf").html(xfjlz);
    }
    function ddx(){
        $(".xg").click(function(){
            $(".fx").hide();
            $(".li_l p").removeClass("hb hb1");
            $("#shu").val(0);
            $(".mod-iB-BtnNum12").html("0");
            $(".qian").html("0");
        });

        if($(".dx").html()=="小"){
            $(".zhif").css("background","#f7c73f");
            $(".fx_hea").css("background","#f7c73f");
            $(".li_l p").click(function(){
                $(this).addClass("hb1").parent().siblings().find("p").removeClass("hb hb1");
                var zhi = $(this).find("span").html();
                setOrder(zhi);
                xfjl();
            });
        }else{
            $(".zhif").css("background","#dc354f");
            $(".fx_hea").css("background","#dc354f");
            $(".li_l p").click(function(){
                $(this).removeClass("hb1");
                $(this).addClass("hb").parent().siblings().find("p").removeClass("hb hb1");
                var zhi = $(this).find("span").html();
                setOrder(zhi);
                xfjl();
            });
        }
        xfjl();
    };

    $(".zfb_d_img3").click(function(){
        $(".zfb").hide();
    });


    //点击加号
    $('.mod-iB-addBtn1').click(function(){
        $(".li_l p").removeClass("hb hb1");
        var zhi = $("#shu").val();
        if(zhi<100){
            zhi++;
        }
        setOrder(zhi);
        xfjl();
    });
    // 点击减号
    $('.mod-iB-minusBtn1').click(function(){
        $(".li_l p").removeClass("hb hb1");
        var zhi = $("#shu").val();
        if(zhi>1){
            zhi--;
        }
        setOrder(zhi);
        xfjl();
    });

    function setOrder(zhi){
        $('.mod-iB-BtnNum1').val(zhi);
        $(".mod-iB-BtnNum12").html(zhi);
        var am = accMul(zhi,55);
        $(".qian").html(am);
        var jfjl=0;  //accMul(am,0.01);
        $(".jfjl").html(jfjl)
        var hxzf=am;
        if($('input:checkbox:checked').val()){
            hxzf=accSub(am,$('.qian1').html());
            if(hxzf<0){
                hxzf=0;
            }
        }
        $(".hxzf").html(hxzf);
        $('#totalAmount').val(am);
        $('#purchaseCounts').val(zhi);
    }

    $("#isCheck").change(function() {
        var zhi = $("#shu").val();
        setOrder(zhi);
    });

    sMove($('.area-wNLItem'));
    function sMove(element){
        var fT = 0;
        var eleHeight = element.height() - 144;
        var timer = setInterval(function(){
            fT = fT + 1;
            element.css('top','-'+fT+'px');
            if (fT > eleHeight) {
                fT = 0;
            };
        },100);

    }

    $('#continueBuy').click(function(){
        location.reload();
    })

    function ftcdTime(element){
        var i = 60;
        var timer;
        element.html('正在揭晓'+i+'');
        timer = setInterval(function(){
            i--;
            element.html('正在揭晓'+i+'');
            if (i <1) {
                location.href = location;
                clearInterval(timer);
                timer = null;
            };
        },1000);
    };


    $(function(){
        initSnatch();
//        initHX();
//        if("0" == $("#isRegister").val()){
//            regist($("#nickName").val());
//        }
        $(".fnTimeCountDown").eq(0).fnTimeCountDown(ftcdTime);
        // 中间部分自动滑动效果
    });

    function setClidk(element,payWay){
        // console.warn('开始');
        $(element).attr('onclick','');
        $(element).html("20");
        var i = 19;
        var timer;
        timer = setInterval(function(){
            $(element).html(i);
            i--;
            if (i < 0) {
                if(payWay=='WX'){
                    $(element).html("微信支付");
                }else if(payWay=='QQ'){
                    $(element).html('<div style="position: relative;width: 100%;"><img src="/images/QQtijiao.png"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ钱包支付</div>');
                }else if(payWay=='JD'){
                    $(element).html('<div style="position: relative;"><img src="/images/jdtp.png"/>&nbsp;&nbsp;&nbsp;&nbsp;京东支付</div>');
                }else{
                    $(element).html("支付宝支付");
                }
                clearInterval(timer);
                timer = null;
            };
        },1000);
        setTimeout(function(){
            $(element).attr('onclick','pay(this,"'+payWay+'")');
        },20000);
    };

    /* 点击确定按钮 取出input的值 */
    function pay(element,payWay){
        $.ajaxSetup({
            async: false
        });
        $.post('/store/getPayChannelSwitch', {
            type:payWay
        }, function(response) {
            if(response==1){
                $(".fuc1").html('<p>该支付通道维护,请选择其他支付方式</p>');
                $(".fuc1").show();
                return false;
            }else{
                var sectionNo = $("#sectionNo").val();
                if(sectionNo==null||sectionNo==''){
                    $(".fuc1").html('<p>请选择购买大小</p>');
                    $(".fuc1").show();
                    return false;
                }
                var purchaseCounts = $("#purchaseCounts").val();
                if(purchaseCounts==0){
                    $(".fuc1").html('<p>请选择购买单数</p>');
                    $(".fuc1").show();
                    return false;
                }
                var totalAmount = $('.qian').html();
                setClidk(element,payWay);
                var isCheck=0;
                var balance=$('.qian1').html();
                if($('input:checkbox:checked').val()){
                    isCheck=1;
                }
                $.post('/recharge/barcodePay',
                    {amount:totalAmount,channelType:'SRDB-TEST-001',goodId:<?php echo $goods['id']?>,purchaseCounts:purchaseCounts,sectionNo:sectionNo,userId:'<?php echo $userid;?>',payWay:payWay,useBalance:isCheck,balance:balance},
                    function(response) {
                        if(response.code == 1){
                            $(".fuc1").html('<p>'+response.message+'</p>');
                            $(".fuc1").show();
                        }else{
                            if(response.data=='WX'||response.data=='JD'){
                                if(response.channel=='GZH'){
                                    window.location.href=response.message;
                                }else{
                                    $(".fx").hide();
                                    $('.mod-ctnPop').show();
                                    var html ='';
                                    html = '<div class="mod-ctnPop-box">'
                                        +'<a style="background-color: yellow;color:red;">保存二维码图片,点击微信扫一扫</a>'
                                        +'<a style="background-color: yellow;color:red;">点击相册需要支付的二维码</a>'
                                        +'<a style="background-color: yellow;color:red;">完成支付</a>'
                                        +'<img id="codeImgUrl" src="'+response.message+'"/></div>';
                                    $("#codePay").append(html);
                                    $("#codePay").show();
                                    setTimeout(function(){
                                        $("#codePay").hide();
                                    },30000);

                                }
                            }else if(response.data=='QQ'){
                                if(response.channel=='ys'){
                                    window.location.href=response.message;
                                }else{
                                    $(".fx").hide();
                                    $('.mod-ctnPop').show();
                                    html = '<div class="mod-ctnPop-box">'
                                        +'<a style="background-color: yellow;color:red;">请长按二维码支付</a>'
                                        +'<img id="codeImgUrl" src="'+response.message+'"/></div>';
                                    $("#codePay").append(html);
                                    $("#codePay").show();
                                    setTimeout(function(){
                                        $("#codePay").hide();
                                    },10000);
                                }
                            }else if(response.data=='YE'){
                                $(".fuc1").html('<p>'+response.message+'</p>');
                                $(".fuc1").show();
                                $(".fx").hide();
                            }else{
                                window.location.href='/recharge/zjy?srcFrom=SRDB-TEST-001&url='+response.message+"&goodId=<?php echo $goods['id']?>";
                            }

                        }
                    }
                );
            }
        });

    }

    function bankPayOne(){

        $(".li_l p").removeClass("hb hb1");
        $.ajaxSetup({
            async: false
        });
        $.post('/paySwitch/getMobaoSwitch', {
        }, function(response) {
            if(response.code==1){
                $(".fuc1").html('<p>该支付通道维护,请选择其他支付方式</p>');
                $(".fuc1").show();
                return false;
            }else{
                var bankId=$(".xuanka_se").val();
                var purchaseCounts = $("#purchaseCounts").val();
                var sectionNo = $("#sectionNo").val();
                if(purchaseCounts==0){
                    $(".fuc1").html('<p>请选择购买单数</p>');
                    $(".fuc1").show();
                    return false;
                }
                if(bankId==null){
                    $(".fuc1").html('<p>请先绑定银行卡</p>');
                    $(".fuc1").show();
                    window.location.href='/srdb_login/addBindCard.do?srcFrom=SRDB-TEST-001';
                    return false;
                }
                var totalAmount = $('#totalAmount').val();
                $(".fuc").show();
                $.post('/srdb_purchase/cardPay',
                    {amount:totalAmount,channelType:'SRDB-TEST-001',goodId:8,purchaseCounts:purchaseCounts,sectionNo:sectionNo,userId:174398,bankId:bankId},
                    function(response) {
                        $(".fuc").hide();
                        if(response.code == 1){
                            $(".fuc1").html('<p>'+response.message+'</p>');
                            $(".fuc1").show();
                        }else if(response.code == 99){
                            $(".fuc1").html('<p>中国银联：银行卡支付获取验证码，每小时限制6次，每次间隔1分，你已超过最大次数或刷新过于频繁，请稍后再试</p>');
                            $(".fuc1").show();
                        }else{
                            $(".fx").hide();
                            $('.yhkhq').show();
                            $('#id').val(response.data);
                        }
                    }
                );
            }
        });
    }


    $(".yhkhq_que").click(function(){
        $(this).css("background","#e1e1e1")
    });


    function bankPayTwo(){
        var id=$("#id").val();
        var code=$('#tel').val();
        if(code==null||code==''){
            $(".fuc1").html('<p>验证码不能为空</p>');
            $(".fuc1").show();
            return false;
        }
        $(".fuc").show();
        $.post('/srdb_purchase/weixinNewCallBack/bk',
            {id:id,code:code,srcFrom:'SRDB-TEST-001'},
            function(response) {

                $('.fuc').hide();
                if(response.code !='0'){
                    $(".fuc1").html('<p>购买失败</p>');
                    $(".fuc1").show();
                }else{
                    $(".fuc1").html('<p>购买成功</p>');
                    $(".fuc1").show();
                    $(".yhkhq").hide();
                    $('#tel').val("");
                }
            }
        );
    }

    $(".fuc1").click(function(){
        $(".fuc1").hide();
    });
    $(".fuc1 p").click(function(){
        $(".fuc1").show();
        return false;
    });

    function getBalance(){
        $.post('/recharge/getBalance', {srcFrom:'SRDB-TEST-001'
        }, function(response) {
            if(response.code==1){
            }else{
                $('.qian1').html(response.data);
            }
        });
    }
</script>
<script src="/js/countdown.js"></script>
</body>
</html>