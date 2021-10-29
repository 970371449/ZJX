<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\phpstudy_pro\thinkphp\public/../application/admin\view\login\index.html";i:1628092906;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to JC Manage Website</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all">
    <style>
        .loginBox {
            width: auto;
            height: auto;
            margin: 15% 20%;
            z-index: 999;
        }
    </style>
</head>
<body class="bodyBg" style="position:fixed;top: 0;left: 0;width:100%;height:100%;min-width: 1000px;z-index:-10;zoom: 1;background-color: #fff;background: url('/static/img/loginBg2.jpg') no-repeat; background-size: cover; -webkit-background-size: cover;-o-background-size: cover;background-position: center 0; ">
<div class="loginBox">
    <div class="layui-container" style="width: 40%;">
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this">账号登录</li>
                <li>微信登录</li>
            </ul>

            <div class="layui-tab-content" style="height: 100px;">
                <!--账号密码登录-->
                <div class="layui-tab-item layui-show">
                    <form action="admin/Login/index" method="post" name="loginForm">
                        <table>
                            <tr><td>账号:</td><td><input type="text" name="username" placeholder="请输入" autocomplete="off"></td></tr>
                            <tr><td>密码:</td><td><input type="password" name="password" placeholder="请输入密码" autocomplete="off"></td></tr>
                            <tr><td colspan="2"><input type="submit" value="Login"><input type="reset" value="重置"></td></tr>
                        </table>
                    </form>
<!--                    <form class="layui-form layui-form-pane" action="">-->
<!--                        <div class="layui-form-item">-->
<!--                            <label class="layui-form-label">账号</label>-->
<!--                            <div class="layui-input-inline">-->
<!--                                <input type="text" name="username" lay-verify="required" placeholder="请输入"-->
<!--                                       autocomplete="off" class="layui-input">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="layui-form-item">-->
<!--                            <label class="layui-form-label">密码</label>-->
<!--                            <div class="layui-input-inline">-->
<!--                                <input type="password" name="password" placeholder="请输入密码" autocomplete="off"-->
<!--                                       class="layui-input">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="layui-form-item">-->
<!--                            <div class="layui-input-block">-->
<!--                                <button type="submit" class="layui-btn layui-btn-normal" lay-submit=""-->
<!--                                        lay-filter="login">-->
<!--                                    login-->
<!--                                </button>-->
<!--                                <button type="reset" class="layui-btn layui-btn-green">重置</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
                </div>
                <!--微信登录-->
                <div class="layui-tab-item">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="/static/js/jquery-1.10.2.js"></script>
<script src="/static/layui/layui.js"></script>
<script src="/static/js/ajax.js"></script>

<script>

    layui.use(['form', 'laydate'], function () {
        var form = layui.form
            , layer = layui.layer
            , laydate = layui.laydate
            , element = layui.element;
        var active = {
            tabChange: function () {
                //切换到指定Tab项
                element.tabChange('demo', '22');
            }
        };

        form.on('submit(login)', function (data) {
            var field = data.field;
            var resl = ajax('post','<?php echo url("admin/Login/Index"); ?>',field)
            // resl.then(res=>{
            //     if(res.code == 1 && <?php echo \think\Session::get('username'); ?>){
            //         window.location.href = 'http://hr/'
            //     }
            // })
            // $.ajax({
            //     type: 'post',
            //     url: '<?php echo url("admin/Login/Login"); ?>',
            //     data: field,
            //     success: function (res) {
            //         console.log(res)
            //     },
            //     error: function () {
            //         alert("failed")
            //     }
            // });
            return false;//防止跳转！
        });
    });
</script>
</body>
</html>