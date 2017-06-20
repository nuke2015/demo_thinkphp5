<?php
namespace didiyuesao\api;

error_reporting(2047);

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__) . '/');
}

// tp模板校验
if (!defined('THINK_PATH')) {
    define('THINK_PATH', '/tmp');
}

if (!defined('MODULE_NAME')) {
    define('MODULE_NAME', 'ExampleFeng');
}

if (!defined('APP_PATH')) {
    define('APP_PATH', __DIR__ . '/');
}

// 环境常量
if (!defined('IS_CLI')) {
    define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
}

if (!defined('IS_WIN')) {
    define('IS_WIN', strpos(PHP_OS, 'WIN') !== false);
}

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('RUNTIME_PATH')) {
    define('RUNTIME_PATH', ROOT_PATH . '/runtime/');
}

if (!defined('LOG_PATH')) {
    define('LOG_PATH', RUNTIME_PATH . '/log/');
}

if (!defined('CACHE_PATH')) {
    define('CACHE_PATH', RUNTIME_PATH . '/cache/');
}

if (!defined('TEMP_PATH')) {
    define('TEMP_PATH', RUNTIME_PATH . '/temp/');
}

$config = [
    // 关闭调试模式
    'app_debug'      => 1,
    // 显示错误信息
    'show_error_msg' => 1,

    // 系统日志
    'log'            => [
        // 日志记录方式，内置 file socket 支持扩展
        'type'  => 'File',
        // 日志保存目录
        'path'  => LOG_PATH,
        // 日志记录级别
        'level' => ['sql', 'error', 'debug'],
    ],

    // 默认缓存
    'cache'          => [
        'type'   => 'File',
        'path'   => CACHE_PATH . '/' . MODULE_NAME . '/',
        'prefix' => '',
        'expire' => 0,
    ],

    // 单机文件式缓存
    'MyCacheCount'   => [
        'type'   => 'File',
        'path'   => CACHE_PATH . '/count/',
        'prefix' => '',
        'expire' => 0,
    ],

    // Redis缓存
    'MyCacheRedis'   => [
        'REDIS_HOST' => '127.0.0.1',
        'REDIS_PORT' => '6379',
        'REDIS_PWD'  => '123456',
    ],

    'database'       => [
        // 数据库类型
        'type'        => 'mysql',
        // 数据库连接DSN配置
        'dsn'         => '',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'test',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => 'root',
        // 数据库连接端口
        'hostport'    => '',
        // 数据库连接参数
        'params'      => [
            // 本来应该是false,但在linux下不生效,所以,改成true保持一致.
            \PDO::ATTR_STRINGIFY_FETCHES => true,
        ],

        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'demo_',
        // 数据库调试模式
        'debug'       => 0,
        // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
        'deploy'      => 0,
        // 数据库读写是否分离 主从式有效
        'rw_separate' => false,
        // 读写分离后 主服务器数量
        'master_num'  => 1,
        // 指定从服务器序号
        'slave_no'    => '',
    ],
];

\think\Config::set($config);
