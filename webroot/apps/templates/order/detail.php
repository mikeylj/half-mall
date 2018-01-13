<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购买记录</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/agent.css">
    <link rel="stylesheet"
          href="/css/dropload.min.css">
    <link rel="stylesheet" href="/css/person.css">
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
            height: .42rem;
            /*border-bottom: 1px solid #ccc;
                background-color: #f6f6f6;
                padding-top: .11rem;*/
        }

        .inner {
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
        .quan_huang1{
            width: .15rem;
            height: .15rem;
            display: inline-block;
            background: #f7c73f;
            color: #fff;
            text-align: center;
            line-height: .15rem;
            border-radius: 50%;
        }
        .quan_hong2{
            width: .15rem;
            height: .15rem;
            display: inline-block;
            background: #db3652;
            color: #fff;
            text-align: center;
            line-height: .15rem;
            border-radius: 50%;
        }
        .co_re{
            color:#db3652;
        }
        .co_ye{
            color:#f7c73f;
        }
    </style>
</head>
<body>
<!-- 点击查看详情弹出框  start-->

<div class="mod-detail" style="display: none;">
</div>
<!-- 点击查看详情弹出框  end-->
<div class="outer">
    <div class="header">
        <ul class="record-header">
            <li class="rcd-h-list rcd-hl-curr">详情</li>
        </ul>
    </div>
    <div class="inner">
        <ul class="record-item">

            <?php
            if ($order['sscstatus'] == 0 && $order['playwithid'] == 0) {
                for ($i = 0 ; $i < $order['num']; $i++) {
                    ?>
                    <li class="record-list">
                        <div class="record-lst-left">
                            <div class="record-lst-img">
                                <img src="<?php echo $goods['small_image'] ?>" alt="">
                            </div>
                            <p class="record-lst-estimate">匹配中...</p>
                        </div>
                        <div class="record-lst-con">
                            <h3 class="rcd-lC-title"><?php echo $goods['name'] ?></h3>
                            <div class="rcd-lC-middel">
                                <div class="rcd-annoce-term">
                                    <p class="rcd-annoce-tNum">商品期数:</p>
                                </div>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">本期参与</p>
                                    <p class="rcd-lCM-surplus">
                                        选择号段<span class="cb"></span>
                                    </p>
                                </div>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        <?php echo $user['name']; ?>
                                    <p class="rcd-lCM-surplus">
                                    <span class="cr">
                                        <?php
                                        if ($order['ssctype'] == 1) {    //物品110元
                                            if ($order['buytype'] == 0) {
                                                echo '1-28';
                                            } else {
                                                echo '29-56';
                                            }
                                        } elseif ($order['ssctype'] == 1) {    //物品56元
                                            if ($order['buytype'] == 0) {
                                                echo '1-55';
                                            } else {
                                                echo '56-110';
                                            }
                                        }
                                        ?>
                                        </span>
                                    </p>
                                </div>
                                <!-- </div> -->
                                <p class="rcd-annoce-totle cb">([<?php echo $order['place']; ?>
                                    ]<?php echo $order['ip']; ?>)</p>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        匹配玩家中...
                                    <p class="rcd-lCM-surplus">
                                    <span class="cr">
                                        <?php
                                        if ($order['ssctype'] == 1) {    //物品110元
                                            if ($order['buytype'] == 0) {
                                                echo '29-55';
                                            } else {
                                                echo '1-28';
                                            }
                                        } elseif ($order['ssctype'] == 1) {    //物品56元
                                            if ($order['buytype'] == 0) {
                                                echo '56-110';
                                            } else {
                                                echo '1-55';
                                            }
                                        }
                                        ?>
                                    </span>
                                    </p>
                                </div>
                                <p class="rcd-annoce-totle cb">(匹配中...)</p>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }elseif($order['sscstatus'] == 0 && $order['playwithid'] != 0) {
                for ($i = 0 ; $i < $order['num']; $i++) {
                    ?>
                    <li class="record-list">
                        <div class="record-lst-left">
                            <div class="record-lst-img">
                                <img src="<?php echo $goods['small_image'] ?>" alt="">
                            </div>
                            <p class="record-lst-estimate">开奖中...</p>
                        </div>
                        <div class="record-lst-con">
                            <h3 class="rcd-lC-title"><?php echo $goods['name'] ?></h3>
                            <div class="rcd-lC-middel">
                                <div class="rcd-annoce-term">
                                    <p class="rcd-annoce-tNum">商品期数:</p>
                                </div>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">本期参与</p>
                                    <p class="rcd-lCM-surplus">
                                        选择号段<span class="cb"></span>
                                    </p>
                                </div>

                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        <?php echo $user['name']; ?>
                                    <p class="rcd-lCM-surplus">
                                        <span class="cr">
                                             <?php
                                             if ($order['ssctype'] == 1) {    //物品110元
                                                 if ($order['buytype'] == 0) {
                                                     echo '1-28';
                                                 } else {
                                                     echo '29-56';
                                                 }
                                             } elseif ($order['ssctype'] == 1) {    //物品56元
                                                 if ($order['buytype'] == 0) {
                                                     echo '1-55';
                                                 } else {
                                                     echo '56-110';
                                                 }
                                             }
                                             ?>
                                        </span>
                                    </p>
                                </div>
                                <!-- </div> -->
                                <p class="rcd-annoce-totle cb">([<?php echo $order['place']; ?>]<?php echo $order['ip']; ?>)</p>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        <?php echo $puser['name']; ?>
                                    <p class="rcd-lCM-surplus">
                                        <span class="cr"><?php
                                            if ($porder['ssctype'] == 1) {    //物品110元
                                                if ($porder['buytype'] == 0) {
                                                    echo '1-28';
                                                } else {
                                                    echo '29-56';
                                                }
                                            } elseif ($porder['ssctype'] == 1) {    //物品56元
                                                if ($porder['buytype'] == 0) {
                                                    echo '1-55';
                                                } else {
                                                    echo '56-110';
                                                }
                                            }
                                            ?></span>
                                    </p>
                                </div>
                                <p class="rcd-annoce-totle cb">([<?php echo $porder['place']; ?>]<?php echo $porder['ip']; ?>)</p>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            elseif($order['sscstatus'] == 1) {
                for ($i = 0 ; $i < $order['num']; $i++) {
                    ?>
                    <li class="record-list" style="background-color: #FCEBEB;">
                        <div class="record-lst-left">
                            <div class="record-lst-img">
                                <img src="<?php echo $goods['small_image'] ?>" alt="">
                            </div>
                            <p class="record-lst-winTip rlstwt-curr">恭喜已获胜</p>
<!--                            <a class="record-lst-winGet" href="/PswCheck/toPwLogin?srcFrom=SRDB-TEST-001">点击领取</a>-->
                        </div>
                        <div class="record-lst-con">
                            <h3 class="rcd-lC-title"><?php echo $goods['name'] ?></h3>
                            <div style="position: relative;" class="rcd-lC-middel">
                                <div class="rcd-annoce-term">
                                    <p class="rcd-annoce-tNum">商品期数:<?php echo $order['sscperiods']?></p>
<!--                                    <a style="position: absolute; top: -.22rem;right: .01rem;color: #ff0033; background-color:#fff; border: 1px solid #FF0033;"-->
<!--                                       class="rcd-annoce-tS " onclick="publishDetail('','ZSHK1003qo0002172265','8','37')">查看号码</a>-->
                                </div>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        <img style="margin-top: .03rem;" src="/images/ssc6.png" alt=""/>结果：<span class="cr"><?php echo $order['ssc']?></span>
                                    </p>
                                    <p class="rcd-lCM-surplus">
                                        获胜号码：<span class="cr"><?php echo $order['sscval']?></span>
                                    </p>
                                </div>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        获胜参与者<span class="cr"> <?php echo $user['name']; ?></span>
                                    </p>
                                    <p class="rcd-lCM-surplus">
                                        选择号段<span class="cr"> <?php
                                            if ($order['ssctype'] == 1) {    //物品110元
                                                if ($order['buytype'] == 0) {
                                                    echo '1-28';
                                                } else {
                                                    echo '29-56';
                                                }
                                            } elseif ($order['ssctype'] == 1) {    //物品56元
                                                if ($order['buytype'] == 0) {
                                                    echo '1-55';
                                                } else {
                                                    echo '56-110';
                                                }
                                            }
                                            ?></span>
                                    </p>
                                </div>
                                <p class="rcd-annoce-totle cb">([<?php echo $order['place']; ?>
                                    ]<?php echo $order['ip']; ?>)</p>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        失败参与者
                                        <span
                                                class="cr"><?php echo $puser['name']; ?></span>
                                    </p>
                                    <p class="rcd-lCM-surplus">选择号段
                                        <span class="cr"><?php
                                            if ($porder['ssctype'] == 1) {    //物品110元
                                                if ($porder['buytype'] == 0) {
                                                    echo '1-28';
                                                } else {
                                                    echo '29-56';
                                                }
                                            } elseif ($porder['ssctype'] == 1) {    //物品56元
                                                if ($porder['buytype'] == 0) {
                                                    echo '1-55';
                                                } else {
                                                    echo '56-110';
                                                }
                                            }
                                            ?></span>
                                    </p>
                                </div>
                                <p class="rcd-annoce-totle cb">([<?php echo $porder['place']; ?>]<?php echo $porder['ip']; ?>)</p>
                                <p>揭晓时间： <?php echo $order['ssctime'];?></p>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            elseif($order['sscstatus'] == -1) {
                for ($i = 0 ; $i < $order['num']; $i++) {
                    ?>

                    <li class="record-list" style="background-color: #F7F7F7;">
                        <div class="record-lst-left">
                            <div class="record-lst-img">
                                <img src="<?php echo $goods['small_image'] ?>" alt="">
                            </div>
                            <p class="record-lst-winTip">很遗憾已失败</p>

                        </div>
                        <div class="record-lst-con">
                            <h3 class="rcd-lC-title"><?php echo $goods['name'] ?></h3>
                            <div style="position: relative;" class="rcd-lC-middel">
                                <div class="rcd-annoce-term">
                                    <p class="rcd-annoce-tNum">商品期数:<?php echo $order['sscperiods'] ?></p>
                                    <!--                                <a style="position: absolute; top: -.22rem;right: .01rem;color: #ff0033; background-color:#fff; border: 1px solid #FF0033;"-->
                                    <!--                                   class="rcd-annoce-tS " onclick="publishDetail('','ZSHK100if10002172850','8','59')">查看号码</a>-->
                                </div>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        <img style="margin-top: .03rem;" src="/images/ssc6.png" alt=""/>结果：<span class="cr"><span
                                                    class="cr"><?php echo $order['ssc'] ?></span>
                                    </p>
                                    <p class="rcd-lCM-surplus">
                                        获胜号码：<span class="cr"><?php echo $order['sscval'] ?></span>
                                    </p>
                                </div>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        获胜参与者<span class="cr"><?php echo $puser['name']; ?></span>
                                    </p>
                                    <p class="rcd-lCM-surplus">
                                        选择号段<span class="cr"><?php
                                            if ($porder['ssctype'] == 1) {    //物品110元
                                                if ($porder['buytype'] == 0) {
                                                    echo '1-28';
                                                } else {
                                                    echo '29-56';
                                                }
                                            } elseif ($porder['ssctype'] == 1) {    //物品56元
                                                if ($porder['buytype'] == 0) {
                                                    echo '1-55';
                                                } else {
                                                    echo '56-110';
                                                }
                                            }
                                            ?></span>
                                    </p>
                                </div>
                                <p class="rcd-annoce-totle cb">([<?php echo $order['place']; ?>
                                    ]<?php echo $order['ip']; ?>)</p>
                                <div class="rcd-lCM-need">
                                    <p class="rcd-lCM-nT">
                                        失败参与者
                                        <span class="cr"><?php echo $user['name']; ?></span>
                                    </p>
                                    <p class="rcd-lCM-surplus">选择号段
                                        <span class="cr"><?php
                                            if ($order['ssctype'] == 1) {    //物品110元
                                                if ($order['buytype'] == 0) {
                                                    echo '1-28';
                                                } else {
                                                    echo '29-56';
                                                }
                                            } elseif ($order['ssctype'] == 1) {    //物品56元
                                                if ($order['buytype'] == 0) {
                                                    echo '1-55';
                                                } else {
                                                    echo '56-110';
                                                }
                                            }
                                            ?></span>
                                    </p>
                                </div>
                                <p class="rcd-annoce-totle cb">([<?php echo $order['place']; ?>]<?php echo $order['ip']; ?>
                                    )</p>
                                <p>揭晓时间：<?php echo $order['ssctime']; ?></p>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>


        </ul>
        <p id="mores"
           style="text-align: center; height: .4rem; line-height: .4rem; font-size: .14rem;">
<!--            <a onclick="runs(6282033,185479)">点击加载更多...</a>-->
        </p>
        <input type="hidden" id="srcFrom" value="SRDB-TEST-001">
    </div>
</div>
<!-- 上拉加载刷新 -->
<script src="/js/zepto.min.js"></script>
<script src="/js/dropload.min.js"></script>
<script src="/js/countdown.js"></script>
<script src="/js/lotteryResultDetail.js"></script>
<script>

    //取消好友邀请
    function clean(id){
        $.post('/invite/enter/clean.do',
            {id:id},
            function(response) {
                if(response){
                    window.location.reload();//刷新当前页面.
                }else{
                    alert("已匹配不能取消！");
                    window.location.reload();//刷新当前页面.
                }
            }
        );

    }
    //邀请好友
    function check(id,userId,F){
        /* $.post('/invite/enter/check.do',
         {id:id,userId:userId,srcFrom:srcFrom},
         function(response) {
         if(response){
         window.location.href = "/invite/enter?recordId="+id+"&userId="+userId+"&srcFrom="+srcFrom;
         }else{
         alert("已匹配不能重复匹配！");
         window.location.reload();//刷新当前页面.
         }
         }
         ); */
    }
    function runs(id,userId){
        $("#mores").html("正在加载中...");
        $.post('/account/record/detail/more.do',{id:id,userId:userId,srcFrom:'SRDB-TEST-001'},
            function(data) {
                var result = "";
                var invite ="";
                for (var i = 0; i < data.length; i++) {
                    if(data[i].matchStatus==0 ||data[i].matchStatus==1){
                        if(data[i].matchStatus==1){
                            invite=' <a class="record-lst-Invitation" onclick="clean('+data[i].id+')">解除锁定</a> ';
                        }else{
                            invite='';
                        }
                        result +='<li class="record-list">'
                            +'<div class="record-lst-left">'
                            +'<div class="record-lst-img">'
                            +'		<img src="/'+data[i].path+'" alt="">'
                            +'		</div>'
                            +'	<p class="record-lst-estimate">'+data[i].showType+'</p>'+invite
                            +'</div>'
                            +'<div class="record-lst-con">'
                            +'	<h3 class="rcd-lC-title">'+data[i].goodName+'</h3>'
                            +'	<div class="rcd-lC-middel">'
                            +'		<div class="rcd-annoce-term">'
                            +'			<p class="rcd-annoce-tNum">商品期数:</p>'
                            +'		</div>'
                            +'		<div class="rcd-lCM-need">'
                            +'			<p class="rcd-lCM-nT">本期参与</p>'
                            +'			<p class="rcd-lCM-surplus">'
                            +'				选择号段<span class="cb"></span>'
                            +'			</p>'
                            +'		</div>'
                            +'		<div class="rcd-lCM-need">'
                        if(data[i].smallUserName.length>5){
                            result +='			<p class="rcd-lCM-nT">'+data[i].smallUserName.substr(0,5)+"..."+'</p>'
                        }else{
                            result +='			<p class="rcd-lCM-nT">'+data[i].smallUserName+'</p>'
                        }
                        result +='			<p class="rcd-lCM-surplus">'
                            +'				<span class="cr">'+data[i].smallSenctionNo+'</span>'
                            +'			</p>'
                            +'		</div>'
                            +'		<p class="rcd-annoce-totle cb">('+data[i].smallUserIp+')</p>'
                            +'		<div class="rcd-lCM-need">'
                        if(data[i].bigUserName.length>5){
                            result +='			<p class="rcd-lCM-nT">'+data[i].bigUserName.substr(0,5)+"..."+'</p>'
                        }else{
                            result +='			<p class="rcd-lCM-nT">'+data[i].bigUserName+'</p>'
                        }
                        result +='			<p class="rcd-lCM-surplus">'
                            +'				<span class="cr">'+data[i].bigSenctionNo+'</span>'
                            +'			</p>'
                            +'		</div>'
                            +'		<p class="rcd-annoce-totle cb">('+data[i].bigUserIp+')</p>'
                            +'	</div>'
                            +'</div>'
                            +'</li>'
                    }else if (data[i].matchStatus==2){

                        if(data[i].lotteryStatus==0){
                            result+='<li class="record-list">'
                                +'<div class="record-lst-left">'
                                +'	<div class="record-lst-img">'
                                +'		<img src="/'+data[i].path+'" alt="">'
                                +'	</div>'
                                +'	<p class="record-lst-estimate">预计开战倒计时</p>'
                                +'	<div class="record-mannounced-lt-time">'
                                +'		<p class="record-lst-estimateTime fnTimeCountDown"'
                                +'			data-end="2018/1/10 14:10:00">'
                                +'			<span class="mini"></span>分<span class="sec"></span>秒<span'
                                +'				class="hm"></span>'
                                +'		</p>'
                                +'	</div>'
                                +'</div>'
                                +'<div class="record-lst-con">'
                                +'	<h3 class="rcd-lC-title">'+data[i].goodName+'</h3>'
                                +'	<div class="rcd-lC-middel">'
                                +'		<div class="rcd-annoce-term">'
                                +'			<p class="rcd-annoce-tNum">商品期数:'+data[i].issue+'</p>'
                                +'		</div>'
                                +'		<div class="rcd-lCM-need">'
                                +'			<p class="rcd-lCM-nT">本期参与</p>'
                                +'			<p class="rcd-lCM-surplus">'
                                +'				选择号段<span class="cb"></span>'
                                +'			</p>'
                                +'		</div>'
                                +'		<div class="rcd-lCM-need">'
                            if(data[i].smallUserName.length>5){
                                result +='			<p class="rcd-lCM-nT">'+data[i].smallUserName.substr(0,5)+"..."+'</p>'
                            }else{
                                result +='			<p class="rcd-lCM-nT">'+data[i].smallUserName+'</p>'
                            }
                            result +='			<p class="rcd-lCM-surplus">'
                                +'				<span class="cr">'+data[i].smallSenctionNo+'</span>'
                                +'			</p>'
                                +'		</div>'
                                +'		<p class="rcd-annoce-totle cb">('+data[i].smallUserIp+')</p>'
                                +'		<div class="rcd-lCM-need">'
                            if(data[i].bigUserName.length>5){
                                result +='			<p class="rcd-lCM-nT">'+data[i].bigUserName.substr(0,5)+"..."+'</p>'
                            }else{
                                result +='			<p class="rcd-lCM-nT">'+data[i].bigUserName+'</p>'
                            }
                            result +='			<p class="rcd-lCM-surplus">'
                                +'				<span class="cr">'+data[i].bigSenctionNo+'</span>'
                                +'			</p>'
                                +'		</div>'
                                +'		<p class="rcd-annoce-totle cb">('+data[i].bigUserIp+')</p>'
                                +'	</div>'

                                +'</div>'
                                +'</li>'
                        }else if(data[i].lotteryStatus==1){
                            result+='<li class="record-list" style="background-color: #F7F7F7;">'
                                +'	<div class="record-lst-left">'
                                +'		<div class="record-lst-img">'
                                +'			<img src="/'+data[i].path+'" alt="">'
                                +'		</div>'
                                +'		<p class="record-lst-winTip">很遗憾已失败</p>'
                                +'	</div>'
                                +'	<div class="record-lst-con">'
                                +'		<h3 class="rcd-lC-title">'+data[i].goodName+'</h3>'
                                +'		<div style="position: relative;"  class="rcd-lC-middel">'
                                +'			<div class="rcd-annoce-term">'
                                +'				<p class="rcd-annoce-tNum">商品期数:'+data[i].issue+'</p>'
                                +"				<a style='position: absolute; top: -.22rem;right: .01rem;color: #ff0033; background-color:#fff; border: 1px solid #FF0033;' class='rcd-annoce-tS' onclick=\"publishDetail('','"+data[i].matchUser+"','"+data[i].goodId+"','"+data[i].result+"')\">查看号码</a>"
                                +'			</div>'
                                +'			<div class="rcd-lCM-need">'
                                +'				<p class="rcd-lCM-nT">'
                                +'					<img style="margin-top: .03rem;" src="/images/ssc6.png" alt="" />结果：<span class="cr">'+data[i].drawNo+'</span>'
                                +'				</p>'
                                +'				<p class="rcd-lCM-surplus">'
                                +'					获胜号码：<span class="cr">'+data[i].result+'</span>'
                                +'				</p>'
                                +'			</div>'
                                +'			<div class="rcd-lCM-need">'
                                +'				<p class="rcd-lCM-nT">'
                                +'					获胜参与者<span class="cr"></span>'
                                +'				</p>'
                                +'				<p class="rcd-lCM-surplus">'
                                +'					选择号段<span class="cr"></span>'
                                +'				</p>'
                                +'			</div>'
                                +'			<div class="rcd-lCM-need">'
                            if(data[i].pkName.length>5){
                                result +='				<p class="rcd-lCM-nT">'+data[i].pkName.substr(0,5)+"..."+'<span class="cr"></span></p>'
                            }else{
                                result +='				<p class="rcd-lCM-nT">'+data[i].pkName+'<span class="cr"></span></p>'
                            }
                            result +='				<p class="rcd-lCM-surplus">'
                                +'					<span class="cr">'+data[i].sectionNo+'</span>'
                                +'				</p>'
                                +'			</div>'
                                +'			<p class="rcd-annoce-totle cb">('+data[i].pkIp+')</p>'
                                +'			<p>揭晓时间：'+data[i].drawTime+'</p>'
                                +'		</div>'
                                +'	</div>'
                                +'</li>'
                        }else if(data[i].lotteryStatus==2){
                            result+='<li class="record-list" style="background-color: #FCEBEB;">'
                                +'	<div class="record-lst-left">'
                                +'		<div class="record-lst-img">'
                                +'			<img src="/'+data[i].path+'" alt="">'
                                +'		</div>'
                                +'		<p class="record-lst-winTip rlstwt-curr">恭喜已获胜</p>'
                                +'		<a class="record-lst-winGet"href="/PswCheck/toPwLogin?srcFrom=SRDB-TEST-001">点击领取</a>'
                                +'	</div>'
                                +'	<div class="record-lst-con">'
                                +'		<h3 class="rcd-lC-title">'+data[i].goodName+'</h3>'
                                +'		<div style="position: relative;"  class="rcd-lC-middel">'
                                +'			<div class="rcd-annoce-term">'
                                +'				<p class="rcd-annoce-tNum">商品期数:'+data[i].issue+'</p>'
                                +"				<a style='position: absolute; top: -.22rem;right: .01rem;color: #ff0033; background-color:#fff; border: 1px solid #FF0033;' class='rcd-annoce-tS' onclick=\"publishDetail('','"+data[i].matchUser+"','"+data[i].goodId+"','"+data[i].result+"')\">查看号码</a>"
                                +'			</div>'
                                +'			<div class="rcd-lCM-need">'
                                +'				<p class="rcd-lCM-nT">'
                                +'					<img style="margin-top: .03rem;" src="/images/ssc6.png" alt="" />结果：<span class="cr">'+data[i].drawNo+'</span>'
                                +'				</p>'
                                +'				<p class="rcd-lCM-surplus">'
                                +'					获胜号码：<span class="cr">'+data[i].result+'</span>'
                                +'				</p>'
                                +'			</div>'
                                +'			<div class="rcd-lCM-need">'
                                +'				<p class="rcd-lCM-nT">'
                                +'					获胜参与者<span class="cr"></span>'
                                +'				</p>'
                                +'				<p class="rcd-lCM-surplus">'
                                +'					选择号段<span class="cr"></span>'
                                +'				</p>'
                                +'			</div>'
                                +'			<div class="rcd-lCM-need">'
                            if(data[i].nickName.length>5){
                                result +='				<p class="rcd-lCM-nT">'+data[i].nickName.substr(0,5)+"..."+'<span class="cr"></span></p>'
                            }else{
                                result +='				<p class="rcd-lCM-nT">'+data[i].nickName+'<span class="cr"></span></p>'
                            }
                            result +='				<p class="rcd-lCM-surplus">'
                                +'					<span class="cr">'+data[i].sectionNo+'</span>'
                                +'				</p>'
                                +'			</div>'
                                +'			<p class="rcd-annoce-totle cb">('+data[i].ip+')</p>'
                                +'			<p>揭晓时间： '+data[i].drawTime+'</p>'
                                +'		</div>'
                                +'	</div>'
                                +'</li> '

                        }



                    }
                }
                $(".record-item").append(result);
                countDown();
                $("#mores").hide();
            });
    }

    $(function() {
        // 导航切换效果
        /*$('.rcd-h-list').click(function(){
         $(this).addClass('rcd-hl-curr').siblings().removeClass('rcd-hl-curr');
         });*/
        // 点击邀请好友
        $('.record-lst-Invitation').click(function() {
            if ($(this).html() == '邀请好友') {
                $(this).html('取消邀请');
            } else {
                $(this).html('邀请好友');
            }
        });
        // 点击查看详情弹出框
        $('.rcd-annoce-tS').click(function() {
            $('.mod-detail').show();
        });
        // 点击弹窗关闭按钮
        $('.m-detail-closeBtn').click(function() {
            $('.mod-detail').hide();
        });
    });

    // dropload
    var dropload = $('.inner')
        .dropload(
            {
                domUp : {
                    domClass : 'dropload-up',
                    domRefresh : '<div class="dropload-refresh">↓下拉刷新</div>',
                    domLoad : '<div class="dropload-load"><span class="loading"></span>加载中...</div>'
                },
                loadUpFn : function(me) {
                    window.location.reload();//刷新当前页面.
                    me.resetload();
                }
            });
</script>
<script>
    function hideWin(){
        $(".mod-detail").hide();
    }

    /* function publishDetail(matchUser,goodId,resultNo){
     $.post('/account/find/detail',{
     matchUser:matchUser,goodId:goodId
     }, function(response) {
     var html = '<section class="m-detailBox">'
     +'<header class="m-detail-header">'+response[0].goodName+'</header>'
     +'<div class="m-detail-timeT">'
     +'<p class="m-d-tt-left fl">'+response[0].createTime+'</p>'
     +'<p class="m-d-tt-right fr">'+response[0].ip+'</p>'
     +'</div>'
     +'<div class="m-detail-id">'
     +'<div class="m-d-id-first fl">'
     +'<div class="m-d-idf-img">'
     +'<img src="'+response[0].headImgUrl+'" alt="">'
     +'</div>'
     +'<p class="m-d-idf-name">'+response[0].nickName+'</p>';
     if(response[0].sectionNo == 0){
     html += '<p class="m-d-idr-num">'+response[0].smallState+'</p>';
     }else{
     html += '<p class="m-d-idr-num">'+response[0].bigState+'</p>';
     }
     html+='</div>'
     +'<div class="m-d-id-another fr">'
     +'<div class="m-d-idr-img" style="border-color:#fff;">'
     +'<img src="'+response[1].headImgUrl+'" alt="">'
     +'</div>'
     +'<p class="m-d-idr-name">'+response[1].nickName+'</p>';
     if(response[1].sectionNo == 0){
     html += '<p class="m-d-idr-num">'+response[0].smallState+'</p>';
     }else{
     html += '<p class="m-d-idr-num">'+response[0].bigState+'</p>';
     }
     html +='</div>'
     +'</div>'
     +'<div class="m-detail-timeB">'
     +'<p class="m-d-tb-left fl">'+response[1].ip+'</p>'
     +'<p class="m-d-tb-right fr">'+response[1].createTime +'</p>'
     +'</div>'
     +'<div class="m-detail-resule">'
     +'<p>时时彩开奖结果：<span class="colored">'+response[1].drawNo+'</span></p>'
     +'<p>时时彩开奖时间：<span class="colored">'+response[1].drawDateTime+'</span></p>'
     +'</div>'
     +'<div class="m-detail-rule">'
     +'<p>根据规则： </p>'
     +'<p>'+response[1].drawNo+'除以'+response[1].price+'所得余数+1.获胜号码为'+resultNo+'</p>'
     if(response[0].lotteryStatus == 1){
     if(response[0].sectionNo ==1){
     html+='<p>获胜号段：'+response[1].smallState+'</p></div>';
     }else{
     html+='<p>获胜号段：'+response[1].bigState+'</p></div>';
     }
     html+='<div class="m-detail-win">'
     +'<div class="m-detail-win-photo">'
     +'<img src="'+response[1].headImgUrl+'" alt="">'
     +'</div>'
     +'<div class="m-detail-win-name">'
     +'<p>冠军：'+response[1].nickName+'</p>'
     +'</div>'
     +'</div>'
     +'<a class="m-detail-closeBtn" onclick="hideWin()">关闭</a>'
     +'</section>';
     }else{
     if(response[0].sectionNo ==1){
     html+='<p>获胜号段：'+response[1].bigState+'</p></div>';
     }else{
     html+='<p>获胜号段：'+response[1].smallState+'</p></div>';
     }
     html+='<div class="m-detail-win">'
     +'<div class="m-detail-win-photo">'
     +'<img src="'+response[0].headImgUrl+'" alt="">'
     +'</div>'
     +'<div class="m-detail-win-name">'
     +'<p>冠军：'+response[0].nickName+'</p>'
     +'</div>'
     +'</div>'
     +'<a class="m-detail-closeBtn" onclick="hideWin()">关闭</a>'
     +'</section>';
     }


     $(".mod-detail").append(html);
     $(".mod-detail").show();
     });
     } */
    function tCDThml(element) {
        element.html("正在揭晓...");
    }
    $(function() {
        countDown();

    });
    function countDown(){
        // 倒计时
        for (var i = 0; i < $(".fnTimeCountDown").length; i++) {
            $(".fnTimeCountDown").eq(i).fnTimeCountDown(tCDThml);
        }
    }

</script>
</body>
</html>