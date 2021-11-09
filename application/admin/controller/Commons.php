<?php
/**
 *2021-08-20    zjc
 *公用方法文件
 */

namespace app\admin\controller;

use app\admin\model\Menu as M;
use app\admin\model\User as U;
use app\common\controller\Common;

class Commons extends Common
{
    /**
     *返回在职员工列表
     */
    public function userAtWork()
    {
        $U = new U();

        //筛选参数
        $userWhere['quit'] = 0;
        $userWhere['account'] = ['<>','admin'];

        $userList = $U->where($userWhere)->select();

        return $userList;
    }

    /**
     *返回权限菜单
     */
    public function menuList()
    {
        $M = new M();

        //筛选参数
        $menuWhere['useStatus'] = 0;//0是在用 1是停用
        $menuWhere['type'] = 0;//0是菜单 1是按钮

        $menu = $M->where($menuWhere)->select();

        //返回树形列表
        $tree = new \Tree();
        $menuList = $tree->treeList($menu);

        return $menuList;
    }
}