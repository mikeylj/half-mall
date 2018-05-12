<?php
define('DEBUG', 'on');
define('WEBPATH', __DIR__.'/webroot');
define('ROOT_PATH', __DIR__);

/**
 * /vendor/autoload.php是Composer工具生成的
 * shell: composer update
 */
require __DIR__.'/vendor/autoload.php';
/**
 * Swoole框架自动载入器初始化
 */
Swoole\Loader::vendorInit();

/**
 * 注册命名空间到自动载入器中
 */
Swoole\Loader::addNameSpace('WebIM', __DIR__.'/src/');
Swoole::getInstance()->config->setPath(__DIR__.'/configs');

//设置PID文件的存储路径
Swoole\Network\Server::setPidFile(__DIR__ . '/log/ac_server.pid');


//$config = Swoole::getInstance()->config['webim'];
//$store_server_ssc   = new WebIM\ServerSSC($config);
////3000ms后执行此函数
//swoole_timer_tick(3000, array($store_server_ssc, "run"));

/**
 * 显示Usage界面
 * php app_server.php start|stop|reload
 */
Swoole\Network\Server::start(function ()
{

//    $webim = Server($config);
//    $webim->loadSetting(__DIR__ . "/swoole.ini"); //加载配置文件

    $config = Swoole::getInstance()->config['ssc'];
    $ac   = new WebIM\ServerACToken($config);
    //3000ms后执行此函数
    swoole_timer_tick(5000, array($ac, "run"));

    /**
     * webim必须使用swoole扩展
     */
//    $server = new Swoole\Network\Server($config['server']['host'], $config['server']['port']);
//    $server->setProcessName('webim-server');
//    $server->setProtocol($webim);
//    $server->run($config['swoole']);
});
