<?php
/**
 * Created by PhpStorm.
 * User: lijun30
 * Date: 2017/12/11
 * Time: 下午6:14
 */

namespace App\Controller;

use Swoole\Client\CURL;

class Recharge extends \Swoole\Controller
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
        $user_id    = $_SESSION['userid'];
        $goods_id   = $_POST['goodId'];
        $amount     = $_POST['amount'];
        $num        = $_POST['purchaseCounts'];
        $payway     = $_POST['payWay'];
        $buytype    = $_POST['sectionNo'];
        error_log(json_encode($_POST) . "\n", 3, "/tmp/ssc.log");
//        $sscperiods;
        $orderid    = $this->storage->addOrder($user_id, $goods_id, $amount, $num, $payway, 0, $buytype);
        error_log($orderid . "\n", 3, "/tmp/ssc.log");

    }
    function zjy(){
        echo "下单成功，跳到ALI支持";
    }
}