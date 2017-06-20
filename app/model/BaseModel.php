<?php
namespace app\model;

use think;

class BaseModel
{

    protected $table;

    // 取单条
    public function find($where, $field)
    {
        return $this->table()->where($where)->field($field)->find();
    }

    // 入库增加
    public function insert($insert, $replace = true, $return_id = true)
    {
        return $this->table()->insert($insert, $replace, $return_id);
    }

    // 表名指定
    public function table($table = '')
    {
        return think\Db::table($this->table);
    }

    // 批量检索
    public function select($where, $field = '*', $limit = '0,10', $order = '')
    {
        if ($order) {
            return $this->table()->where($where)->field($field)->limit($limit)->order($order)->select();
        } else {
            return $this->table()->where($where)->field($field)->limit($limit)->select();
        }
    }

    // 直接原生查询
    public function query($sql)
    {
        return think\Db::query($sql);
    }

    // 直接原生执行
    public function execute($sql)
    {
        return think\Db::execute($sql);
    }

    // 调试,得到最后的sql语句
    public function debug()
    {
        return think\Db::getLastSql();
    }

    // 分页实现
    public function page($where, $field, $page = 1, $size = 20, $order = '')
    {
        // 避免绕过,若有特殊需要请自行分页.
        if ($size > 100) {
            $size = 100;
        }

        if ($order) {
            return $this->table()->where($where)->field($field)->page($page, $size)->order($order)->select();
        } else {
            return $this->table()->where($where)->field($field)->page($page, $size)->select();
        }
    }

    // 条数查询
    public function count($where)
    {
        return $this->table()->where($where)->count();
    }

    // 更新数据
    public function update($where, $data)
    {
        return $this->table()->where($where)->update($data);
    }

    // 条件
    public function where($where)
    {
        return $this->table()->where($where);
    }

    // 批量入库
    public function insertAll($data)
    {
        return $this->table()->insertAll($data);
    }

    // 物理删除
    public function delete($where)
    {
        return $this->table()->where($where)->delete();
    }

    //组装批量更新语句
    public function sql_update_batch($table, $pkey, $field, $data)
    {
        $sql = '';
        if ($data && count($data)) {
            $ids = implode(',', array_keys($data));
            $sql = "UPDATE {$table} SET {$field} = CASE {$pkey} ";
            foreach ($data as $id => $value) {
                $sql .= sprintf("WHEN %d THEN %d ", $id, $value);
            }
            $sql .= "END WHERE {$pkey} IN ($ids)";
        }
        return $sql;
    }

    // 取全部
    public function all($where, $field, $order = '')
    {
        if ($order) {
            return $this->table()->where($where)->field($field)->order($order)->select();
        } else {
            return $this->table()->where($where)->field($field)->select();
        }
    }

    // 随机排序
    public function sql_order_rand($table)
    {
        $sql = "(SELECT ROUND(RAND() * ((SELECT MAX(id) FROM `{$table}`)-(SELECT MIN(id) FROM `{$table}`))+(SELECT MIN(id) FROM `{$table}`)) AS id)";
        return $sql;
    }

    // 随机取数据
    public function get_data_by_rand($where, $field, $limit)
    {
        $sql_order_rand = $this->sql_order_rand($this->table);
        $data           = $this->select($where, $field, $limit, $sql_order_rand);
        return $data;
    }

    //开启事务
    public static function startTrans()
    {
        return think\Db::startTrans();
    }

    //提交事务
    public static function commit()
    {
        return think\Db::commit();
    }

    //事务回滚
    public static function rollback()
    {
        return think\Db::rollback();
    }

    //取最后id
    public static function getLastInsID()
    {
        return think\Db::getLastInsID();
    }

    // 随机取几条数据,此方法依赖id主键,慎用.
    public function get_rand_by_count($where = 1, $field = '*', $count = 1, $primary_key = 'id')
    {
        $table = $this->table;
        $sql   = "SELECT {$field} FROM `{$table}` WHERE {$primary_key} >= (SELECT floor(RAND() * (SELECT MAX({$primary_key}) FROM `{$table}`))) and {$where} ORDER BY {$primary_key} LIMIT 0,{$count}; ";
        return $this->query($sql);
    }
}
