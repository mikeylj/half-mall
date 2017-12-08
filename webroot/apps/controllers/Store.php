<?php
namespace App\Controller;

use Swoole\Client\CURL;

class Store extends \Swoole\Controller
{
    function index()
    {

        $this->display('store/index.php');
    }
}