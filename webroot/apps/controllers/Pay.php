<?php
/**
 * Created by PhpStorm.
 * User: lijun30
 * Date: 2018/6/9
 * Time: 下午7:11
 */

namespace App\Controller;


class Pay extends \Swoole\Controller
{
    protected $storage_config;
    protected $storage;

    function __construct(\Swoole $swoole)
    {
        parent::__construct($swoole);
        $this->storage_config   = \Swoole::getInstance()->config['ssc'];
        $this->storage = new \WebIM\Storage($this->storage_config['ssc_web']['storage']);

    }

    function index(){
        $this->display('pay/index.php');
    }
    function payback(){

        //取得取数
        $_arrParams = [
            ['name' => 'total_amount', 'method' => 'get', 'type' => 'float',  'val' => 0],
            ['name' => 'timestamp', 'method' => 'get', 'type' => 'string',  'val' => ''],
            ['name' => 'sign', 'method' => 'get', 'type' => 'string',  'val' => ''],
            ['name' => 'trade_no', 'method' => 'get', 'type' => 'string',  'val' => ''],
            ['name' => 'auth_app_id', 'method' => 'get', 'type' => 'string',  'val' => ''],
            ['name' => 'seller_id', 'method' => 'get', 'type' => 'string',  'val' => ''],
            ['name' => 'out_trade_no', 'method' => 'get', 'type' => 'string',  'val' => ''],
        ];
        $_arrGetVal    = $this->_getParams($_arrParams);
        if (!$_arrGetVal['out_trade_no']){
            echo "支付定单错误";
        }
        //取得定单信息
        $objOrder   = $this->storage->getOrder($_arrGetVal['out_trade_no']);
        if (!$objOrder || !$objOrder[0]){
            echo "未找到支付定单";
        }
        $this->storage->updateOrderPayStatus($_arrGetVal['trade_no'], $_arrGetVal['out_trade_no']);

        error_log(json_encode($_arrGetVal) . "\n", 3, "/tmp/ssc.log");
        echo "支付成功";

        var_dump($_GET);
        var_dump($_POST);
    }
    function notify(){
        error_log(json_encode($_GET), 3, '/tmp/notify.log');
        error_log(json_encode($_POST), 3, '/tmp/notify.log');
    }
    //取得参数内容
    function _getParams($params){
        $_arrValues = [];
        global $php;
        foreach ($params as $param){
            $name   = $param['name'];
            $method   = $param['method'];
            $type   = $param['type'];
            $defaultVal = $param['val'];
            if ($method == 'get'){
                if ($type == 'int'){
                    $_arrValues[$name]  =  isset($php->request->get[$name]) ? intval($php->request->get[$name]) : $defaultVal;
                }
                else{
                    $_arrValues[$name]  =  isset($php->request->get[$name]) ? $php->request->get[$name] : $defaultVal;
                }
            }
            else{
                if ($type == 'int'){
                    $_arrValues[$name]  =  isset($php->request->post[$name]) ? intval($php->request->post[$name]) : $defaultVal;
                }
                else{
                    $_arrValues[$name]  =  isset($php->request->post[$name]) ? $php->request->post[$name] : $defaultVal;
                }
            }
        }
        return $_arrValues;
    }
}