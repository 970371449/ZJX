<?php
/**
 *Created By Jc
 *2021/08/11
 */

namespace app\admin\model;


use think\Model;

class User extends Model
{
    /**
     *登录跳转验证
     *set session
     *return num
     */
    public function loginJump($param)
    {
        //获取数据库账户信息
        $userInfo = $this->find();

        //判断是否存在该账号
        if ($param['account'] == $userInfo['account']) {//判断账户
            if ($param['password'] == $userInfo['password']) {//判断密码
                //设置session
                session("user", $userInfo);
                return 3;//信息正确
            }
            return 2;//密码错误
        }
        return 1;//用户不存在

    }

    /**
     *返回用户列表数据
     */
    public function getUserList($param)
    {
        //判断是否需要全部数据
        if ($param['page'] && $param['limit']) {
            $dataCount = $this->limit(($param['page'] - 1) * $param['limit'], $param['limit'])->count('id');
            $data = $this->limit(($param['page'] - 1) * $param['limit'], $param['limit'])->select();
            $sql = $this->getLastSql();

            return parseData($data, $dataCount, $sql);
        }else{
            $data = $this->select();

            return $data;
        }

    }

}