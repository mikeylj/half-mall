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
        return $this->json([], '定单成功', 0);
    }
    function zjy(){

        $appid = '2018011401849411';  //https://open.alipay.com 账户中心->密钥管理->开放平台密钥，填写添加了电脑网站支付的应用的APPID
        $returnUrl = 'http://banjia-mall.com/recharge/return';     //付款成功后的同步回调地址
        $notifyUrl = 'http://banjia-mall.com/recharge/notify';     //付款成功后的异步回调地址
        $outTradeNo = date('YmdHis').rand(100,999);     //你自己的商品订单号
        $payAmount = 9999;          //付款金额，单位:元
        $orderName = '支付测试';    //订单标题
        $signType = 'RSA2';       //签名算法类型，支持RSA2和RSA，推荐使用RSA2
//商户私钥，填写对应签名算法类型的私钥，如何生成密钥参考：https://docs.open.alipay.com/291/105971和https://docs.open.alipay.com/200/105310
        $saPrivateKey='';
        $aliPay = new AlipayService($appid,$returnUrl,$notifyUrl,$saPrivateKey);
        $sHtml = $aliPay->doPay($payAmount,$outTradeNo,$orderName,$returnUrl,$notifyUrl);
        echo $sHtml;
    }
}