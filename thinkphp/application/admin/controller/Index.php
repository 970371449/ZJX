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
        if($this->request->isAjax()){
            $c = new \SaeTClientV2(WB_AKEY,WB_SKEY,session('access_token'));
            $ms = $c->home_timeline();

            return json($ms);
        }
        echo $this->fetch();
    }
}