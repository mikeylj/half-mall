<?php
/**
 * Created by PhpStorm.
 * User: lijun30
 * Date: 2018/1/9
 * Time: 下午6:21
 */

namespace App\Controller;


class StoreController extends \Swoole\Controller
{

    //取得IP
    public function getIp($is_int=0) {
        // Gets the default ip sent by the user
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $step = 1;
            $direct_ip = $_SERVER['REMOTE_ADDR'];
        }

        // Gets the proxy ip sent by the user
        $proxy_ip     = '';
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $step = 2;
            $proxy_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED'])) {
            $step = 3;
            $proxy_ip = $_SERVER['HTTP_X_FORWARDED'];
        } else if (!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
            $step = 4;
            $proxy_ip = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (!empty($_SERVER['HTTP_FORWARDED'])) {
            $step = 5;
            $proxy_ip = $_SERVER['HTTP_FORWARDED'];
        } else if (!empty($_SERVER['HTTP_VIA'])) {
            $step = 6;
            $proxy_ip = $_SERVER['HTTP_VIA'];
        } else if (!empty($_SERVER['HTTP_X_COMING_FROM'])) {
            $step = 7;
            $proxy_ip = $_SERVER['HTTP_X_COMING_FROM'];
        } else if (!empty($_SERVER['HTTP_COMING_FROM'])) {
            $step = 8;
            $proxy_ip = $_SERVER['HTTP_COMING_FROM'];
        }

        // Returns the true IP if it has been found, else FALSE
        if (empty($proxy_ip)) {
            // True IP without proxy
            $ip = $direct_ip;
        } else {
            $is_ip = preg_match('|^([0-9]{1,3}\.){3,3}[0-9]{1,3}|', $proxy_ip, $regs);
            if ($is_ip && (count($regs) > 0)) {
                // True IP behind a proxy
                $ip = $regs[0];
            } else {
                // Can't define IP: there is a proxy but we don't have
                // information about the true IP
                $ip = $direct_ip;
            }
        }
        if($is_int == 1){
            $ip = sprintf("%u", ip2long($ip));
        }
        return $ip;
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