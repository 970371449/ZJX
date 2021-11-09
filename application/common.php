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

/**
 * 对象 转 数组
 * @param object $obj 对象
 * @return array
 */
function object_to_array($obj) {
    $obj = (array)$obj;
    foreach ($obj as $k => $v) {
        if (gettype($v) == 'resource') {
            return;
        }
        if (gettype($v) == 'object' || gettype($v) == 'array') {
            $obj[$k] = (array)object_to_array($v);
        }
    }

    return $obj;
}