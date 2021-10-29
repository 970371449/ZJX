<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:81:"E:\phpstudy_pro\WWW\thinkphp\public/../application/admin\view\user\userindex.html";i:1632670712;s:18:"static/header.html";i:1629045163;s:16:"static/menu.html";i:1635522120;s:18:"static/footer.html";i:1628872298;s:71:"E:\phpstudy_pro\WWW\thinkphp\application\admin\view\user\user_edit.html";i:1632669391;}*/ ?>
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
<script src="/static/xm-select/dist/xm-select.js"></script>
<script src="/static/layui-tree/treeTable.js"></script>
<link rel="stylesheet" href="/static/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" href="/static/css/PersonalCss.css">
<link rel="stylesheet" href="/static/layui/css/layui.css">
<link rel="stylesheet" href="/static/font-awesome-4.7.0/css/font-awesome.css">

</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
    <div class="layui-logo">欢迎使用系统</div>

    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;" style="text-decoration: none">
                <i class="fa fa-address-card-o" style="font-size: 24px"></i>
                <?php echo \think\Session::get('user.realname'); ?>
            </a>
            <dl class="layui-nav-child">
                <dd><a lay-header-event="personalInfo" style="text-decoration: none;font-size: 15px;width: 157px;height: 36px;line-height: 40px;cursor: pointer">个人信息</a></dd>
                <dd><a href="http://192.168.0.103:8001/admin/Login/loginExit" style="text-decoration: none;font-size: 15px;width: 157px;height: 36px;line-height: 40px">退出</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item" lay-header-event="menuRight" lay-unselect>
            <a href="javascript:;">
                <i class="layui-icon layui-icon-more-vertical"><span class="layui-badge">9</span></i>
            </a>
        </li>
    </ul>
</div>

<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree" lay-filter="menuList">
            <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="layui-nav-item layui-nav-itemed">
                <a class="" href="javascript:;"><?php echo $vo['name']; ?></a>
                <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                    <dl class="layui-nav-child" style="margin-bottom: 0px">
                        <dd><a href="http://192.168.0.103:8001/<?php echo $sub['url']; ?>"><?php echo $sub['name']; ?></a></dd>
                    </dl>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </li>
            <?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </ul>
    </div>
</div>

    <div class="layui-body">
        <div class="layui-fluid">
            <table class="layui-hide" id="userInfoList" lay-filter="userInfoList"></table>
        </div>
    </div>
    <div class="layui-footer" style="text-align: right">
    JC © 2021 版权所有
</div>
<script>
    //JS
    layui.use(['element', 'layer', 'util'], function () {
        var element = layui.element
            , layer = layui.layer
            , util = layui.util
            , $ = layui.$;

        //头部事件
        util.event('lay-header-event', {
            //左侧菜单事件
            menuLeft: function (othis) {
                layer.msg('展开左侧菜单的操作', {icon: 0});
            }
            , menuRight: function () {
                layer.open({
                    type: 1
                    , content: '<div style="padding: 15px;">处理右侧面板的操作</div>'
                    , area: ['260px', '100%']
                    , offset: 'rt' //右上角
                    , anim: 5
                    , shadeClose: true
                });
            }
            , personalInfo: function () {
                layer.open({
                    type: 1
                    , title: '个人信息'
                    , content: `
                        <div class="jw-popup-wireless">
                            <form class="layui-form" action="">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">姓名</label>
                                    <div class="layui-input-block">
                                    <input type="text" name="realname" class="layui-input" readonly value="<?php echo \think\Session::get('user.realname'); ?>">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">性别</label>
                                    <div class="layui-input-block">
                                    <input type="text" name="sex" class="layui-input" readonly value="<?php echo \think\Session::get('user.sex'); ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    `
                    , area: ['400px', '500px']
                });
            }
        });
        // <form class="layui-form" action="">
        //         <div class="layui-form-item">
        //         <label class="layui-form-label">单行输入框</label>
        //         <div class="layui-input-block">
        //         <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        //         </div>
        //         </div>
        //     </form>

    });
</script>
</div>

<!--头部按钮-->
<script type="text/html" id="topDemo">
    <div class="layui-btn-container">
        <button data-method="offset" data-type="auto" class="layui-btn layui-btn-sm" lay-event="excelExport">导出excel表格
        </button>
    </div>
