<?php


namespace app\admin\controller;


use app\admin\model\User as U;
use app\common\controller\Common;

class Login extends Common
{
    /**
     * 登录界面
     */
    public function loginIndex()
    {
        echo $this->fetch();
    }

    /**
     * 登录跳转验证
     * @param account账号
     * @param password密码
     */
    public function loginJump(){
        //判断账号，密码是否为空
        if (!$this->param['account']) {
            $this->error('账号不能为空',1);
        }
        if (!$this->param['password']) {
            $this->error('密码不能为空',1);
        }

        //执行查询
        $U = new U();
        $flag = $U->loginJump($this->param);

        //根据返回数判断
        if($flag == 3){
            $this->redirect('Index/index');
        }else if($flag == 2){
            $this->error('密码错误',1);
        }else if($flag == 1){
            $this->error('不存在该用户',1);
        }
    }

    /**
     *退出登录
     */
    public function loginExit(){
        //清除session
        session('user',null);

        //跳转到登录界面
        $this->redirect(BASE_PATH);
    }
}
