/**
 * 定义ajax
 * @param type
 * @param url required
 * @param log 1=>控制台打印 0=>不执行打印 默认0
 * @returns {boolean}
 */
function ajax(type,url,data,log=0,result) {
    //创建promise实例
    let p = new Promise((resolve, reject) => {
        //判断url,不存在报错
        if(!url){
            return false;
        }

        //执行ajax请求
        $.ajax({
            async :false,
            type: type?type:'get',
            url: url,
            dataType:'json',
            data: data,
            success:function (res) {
                if(log){
                    console.log(res);
                }
                resolve(res);
            },
            error:function (xhr) {
                reject(xhr);
            },
        })
    })
    return p;
}