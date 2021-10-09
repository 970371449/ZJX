<?php


namespace app\admin\controller;


use app\admin\model\User as U;
use app\common\controller\Common;
use think\Db;
use think\Request;

class Index extends Common
{
    /**
     *管理页面
     */
    public function Index()
    {
        echo $this->fetch();
    }

}