<?php
/**
 * Created by PhpStorm.
 * User: lijun30
 * Date: 2017/11/25
 * Time: 下午4:36
 */
namespace WebIM;
use Swoole;

date_default_timezone_set('PRC');

require_once ("WebSocketClient.php");
class ServerSSC{
    private $_ssc_type  = 'bj';     //时时彩类别    bj = 北京    cq    = 重庆

    private $_config;               //配置
    private $_websocket_server_config;  //WebSocket 配置
    private $_websocket_client;         //WebSocket 客户端
    protected $storage;                 //存储对象


    private $SSC_URL   = 'http://www.cqcp.net/game/ssc/';           //重庆时时彩URL
    private $BJSSC_URL  = 'http://www.xhglfz.com/ssc_wechat/dataAnalyze/list?dateTime=%s';  //北京时时彩URL

    private $_ssc_times;        //时时彩开奖时间
    private $_buyStatus         = -1;   //是否可购买状态  默认 -1， 0:不能购买（开奖中）  1：可以购买 2：开奖中  3：开奖

    private $_curr_period       = -1;    //当前是第几期

    /**
     * @var \Swoole\IFace\Log
     */
    public $log;


    public function __construct($config = array())
    {
        //检测日志目录是否存在
        $log_dir = dirname($config['ssc']['log_file']);
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


        $this->_ssc_times   = $config['ssc']['times'];
        $this->storage = new Storage($config['ssc']['storage']);
    }

    /****
     * 开奖
     */
    public function _openSSC($_term, $ssc, $ssctime){
        //取得已经匹配等待开奖定单
        $_orderSelect = $this->storage->getOrderSelect('*');
        //['sscstatus' => 0, 'status' => 1, 'playwithid' => 0, 'automatch' => 1]
        $_orders = $_orderSelect->where(['sscstatus' => 0, 'status' => 1])->where('playwithid','<>', 0)->fetchAll();

        //'status' => 1, 'sscstatus' => 0
        $_unPayed   = $_errorIDs  = $_successOrders = $_failedOrders = [];
        $_ssc_110   = 0;
        $_ssc_56    = 0;
        if ($_orders){
            //取得当前中奖余额
            $_strSSC    = $this->storage->getRedis('CURRENT_SSC');
            $arr = explode(',', $_strSSC);
            $val = 0;
            foreach ($arr as $v){
                $val = $val * 10 + $v;
            }
            $_ssc_56 = $val % 56 + 1;
            $_ssc_110 = $val % 110 + 1;

            $_val_56    = 0;
            $_val_110    = 0;
            if ($_ssc_56 >28)
                $_val_56    = 1;
            if ($_ssc_110 >55)
                $_val_110 = 1;

            foreach ($_orders as $_order){
                if ($_order['status'] == 0){
                    $_unPayed[] = $_order['id'];
                }
                elseif($_order['status'] == 1){
                    if ($_order['sscstatus'] == 0){     //物品的类型
                        //根据选择的类型
                        if ($_order['ssctype'] == 1){
                            if ($_val_56 == $_order['buytype']){
                                $_successOrders[]   = $_order['id'];
                            }
                            else{
                                $_failedOrders[]  = $_order['id'];
                            }
                        }else{
                            if ($_val_110 == $_order['buytype']){
                                $_successOrders[]   = $_order['id'];
                            }
                            else{
                                $_failedOrders[]  = $_order['id'];
                            }
                        }
                    }
                    else{
                        $_errorIDs[]    = $_order['id'];
                    }
                }
                else{
                    $_errorIDs[]    = $_order['id'];
                }
            }
        }



        //修改过期的，成功的，失败的
//        $this->log("过期：(" . implode(',', $_unPayed) . ")\n");
//        error_log("过期：(" . implode(',', $_unPayed) . ")\n", 3, "/tmp/ssc.log");
//        if ($_unPayed)
//            $this->storage->updateOrder(-1, $ssc, $ssctime, -1, "id in (" . implode(',', $_unPayed). ")");

        $str = "成功：(" . implode(',', $_successOrders) . ")\n";
        $this->log($str);
//        error_log("成功：(" . implode(',', $_successOrders) . ")\n", 3, "/tmp/ssc.log");
        if ($_successOrders)
            $this->storage->updateOrder(1, $ssc, $ssctime, 1, "id in (" . implode(',', $_successOrders). ")");

        $str = "失败：(" . implode(',', $_failedOrders) . ")\n";
        $this->log($str);
//        error_log("失败：(" . implode(',', $_failedOrders) . ")\n", 3, "/tmp/ssc.log");
        if ($_failedOrders)
            $this->storage->updateOrder(1, $ssc, $ssctime, -1, "id in (" . implode(',', $_failedOrders). ")");

        $str = "异常ID：(" . implode(',', $_errorIDs) . ")\n";
        $this->log($str);
//        error_log("异常ID：(" . implode(',', $_errorIDs) . ")\n", 3, "/tmp/ssc.log");
        return $_ssc_110;
    }

