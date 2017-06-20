<?php
namespace app\controller;

// 路由中心
class Index extends BaseAction
{

    public static function listen()
    {
        // 路由
        if (isset($_REQUEST['m'])) {
            $methodName = strip_tags($_REQUEST['m']);
        } else {
            // 默认首页
            $methodName = 'Default';
        }

        // 加前缀;
        $methodName = ucfirst($methodName);
        $controller = "app\\controller\\{$methodName}Action";

        if (class_exists($controller)) {
            if (class_exists($controller, 'index')) {
                $controller_instance = new $controller();
                return $controller_instance->index();
            } else {
                return $this->_404('404,method not esist!');
            }
        } else {
            return $this->_404('404,controller not esixt!');
        }
    }
}
