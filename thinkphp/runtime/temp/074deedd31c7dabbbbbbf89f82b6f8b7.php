<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:77:"E:\phpstudy_pro\WWW\thinkphp\public/../application/admin\view\menu\index.html";i:1629045993;s:18:"static/header.html";i:1629045163;s:16:"static/menu.html";i:1628957803;s:18:"static/footer.html";i:1628872298;}*/ ?>
<!--菜单管理页面-->
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
    <div class="layui-logo">欢迎使用人力资源系统</div>

    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;" style="text-decoration: none">
                <i class="fa fa-address-card-o" style="font-size: 24px"></i>
                <?php echo \think\Session::get('user.realname'); ?>
            </a>
            <dl class="layui-nav-child">
                <dd><a lay-header-event="personalInfo" style="text-decoration: none;font-size: 15px;width: 157px;height: 36px;line-height: 40px;cursor: pointer">个人信息</a></dd>
                <dd><a href="http://hr/admin/Login/loginExit" style="text-decoration: none;font-size: 15px;width: 157px;height: 36px;line-height: 40px">退出</a></dd>
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
            <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="layui-nav-item layui-nav-itemed">
                <a class="" href="javascript:;"><?php echo $vo['name']; ?></a>
                <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo $sub['url']; ?>"><?php echo $sub['name']; ?></a></dd>
                    </dl>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>

    <div class="layui-body">
        <div class="layui-fluid">
            <table class="layui-hide" id="menu" lay-filter="menu"></table>
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

<script type="text/html" id="topDemo">
    <div class="layui-btn-container">
        <button data-method="offset" data-type="auto" class="layui-btn layui-btn-sm" lay-event="addMenu">新增菜单</button>
    </div>
</script>

<script type="text/html" id="lineDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit" style="text-decoration: none">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del" style="text-decoration: none">删除</a>
</script>

<script>
    layui.config({
        base: '/static/layui-tree/treeTable.js'
    }).use(['layer', 'util', 'treeTable'], function () {
        var $ = layui.jquery;
        var layer = layui.layer;
        var util = layui.util;
        var table = layui.table;
        var treeTable = layui.treeTable, form = layui.form;

        // 渲染表格
        var insTb = treeTable.render({
            elem: '#menu',
            url: '<?php echo url("admin/Menu/Index"); ?>',
            height: 'full-150',
            toolbar: '#topDemo',
            defaultToolbar: ['filter', 'exports', 'print'],
            tree: {
                iconIndex: 1,//控制图标位置
                isPidData: true,//如果是树形结构必须设置为true
                idName: 'id',//父ID
                pidName: 'pid',//子ID
                openName: 'id',// 展开树形结构，根据父级id
                //public bool open { get; set; }open字段是bool类型
            },
            cols: [[
                {type: 'checkbox', fixed: 'left'}
                , {field: 'id', title: 'ID', sort: true}
                , {field: 'url', title: '菜单路径'}
                , {fixed: 'right', title: '操作', toolbar: '#lineDemo'}
            ]]
        });

        //头部按钮
        treeTable.on('toolbar(menu)', function (obj) {
            //新增
            if (obj.event == 'addMenu') {
                layer.open({
                    type: 1,
                    title: "新增菜单",
                    area: ['400px', '500px'],
                    content: `<div>add</div>`
                })
            }
        });

        //行按钮
        treeTable.on('tool(menu)', function (obj) {
            //编辑
            if (obj.event == 'edit') {
                layer.open({
                    type: 1,
                    title: "修改菜单",
                    area: ['200px', '100px'],
                    content: `<div>edit</div>`
                })
            }
            //删除
            if (obj.event == 'del') {
                $.ajax({
                    type: 'post',
                    url: '<?php echo url("admin/Menu/menuDel"); ?>',
                    data: {
                        id: obj.data.id
                    },
                    success: function (res) {
                        console.log(res);
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                })
            }
        })

        // 全部展开
        $('#btnExpandAll').click(function () {
            insTb.expandAll();
        });

        // 全部折叠
        $('#btnFoldAll').click(function () {
            insTb.foldAll();
        });
    })
</script>
</body>
</html>