    //开奖
    function _getCSSInMins($_currTime){
        //取得本次开奖内容
        list($_currTerm, $_currSSC, $_currDate)  = $this->_getRecursionSSC(5);
        $p = sprintf(date("Ymd") . "%03d", $this->_curr_period);
        if ($_currTerm === false || !$_currTerm && $p != $_currTerm){
            $str = date('Y-m-d H:i:s', $_currTime) . "\t". "ERROR:未取得SSC" . "\t" . $_currTerm . "\t" . $_currSSC . "\t" . $_currDate .  "\n";
            $this->log($str);
//            error_log($str, 3, "/log/ssc.log");
            return false;
        }
        $str = date('Y-m-d H:i:s', $_currTime) . "\t". "INFO:取得当前开奖信息" . $_currTerm . "\t" . $_currSSC  . "\t" . $_currDate . "\n";
        $this->log($str);
        //存入数据库及Redis
        $this->storage->addSSC($_currTerm, $_currSSC, $_currDate);
        //将本次Period和下一次开奖时间存入MC
        $this->storage->writeRedis('CURRENT_PERIOD', $_currTerm);
        $this->storage->writeRedis('NEXT_CURRENT_PERIOD', ($_currTerm + 1) >=120 ? 1 : ($_currTerm + 1));
        $this->storage->writeRedis('CURRENT_SSC', $_currSSC);
        $this->storage->writeRedis('NEXT_OPEN_TIME', date("Y-m-d ") . $this->_ssc_times[$this->_curr_period + 1]);

        $_ssc_val   = $this->_openSSC($_currTerm, $_currSSC, strtotime($_currDate));   //开奖
        $this->storage->writeRedis('CURRENT_SSC_VAL', $_ssc_val);

        return [$_currTerm, $_currSSC, $_currDate];
//        $str = date('Y-m-d H:i:s', $_currTime) . "\t". "ERROR:未取得最新SSC" . "\t" . $_currTerm . "\t" . $_currSSC . "\t" . $_currDate .  "\n";
//        error_log($str, 3, "log/ssc.log");
//        return false;
    }

    //递归取得SSC内容
    function _getRecursionSSC($num = 5){
        $this->log('递归取得SSC内容:' . $num . "\n");
        if ($num == 0)
            return [false, false, false];
        if ($this->_ssc_type == 'bj'){
            $_arrSsc    = $this->_getBjSSC();
            list($_currTerm, $_currSSC, $_currDate)  = $this->_dealBJSSC($_arrSsc);
        }
        else
        {
            $_arrSsc =$this->_getSSC();
            list($_currTerm, $_currSSC, $_currDate)  = $this->_dealSSC($_arrSsc);
        }
        //如果没有取得内容，则递归调用或之前存入redis的当前Period为当前的
        $_lastPeriod    = $this->storage->getRedis('CURRENT_PERIOD');
        if ($_currTerm === false || !$_currTerm || $_lastPeriod == $_currTerm){
            sleep(5);
            $this->_getRecursionSSC($num--);
        }
        return [$_currTerm, $_currSSC, $_currDate];
    }



