<?php


namespace app\admin\model;


use think\Model;

class Menu extends Model
{
    public function getMenuList($param){

        $dataCount = $this->count();

        $data = $this->select();

        $sql = $this->getLastSql();

        return parseData($data,$dataCount,$sql);

    }
}