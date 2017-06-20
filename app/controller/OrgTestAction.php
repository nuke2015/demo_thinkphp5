<?php
namespace app\controller;

use app\org;

// 组件测试
class OrgTestAction extends BaseAction
{
    public function index()
    {
        $data = org\helper::hello('fengfeng!');
        return $data;
    }
}