    //取得当前是第几期
    private function _getCurrPeriod($_peroid, $_currTime){
        //最前10分钟
        $_s_time = date("Y-m-d ") . $this->_ssc_times[0];
        $_e_time = date("Y-m-d ") . $this->_ssc_times[1];
        if ($_currTime >= strtotime($_s_time) && $_currTime < strtotime($_e_time))
            return 0;
        //最后5分钟
        if ($_currTime >= strtotime(date("Y-m-d ") . $this->_ssc_times[count($this->_ssc_times) - 1]))
            return 120;
        //其它时间段内
        for ($p = ($_peroid == -1 ? 0 : $_peroid); $p < count($this->_ssc_times); $p++){
            $_s_time = date("Y-m-d ") . $this->_ssc_times[$p];
            $_e_time = date("Y-m-d ") . $this->_ssc_times[$p + 1];
            if ($_currTime >= strtotime($_s_time) && $_currTime < strtotime($_e_time))
                return $p;
        }
    }

    //判断当前开奖状态
    private function _ssc_status($_currTime){
        $_old_period    = $this->_curr_period;
        $this->_curr_period = $this->_getCurrPeriod($this->_curr_period, $_currTime);
        if ($_old_period != $this->_curr_period && $_old_period != -1 && $this->_curr_period != 0){
            $this->_buyStatus   = 3;
            $_currSSC   = $this->_getCSSInMins($_currTime);
            $str    = date("Y-m-d H:i:s") . "\t开奖:" . $_old_period . "\t" . $_currSSC[0] . "\t{$_currSSC[1]}\t$_currSSC[2]" . "\n";
            $this->log($str);
        }
        else{
//            $_s_time = date("Y-m-d ") . $this->_ssc_times[$_old_period];
            $_e_time = date("Y-m-d ") . $this->_ssc_times[$_old_period + 1];
            if ($_currTime + 30 > strtotime($_e_time) && $this->_buyStatus == 1){
                $this->_buyStatus   = 2;
                $str    = date("Y-m-d H:i:s") . "\t开奖中， 不能购买了:" . $this->_curr_period . "\n";
                $this->log($str);
            }
            elseif($this->_buyStatus == 3 || $_old_period == -1){
                $this->_buyStatus   = 1;
                $str    = date("Y-m-d H:i:s") . "\t 可以购买了:" . $this->_curr_period . "\n";
                $this->log($str);
            }
        }


    }
    public function run(){
        $_currTime = time();
        //自动匹配相应定单
        $this->_matchOrders($_currTime);
        //判断是否可以开奖
        $this->_ssc_status($_currTime);
    }



    public function _dealBJSSC($_arrData){
        if ($_arrData){
            $_arrData   = json_decode($_arrData, true);
            if ($_arrData && count($_arrData) > 0){
                $term = date("Ymd") . "%03d";
                $term   = sprintf($term, count($_arrData));
                $ssc    = $_arrData[0]['drawNo'];
                $date   = date("Y-m-d H:i:s", $_arrData[0]['createTime'] / 1000);
                return array($term, $ssc, $date);
            }
        }
        return array(false, false, false);
    }
    public function _dealSSC($_arrData){
        if ($_arrData && count($_arrData) > 0) {
            $term = $_arrData[0][0];
            $ssc = $_arrData[0][1];
            $date = date("Y-m-d H:i:s");
            return array($term, $ssc, $date);
        }
        return array(false, false, false);
    }


