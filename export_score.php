<?php
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/12/4
 * Time: 2:38
 */

session_start();
$filename="成绩表";
$header=array('课程名','学分','课程成绩');
$index = array(0,1,2);
createtable($_SESSION['score_arr'],$filename,$header,$index);
/**导出excel表格
 * @param $list 成绩信息数组
 * @param $filename 导出文件名
 * @param array $header 表头
 * @param array $index 信息数组key值
 */
function createtable($list,$filename,$header=array(),$index = array()){
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:filename=".$filename.".xls");
    $teble_header = implode("\t",$header);
    $strexport = $teble_header."\r";
    foreach ($list as $row){
        foreach($index as $val){
            $strexport.=$row[$val]."\t";
        }
        $strexport.="\r";

    }
    $strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);
    exit($strexport);
}