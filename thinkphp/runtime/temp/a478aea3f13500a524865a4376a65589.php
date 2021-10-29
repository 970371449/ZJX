<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\phpstudy_pro\WWW\thinkphp\public/../application/admin\view\login\index.html";i:1628864319;}*/ ?>
<!DOCTYPE>
<html>

<head>
    <title>LoginPage</title>
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1,user-scalable=no"/>
    <script src="/static/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="/static/js/jquery-1.10.2.min.js"></script>
    <script src="/static/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/static/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="/static/css/PersonalCss.css">

</head>

<body class="Loginbody">
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 empty-block"></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 text-center" style="background:white">
            <div class="col-lg-4 col-lg-offset-4">
                <img src="/static/img/img_avatar.png" class="img-rounded-deep" alt="Cinque Terre" width="150"
                     height="150">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 empty-block"></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3" style="background:white">
            <form action="http://hr/admin/Login/loginJump" method="post" class="form-horizontal" role="form">
                <input type="hidden" name="method" value="login">
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Username</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="text" class="form-control" name="account" placeholder="Please input your username"
                               autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label">Password</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="password" class="form-control" name="password"
                               placeholder="Please input your password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox">Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign in">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-2" style="background:white;">
                        <p>
                            <a href="#">Forget Passcode?</a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 text-center" style="background:white;font-size:24px">
                        <p>
                            <a href="#">New user? Click here</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>