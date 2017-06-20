<?php
namespace app\controller;

// 模板演示
// http://127.0.0.7/public/index.php?m=ArticleIndex
class ArticleIndexAction extends BaseAction
{
    public function index()
    {
        $view = self::view();
        $view->assign('title', 'MyArticle');
        return $view->fetch('article/index');
    }
}