    private function _getBjSSC(){
        $url = sprintf($this->BJSSC_URL, urlencode(date("Y-m-d")));
        $str    = $url . "\n";
        $this->log($str);
        $strJson = $this->_getHtml($url);
        if (!$strJson)
            return false;

        $arrSsc = json_decode($strJson, true);
        if (!$arrSsc || $arrSsc['code'] != 0)
            return false;
        return $arrSsc['data'];
    }
    //根据页面内容，取得最后一期内容
    private function _getSSC(){
        $html = $this->_getHtml($this->SSC_URL);
        if (!$html)
            return false;
        $arrSsc = array();
        //取得openlist
        $str = '/<div id="openlist">(.*?)<\/div>/mi';
        if (!$html = $this->_preg_match($html, $str)){
            return false;
        }
        $html = $html[0];
        //取得UL
        $str = "/<ul>(.*?)<\/ul>/mi";
        if (!$html = $this->_preg_match($html, $str)){
            return false;
        }
        foreach ($html as $h){
            $str = " /<li .*?>(.*?)<\/li>/mi";
            if ($arr = $this->_preg_match($h, $str)){
                $arrSsc[] = $arr;
            }
        }
        return $arrSsc;
    }
    private function _preg_match($html, $pattern){
        if (preg_match_all($pattern, $html, $matches)){
            if ($matches && count($matches) >=2){
                return $matches[1];
            }
        }
        return false;
    }
    //取得页面内容
    private function _getHtml($url){
        $result = '';
        $res = $this->requestUrlByGet($url,$result,30);
        if($res===false){
            $res = $this->requestUrlByGet($url,$result, 30);
        }
        if($res===false || !$result) {
            return false;
        }
        return $result;
    }

    public function requestUrlByGet($url, &$re, $timeout=30, $retry=1) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $re = curl_exec($ch);
//        var_dump($re);
        if ( $re) {
            return true;
        }
        else{
            return false;
        }
    }
    private function _sendMsg($arr){
        $str = json_encode($arr);
        if (!$this->_websocket_client) {
            $this->_websocket_client = new WebSocketClient($this->_websocket_server_config['host'], $this->_websocket_server_config['port']);
            $this->_websocket_client->connect();
            var_dump($this->_websocket_client);
        }
        $this->_websocket_client->send($str);
    }

    /***
     * 匹配定单
     */
    public function _matchOrders($_currTime){
        list($arrOrders_0, $arrOrders_1)    = $this->_getArrOrders();
        foreach ($arrOrders_0 as $oid => $order){
            foreach ($arrOrders_1 as $inId => $inOrder){
                if ($order['goods_id'] == $inOrder['goods_id'] && $order['num'] == $inOrder['num']){
                    $arrOrders_0[$oid]['target_id']   = $inId;
                    unset($arrOrders_1[$inId]);
                    continue;
                }
                elseif($inOrder['num'] > $order['num']){
                    unset($arrOrders_1[$inId]);
                }
            }
        }
        //保存已匹配的Orders
        foreach ($arrOrders_0 as $oid => $order){
            if (isset($order['target_id']) && $order['target_id']){
                $str = date('Y-m-d H:i:s', $_currTime) . "\t". "INFO:自动匹配定单成功" . "\t" .  $oid .  "\t" . $order['target_id'] .  "\t" . "\n";
                $this->log($str);
                $this->storage->updateOrderPlayWith($oid, $order['target_id'], $_currTime);
            }
        }
    }

    /***
     * 取得定单数组
     */
    private function _getArrOrders(){
        $_orderSelect = $this->storage->getOrderSelect('*');
        $_orders = $_orderSelect->where(['sscstatus' => 0, 'status' => 1, 'playwithid' => 0, 'automatch' => 1])->order('num desc, id desc')->fetchAll();
        $arrOrders_0 = $arrOrders_1 = [];
        foreach ($_orders as $order){
            $id = $order['id'];
            $goods_id = $order['goods_id'];
            $num = $order['num'];
            if ($order['buytype'] == 1){
                $arrOrders_1[$id]   = [
                    'goods_id'  => $goods_id,
                    'num'      => $num
                ];
            }else{
                $arrOrders_0[$id]   = [
                    'goods_id'  => $goods_id,
                    'num'      => $num
                ];
            }
        }
        return [$arrOrders_0, $arrOrders_1];
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



