<?php
namespace WebIM;

class Storage
{
    /**
     * @var \redis
     */
    protected $redis;

    const PREFIX = 'webim';

    function __construct($config)
    {
        $this->redis = \Swoole::getInstance()->redis;
        $this->redis->delete(self::PREFIX.':online');
        $this->config = $config;
    }

    function login($client_id, $info)
    {
        $this->redis->set(self::PREFIX . ':client:' . $client_id, json_encode($info));
        $this->redis->sAdd(self::PREFIX . ':online', $client_id);
    }

    function logout($client_id)
    {
        $this->redis->del(self::PREFIX.':client:'.$client_id);
        $this->redis->sRemove(self::PREFIX.':online', $client_id);
    }

    /**
     * 用户在线用户列表
     * @return array
     */
    function getOnlineUsers()
    {
        return $this->redis->sMembers(self::PREFIX . ':online');
    }

    /**
     * 批量获取用户信息
     * @param $users
     * @return array
     */
    function getUsers($users)
    {
        $keys = array();
        $ret = array();

        foreach ($users as $v)
        {
            $keys[] = self::PREFIX . ':client:' . $v;
        }

        $info = $this->redis->mget($keys);
        foreach ($info as $v)
        {
            $ret[] = json_decode($v, true);
        }

        return $ret;
    }

    /**
     * 获取单个用户信息
     * @param $userid
     * @return bool|mixed
     */
    function getUser($userid)
    {
        $ret = $this->redis->get(self::PREFIX . ':client:' . $userid);
        $info = json_decode($ret, true);

        return $info;
    }

    function exists($userid)
    {
        return $this->redis->exists(self::PREFIX . ':client:' . $userid);
    }

    function addHistory($userid, $msg)
    {
        $info = $this->getUser($userid);

        $log['user'] = $info;
        $log['msg'] = $msg;
        $log['time'] = time();
        $log['type'] = empty($msg['type']) ? '' : $msg['type'];

        table(self::PREFIX.'_history')->put(array(
            'name' => $info['name'],
            'avatar' => $info['avatar'],
            'msg' => json_encode($msg),
            'type' => empty($msg['type']) ? '' : $msg['type'],
        ));
    }

    function getHistory($offset = 0, $num = 100)
    {
        $data = array();
        $list = table(self::PREFIX.'_history')->gets(array('limit' => $num,));
        foreach ($list as $li)
        {
            $result['type'] = $li['type'];
            $result['user'] = array('name' => $li['name'], 'avatar' => $li['avatar']);
            $result['time'] = strtotime($li['addtime']);
            $result['msg'] = json_decode($li['msg'], true);
            $data[] = $result;
        }

        return array_reverse($data);
    }
    //写入Redis
    function writeRedis($key, $value){
        if (is_array($value))
            $this->redis->set(self::PREFIX . $key, json_encode($value));
        else
            $this->redis->set(self::PREFIX . $key, $value);
    }
    //从Redis取得内容
    function getRedis($key, $bArr = false){
        $value = $this->redis->get(self::PREFIX . $key);
        if ($bArr)
            return json_decode($value, true);
        else
            return $value;
    }
    //时时彩入库
    function addSSC($periods, $value, $time){
        $_arr   = array(
            'periods' => $periods,
            'value' => $value,
            'time' => $time
        );
        table(self::PREFIX.'_ssc')->put($_arr);

        $this->redis->hSet(self::PREFIX . ':CQSSC', $periods, json_encode($_arr));
    }
    //取得一页时时彩
    function getSSC($page = 1, $pagesize = 20){
        $pager  = null;
        $list = table(self::PREFIX.'_ssc')->gets(array('page'  => $page, 'pagesize' => $pagesize), $pager);
        return [$list, $pager];
    }
    //取得产品列表
    function getGoodsList($status=1){
        $list = table(self::PREFIX.'_goods')->gets(array('status' => $status, 'order' => 'orderby asc'));
        return $list;
    }
    //取得产品
    function getGoods($id){
        $list = table(self::PREFIX.'_goods')->gets(array('status' => 1, 'id' => $id));
        return $list;
    }
    function getGoodsListByIds($ids){
        $list = table(self::PREFIX.'_goods')->gets(array('status' => 1, 'id' => $ids));
        return $list;
    }


    //保存定单
    function addOrder($user_id, $goods_id, $amount, $num, $payway, $sscperiods, $buytype){
        $id     =  table(self::PREFIX.'_orders')->put(array(
            'userid' => $user_id,
            'goods_id' => $goods_id,
            'amount' => $amount,
            'num' => $num,
            'payway'    => $payway,
            'status'    => 0,
            'sscstatus' => 0,
            'sscperiods'    => $sscperiods,
            'buytype'       => $buytype,
        ));

//        error_log( "1111111\n", 3, "/tmp/ssc.log");
        return $id;
    }
    //增加用户
    function addSSCUser($openid, $username, $pic){
        $userid = table(self::PREFIX.'_users')->put(array(
            'openid' => $openid,
            'name' => $username,
            'pic' => $pic
        ));
        return $userid;
    }
    //取得用户
    function getSSCUser($openid){
        $list = table(self::PREFIX.'_users')->gets(array('openid' => $openid));
        return $list;
    }
    //取得定单信息
    function getOrders($userid, $page = 1, $pagesize = 20, $orderby){
        $pager  = null;
        $list = table(self::PREFIX.'_orders')->gets(array('userid'  => $userid, 'page'  => $page, 'pagesize' => $pagesize, 'order' => $orderby), $pager);
        return [$list, $pager];
    }

    function getGoodsSelect($fields = '*'){
        return table(self::PREFIX.'_goods')->select($fields);
    }
    function getUserSelect($fields = '*'){
        return table(self::PREFIX.'_users')->select($fields);
    }
}