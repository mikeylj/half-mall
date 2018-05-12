# half-mall

1、启动Server
php store_server.php start

2、启动抓取时时进程
php store_server_ssc.php start

3、启动Nginx页面




1、进入 带openid   从数据库或Redis取得用户信息
{"cmd":"login","openid":"12345678900987654321","name":"天天_lijun","avatar":"http://www.swoole.com/static/images/default.png"}
2、请求状态
{"cmd":"getStatus"}
2、开奖
{"cmd":"message","from":1,"channal":0,"data":"uuuuuu","type":"text",status:"1"}
3、开战倒计时
{"cmd":"message","from":1,"channal":0,"data":"uuuuuu","type":"text",status:"2"}
