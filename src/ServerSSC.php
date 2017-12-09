<?php
/**
 * Created by PhpStorm.
 * User: lijun30
 * Date: 2017/11/25
 * Time: 下午4:36
 */
namespace WebIM;

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













    private $SSC_START;
    private $SSC_PERIOD_1;
    private $SSC_PERIOD_2;
    private $SSC_PERIOD_DURATION_1    = 600;
    private $SSC_PERIOD_DURATION_2    = 300;

    private $redis_client;
    private $redis_connected    = false;

    private $_openTime          = 0;

    public function __construct($config = array())
    {
        $this->_ssc_times   = $config['ssc']['times'];
        $this->storage = new Storage($config['ssc']['storage']);




//        $this->SSC_START    = '10:00:00';
//        $this->SSC_PERIOD_1 = array(
//            'start' => '10:01:00',
//            'end'   => '22:01:00',
//        );
//        $this->SSC_PERIOD_2 = array(
//            'start' => '22:01:00',
//            'end'   => '24:00:00',
//        );
//        $this->SSC_PERIOD_3 = array(
//            'start' => '00:01:00',
//            'end'   => '02:01:00',
//        );
//        $this->SSC_PERIOD_4 = array(
//            'start' => '02:01:00',
//            'end'   => '10:01:00',
//        );
//        $this->redis_client =  new \Redis();
//        $conf   = array(
//            '127.0.0.1',
//            6379
//        );
//        try {
//            $res = $this->redis_client->connect($conf[0], $conf[1], 3);
//            $this->redis_connected  = true;
//        } catch (RedisException $e) {
//            // 失败重试
//            try {
//                $res = $this->redis_client->connect($conf[0], $conf[1], 3);
//                $this->redis_connected  = true;
//            } catch (RedisException $e) {
//                return false;
//            }
//        }
//
//        $this->_websocket_server_config = array(
//            'host'  => '127.0.0.1',
//            'port'  => 9501
//        );





//        $this->redis_client->connect('127.0.0.1', 6379, function (swoole_redis $redis, $result) {
//            if ($result === false) {
//                echo "connect to redis server failed.\n";
//                $this->redis_connected    = false;
//            }
//            else{
//                $this->redis_connected    = true;
//            }
//        });
    }

    /****
     * 开奖
     */
    public function _openSSC(){

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
    //开奖
    function _getCSSInMins($_currTime){
        if ($this->_ssc_type == 'bj'){
            $_arrSsc    = $this->_getBjSSC();
            list($_currTerm, $_currSSC, $_currDate)  = $this->_dealBJSSC($_arrSsc);
        }
        else
        {
            $_arrSsc =$this->_getSSC();
            list($_currTerm, $_currSSC, $_currDate)  = $this->_dealSSC($_arrSsc);
        }
        if ($_currTerm === false || !$_currTerm){
            $str = date('Y-m-d H:i:s', $_currTime) . "\t". "ERROR:未取得SSC" . "\t" . $_currTerm . "\t" . $_currSSC . "\t" . $_currDate .  "\n";
            error_log($str, 3, "log/ssc.log");
            return false;
        }
        //存入数据库及Redis
        $this->storage->addSSC($_currTerm, $_currSSC, $_currDate);
        //将本次Period和下一次开奖时间存入MC
        $this->storage->writeRedis('CURRENT_PERIOD', $this->_curr_period);
        $this->storage->writeRedis('NEXT_OPEN_TIME', date("Y-m-d ") . $this->_ssc_times[$this->_curr_period + 1]);

        return [$_currTerm, $_currSSC, $_currDate];
//        $str = date('Y-m-d H:i:s', $_currTime) . "\t". "ERROR:未取得最新SSC" . "\t" . $_currTerm . "\t" . $_currSSC . "\t" . $_currDate .  "\n";
//        error_log($str, 3, "log/ssc.log");
//        return false;
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
            while ($_currSSC === false){
                sleep(5);
                $_currSSC   = $this->_getCSSInMins($_currTime);
            }
            $str    = date("Y-m-d H:i:s") . "\t开奖:" . $_old_period . "\t" . $_currSSC[0] . "\t{$_currSSC[1]}\t$_currSSC[2]" . "\n";
            echo $str;
        }
        else{
//            $_s_time = date("Y-m-d ") . $this->_ssc_times[$_old_period];
            $_e_time = date("Y-m-d ") . $this->_ssc_times[$_old_period + 1];
            if ($_currTime + 30 > strtotime($_e_time) && $this->_buyStatus == 1){
                $this->_buyStatus   = 2;
                $str    = date("Y-m-d H:i:s") . "\t开奖中， 不能购买了:" . $this->_curr_period . "\n";
                echo $str;
            }
            elseif($this->_buyStatus == 3 || $_old_period == -1){
                $this->_buyStatus   = 1;
                $str    = date("Y-m-d H:i:s") . "\t 可以购买了:" . $this->_curr_period . "\n";
                echo $str;
            }
        }


    }
    public function run(){
        $_currTime = time();
//        $this->_curr_period = $this->_getCurrPeriod($this->_curr_period, $_currTime);
        $this->_ssc_status($_currTime);


//        $str    = date("Y-m-d H:i:s") . "\t当前为:" . $this->_curr_period  . "\n";
//        echo $str;



//        $start = date("Y-m-d H:i:s") ;
//        error_log($start. "\n", 3, "log/ssc.log");
//        //取得当前时间段
//        $curPeriod  = $this->_getCurPeriod();
//        //如果为1 则10分钟开奖一次
//        switch ($curPeriod) {
//            case 1:
//                $this->_chkSSCStatus(10);
//                $this->_getCSSInMins(10);
//                break;
//            case 2:
//                $this->_chkSSCStatus(5);
//                $this->_getCSSInMins(5);
//                break;
//            case 3:
//                $this->_chkSSCStatus(5);
//                $this->_getCSSInMins(5);
//                break;
//            case 4:
//                break;
//        }
//        $end = date("Y-m-d H:i:s") ;
//        error_log($start . "\t" . $end . "\t"  . $curPeriod . "\n", 3, "log/ssc.log");


//        $sec = date("s");
//        if ($sec != 1)
//            return ;
//        if ($this->_ssc_type == 'bj'){
//            $_arrSsc    = $this->_getBjSSC();
//            list($_currTerm, $_currSSC, $_currDate)  = $this->_dealBJSSC($_arrSsc);
//        }
//        else
//        {
//            $_arrSsc =$this->_getSSC();
//            list($_currTerm, $_currSSC, $_currDate)  = $this->_dealSSC($_arrSsc);
//        }
//        if ($_currTerm === false || !$_currTerm){
//            $str = date('Y-m-d H:i:s', time()) . "\t". "ERROR:未取得SSC" . "\t" . $_currTerm . "\t" . $_currSSC . "\t" . $_currDate .  "\n";
//            error_log($str, 3, "log/ssc.log");
//            return false;
//        }
//        $this->_chkSSCStatus();
//        if (!$this->redis_client->hExists("CQSSC", $_currTerm))
//        {
//            $arr = array(
//                'term'  => $_currTerm,
//                'ssc'   => $_currSSC,
//                'time'  => date("Y-m-d H:i:s", time())
//            );
//            $this->redis_client->hSet("CQSSC", $_currTerm, json_encode($arr));
//            //保存数据库
//            $this->storage->addSSC($_currTerm, $_currSSC, $_currDate);
//
//            $str = date('Y-m-d H:i:s', time()) . "\t". "开奖" . "\t" . $_currTerm . "\t" . $_currSSC . "\n";
//            error_log($str, 3, "log/ssc.log");
//            echo $str;
//
//            $msg = array();
//            $msg['cmd']= 'message';
//            $msg['from'] = 0;
//            $msg['channal'] = 0;
//            $msg['data'] = $str;
//            $msg['type'] = "text";
//            $msg['status'] = 2;
//            $this->_sendMsg($msg);
//        }

//        $str = date('Y-m-d H:i:s', time()) . "\t" . $_currTerm . "\t" .  . "\t" .  . "\n";



//        var_dump(time() , strtotime(date('Y-m-d ') . $this->SSC_PERIOD_1['start']));
//        var_dump((time() - strtotime(date('Y-m-d ') . $this->SSC_PERIOD_1['start'])));
//
        //取得当前期数
        $_currTerm = '';
//        $curPeriod  = $this->_getCurPeriod();
//        if ($curPeriod == 1){
//            $dura = (time() - strtotime(date('Y-m-d ') . $this->SSC_PERIOD_1['start'])) / $this->SSC_PERIOD_DURATION_1 + 24;
//            $_currTerm  = date("ymd", time()) . sprintf("%03d", $dura);
//        }
//        elseif($curPeriod == 2){
//
//        }

//        if ($this->_getCurPeriod() == 3){
//            $_currTerm  = date('ymd120', strtotime("-1 day"));
//            error_log("1" . "\n", 3, "log/scc.log");
//        }elseif($this->_getCurPeriod() == 1){
//            $dura = (time() - strtotime(date('Y-m-d ') . $this->SSC_PERIOD_1['start'])) / $this->SSC_PERIOD_DURATION_1 + 1;
//            $_currTerm  = date("ymd", time()) . sprintf("%03d", $dura);
//            error_log("2" . "\n", 3, "log/scc.log");
//
//        }
//        elseif($this->_getCurPeriod() == 2){
//            if (time() > $this->SSC_PERIOD_2['start']){
//                $dura   = (time() -  strtotime(date('Y-m-d ') . $this->SSC_PERIOD_2['start'])) / $this->SSC_PERIOD_DURATION_2;
//                $dura   = 72 + $dura;
//                $_currTerm  = date("ymd", time()) . sprintf("%03d", $dura);
//                error_log("3" . "\n", 3, "log/scc.log");
//
//            }
//        }
////        var_dump($_currTerm);
//        $arrSsc =$this->_getSSC();
//        $str = date('Y-m-d H:i:s', time()) . "\t" . $_currTerm . "\t" . $arrSsc[0][0] . "\t" . $arrSsc[0][1] . "\n";
//        error_log($str, 3, "log/scc.log");
    }

    private function _getBjSSC(){
        $url = sprintf($this->BJSSC_URL, urlencode(date("Y-m-d")));
        echo $url . "\n";
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

    //取得当前时间为第几期
    private function _getCurPeriod(){
        if (strtotime(date("Y-m-d ") . $this->SSC_PERIOD_1['start']) <= time() && strtotime(date("Y-m-d ") . $this->SSC_PERIOD_1['end']) >= time()){
            return 1;
        }elseif(strtotime(date("Y-m-d ") . $this->SSC_PERIOD_2['start']) <= time()){
            return 2;
        }elseif(strtotime(date("Y-m-d ") . $this->SSC_PERIOD_3['end']) >=time()){
            return 3;
        }
        elseif(strtotime(date("Y-m-d ") . $this->SSC_PERIOD_4['start']) <= time() && strtotime(date("Y-m-d ") . $this->SSC_PERIOD_4['end']) >= time()){
            return 4;
        }
        else{
            return -1;
        }
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
}

