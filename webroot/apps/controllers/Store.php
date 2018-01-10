<?php
namespace App\Controller;

use Swoole\Client\CURL;
use Zhuzhichao\IpLocationZh\Ip;

class Store extends \Swoole\Controller
{

    private $pagesize = 30;
    private $storage_config;
    private $storage;
    private $next_open_time;
    private $current_ssc;
    private $current_ssc_val;

    function __construct(\Swoole $swoole)
    {
        parent::__construct($swoole);
        $this->session->start();
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
    {
        $openid = rand(100000000000, 999999999999);
        $user   = $this->storage->getSSCUser($openid);
        if (!$user || !isset($user[0])){
            $_SESSION['openid']    = $openid;
            $_SESSION['username']  = '天天_' . $openid;
            $_SESSION['pic']       = 'http://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83erNaYn0tEWiac65GIlqdR7T2un2KKxq5uULRibWzvgCIVl2UmyXpxibrdummQTibnNRrAaXxutRNk5fyw/0';

            $userid = $this->storage->addSSCUser($_SESSION['openid'], $_SESSION['username'], $_SESSION['pic']);
            $_SESSION['userid'] =   $userid;
        }
        else{
            $user   = $user[0];
            $_SESSION['openid']    = $user['openid'];
            $_SESSION['username']  = $user['name'];
            $_SESSION['pic']       = $user['pic'];
            $_SESSION['userid'] =   $user['id'];
        }
        //取得产品
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

    function ssc(){
        global $php;
        $page = isset($php->request->get['page']) ? $php->request->get['page'] : 1;
        //取得当前页
        $page = (empty($page) || intval($page) <= 0) ? 1 : intval($page);

        $data = array();
        list($list, $pager) = $this->storage->getSSC($page, $this->pagesize);
        foreach ($list as $row){
            $_arrData = array();
            $arr = explode(',', $row['value']);
            $val = 0;
            foreach ($arr as $v){
                $val = $val * 10 + $v;
            }
            $_arrData['periods'] = $row['periods'];
            $_arrData['value'] = $row['value'];
            $_arrData['total'] = $val;
            $_arrData['time'] = $row['time'];
            $_arrData['ctime'] = $row['ctime'];
            $_arrData['v56'] = $val % 56 + 1;
            $_arrData['v110'] = $val % 110 + 1;
            $data[] = $_arrData;
        }

        $this->assign('list', $data);
        $this->display('store/ssc.php');
    }

    function goods(){
        global $php;
        $id = isset($php->request->get['id']) ? $php->request->get['id'] : 0;

        $id = (empty($id) || intval($id) <= 0) ? 0 : intval($id);
        if (!$id){
            $this->getBack();
        }
        $goods = $this->storage->getGoods($id);
        if (!$goods && !isset($goods[0])) {
            $this->getBack();
        }
        $goods = $goods[0];
        list($_arrTakePartInOrders, $_arrWinOrders, $_arrUsers)   = $this->_getOrders($id);

        $this->assign('arrTakePartInOrders', $_arrTakePartInOrders);
        $this->assign('arrWinOrders', $_arrWinOrders);
        $this->assign('arrUsers', $_arrUsers);
        $this->assign('goods', $goods);
        $this->assign('userid', $_SESSION['userid']);
        $this->display('store/goods.php');

    }
    function introduction(){
        $this->display('store/introduction.php');
    }
    //排行榜
    function rank(){
        $_topUsers = $this->storage->getOrderSelect('userid, sum(num) as sum_num')->where(['status' => 1, 'sscstatus' => 1])->groupBy('userid')->order('sum_num desc')->limit(20, 0)->fetchAll();

        $_arrUserIds = $_arrUsers =  [];
        foreach ($_topUsers as $_order){
            $_arrUserIds[]          = $_order['userid'];
        }
        //根据用户ID，取得用户数组
        $_arrUserIds    = array_unique($_arrUserIds);
        $_userSelect = $this->storage->getUserSelect('*');
        $_users = $_userSelect->in('id', $_arrUserIds)->fetchAll();
        foreach ($_users as $_user){
            $_arrUsers[$_user['id']]  = $_user;
        }
        $this->assign('topUsers', $_topUsers);
        $this->assign('arrUsers', $_arrUsers);
        $this->display('store/rank.php');

    }
    function rule(){
        $this->display('store/rule.php');
    }
    function getOrderSwitch(){
        $strRet = [
            'code'  => 0
        ];
        echo json_encode($strRet);
        exit;
    }
    function getPayChannelSwitch(){
        var_dump($_POST);exit;
    }


    function getBack(){
        $str = "<script>history.go(-1)</script>";
        echo $str;
        exit;
    }
}