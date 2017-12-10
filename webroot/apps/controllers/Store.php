<?php
namespace App\Controller;

use Swoole\Client\CURL;

class Store extends \Swoole\Controller
{

    private $pagesize = 30;
    function index()
    {

        $this->display('store/index.php');
    }
    function ssc(){
        //取得当前页
        $page = (empty($_GET['page']) || intval($_GET['page']) <= 0) ? 1 : intval($_GET['page']);

        $data = array();
        $this->config   = \Swoole::getInstance()->config['ssc'];
        $this->storage = new \WebIM\Storage($this->config['ssc_web']['storage']);
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

        $_next_open_time = $this->storage->getRedis('NEXT_OPEN_TIME');
//        var_dump($_next_open_time);exit;
        $this->assign('list', $data);
        $this->assign('next_open_time', $_next_open_time);
        $this->display('store/ssc.php');
    }
    function account(){
        $this->display('store/account.php');
    }

    function buyrecord(){
        $this->display('store/buyrecord.php');
    }
    function goods(){
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
}