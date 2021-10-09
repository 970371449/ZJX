<?php
//引用此页面判断是否登陆，菜单根据登陆员工的权限返回对应的菜单，具有对应的操作

namespace app\common\controller;


use app\admin\model\User as U;
use think\Controller;
use think\Request;
use think\Db;

class Common extends Controller
{
    public $param;
    public $menulist;

    public function _initialize()
    {
        //设置param对象，用于获取前端传参
        parent::_initialize();
        $request = Request::instance();
        $this->param = $request->param();

        //防止未登录直接输入url访问
        $controller = $request->controller();
//        $action = $request->action();
        if($controller != 'Login'){
            if(!session('user')['id']){
                $this->error('请登录',3,'http://hr');
            }else{
                //查询对应菜单权限
                $menu = Db::table('jw_menu')->select();
                foreach ($menu as $key => $value) {
                    $useArr = array_filter(explode(',',$value['roleId']));
                    foreach ($useArr as $item) {
                        if($item == session('user')['id']){
                            $menulist[] = array(
                                "id" => $value['id'],
                                "pid" => $value['pid'],
                                "name" => $value['name'],
                                "url" => $value['url']
                            );
                        }
                    }
                }
            }
            $tree = new \Tree();
            $this->assign('menulist',$tree->treeList($menulist));
//            $this->menulist = $tree->treeList($menulist);
        }
    }
}