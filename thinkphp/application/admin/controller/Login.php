<?php
/**
 *  created Date 2021-10-28 23:30:00
 *  author JC
 */

namespace app\admin\controller;

use app\admin\model\User as U;
use app\common\controller\Common;
use think\Session;

include_once('../extend/Microblog/Microblog.php');

class Login extends Common
{
    /**
     * 登录界面
     * return code_url
     */
    public function loginIndex()
    {
        if ($this->request->isAjax()) {
            $o = new \SaeTOAuthV2(WB_AKEY, WB_SKEY);
            $code_url = $o->getAuthorizeURL(WB_CALLBACK_URL);
            return json($code_url);
        }
        echo $this->fetch();
    }

    /**
     * 登录跳转验证
     * @param account账号
     * @param password密码
     */
    public function loginJump()
    {
        //判断是否为微博登录
        $token = '';
        if (isset($this->param['code'])) {
            $o = new \SaeTOAuthV2(WB_AKEY, WB_SKEY);
            $keys = array();
            $keys['code'] = $_REQUEST['code'];
            $keys['redirect_uri'] = WB_CALLBACK_URL;
            try {
                $token = $o->getAccessToken('code', $keys);
            } catch (OAuthException $e) {
                $this->error("登录错误" . ":" . $e->getMessage(), 3);
            }
        }

        if ($token) {
            $c = new \SaeTClientV2(WB_AKEY,WB_SKEY,$token['access_token']);
            $uid = $c->get_uid();
            $user_message = $c->show_user_by_id($uid['uid']);
            $sessionArr['id'] = $user_message['id'];
            $sessionArr['account'] = $user_message['screen_name'];
            $sessionArr['realname'] = $user_message['name'];
            $sessionArr['avatar_hd'] = $user_message['avatar_hd'];
            Session::set('user',$sessionArr);
            $this->redirect('Index/index');
        } else {
            //判断账号，密码是否为空
            if (!$this->param['account']) {
                $this->error('账号不能为空', 1);
            }
            if (!$this->param['password']) {
                $this->error('密码不能为空', 1);
            }

            //执行查询
            $U = new U();
            $flag = $U->loginJump($this->param);

            //根据返回数判断
            if ($flag == 3) {
                $this->redirect('Index/index');
            } else if ($flag == 2) {
                $this->error('密码错误', 1);
            } else if ($flag == 1) {
                $this->error('不存在该用户', 1);
            }
        }
    }

    /**
     *退出登录
     */
    public function loginExit()
    {
        //清除session
        session('user', null);

        //跳转到登录界面
        $this->redirect(BASE_PATH);
    }
}
