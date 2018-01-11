<?php
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/10/13
 * Time: 22:18
 */
include "config.php";
/** 获取课程信息
 * @return array|null
 */
function get_course_arr(){
    $sql = "select* from course";
    $data_arr=getObjs($sql);
    return $data_arr;
}

/** 获取所有课程信息
 * @param $name 表单名称
 */
function select_block($name){
    $arr = get_course_arr();
    echo "<select name=\"".$name."\" id=\"\" class=\"form-control\">
            <option class=\"form-control\" value=''>——请选择课程——</option>";
    for ($i=0;$i<count($arr);$i++){
        echo "<option class=\"form-control\" value=\"".$arr[$i]->cid."\">".$arr[$i]->cname." | ".$arr[$i]->teacher." | ".$arr[$i]->date." | ".$arr[$i]->place." | "."学分:".$arr[$i]->score;
        if ($arr[$i]->main==2){
            echo "(选修)";
        }
        echo "</option>";
    }
    echo "</select>";
}

/**
 * 用户修改后提交完成修改操作
 */
function is_submit(){
    if (isset($_GET['course_id'])){
        $sql = "update course set cname = '" . $_GET['cname'] . "', teacher = '" . $_GET['teacher'] . "', score = '" . $_GET['score'] . "', date = '" . $_GET['date'] . "', place = '".$_GET['place']."', main = ".$_GET['main']." where cid = '" . $_GET['course_id'] ."';";
        exec_sql($sql);
        echo "<script>alert(\"修改成功~\")</script>";
    }
}