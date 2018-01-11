<?php
/**
 * Created by PhpStorm.
 * User: ironman
 * Date: 2017/11/19
 * Time: 18:53
 */
include "config.php";

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
 * 查询课程在周内的上课时间
 * @param $level 年级
 * @param $class 班级
 * @param $term 学期
 * @return array 返回课程信息
 */
function getArr($level,$class,$term){
    $cate_sql = "select cate_id from category where level = '".$level."' and class = ".$class." and term = ".$term;
    $cate_id = getArray($cate_sql);
    $_SESSION['cate_id'] = $cate_id;
    $sql = "select* from category_course where cate_id =".$cate_id[0];
    $objs = getObjs($sql);
    $course_sql="select* from course";
    $course_objs=getObjs($course_sql);
    $arr_row = array();
    $arr_col = array();
    for ($i=0;$i<count($objs,0);$i++) {
        switch ($objs[$i]->time) {
            case "8:00":
                $row = 1;
                array_push($arr_row,$row);
                break;
            case "10:10":
                $row = 2;
                array_push($arr_row,$row);
                break;
            case "14:30":
                $row = 3;
                array_push($arr_row,$row);
                break;
            case "16:30":
                $row = 4;
                array_push($arr_row,$row);
                break;
            case "19:30":
                $row = 5;
                array_push($arr_row,$row);
                break;
        }
        switch ($objs[$i]->day) {
            case "mon":
                $col = 1;
                array_push($arr_col, $col);
                break;
            case "tues":
                $col = 2;
                array_push($arr_col, $col);
                break;
            case "wed":
                $col = 3;
                array_push($arr_col, $col);
                break;
            case "thur":
                $col = 4;
                array_push($arr_col, $col);
                break;
            case "fri":
                $col = 5;
                array_push($arr_col, $col);
                break;
            case "sat":
                $col = 6;
                array_push($arr_col, $col);
                break;
            case "sun":
                $col = 7;
                array_push($arr_col, $col);
                break;
        }
    }
    $arr = array();
    $array = array();
    for ($j = 0;$j<7;$j++){
        array_push($array,"");
    }
    for ($i = 0; $i<5;$i++){
        array_push($arr,$array);
    }
    for ($i = 0;$i<5;$i++){
        for ($j = 0;$j<7;$j++){
            for ($x = 0;$x<count($objs,0);$x++) {
                if ($arr_row[$x] == $i+1 && $arr_col[$x] == $j+1) {
                    for ($k=0;$k<count($course_objs);$k++) {
                        if ($course_objs[$k]->cid==$objs[$x]->cid)
                            $arr[$i][$j] = $course_objs[$k]->cname . "<br>" . $course_objs[$k]->date . "<br>" . $course_objs[$k]->place . "<br>学分：" . $course_objs[$k]->score."<br><a class='btn btn-danger' href=\"del_course.php?cid=".$course_objs[$k]->cid."&x=".$i."&y=".$j."\">删除</a>";
                    }
                }
            }
        }
    }
    return $arr;
}

/**
 * 获取当前所有课程
 * @return array|null 课程信息
 */
function get_course_arr(){
    $sql = "select* from course";
    $data_arr=getObjs($sql);
    return $data_arr;
}

//数据库中星期信息
$day_arr = array("mon", "tues", "wed", "thur", "fri", "sat", "sun");
//显示的时间信息
$time_arr = array("8:00-9:50","10:10-12:00","14:30-16:20","16:30-18:20","19:30-21:20");
//数据库中时间信息
$time_db_arr = array("8:00","10:10","14:30","16:30","19:30");
/**
 * 获取到用户删除的课程号并删除（数据库中的course_category表）
 */
if (isset($_GET['cid'])){
    for ($i=0;$i<5;$i++){
        for ($j=0;$j<7;$j++){
            if ($_GET['x']==$i&&$_GET['y']==$j){
                $sql="delete from category_course where cid=".$_GET['cid']." and time = '".$time_db_arr[$i]."' and day = '".$day_arr[$j]."' and cate_id = ".$_SESSION['cate_id'][0];
                exec_sql($sql);
                echo '<script>alert("删除成功~")</script>';
            }
        }
    }
}
/**
 * 获取到用户删除的课程号并删除（数据库里的course表）
 */
if (isset($_GET['course_id'])){
    $sql = "delete from course where cid = ".$_GET['course_id'];
    exec_sql($sql);
    echo '<script>alert("删除成功~")</script>';
}