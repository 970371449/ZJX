<?php


namespace app\admin\controller;


use app\admin\model\Excel;
use app\common\controller\Common;
use app\admin\model\User as U;
use think\Db;

class User extends Common
{

    /**
     *用户列表页面
     */
    public function userIndex()
    {
        if ($this->request->isAjax()) {
            $U = new U();
            return $U->getUserList($this->param);
        }

        echo $this->fetch();
    }

    /**
     *员工信息表导出excel(暂时导出全部，不做筛选)
     */
    public function exportExcel()
    {
        $param = $this->param;
        $param['page'] = '';
        $param['limit'] = '';

        $U = new U();
        $userList = $U->getUserList($param);

        $fieldArr = ['id', 'account', 'password', 'realname', 'sex', 'birthday', 'identity', 'entryTime', 'departmentId', 'quit', 'quitDate'];
        $fieldTitleArr = ['序号', '账号', '密码', '姓名', '性别', '生日', '身份证', '入职时间', '部门', '是否离职', '离职时间'];

        $excelTool = new Excel();
        $excelTool->exportExcel($userList, $fieldArr, $fieldTitleArr, '员工信息表', '员工信息表');
    }

    /**
     *用户编辑
     */
    public function userEdit()
    {
        //判断
        if (!$this->param['id']) {
            return resultArray(['error' => 'id参数不能为空']);
        }

        $param = $this->param;

        //参数
        $updateData['account'] = $param['account'];
        $updateData['password'] = $param['password'];
        $updateData['realname'] = $param['realname'];
        $where['id'] = $param['id'];

        $U = new U();
        $result = $U->allowField('account,password,realname')->save($updateData, $where);

        if ($result) {
            return resultArray(['data' => '操作成功']);
        }
        return resultArray(['error' => '操作失败']);
    }

    /**
     *用户删除
     */
    public function userDel()
    {
        //判断
        if (!$this->param['id']) {
            return resultArray(['error' => 'id参数不能为空']);
        }

        $param = $this->param;

        $U = new U();
        $result = $U->where('id', $param['id'])->delete();

        if ($result) {
            return resultArray(['data' => '操作成功']);
        }
        return resultArray(['error' => '操作失败']);
    }
}