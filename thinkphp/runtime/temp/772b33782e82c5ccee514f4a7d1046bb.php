<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:81:"E:\phpstudy_pro\WWW\thinkphp\public/../application/admin\view\menu\menuindex.html";i:1629472977;s:18:"static/header.html";i:1629045163;s:16:"static/menu.html";i:1635518898;s:18:"static/footer.html";i:1628872298;s:70:"E:\phpstudy_pro\WWW\thinkphp\application\admin\view\menu\menuedit.html";i:1629204763;s:69:"E:\phpstudy_pro\WWW\thinkphp\application\admin\view\menu\menuadd.html";i:1629473717;}*/ ?>
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
            <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="layui-nav-item layui-nav-itemed">
                <a class="" href="javascript:;"><?php echo $vo['name']; ?></a>
                <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                    <dl class="layui-nav-child" style="margin-bottom: 0px">
                        <dd><a href="http://192.168.0.103:8001/<?php echo $sub['url']; ?>"><?php echo $sub['name']; ?></a></dd>
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

<!--头部按钮-->
<script type="text/html" id="topDemo">
    <div class="layui-btn-container">
        <button data-method="offset" data-type="auto" class="layui-btn layui-btn-sm" lay-event="addMenu">新增菜单</button>
    </div>
</script>

<!--行按钮-->
<script type="text/html" id="lineDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit" style="text-decoration: none">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del" style="text-decoration: none">删除</a>
</script>

<!--编辑盒子-->
<div class="jw-popup-wireless" id="menuEditDiv" style="display: none">
    <form class="layui-form" id="menuEditForm">
        <input type="hidden" name="id" value="">
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: auto">菜单名字:</label>
            <div class="layui-input-block" style="margin-left: 90px">
                <input type="text" name="name" lay-verify="required" placeholder="请输入标题"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: auto">菜单路径:</label>
            <div class="layui-input-block" style="margin-left: 90px">
                <input type="text" name="url" lay-verify="required" placeholder="请输入"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
    </form>
</div>
<!--新增盒子-->
<div class="jw-popup-wireless" id="menuAddDiv" style="display: none">
    <fieldset class="layui-elem-field layui-field-title" style="margin: 0">
        <legend style="width: fit-content;border-bottom: 0">填写信息</legend>
    </fieldset>
    <form class="layui-form" id="menuAddForm">
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: auto">添加选项</label>
            <div class="layui-input-block">
                <input type="radio" name="type" value="menu" title="菜单" checked="" id="menuBtn">
                <input type="radio" name="type" value="btn" title="按钮" id="btnBtn">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label layui-required" style="width: auto">父级菜单</label>
            <div class="layui-input-block" style="margin-left: 90px">
                <div id="selectMenu" class="xm-select-demo"></div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: auto">菜单名字:</label>
            <div class="layui-input-block" style="margin-left: 90px">
                <input type="text" name="name" lay-verify="required" placeholder="请输入标题"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: auto">菜单路径:</label>
            <div class="layui-input-block" style="margin-left: 90px">
                <input type="text" name="url" lay-verify="required" placeholder="请输入"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label layui-required" style="width: auto">在职员工</label>
            <div class="layui-input-block" style="margin-left: 90px">
                <div id="selectUser" class="xm-select-demo"></div>
            </div>
        </div>
    </form>
