<?php
namespace App\Controller;

use Swoole\Client\CURL;

class Store extends \Swoole\Controller
{

    private $pagesize = 30;
    private $storage_config;
    private $storage;
    private $next_open_time;

    function __construct(\Swoole $swoole)
    {
        parent::__construct($swoole);
        $this->session->start();
        $this->storage_config   = \Swoole::getInstance()->config['ssc'];
        $this->storage = new \WebIM\Storage($this->storage_config['ssc_web']['storage']);

        $this->next_open_time = $this->storage->getRedis('NEXT_OPEN_TIME');
        $this->assign('next_open_time', $this->next_open_time);
    }

    function index()
    {
        $openid = rand(1000000000000, 999999999999);
        $user   = $this->storage->getSSCUser($openid);
        if (!$user && isset($user[0])){
            $_SESSION['openid']    = $openid;
            $_SESSION['username']  = '天天_' . rand(0, 9);
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
        $goods_1    = [];
        $goods_2   = [];
        foreach ($list as $row){
            if ($row['type'] == 1){
                $goods_1[]  = $row;
            }
            elseif($row['type'] == 2){
                $goods_2[]  = $row;
            }
        }
        $this->assign('goods_1', $goods_1);
        $this->assign('goods_2', $goods_2);

        $this->display('store/index.php');
    }
    function ssc(){
        //取得当前页
        $page = (empty($_GET['page']) || intval($_GET['page']) <= 0) ? 1 : intval($_GET['page']);

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
        $id = (empty($_GET['id']) || intval($_GET['id']) <= 0) ? 0 : intval($_GET['id']);
        if (!$id){
            $this->getBack();
        }
        $goods = $this->storage->getGoods($id);
        if (!$goods && !isset($goods[0])) {
            $this->getBack();
        }
        $goods = $goods[0];
        $this->assign('goods', $goods);
        $this->assign('userid', $_SESSION['userid']);
        $this->display('store/goods.php');

    }
    function introduction(){
        $this->display('store/introduction.php');
    }
    function rank(){
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