<?php
/**
 * 定时更新微信的access_token
 * User: lijun30
 * Date: 2017/11/25
 * Time: 下午4:36
 */
namespace WebIM;
use Swoole;

date_default_timezone_set('PRC');

require_once ("WebSocketClient.php");
class ServerACToken{

    /**
     * @var \Swoole\IFace\Log
     */
    public $log;

    const APPID = 'wxa213164f5cf1f6e7';
    const APPSecret = 'de8a0e51719997b583443cdcc542af68';

    const WX_ACCESS_TOKEN   = 'WX_ACCESS_TOKEN' ;
    const WX_ACCESS_EXPIRED_TIME = 'WX_ACCESS_EXPIRED_TIME';

    public function __construct($config = array())
    {
        //检测日志目录是否存在
        $log_dir = dirname($config['ssc']['aclog_file']);
        if (!is_dir($log_dir))
        {
            mkdir($log_dir, 0777, true);
        }
        if (!empty($config['ssc']['log_file']))
        {
            $logger = new Swoole\Log\FileLog($config['ssc']['log_file']);
        }
        else
        {
            $logger = new Swoole\Log\EchoLog(true);
        }
        $this->setLogger($logger);   //Logger

        $this->storage = new Storage($config['ssc']['storage']);
    }

    public function run(){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . self::APPID . "&secret=" . self::APPSecret;
        $_applyTime = $this->storage->getRedis(self::WX_ACCESS_EXPIRED_TIME);
        if ($_applyTime === false || $_applyTime > time() ){
            //取得access_token
            $curl = new \Swoole\Client\CURL(true);
            $resp = $curl->get($url);
            if (isset($resp) && !empty($resp)){
                $resp   = json_decode($resp, true);
                if (isset($resp) && !empty($resp) && is_array($resp)){

                    if (isset($resp['errcode'])){
                        $str = date("Y-m-d H:i:s") . "\tERROR:获取ACCESS_Token失败" . $resp['errmsg'] . "\n";
                        $this->log($str);
                    }
                    else{
                        $access_token = $resp['access_token'];
                        $expires_in = $resp['expires_in'];
                        $expired_time   = time() + $expires_in - 200;
                        //入库
                        $this->storage->addWxAC($access_token, $expired_time);
                        //存入Redis
                        $this->storage->writeRedis(self::WX_ACCESS_EXPIRED_TIME, $expired_time);
                        $this->storage->writeRedis(self::WX_ACCESS_TOKEN, $access_token);
                        $str = date("Y-m-d H:i:s") . "\tINFO:Access: "  . $access_token . "\tExpired Time:" . $expired_time . "\n";;
                        $this->log($str);
                    }
                }
                else{
                    $str = date("Y-m-d H:i:s") . "\tERROR:获取ACCESS_Token失败!!" . "\n";;
                    $this->log($str);
                }
            }
            else{
                $str = date("Y-m-d H:i:s") . "\tERROR:获取ACCESS_Token失败!" . "\n";;
                $this->log($str);
            }
        }
    }



    /**
     * 设置Logger
     * @param $log
     */
    function setLogger($log)
    {
        $this->log = $log;
    }
    /**
     * 打印Log信息
     * @param $msg
     * @param string $type
     */
    function log($msg)
    {
        echo $msg;
        $this->log->info($msg);
    }
}



