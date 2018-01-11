<?php
/**
 * Created by PhpStorm.
 * User: ironman
 * Date: 2017/11/15
 * Time: 12:10
 */
include "config.php";
/** 获取所有课程信息
 * @return array|null 课程信息
 */
function get_course_arr(){
    $sql = "select* from course";
    $data_arr=getObjs($sql);
    return $data_arr;
}

/**获取当前所有课程并显示
 * @param $xy 表单名
 */
function select_block($xy){
    $arr = get_course_arr();
    echo "<select name=\"".$xy."\" id=\"\" class=\"form-control\">
            <option class=\"form-control\" value=''></option>";
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
 * 获得当前已有年级
 * @return array|null 返回年级信息
 */
function getLevel(){
    $level_sql = "select level from category";
    $level = getObjs($level_sql);
    $level_arr= array();
    for ($i=0;$i<count($level);$i++){
        array_push($level_arr,$level[$i]->level);
    }
    $level = array_unique($level_arr);
    return $level;
}

/**
 * 当用户填写完课程表表单时提交后将课表信息写入数据库
 */
function is_submit()
{
    $day_arr = array("mon", "tues", "wed", "thur", "fri", "sat", "sun");
    $time_arr = array("8:00", "10:10", "14:30", "16:30", "19:30");
    if (isset($_GET['level'])) {
        $cate_sql = "select cate_id from category where level = '".$_GET['level']."' and class = ". $_GET['class']." and term = ".$_GET['term'];
        $cate_id = getArray($cate_sql);
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 7; $j++) {
                $sql = "insert into category_course values ('".$_GET[$i . $j]."','".$cate_id[0]. "','" . $day_arr[$j] . "','" . $time_arr[$i] . "')";
                exec_sql($sql);
            }
        }
        $sql = "delete from category_course where cid = 0;";
        exec_sql($sql);
        echo "<script>alert(\"添加课程表成功~\")</script>";
    }
    if (isset($_GET['cname'])){
        $sql = "insert into course values (null,'" . $_GET['cname'] . "','" . $_GET['teacher'] . "', '" . $_GET['score'] . "', '" . $_GET['date'] . "', '".$_GET['place']."', ".$_GET['main'].")";
        exec_sql($sql);
        echo "<script>alert(\"添加课程成功~\")</script>";
        if ($_GET['main']==2){
            echo "<script language='javascript' type='text/javascript'>";
            echo "window.location.href= 'in_sel_course.php'";
            echo "</script>";
        }
    }
}
