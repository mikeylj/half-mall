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
    private $storage_config;
    private $storage;

    function __construct(\Swoole $swoole)
    {
        parent::__construct($swoole);
        $this->session->start();
        $this->storage_config   = \Swoole::getInstance()->config['ssc'];
        $this->storage = new \WebIM\Storage($this->storage_config['ssc_web']['storage']);
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
        if (!$_arrPostVal['goodId'] || empty($_arrPostVal['goodId'])){
            return $this->json(
                [
                    'code'  => -1,
                    'message'   => '请选择购买的产品'
                ]
            );
        }
        if (!$_arrPostVal['purchaseCounts'] || empty($_arrPostVal['purchaseCounts'])){
            return $this->json(
                [
                    'code'  => -1,
                    'message'   => '请输入购买数量'
                ]
            );
        }
        //取得当前TERM
        $_next_period   = $this->storage->getRedis('NEXT_CURRENT_PERIOD');
        //取得物品信息
        $_objGoods  = $this->storage->getGoods($_arrPostVal['goodId']);
        if ($_objGoods && !empty($_objGoods[0]))
            $_objGoods  = $_objGoods[0];
        else{
            return $this->json(
                [
                    'code'  => -1,
                    'message'   => '请选择购买的产品'
                ]
            );
        }
        $user_id    = $_SESSION['userid'];
        if (!$user_id){
            return $this->json(
                [
                    'code'  => -1,
                    'message'   => '定单已超过，请登录后重新下单'
                ]
            );
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
        return $this->json(
            [
                'code'  => 0,
                'message'   => '定单成功'
            ]
        );
    }
    function zjy(){
        echo "下单成功，跳到ALI支持";
    }
}