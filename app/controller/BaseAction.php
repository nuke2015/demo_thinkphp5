<?php
namespace app\controller;

// 公共控制器
class BaseAction
{
    static $view;

    public function _404($msg)
    {
        return $msg;
    }

    // 视图控制器
    protected function view()
    {
        if (!self::$view) {
            self::$view = new \think\View(['view_base' => __DIR__ . '/../view/']);
            self::$view->engine->layout(true);
        }

        return self::$view;
    }
}
