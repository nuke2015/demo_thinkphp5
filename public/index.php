<?php
namespace didiyuesao\api;

define('ROOT_PATH', dirname(__DIR__) . '/');
define('MODULE_NAME', 'api');
define('RUNTIME_PATH', '/home/ddys_run/');

//跨域html5调用
@header('Content-type:text/html;charset=utf-8');
@header('Server:jjys168.com');
@header('X-Powered-By:jjys168.com');

// 引导
require_once ROOT_PATH . '/app/bootstrap.php';

// 配置
require_once ROOT_PATH . '/app/config.php';

// 路由
$return = \app\controller\Index::listen();
echo $return;
exit;

// demo
// http://127.0.0.7/public/
// http://127.0.0.7/public/index.php?m=Hello
// 127.0.0.7/public/index.php?m=ModelTest
// http://127.0.0.7/public/index.php?m=ArticleIndex
