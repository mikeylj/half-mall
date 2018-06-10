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

    function index(){
        $this->display('pay/index.php');
    }
    function payback(){
        var_dump($_GET);
        var_dump($_POST);
    }
    function notify(){
        error_log(json_encode($_GET), 3, '/tmp/notify.log');
        error_log(json_encode($_POST), 3, '/tmp/notify.log');
    }
}