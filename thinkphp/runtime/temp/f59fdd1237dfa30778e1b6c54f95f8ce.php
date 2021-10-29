<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"D:\phpstudy_pro\thinkphp\public/../application/admin\view\index\index.html";i:1628266199;s:18:"static/header.html";i:1628259702;s:16:"static/menu.html";i:1628261424;s:18:"static/footer.html";i:1628185583;}*/ ?>
<!--管理后台页面-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Welcome to JC Website</title>
<script src="/static/js/jquery-1.10.2.js"></script>
<script src="/static/layui/layui.js"></script>
<script src="/static/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script src="/static/js/jquery-1.10.2.min.js"></script>
<script src="/static/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/static/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" href="/static/css/PersonalCss.css">
<link rel="stylesheet" href="/static/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
    <div class="layui-logo layui-hide-xs">欢迎使用人力资源系统</div>

    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item layui-hide layui-show-md-inline-block">
            <a href="javascript:;">
                <img src="//tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"
                     class="layui-nav-img">
                tester
            </a>
            <dl class="layui-nav-child">
                <dd><a href="">Your Profile</a></dd>
                <dd><a href="">Settings</a></dd>
                <dd><a href="">Sign out</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item" lay-header-event="menuRight" lay-unselect>
            <a href="javascript:;">
                <i class="layui-icon layui-icon-more-vertical"></i>
            </a>
        </li>
    </ul>
</div>

<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree" lay-filter="test">
            <li class="layui-nav-item layui-nav-itemed">
                <a class="" href="javascript:;">menu group 1</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;">menu 1</a></dd>
                    <dd><a href="javascript:;">menu 2</a></dd>
                    <dd><a href="javascript:;">menu 3</a></dd>
                    <dd><a href="">the links</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;">menu group 2</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;">list 1</a></dd>
                    <dd><a href="javascript:;">list 2</a></dd>
                    <dd><a href="">超链接</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>

    <div class="layui-body">
        <div class="layui-fluid">
            <?php echo \think\Session::get('user_account'); ?>
        </div>
    </div>
    <div class="layui-footer" style="text-align: right">
    JC © 2021  版权所有
</div>
<script>
    //JS
    layui.use(['element', 'layer', 'util'], function(){
        var element = layui.element
            ,layer = layui.layer
            ,util = layui.util
            ,$ = layui.$;

        //头部事件
        util.event('lay-header-event', {
            //左侧菜单事件
            menuLeft: function(othis){
                layer.msg('展开左侧菜单的操作', {icon: 0});
            }
            ,menuRight: function(){
                layer.open({
                    type: 1
                    ,content: '<div style="padding: 15px;">处理右侧面板的操作</div>'
                    ,area: ['260px', '100%']
                    ,offset: 'rt' //右上角
                    ,anim: 5
                    ,shadeClose: true
                });
            }
        });

    });
</script>
</div>

</body>
</html>