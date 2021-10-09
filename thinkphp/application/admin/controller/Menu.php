<?php


namespace app\admin\controller;

use app\common\controller\Common;
use app\admin\model\Menu as M;
use think\Db;

class Menu extends Common
{
    /**
     *菜单列表页面
     */
    public function menuIndex()
    {
        //返回页面数据
        if ($this->request->isAjax()) {
            $M = new M();
            return $M->getMenuList($this->param);
        }

        echo $this->fetch();
    }

    /**
     *返回树形结构菜单列表
     */
    public function menuTreeList()
    {
        //获取菜单数组
        $M = new M();
        $menuList = $M->getMenuList($this->param);

        //转化树结构
        $tree = new \Tree();
        $menuTreeList = $tree->treeList($menuList['data']);

        return $menuTreeList;
    }

    /**
     *删除菜单
     * @param jw_menu id
     */
    public function menuDel()
    {
        $M = new M();
        //判断
        if (!$this->param['id']) {
            return resultArray(['error' => 'id不能为空']);
        } else {
            $find = $M->where('id', $this->param['id'])->find();
            if ($find['pid']) {
                $where['pid'] = $find['pid'];
            }
        }
        $where['id'] = $this->param['id'];

        $result = $M->where($where)->delete();

        if ($result > 0) {
            return resultArray(['data' => '操作成功']);
        }
        return resultArray(['error' => '操作失败']);
    }

    /**
     *编辑菜单
     * @param jw_menu id
     */
    public function menuEdit()
    {
        $M = new M();
        //判断
        if (!$this->param['id']) {
            return resultArray(['error' => 'id不能为空']);
        }
        if (!$this->param['name']) {
            return resultArray(['error' => '菜单名字不能为空']);
        }

        //执行修改
        $menuUpdateData = $this->param;
        $result = $M->allowField(true)->save($menuUpdateData, ["id" => $this->param['id']]);

        if ($result >= 0) {
            return resultArray(['data' => '操作成功']);
        }
        return resultArray(['error' => '操作失败']);
    }

    /**
     *新增菜单
     * @param jw_menu name,url,roleId(ALL STRING)
     */
    public function menuAdd()
    {
        $M = new M();
        //判断
        if (!$this->param['name']) {
            return resultArray(['error' => '请填写菜单名称']);
        }

        //获取插入参数
        $menuInsertData = $this->param;
        $menuInsertData['roleId'] = ',1,' . $this->param['roleId'] . ',';

        $result = $M->allowField(true)->save($menuInsertData);

        if ($result > 0) {
            return resultArray(['data' => '操作成功']);
        }
        return resultArray(['error' => '操作失败']);

    }
}