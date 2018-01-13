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

class Users extends StoreController
{
    function __construct(\Swoole $swoole)
    {
        parent::__construct($swoole);
    }

    //定单列表
    function orderlist(){
        //取得取数
        $_arrParams = [
            ['name' => 'id', 'method' => 'get', 'type' => 'int',  'val' => 0],
        ];
        $_arrPostVal    = $this->_getParams($_arrParams);
        if (!isset($_arrPostVal['id']) || empty($_arrPostVal['id'])){
            $this->getBack();
        }
        $this->assign('id', $_arrPostVal['id']);
        $this->display('user/orderlist.php');
    }
    //定单列详情
    function aj_orderlist(){
        $_arrParams = [
            ['name' => 'id', 'method' => 'post', 'type' => 'int',  'val' => 0],
            ['name' => 'page', 'method' => 'post', 'type' => 'int',  'val' => 1],
        ];
        $_arrPostVal    = $this->_getParams($_arrParams);
        if (!isset($_arrPostVal['id']) || empty($_arrPostVal['id'])){
            return $this->json([], -1, '请选择您要查看的朋友');
        }
        $_arrOrders = $this->_getOrders($_arrPostVal['id'], $_arrPostVal['page'], $this->pagesize);
        $_arrRetOrders  = [];
        if ($_arrOrders){
            foreach ($_arrOrders as $o){
                $_order = [
                    'orderStatus'   => 0,       //定单状态             -1：未付款，已过期 0：未付款 等待付款   1：已付款 等待开奖 2：失败，未中奖  3：中奖
                    'nickname'      => '',      //用户昵称
                    'path'          => '',     //物品图片
                    'id'            => 0,       //编号
                    'userId'        => 0,       //用户ID
                    'name'          => '',      //物品名称
                    'showTime'      => '',      //下单时间
                    'sectionNo'     => '',      //下单号段
                    'purchaseCounts'    => 1,   //买的数量
                    'drawTime'          => '',  //开奖时间
                    'result'            => '',  //结果

                ];
                if ($o['status'] == -1){        //过期
                    $_order['orderStatus']  = self::ORDER_STATUS_INVALID;
                }
                elseif ($o['status'] == 0){     //未付款
                    $_order['orderStatus']  = self::ORDER_STATUS_NONPAYED;
                }
                elseif($o['status'] == 1){
                    if ($o['sscstatus'] == 0){  //未开奖
                        if ($o['playwithid'] == 0) {    //未匹配用户
                            $_order['orderStatus']  = self::ORDER_STATUS_NONMATCH;
                        }
                        else{
                            $_order['orderStatus']  = self::ORDER_STATUS_MATCHED;
                        }
                    }elseif ($o['sscstatus'] == -1){
                        $_order['orderStatus']  = self::ORDER_STATUS_FAILED;
                    }
                    elseif ($o['sscstatus'] == 1){
                        $_order['orderStatus']  = self::ORDER_STATUS_WIN;
                    }
                }
                $_order['nickname'] = $o['user']['name'];
                $_order['path'] = $o['goods']['small_image'];
                $_order['id'] = $o['id'];
                $_order['userId'] = $o['user']['id'];
                $_order['name'] = $o['goods']['name'];
                $_order['showTime'] = $o['ctime'];
                if ($o['goods']['type'] == 1){
                    if ($o['buytype'] == 0){
                        $_order['sectionNo']    = '0-55';
                    }
                    else
                    {
                        $_order['sectionNo']    = '56-110';
                    }
                }else{
                    if ($o['buytype'] == 0){
                        $_order['sectionNo']    = '0-29';
                    }
                    else
                    {
                        $_order['sectionNo']    = '29-56';
                    }
                }
                $_order['purchaseCounts'] = $o['num'];
                if ($o['ssctime']) {
//                    $_order['drawTime'] = date("Y-m-d H:i:s", $o['ssctime']);
//                    $_order['result'] = date("Y-m-d H:i:s", $o['ssc']);
                    $_order['drawTime'] = $o['ssctime'];
                    $_order['result'] = $o['ssc'];
                }
                $_arrRetOrders[]    = $_order;
            }
        }
        return $this->json($_arrRetOrders, 0, '');
    }

    function _getOrders($user_id, $page, $pagesize){
        list($list, $pager)  = $this->storage->getOrders($user_id, $page, $pagesize, 'id desc');
        $_arrOrders = $_arrUserIds = $_arrGoodsIds = [];
        if ($list){
            foreach ($list as $order){
                $_arrUserIds[]  = $order['userid'];
                $_arrGoodsIds[]    = $order['goods_id'];
            }
            $_arrUserIds = array_unique($_arrUserIds);
            $_arrGoodsIds  = array_unique($_arrGoodsIds);
            $_arrUsers  = $this->_getUserListByIds($_arrUserIds);
            $_arrGoods  = $this->_getGoodsListByIds($_arrGoodsIds);

            foreach ($list as $order){
                $order['user']  = isset($_arrUsers[$order['userid']])?$_arrUsers[$order['userid']] : [];
                $order['goods']  = isset($_arrGoods[$order['goods_id']]) ? $_arrGoods[$order['goods_id']] : [];
                $_arrOrders[$order['id']]   = $order;
            }
        }
        return $_arrOrders;
    }
    function _getUserListByIds($_arrIds){
        $_arrUsers  =[];
        $_users = $this->storage->getUserSelect("*")->in("id", $_arrIds)->fetchAll();
        if ($_users){
            foreach ($_users as $_user){
                $_arrUsers[$_user['id']]    = $_user;
            }
        }
        return $_arrUsers;
    }
    function _getGoodsListByIds($_arrIds){
        $_arrGoods  = [];
        $_goods = $this->storage->getGoodsSelect("*")->in("id", $_arrIds)->fetchAll();
        if ($_goods){
            foreach ($_goods as $good){
                $_arrGoods[$good['id']] = $good;
            }
        }
        return $_arrGoods;
    }
}