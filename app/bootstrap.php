<?php
// 先composer云框架
require_once ROOT_PATH . '/vendor/autoload.php';

// 框架加载,不使用composer私仓是因为,私仓用的是软链,上线非常麻烦
$loader = new \Composer\Autoload\ClassLoader();
$loader->setPsr4('app\\org\\', ROOT_PATH . '/app/org/');
$loader->setPsr4('app\\model\\', ROOT_PATH . '/app/model/');
$loader->setPsr4('app\\controller\\', ROOT_PATH . '/app/controller/');
$loader->register(true);
