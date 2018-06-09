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
}