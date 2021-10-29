<?php
// 应用公共文件
define("WB_AKEY", '4262232852');
define("WB_SKEY", '8ba6772c816cd4f91b610ad1d012edee');
define("WB_CALLBACK_URL", 'http://192.168.0.103:8001/admin/login/loginJump');

/**
 * 返回对象
 * @param $array 响应数据
 */
function resultArray($array)
{
    if (isset($array['data'])) {
        $array['error'] = '';
        $code = 200;
    } elseif (is_array($array['error'])) {
        $code = 402; //返回数组格式
        $array['data'] = '';
    } elseif (isset($array['error'])) {
        $code = 400;
        $array['data'] = '';
    }
    return json([
        'code' => $code,
        'data' => $array['data'],
        'error' => $array['error']
    ]);
}

/**
 *解析layui数据表格返回格式
 */
function parseData($data, $count, $sql = '', $msg = '', $code = 0)
{

    return $parseData = [
        "code" => $code,
        "msg" => $msg,
        "count" => $count,
        "data" => $data,
        "sql" => $sql
    ];
}