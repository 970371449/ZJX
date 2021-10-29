/*这个js主要用于操作form表单的增加、删除、修改功能*/

/**
 * 添加
 * @param url
 * @param formId
 * @returns {boolean}
 */
function doAdd(addUrl, formId) {

    var loading = layer.msg('处理中，请稍后...', {
        icon: 16,
        shade: 0.3
    });

    var doResult = false;
    $.ajax({
        url: addUrl,
        type: 'POST',
        dataType: 'json',
        async: false, //同步加载
        data: $('#' + formId).serialize(),
        success: function(result) {
            if (result.code == 200) {
                layer.closeAll();
                //清空表单
                $("#" + formId)[0].reset();

                //显示框
                layer.msg('添加成功', { time: 2500 });
                doResult = true;
            } else {
                layer.alert('添加失败：' + result.error, {
                    icon: 0,
                    skin: 'layer-ext-moon'
                }, function(index) {
                    layer.close(index);
                });
            }
        }
    });

    layer.close(loading);

    return doResult;
}

/**
 * 删除
 * @param delUrl
 * @param delData  //值一般为删除表id的数值；如果有多个参数，也可传对象，如：{'groupId':1,'userId':101}
 */
function doDel(delUrl, delData) {

    var myData;
    if (delData instanceof Object) {
        myData = delData;
    } else {
        myData = { 'id': delData };
    }

    var loading = layer.msg('处理中，请稍后...', {
        icon: 16,
        shade: 0.3
    });

    var doResult = false;
    $.ajax({
        url: delUrl,
        type: 'POST',
        dataType: 'json',
        data: myData,
        async: false, //同步加载
        success: function(result) {
            if (result.code == 200) {
                layer.closeAll();
                //显示框
                layer.msg(result.data, { time: 2500 });
                doResult = true;
            } else {
                layer.alert('操作失败：' + result.error, {
                    icon: 0,
                    skin: 'layer-ext-moon'
                }, function(index) {
                    layer.close(index);
                });
            }
        }
    });

    return doResult;
}

/**
 * 修改
 * @param doUrl
 * @param editData 修改数据，json格式对象（可以将form表单序列化，如：$('#formId').serialize() ）
 * @returns {boolean}
 */
function doEdit(doUrl, editData) {
    var loading = layer.msg('处理中，请稍后...', {
        icon: 16,
        shade: 0.3
    });

    var doResult = false;

    $.ajax({
        url: doUrl,
        type: 'POST',
        dataType: 'json',
        data: editData,
        async: false, //同步加载
        success: function(result) {
            if (result.code == 200 || !result.error) { // !result.error 一般修改，修改的记录没有改变，才会返回result.error为null的情况，这里也当作修改成功

                doResult = true;

                //显示框
                layer.msg('操作成功', { time: 1000, shade: 0.01 });

                setTimeout(function() {
                    doCloseForm();
                }, 1000)

            } else {
                layer.alert('操作失败：' + result.error, {
                    icon: 0,
                    skin: 'layer-ext-moon'
                }, function(index) {
                    layer.close(index);
                });
            }
        }
    });

    // layer.close(loading);

    return doResult;
}

/*关闭当前layui窗口*/
function doCloseForm() {
    if (window.name) {
        // 弹出层关闭iframe
        var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
        parent.layer.close(index);
    } else {
        // 正常且普通的关闭
        layui.layer.closeAll();
    }
}