</script>

<!--行按钮-->
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    <!--    <button data-method="offset" data-type="auto" class="layui-btn layui-btn-normal">居中弹出</button>-->
</script>

<!--编辑页面-->
<!--用户编辑页面-->
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1,user-scalable=no"/>
    <script src="/static/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="/static/js/jquery-1.10.2.min.js"></script>
    <script src="/static/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/static/bootstrap-3.3.7-dist/css/bootstrap.css">
</head>
<div id="user_edit_box" style="display: none">
    <div class="container" style="width: 100%;margin-top: 20px;">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <form role="form" name="user_edit_form" id="user_edit_form">
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="account">用户名</label>
                        <input type="text" name="account" class="form-control" id="account" placeholder="请输入账号">
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="请输入密码">
                    </div>
                    <div class="form-group">
                        <label for="realname">姓名</label>
                        <input type="text" name="realname" class="form-control" id="realname" placeholder="请输入密码">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    layui.use(['table', 'layer', 'util'], function () {
        var $ = layui.jquery;
        var layer = layui.layer;
        var util = layui.util;
        var table = layui.table;

        table.render({
            elem: '#userInfoList'
            , url: '<?php echo url("admin/user/userIndex"); ?>'
            , toolbar: '#topDemo' //开启头部工具栏，并为其绑定左侧模板
            , defaultToolbar: ['filter', 'exports', 'print']
            , cols: [[
                {type: "checkbox"},
                {field: "id", title: "序号", sort: true, align: "center"},
                {field: "account", title: "用户名", align: "center"},
                {field: "password", title: "密码", align: "center"},
                {field: "right", title: "操作", align: "center", templet: "#barDemo"}
            ]]
            , page: true
            , limits: [3, 5, 10]
        });

        //头工具栏事件
        table.on('toolbar(userInfoList)', function (obj) {
            if (obj.event == 'excelExport') {
                window.open('<?php echo url("admin/User/exportExcel"); ?>')
            }
        });

        //行按钮事件
        table.on('tool(userInfoList)', function (obj) {
            var data = obj.data;
            // 编辑
            if (obj.event == 'edit') {
                layer.open({
                    type: 1,
                    offset: 'auto',
                    area: ['500px', '700px'],
                    title: '编辑页面',
                    content: $("#user_edit_box"),
                    btnAlign: 'c',
                    shade: 0.3,
                    success: function (layero, index) {
                        $("#user_edit_form input[name='id']").val(data.id);
                        $("#user_edit_form input[name='account']").val(data.account);
                        $("#user_edit_form input[name='password']").val(data.password);
                        $("#user_edit_form input[name='realname']").val(data.realname);
                    },
                    btn: ['确定', '取消'],
                    yes: function () {
                        var formData = $("#user_edit_form").serialize();
                        $.ajax({
                            type:'post',
                            url:'<?php echo url("admin/user/userEdit"); ?>',
                            data:formData,
                            success:function (res) {
                                console.log(res);
                                layer.closeAll();
                                table.reload('userInfoList', {
                                    page: {
                                        curr: 1 //重新从第 1 页开始
                                    }
                                });
                            }
                        })
                    },
                    btn2: function () {
                        $("#user_edit_box").css('display','none');
                    },
                    cancel:function () {
                        $("#user_edit_box").css('display','none');
                    }
                })
            }
            //删除
            else if (obj.event == 'del') {
                layer.open({
                    type: 1,
                    offset: 'auto',
                    area: ['300px', '200px'],
                    title: '删除页面',
                    content: `<div style="font-size: 15px;margin: 35px 105px;">确定删除吗？</div>`,
                    btnAlign: 'c',
                    shade: 0.3,
                    shadeClose: true,
                    btn: ['确定', '取消'],
                    yes: function () {
                        $.ajax({
                            type:'post',
                            url:'<?php echo url("admin/user/userDel"); ?>',
                            data:{id:data.id},
                            success:function (res) {
                                console.log(res)
                                layer.closeAll();
                                table.reload('userInfoList', {
                                    page: {
                                        curr: 1 //重新从第 1 页开始
                                    }
                                });
                            }
                        })
                    },
                    btn2: function () {
                    }
                })
            }
        });

    });
</script>

</body>
</html>