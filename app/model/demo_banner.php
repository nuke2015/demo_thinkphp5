<?php
namespace app\model;

class demo_banner extends BaseModel
{
    protected $table = 'demo_banner';

    public function get_list($where, $count = 5)
    {
        $data = $this->where($where)->limit(0, $count)->order('id DESC')->select();
        return $data;
    }
}
