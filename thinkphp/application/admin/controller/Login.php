<?php
/**
 *  created Date 2021-11-08 14:26:30
 *  author JC
 */

namespace app\admin\controller;

use app\admin\model\User as U;
use app\common\controller\Common;
use DingTalkClient;
use DingTalkConstant;
use http\Header;
use OapiMediaUploadRequest;
use think\Session;

include_once('../extend/Microblog/Microblog.php');//微博sdk
include_once('../extend/phpding-old/TopSdk.php');//钉钉sdk


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
     *钉钉回调测试
     */
    public function dingBack()
    {
        date_default_timezone_set('Asia/Shanghai');
//        $c = new DingTalkClient(DingTalkConstant::$CALL_TYPE_OAPI, DingTalkConstant::$METHOD_GET, DingTalkConstant::$FORMAT_JSON);
//        $req = new \OapiGettokenRequest();
////        $req->setCorpid("ding8864944b9843ab5cf2c783f7214b6d69");
////        $req->setCorpsecret("FNzHL41W5ZKLtCqaNM5tevHwdqs2m455fvccg778Ene4PM__VVMw9tovrdvkKU2K");
//        $req->setAppkey("dingvzh7iqtrax5oyp67");
//        $req->setAppsecret("I6xE7-fPVLW9GweO6eHqOknhw3XQKpgpGhW12zBLEM6DqEMX2JehzCik9_OjH6C2");
//        $resp = $c->execute($req, 'token', "https://oapi.dingtalk.com/gettoken");//获取到企业内部的accesstoken
//        $resp->code = $this->param['code'];
        $result = $this->getUserID($this->param['code']);
        return json($result);


//        $url = "https://oapi.dingtalk.com/user/getuserinfo?access_token=".$resp->access_token."&code=".$this->param['code'];
//        $result = $this->http($url);
//        return json($result);
//        return json($resp);
    }

    public function getUserID($code)
    {
        $url = "https://oapi.dingtalk.com/user/getuserinfo?access_token=".$this->get_token()."&code=".$code;

        $user = $this->http($url);

        return json_decode($user,JSON_UNESCAPED_UNICODE);
    }

    public function getUserInfo($userid)
    {
        $url = "https://oapi.dingtalk.com/user/get?access_token=".$this->getAccessToken()."&userid=".$userid;

        $userinfo = $this->http($url);

        return json_decode($userinfo,JSON_UNESCAPED_UNICODE);
    }

    private function get_token()
    {
        $url = "https://oapi.dingtalk.com/gettoken?appkey=dingvzh7iqtrax5oyp67&appsecret=I6xE7-fPVLW9GweO6eHqOknhw3XQKpgpGhW12zBLEM6DqEMX2JehzCik9_OjH6C2";
        $get_result = json_decode($this->http($url),true);
        if($get_result['errcode'] == '0')
        {
            $new_token = (object)[];
            $token = $get_result['access_token'];
            $new_token->expire_time = time() + 7000;
            $new_token->access_token = $token;
        }else{
            $token = 'get_token_error';
        }

        return 	$token;
    }

    private function get_php_file($filename)
    {
        return trim(substr(file_get_contents($filename), 15));
    }

    private function set_php_file($filename,$content) {
        $fp = fopen($filename, "w");
        fwrite($fp, "<?php exit();?>" . $content);
        fclose($fp);

        return;
    }

    public function http($url,$data=null)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        if(!empty($data))
        {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
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
            $c = new \SaeTClientV2(WB_AKEY, WB_SKEY, $token['access_token']);
            $uid = $c->get_uid();
            $user_message = $c->show_user_by_id($uid['uid']);
            $sessionArr['id'] = $user_message['id'];
            $sessionArr['account'] = $user_message['screen_name'];
            $sessionArr['realname'] = $user_message['name'];
            $sessionArr['avatar_hd'] = $user_message['avatar_hd'];
            Session::set('user', $sessionArr);
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
