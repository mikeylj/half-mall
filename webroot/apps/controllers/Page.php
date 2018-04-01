<?php
/**
 * Created by PhpStorm.
 * User: lijun30
 * Date: 2018/4/1
 * Time: 17:27
 */

namespace App\Controller;


class Page
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

        $this->display('store/index.php');
    }
}