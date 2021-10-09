<?php
// 应用公共文件

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