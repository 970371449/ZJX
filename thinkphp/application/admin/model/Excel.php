<?php


namespace app\admin\model;


use think\Controller;

//引入PHPExcel插件
import('PHPExcel.PHPExcel');

class Excel extends Controller
{
    /**
     * 导出excel
     *
     * @param $list 表的数据列表
     * @param $fieldArr 表字段数组
     * @param $fieldTitleArr 列标题，与$fieldArr按顺序对应
     * @param $excelTitle ：excel sheet名
     * @param string $fileName 文件名，如不传，自动以日期生成
     */
    public function exportExcel($list, $fieldArr, $fieldTitleArr, $sheetName = 'sheet1', $fileName = '')
    {
        // 显示错误信息
        error_reporting(E_ALL);

        $objPHPExcel = new \PHPExcel();

        //第一行数据
        $objPHPExcel->setActiveSheetIndex(0);
        $active = $objPHPExcel->getActiveSheet();
        foreach ($fieldTitleArr as $i => $name) {
            $cellName = $this->num2alpha($i++);//列名，如：A
            $cellRow = $cellName . '1'; //列名+ 行数：如：A2
            $active->setCellValue($cellRow, $name);
        }

        //设置excel单元格格式
        $excelFirstRow = 'A1:' . $cellRow; //excel第一行的列范围
        $excelEndRow = $cellName.(sizeof($list)+1);//excel结束的列行数，+1代表包含列标题行
        //excel全部数据范围的内容居中
        $objPHPExcel->getActiveSheet()->getStyle('A1:'.$excelEndRow)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()->getStyle($excelFirstRow)->getFont()->setSize(12);//第一行字体大小
        $objPHPExcel->getActiveSheet()->getStyle($excelFirstRow)->getFont()->setBold(true);//第一行字体加粗

        //填充数据
        foreach ($list as $k => $v) {
            $k = $k + 1;
            $num = $k + 1;//数据从第二行开始录入
            foreach ($fieldArr as $i => $name) {
                $cellName = $this->num2alpha($i++);
                $cellRow = $cellName . $num;
                $active->setCellValue($cellRow, $v[$name]);

                // 先获取字符串的长度
                $len = strlen($v[$name]) + 5;//宽度额外+5，更美观
                // 获取列，设置宽度，按内容设置宽度
                $active->getColumnDimension($cellName)->setWidth($len);
            }
        }

        $objPHPExcel->getActiveSheet()->setTitle($sheetName);

        if (empty($fileName)) {
            $fileName = date('YmdHis');
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    /**
     * 数字到字母列
     * @author rainfer
     */
    function num2alpha($intNum, $isLower = false)
    {
        $num26 = base_convert($intNum, 10, 26);//转换10进制到26进制
        $addcode = $isLower ? 49 : 17;
        $result = '';
        for ($i = 0; $i < strlen($num26); $i++) {
            $code = ord($num26{$i});//ord() 函数返回字符串中第一个字符的 ASCII 值。
            if ($code < 58) {
                $result .= chr($code + $addcode);
            } else {
                $result .= chr($code + $addcode - 39);
            }
        }
        return $result;
    }
}