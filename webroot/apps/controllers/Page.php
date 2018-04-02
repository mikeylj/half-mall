<?php
/**
 * Created by PhpStorm.
 * User: lijun30
 * Date: 2018/4/1
 * Time: 17:27
 */

namespace App\Controller;


class Page extends \Swoole\Controller
{
    function __construct(\Swoole $swoole)
    {
        parent::__construct($swoole);
        $this->storage_config   = \Swoole::getInstance()->config['ssc'];
        $this->storage = new \WebIM\Storage($this->storage_config['ssc_web']['storage']);

        $this->next_open_time = $this->storage->getRedis('NEXT_OPEN_TIME');
        $this->assign('next_open_time', $this->next_open_time);

        $this->current_ssc = $this->storage->getRedis('CURRENT_SSC');
        $this->assign('current_ssc', $this->current_ssc);

        $this->current_ssc_val = $this->storage->getRedis('CURRENT_SSC_VAL');
        $this->assign('current_ssc_val', $this->current_ssc_val);
    }
    function index()
    { //取得产品
        $list = $this->storage->getGoodsList();
        $goods_1 = $goods_2 = $_arrGoods = [];
        foreach ($list as $row){
            if ($row['type'] == 1){
                $goods_1[]  = $row;
                $_arrGoods[$row['id']]    = $row;
            }
            elseif($row['type'] == 2){
                $goods_2[]  = $row;
                $_arrGoods[$row['id']]    = $row;
            }
        }
        list($_arrTakePartInOrders, $_arrWinOrders, $_arrUserIds)   = $this->_getOrders();


        $this->assign('goods_1', $goods_1);
        $this->assign('goods_2', $goods_2);
        $this->assign('arrTakePartInOrders', $_arrTakePartInOrders);
        $this->assign('arrWinOrders', $_arrWinOrders);
        $this->assign('arrUserIds', $_arrUserIds);
        $this->assign('arrGoods', $_arrGoods);

        $this->display('page/index.php');
    }
    //取得定单信息
    private function _getOrders($goods_id = 0){
        $_orderSelect = $this->storage->getOrderSelect('*');
        $_arrWhere = ['status' => 1, 'sscstatus' => 0];
        if ($goods_id){
            $_arrWhere['goods_id']  = $goods_id;
        }
        $_orders = $_orderSelect->where($_arrWhere)->order('id desc')->limit(20,0)->fetchAll();
        $_arrTakePartInOrders   =   $_arrWinOrders  = $_arrUserIds  = $_arrUsers    = [];
        foreach ($_orders as $_order){
            $_arrTakePartInOrders[] = $_order;
            $_arrUserIds[]          = $_order['userid'];
        }
        $_orderSelect = $this->storage->getOrderSelect('*');
        $_arrWhere  = ['status' => 1, 'sscstatus' => 1];
        if ($goods_id){
            $_arrWhere['goods_id']  = $goods_id;
        }
        $_orders = $_orderSelect->where($_arrWhere)->order('id desc')->limit(20, 0)->fetchAll();
        foreach ($_orders as $_order){
            $_arrWinOrders[]  = $_order;
            $_arrUserIds[]          = $_order['userid'];
        }
        //根据用户ID，取得用户数组
        $_arrUserIds    = array_unique($_arrUserIds);
        if ($_arrUserIds) {
            $_userSelect = $this->storage->getUserSelect('*');
            $_users = $_userSelect->in('id', $_arrUserIds)->fetchAll();
            foreach ($_users as $_user) {
                $_arrUsers[$_user['id']] = $_user;
            }
        }
        return [$_arrTakePartInOrders, $_arrWinOrders, $_arrUsers];
    }
}