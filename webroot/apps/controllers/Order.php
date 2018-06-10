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


class Order  extends StoreController
{
    function __construct(\Swoole $swoole)
    {
        parent::__construct($swoole);
    }
    function detail(){
        $_arrParams = [
            ['name' => 'id', 'method' => 'get', 'type' => 'int',  'val' => 0],
//            ['name' => 'userId', 'method' => 'get', 'type' => 'int',  'val' => 0],
        ];
        $_arrPostVal    = $this->_getParams($_arrParams);
        if (!isset($_arrPostVal['id']) || empty($_arrPostVal['id'])){
            $this->getBack();
        }
        //取定单信息
        $order = $this->storage->getOrder($_arrPostVal['id']);
        if (!isset($order) || empty($order) || !isset($order[0]) || empty($order[0])){
            $this->getBack();
        }
        $order  = $order[0];
        $order['sscval']    = $this->_getSCCVal($order['ssc'], $order['ssctype']);

        $user   = $this->storage->getSSCUserByID($order['userid']);
        if (!isset($user) || empty($user) || !isset($user[0]) || empty($user[0])){
            $this->getBack();
        }
        $user   = $user[0];
        $goods  = $this->storage->getGoods($order['goods_id']);
        if (!isset($goods) || empty($goods) || !isset($goods[0]) || empty($goods    [0])){
            $this->getBack();
        }
        $goods  = $goods[0];
        //取得对方定单
        $playwithID = $order['playwithid'];
        $porder = [];
        $puser  = [];
        if (isset($playwithID) && !empty($playwithID)){
            $porder = $this->storage->getOrder($playwithID);
            if (!isset($porder) || empty($porder) || !isset($porder[0]) || empty($porder[0])){
                $this->getBack();
            }
            $porder = $porder[0];
            $puser   = $this->storage->getSSCUserByID($porder['userid']);
            if (!isset($puser) || empty($puser) || !isset($puser[0]) || empty($puser[0])){
                $this->getBack();
            }
            $puser  = $puser[0];
        }

        $this->assign('order', $order);
        $this->assign('user', $user);
        $this->assign('goods', $goods);
        $this->assign('puser', $puser);
        $this->assign('porder', $porder);
        $this->display('order/detail.php');
    }
    function playto(){
        $_arrParams = [
            ['name' => 'id', 'method' => 'get', 'type' => 'int',  'val' => 0],
//            ['name' => 'userId', 'method' => 'get', 'type' => 'int',  'val' => 0],
        ];
        $_arrPostVal    = $this->_getParams($_arrParams);
        if (!isset($_arrPostVal['id']) || empty($_arrPostVal['id'])){
            $this->getBack();
        }
        //取定单信息
        $order = $this->storage->getOrder($_arrPostVal['id']);
        if (!isset($order) || empty($order) || !isset($order[0]) || empty($order[0])){
            $this->getBack();
        }
        $order  = $order[0];

        $user_id    = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;
        if (!isset($user_id)|| empty($user_id)){
            $this->getBack();
        }
        //新增加定单
        $goods_id   = $order['goods_id'];
        $amount     = $order['amount'];
        $num        = $order['num'];
        $payway     = $order['payway'];
        $buytype    = $order['buytype'];
        $playwith    = 0;
        $ssctype    = $order['ssctype'];
        $playwithid    = $order['id'];

        //跟原定单的buytype正好相反
        if ($buytype == 0){
            $buytype    = 1;
        }else{
            $buytype    = 0;
        }


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
        $orderid    = $this->storage->addOrder($user_id, $goods_id, $amount, $num, $payway, 0, $buytype, $ssctype,$playwith, $ip, $strPlace, $playwithid);
        error_log($orderid . "\n", 3, "/tmp/ssc.log");
        $url = "/recharge/zjy?orderid=" . $orderid . "&goodId=$goods_id";
        $this->http->redirect($url);
    }

    private function _getSCCVal($ssc, $ssctype){
        $_sscVal = -1;
        if ($ssc) {
            $arr = explode(',', $ssc);
            $val = 0;
            foreach ($arr as $v) {
                $val = $val * 10 + $v;
            }
            if ($ssctype == 1) {
                $_sscVal = $val % 110 + 1;
            } else {
                $_sscVal = $val % 56 + 1;
            }
        }
        return $_sscVal;
    }

}