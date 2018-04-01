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

    //已失效或过期
    const ORDER_STATUS_INVALID      = -1;
    //未付款
    const ORDER_STATUS_NONPAYED     = 0;
    //未匹配朋友
    const ORDER_STATUS_NONMATCH     = 1;
    //已匹配，等待开奖
    const ORDER_STATUS_MATCHED      = 2;
    //购买成功
    const ORDER_STATUS_WIN          = 3;
    //购买失败
    const ORDER_STATUS_FAILED       = 4;

    const OAUTH2_URL    = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_base&state=ssc_001#wechat_redirect';
    const AC_URL= 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code';
    const USERINFO_URL= 'https://api.weixin.qq.com/sns/userinfo?access_token=%s&openid=%s&lang=zh_CN';

    const APPID = 'wxa213164f5cf1f6e7';
    const APPSecret = 'de8a0e51719997b583443cdcc542af68';

    protected $storage_config;
    protected $storage;

    protected $next_open_time;
    protected $current_ssc;
    protected $current_ssc_val;

    protected $pagesize = 5;

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
        
        $this->init();

    }
    //构造用户信息
    protected function init(){
        $this->session->start();
        //判断是否已经登录
        if (!isset($_SESSION['userid']) || empty($_SESSION['userid'])){
            //取得用户OPENID
            $this->oauth2();
        }
    }


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
    function getBack(){
        $str = "<script>history.go(-1)</script>";
        echo $str;
        exit;
    }
    function goHeader(){
        $this->http->redirect($this->storage_config['ssc_web']['wx_webauth_callback_url']);
        exit;
    }
    //取得用户授权信息OPENID
    function oauth2(){
        $_arrParams = [
            ['name' => 'code', 'method' => 'get', 'type' => 'string',  'val' => ''],
            ['name' => 'state', 'method' => 'get', 'type' => 'string',  'val' => ''],
        ];
        $_arrPostVal    = $this->_getParams($_arrParams);
        if (isset($_arrPostVal['code']) && isset($_arrPostVal['state']) && $_arrPostVal['state'] == 'ssc_001'){
            if (in_array($_arrPostVal['code'], array_values($this->oauth2_error))){
                //记录出错日志
                $this->log($this->oauth2_error[$_arrPostVal['code']]);
                $this->goHeader();  //返回到首页
            }
            else{
                //通过code换取网页授权access_token
                $_arrAccessToken = $this->get_weixin_access_token($_arrPostVal);
                if ($_arrAccessToken === false || !is_array($_arrAccessToken)){
                    $str = date("Y-m-d H:i:s") . "\tERROR:获取USERINFO失败!" . "\n";;
                    $this->log($str);
                    $this->goHeader();  //返回到首页
                }
                $openid = $_arrAccessToken['openid'];
                $access_token   = $_arrAccessToken['access_token'];
                $user   = $this->storage->getSSCUser($openid);
                if (!$user || !isset($user[0])){
                    $_arrUserInfo   = $this->get_weixin_userinfo($access_token, $openid);
                    if ($_arrUserInfo === false){
                        $str = date("Y-m-d H:i:s") . "\tERROR:获取USERINFO失败!!" . "\n";;
                        $this->log($str);
                        $this->goHeader();  //返回到首页
                    }
                    $nickname   = $_arrUserInfo['nickname'];
                    $sex        = $_arrUserInfo['sex'];
                    $province   = $_arrUserInfo['province'];
                    $city       = $_arrUserInfo['city'];
                    $country    = $_arrUserInfo['country'];
                    $headimgurl = $_arrUserInfo['headimgurl'];
                    $userid = $this->storage->addSSCUser($openid, $nickname, $headimgurl);
                    $_SESSION['openid']    = $openid;
                    $_SESSION['username']  = $nickname;
                    $_SESSION['pic']       = $headimgurl;
                    $_SESSION['userid'] =   $userid;

                    $str = date("Y-m-d H:i:s") . "\tINFO:获取USERINFO成功!!" . "\n";;
                    $this->log($str);
                }
                else{
                    $user   = $user[0];
                    $_SESSION['openid']    = $openid;
                    $_SESSION['username']  = $user['name'];
                    $_SESSION['pic']       = $user['pic'];
                    $_SESSION['userid'] =   $user['id'];
                }

            }
        }
        else {
            //取得当前URL的完整地址
            $redirect_uri = $this->curPageURL();
            $url = sprintf(self::OAUTH2_URL, self::APPID, urlencode($redirect_uri));
            $this->http->redirect($url);
        }
    }

    function curPageURL()
    {
        $pageURL = 'http';

        $pageURL = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https' : 'http';

        $pageURL .= "://";

        if ($_SERVER["SERVER_PORT"] != "80")
        {
            $pageURL .= $_SERVER["SERVER_NAME"].":" . $_SERVER["SERVER_PORT"] . $_SERVER['REQUEST_URI'];
        }
        else
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];
        }
        return $pageURL;
    }

    /**
     * get weixin access_token
     * @param wxid
     * @return array
     */
    protected function get_weixin_access_token($_arrPostVal) {
        //通过code换取网页授权access_token
        $url = sprintf(self::AC_URL, self::APPID, self::APPSecret, $_arrPostVal['code']);
        $curl = new \Swoole\Client\CURL(true);
        $resp = $curl->get($url);
        if (isset($resp) && !empty($resp)) {
            $resp = json_decode($resp, true);
            if (isset($resp) && !empty($resp) && is_array($resp)) {
                if (isset($resp['errcode'])) {
                    $str = date("Y-m-d H:i:s") . "\tERROR:获取ACCESS_Token失败" . $resp['errmsg'] . "\n";
                    $this->log($str);
                    return false;
                }
                return $resp;
            }
            else
                return false;
        }
        else
            return false;

    }
    protected function get_weixin_userinfo($access_token, $openid){
        //通过微信取得用户信息
        $url = sprintf(self::USERINFO_URL, $access_token, $openid);
        $curl = new \Swoole\Client\CURL(true);
        $resp = $curl->get($url);
        if (isset($resp) && !empty($resp)) {
            $resp = json_decode($resp, true);
            if (isset($resp) && !empty($resp) && is_array($resp)) {
                return $resp;
            }
            else
                return false;
        }
        else
            return false;
    }

    //记录日志
    protected function log($msg, $type = "ERROR"){
        $file = ROOT_PATH . '/log/web' . date("Y-m-d") . ".log";
        $str = date("Y-m-d H:i:s") . "\t" . $type . ":" . $msg;
        error_log($str, 3, $file);
    }

    private $oauth2_error = [
        '10003'	    => 'redirect_uri域名与后台配置不一致',
        '10004'	    => '此公众号被封禁',
        '10005'	    => '此公众号并没有这些scope的权限',
        '10006'	    => '必须关注此测试号',
        '10009'	    => '操作太频繁了，请稍后重试',
        '10010'	    => 'scope不能为空',
        '10011'	    => 'redirect_uri不能为空',
        '10012'	    => 'appid不能为空',
        '10013'	    => 'state不能为空',
        '10015'	    => '公众号未授权第三方平台，请检查授权状态',
        '10016'	    => '不支持微信开放平台的Appid，请使用公众号Appid'
    ];

}