<?php
/**
 * Created by PhpStorm.
 * User: lijun30
 * Date: 2017/12/11
 * Time: 下午6:14
 */


namespace App\Controller;

use Swoole\Client\CURL;
use Zhuzhichao\IpLocationZh\Ip;
use WebIM;

class Recharge extends StoreController
{
    function __construct(\Swoole $swoole)
    {
        parent::__construct($swoole);
    }

    function getBalance()
    {
    }
    //保存定单
    function barcodePay(){
        //取得取数
        $_arrParams = [
            ['name' => 'goodId', 'method' => 'post', 'type' => 'int',  'val' => 0],
            ['name' => 'amount', 'method' => 'post', 'type' => 'int',  'val' => 0],
            ['name' => 'purchaseCounts', 'method' => 'post', 'type' => 'int',  'val' => 0],
            ['name' => 'payWay', 'method' => 'post', 'type' => 'string',  'val' => 0],
            ['name' => 'sectionNo', 'method' => 'post', 'type' => 'string',  'val' => 0],
            ['name' => 'playwith', 'method' => 'post', 'type' => 'int',  'val' => 0],
        ];
        $_arrPostVal    = $this->_getParams($_arrParams);
        //判读产品和数量不能为空
        if (!isset($_arrPostVal['goodId']) || empty($_arrPostVal['goodId'])){
            return $this->json([], -1, '请选择购买的产品');
        }
        if (!isset($_arrPostVal['purchaseCounts']) || empty($_arrPostVal['purchaseCounts'])){
            return $this->json([], -1, '请输入购买数量');
        }
        //取得当前TERM
        $_next_period   = $this->storage->getRedis('NEXT_CURRENT_PERIOD');
        //取得物品信息
        $_objGoods  = $this->storage->getGoods($_arrPostVal['goodId']);
        if (isset($_objGoods) && isset($_objGoods[0]))
            $_objGoods  = $_objGoods[0];
        else{
            return $this->json([], -1, '请选择购买的产品');
        }
        $user_id    = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;
        if (!isset($user_id)|| empty($user_id)){
            return $this->json([], -1, '定单已超过，请登录后重新下单');
        }
        $goods_id   = $_arrPostVal['goodId'];
        $amount     = $_arrPostVal['amount'];
        $num        = $_arrPostVal['purchaseCounts'];
        $payway     = $_arrPostVal['payWay'];
        $buytype    = $_arrPostVal['sectionNo'];
        $playwith    = $_arrPostVal['playwith'];
        $ssctype    = $_objGoods['type'];
        $ip         = $this->getIp();
        $ip_place   = IP::find($ip);
        error_log(json_encode($ip) . "\n", 3, "/tmp/ssc.log");
        error_log(json_encode($ip_place) . "\n", 3, "/tmp/ssc.log");

        $strPlace   = '';
        if ($ip_place && count($ip_place) > 3){
            for ($i = 0; $i < count($ip_place) - 2; $i++)
                $strPlace .= $ip_place[$i] . " ";
        }

        error_log(json_encode($strPlace) . "\n", 3, "/tmp/ssc.log");
        error_log(json_encode($_POST) . "\n", 3, "/tmp/ssc.log");
//        $sscperiods;
        $orderid    = $this->storage->addOrder($user_id, $goods_id, $amount, $num, $payway, $_next_period, $buytype, $ssctype,$playwith, $ip, $strPlace);
        error_log($orderid . "\n", 3, "/tmp/ssc.log");
        return $this->json(["goodid" => $goods_id, "orderid" => $orderid], '定单成功', $orderid);
    }
    function zjy(){

        //取得取数
        $_arrParams = [
            ['name' => 'goodId', 'method' => 'get', 'type' => 'int',  'val' => 0],
            ['name' => 'orderid', 'method' => 'get', 'type' => 'int',  'val' => 0]
        ];
        $_arrGetVal    = $this->_getParams($_arrParams);
        if (!$_arrGetVal['orderid']){
            echo "请选择支付定单";
        }
        //取得定单信息
        $objOrder   = $this->storage->getOrder($_arrGetVal['orderid']);
        if (!$objOrder || !$objOrder[0]){
            echo "未找到支付定单";
        }
        $objOrder   = $objOrder[0];
        //判断用户和产品是否想同
        if ($_SESSION['userid'] != $objOrder['userid'] || $_arrGetVal['goodId'] != $objOrder['goods_id']){
            echo "定单错误";
        }
        if ($objOrder['status'] != 0 || !$objOrder['trade_no']){
            echo "定单已支付";
        }
        //取得商品
        $objGoods = $this->storage->getGoods($_arrGetVal['goodId']);
        if (!$objGoods || !$objGoods[0]){
            echo "定单错误";
        }
        $objGoods   = $objGoods[0];
        $appid = '2018011401849411';  //https://open.alipay.com 账户中心->密钥管理->开放平台密钥，填写添加了电脑网站支付的应用的APPID
        $returnUrl = 'http://banjia-mall.com/pay/payback';     //付款成功后的同步回调地址
        $notifyUrl = 'http://banjia-mall.com/pay/notify';     //付款成功后的异步回调地址
        $outTradeNo = $_arrGetVal['orderid'];     //你自己的商品订单号
        $payAmount = 0.01;          //付款金额，单位:元
        $orderName = $objGoods['name'];    //订单标题
        $signType = 'RSA2';       //签名算法类型，支持RSA2和RSA，推荐使用RSA2
//商户私钥，填写对应签名算法类型的私钥，如何生成密钥参考：https://docs.open.alipay.com/291/105971和https://docs.open.alipay.com/200/105310
        $saPrivateKey='MIIEpAIBAAKCAQEApVSV7WIxY0ZYpZrHu88gYeSetbRmPblcO9zkxf6VbaeUR1PO4n1zJwUBrkW86hjeMRT4u8u9Fj6UgAYc+0rAWZf9JRDEW3uoKccpPjx5Q5u+nxhct09S0UC9nWYgEiu1o6RE3BXmbrlBkXZv3VeEgvR0gS5SzTgxEAZ2fcAm8ipVqpHo9DXP6NoWIDANHTwNUdpK79NPs/EcSAZ4XlKLFkzYXUTf+br2nqA6qL/e3FRKs9gZsxXqR9PR4MOZ13ZB8oHCw/7LDKS7SqtwoHnC9nuZz4DMA+cqVk6loOM1J6Ng/j8ovoYkWIvcYAVWlEKg9nxKTIHtX3eq7xcJunkf4QIDAQABAoIBAA93eUsq23nxE8vyTeso9luSGrLe/I2bsKA9Cv3m0i3e9oUxtvIDUGl/E2gtR/4Sc37d+mL/LWJOWnAbokxz8siu6lS0W9o/GD1IT3huCd4kTNHvYoUXm6TNzK9T5X4trqFvda2tMtB67kJgdRic3l2t5tRK9B4UuqpIIH+lIT+YRbQqAAx1oieRxR3rtNU2G0njEzS07TWfgkXJyuS8jg7gZxMJrQ0Lln8oEu+AZS55hOgwLeMlqZ5xErpS8AcGLMWgBqOB4zaAsU8CbXcwNVwwpuRRewleBnb6mG6lvIBickvM34hcjYnYqICt89Nglibeiy3JdeEQOxKJgJ2CAA0CgYEA3E1zoIhbAWFAO9RLWciOOL0HFrkf9qVXtwirzPOI94UJrCqFwOd9Q+J0jlCy45UqsSZxIBOd/Yy6lNmnYVOVeheyrIvnTzt719UVd6ARnfYVa6pI7xaS98DhiqtpJndC6LXu3fy2oVEqDZGHK4ZcY6v+W8UlHet3Pp4Pg8197w8CgYEAwB7KWK/C+xLmHEhEn0ADSDOFSQRL90kcF9I+38F+bQ0hWmcTdnnkXJA4ckfLUGwAv1pVDxz2CN6Pu2dT6EN7vfeWKee7rRJX3uujZd95yLTScpVF62wi5FWp7NnpVAn8Ormr43yz1Ro/QwnZdx5ACEjq/mxyE94jaHwYuEgmAg8CgYEAnh8dUejs4PWrhAXhO4Uex4ytjNq9HWwZpC8eGJHoCji7843lyMqed14P6KH1dDH5nYMJCUvrRzR+Kx556/pxPFvMC9qy4ITCY+z2ZpFGc8lQIKHtjWX3gMo5WC2l4E0TgjIrS7v6XZkDBRAiI9RhdczaWYYMGQiL4y7R1fllXXMCgYAcl/iRvocMi0GIUBE2inZyloht15/ezBjMStRkxQ2l+WBPbivtZDLiu+xKxfiynYB2+mDSgQL1Svqlb7mDRhfyrBjDX+QE3EgLu5J0JRChGJiByUnAwjVnOoCx6bTadyn9K4kzsGmre96SgbLGEdCB6yheeZF494TZli6vrr1JbQKBgQCqDukWBOWf65hqCM2+LfX9odipsXD37g8aqTwKiy2b6DlmkYURq/qvj4nc7/Sep/8q1ld4jPZ0tGu08WLKULWTZdGdLPvjbThKRJLH088snXJivFdErRdGDkJWF/ahSHl97beTTQEO4ZMMxWWDshi9zZL8IE60t/xXOv5TZ4jjwg==';
        $aliPay = new \WebIM\AlipayService($appid,$returnUrl,$notifyUrl,$saPrivateKey);
        $commonConfigs = $aliPay->doPay($payAmount,$outTradeNo,$orderName,$returnUrl,$notifyUrl);
        $this->assign('Configs', $commonConfigs);
        $this->display('recharge/zjy.php');

//        echo $sHtml;
    }
}