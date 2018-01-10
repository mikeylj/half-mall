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
    <link rel="stylesheet" href="/css/menu.css">

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
<!--<div class="mod-commonBtn">-->
<!--    <a class="mod-perCenterBtn"-->
<!--       href="/account/index?srcFrom=SRDB-TEST-001"></a> <a-->
<!--        class="mod-homePageBtn"-->
<!--        href="/srdb_index/index?srcFrom=SRDB-TEST-001"></a>-->
<!--</div>-->
<!-- 导航  end-->
<input type="hidden" id="srcFrom" name="srcFrom" value='SRDB-TEST-001' />
<input type="hidden" id="goodId" name="goodId" value='' />
<ul class="panking-next">

    <?php
    foreach ($topUsers as $i => $topUser) {
        if ($i < 3) {
            ?>

            <li class="pnt-list"><a
                        href=""
                        style="display: box; display: -webkit-box; display: flex;">
                <span style="margin:0px .15rem;" class="pnt-l-num"><img
                            style="width: .3rem;margin-top:.15rem ;margin-right: .1rem;"
                            src="/images/pai_<?php echo $i + 1?>.png"/></span>
                    <div class="pnt-l-img dai1">
                        <img class="waipi"
                             src="<?php echo $arrUsers[$topUser['userid']]['pic']?>"
                             alt="">
                    </div>
                    <div class="pnt-l-con">
                        <p style="margin-top: .08rem;" class="pnt-lc-id"><span style="font-size: .16rem; color: #000;"><?php echo $arrUsers[$topUser['userid']]['name']?>
                        </p>
                        <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">已获胜：<span
                                    class="cr"><?php echo $topUser['sum_num']?></span>单
                        </p>
                    </div>
                </a></li>
            <?php
        }
        else{
            ?>
            <li class="pnt-list"><a
                        href=""
                        style="display: box; display: -webkit-box; display: flex;"> <span
                            style="color: #000;margin: .14rem .22rem; font-size: .25rem " class="pnt-l-num"><?php echo $i + 1?></span>
                    <div style="margin:.06rem .15rem;" class="pnt-l-img">
                        <img class="waipi" src="<?php echo $arrUsers[$topUser['userid']]['pic']?>" alt="">
                    </div>
                    <div class="pnt-l-con">
                        <p  style="margin-top: .08rem;width: 2rem;overflow: hidden;" class="pnt-lc-id">
						<span style="font-size: .16rem; color: #000;"><?php echo $arrUsers[$topUser['userid']]['name']?>
                        </p>
                        <p style="color: #999;height: .4rem;line-height: .4rem;" class="pnt-lc-prize">
                            获胜：<span class="cr"><?php echo $topUser['sum_num']?></span>单
                        </p>
                    </div>
                </a></li>

            <?php
        }
    }
    ?>


</ul>
<?php
require_once (dirname(__DIR__) . "/menu.php");
?>
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