</div>
<script>
    $(function () {
        $("#menuBtn").click(function () {

        })
    });
    var selectMenu = xmSelect.render({
        el: '#selectMenu',
        name: 'pid',
        tree: {
            show: true,
            expandedKeys: true,
        },
        filterable: true,
        height: 'auto',
        paging: true,
        pageSize: 8,
        on: function (data) {
            console.log(data)
        }
    });
    var selectUser = xmSelect.render({
        el: '#selectUser',
        name: 'roleId',//往后台传递参数的name值
        radio: false,//是否开启单选模式
        clickClose: false,//是否点击选项后自动关闭下拉框
        // simple: false,
        height: 'auto',
        paging: true,
        pageSize: 8,
        on: function (data) {
        }
    })
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
            url: '<?php echo url("admin/Menu/menuIndex"); ?>',
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
                , {field: 'id', title: '序号'}
                , {field: 'name', title: '菜单名字'}
                , {field: 'url', title: '菜单路径'}
                , {fixed: 'right', title: '操作', toolbar: '#lineDemo'}
            ]]
        });

        //头部按钮
        treeTable.on('toolbar(menu)', function (obj) {
            //新增
            if (obj.event == 'addMenu') {
                //请求当前一级菜单
                $.ajax({
                    type: 'post'
                    , url: '<?php echo url("admin/Menu/menuTreeList"); ?>'
                    , success: function (res) {
                        console.log(res);
                        // let menuTreeList = res.map((item) => {
                        //     return {name: item.name,value: item.id,children: item.pid==item.id?item:[]}
                        // })
                    }
                });
                //打开新增菜单弹出
                layer.open({
                    type: 1
                    , title: "新增菜单"
                    , area: ['40%', '600px']
                    , content: $('#menuAddDiv')
                    , btn: ['提交', '取消']
                    , btnAlign: 'c'
                    , shade: 0.3
                    , success: function () {
                        $.ajax({
                            type: 'post'
                            , url: '<?php echo url("admin/Commons/userAtWork"); ?>'
                            , success: function (res) {
                                console.log(res);
                                let userArr = res.map((item) => {
                                    return {name: item.realname, value: item.id}
                                })
                                selectUser.update({
                                    data: userArr
                                })
                            }
                        });
                        $.ajax({
                            type: 'post'
                            , url: '<?php echo url("admin/Commons/menuList"); ?>'
                            , success: function (res) {
                                console.log(res);
                                let menuArr = res.map((item) => {
                                    return {name: item.name, value: item.id, children:item.child}
                                });
                                selectMenu.update({
                                    data: menuArr
                                })
                            }
                        })
                    }
                    , yes: function () {
                        $.ajax({
                            type: 'post'
                            , url: '<?php echo url("admin/Menu/menuAdd"); ?>'
                            , data: $("#menuAddForm").serialize()
                            , success: function () {
                                layer.closeAll();
                                treeTable.reload('menu');
                            }
                        })
                    }
                    , btn2: function () {
                        //清空表单
                        layer.closeAll();
                    }
                    , end: function () {
                        $("#menuAddDiv").css('display', 'none');
                    }
                })
            }
        });

        //行按钮
        treeTable.on('tool(menu)', function (obj) {
            //获取行数据
            var data = obj.data;
            //编辑
            if (obj.event == 'edit') {
                layer.open({
                    type: 1
                    , title: "修改菜单"
                    , area: ['40%', '700px']
                    , content: $('#menuEditDiv')
                    , btn: ['确定', '取消']
                    , btnAlign: 'c' //按钮居中
                    , shade: 0.3
                    , success: function () {
                        $("#menuEditForm input[name='id']").val(data.id);
                    }
                    , yes: function () {
                        $.ajax({
                            type: 'post',
                            url: '<?php echo url("admin/Menu/menuEdit"); ?>',
                            data: $("#menuEditForm").serialize(),
                            success: function () {
                                layer.closeAll();
                                treeTable.reload('menu');
                            }
                        })
                    }
                    , btn2: function () {
                        //清空表单
                        layer.closeAll();
                    }
                    , end: function () {
                        $("#menuEditDiv").css('display', 'none');
                    }
                })
            }
            //删除
            if (obj.event == 'del') {
                layer.open({
                    type: 1
                    , title: '确实删除'
                    , area: ['200px', '100px']
                    , btn: ['确定', '取消']
                    , btnAlign: 'c'
                    , shade: '0.3'
                    , yes: function () {
                        $.ajax({
                            type: 'post',
                            url: '<?php echo url("admin/Menu/menuDel"); ?>',
                            data: {
                                id: obj.data.id
                            },
                            success: function (res) {
                                layer.closeAll();
                            },
                            error: function (xhr) {
                                alert(xhr);
                                console.log(xhr);
                            }
                        })
                    }
                    , btn2: function () {
                        layer.closeAll();
                    }
                    , end: function () {
                        treeTable.reload('menu');
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