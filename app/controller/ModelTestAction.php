<?php
namespace app\controller;

use app\model;

// 组件测试
class ModelTestAction extends BaseAction
{
    public function index()
    {
        $where           = array();
        $where['status'] = 1;
        $demo_banner     = new model\demo_banner();
        $data            = $demo_banner->get_list($where, 10);
        return var_dump($data);
    }
}
