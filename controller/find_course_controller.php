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
function getArr($level,$class,$term,$main){
    $cate_sql = "select cate_id from category where level = '".$level."' and class = ".$class." and term = ".$term;
    $cate_id = getArray($cate_sql);
    $sql = "select* from category_course where cate_id =".$cate_id[0]." and cid in (select cid from course where main = ".$main.")";
    $objs = getObjs($sql);
    $course_sql="select* from course where main = ".$main;
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
                        if ($course_objs[$k]->cid==$objs[$x]->cid) {
                            $arr[$i][$j] = $course_objs[$k]->cname . "<br>" . $course_objs[$k]->date . "<br>" . $course_objs[$k]->place . "<br>" . $course_objs[$k]->teacher . "<br>学分：" . $course_objs[$k]->score;
                            if ($_SESSION['mode'] == 1&&isset($_GET['flag'])) {
                                $arr[$i][$j] = $arr[$i][$j] . '<br>' . '<a class="btn btn-primary" href="controller/select_course_controller.php?cid=' . $course_objs[$k]->cid . '">确认选修</a>';
                            }
                        }
                    }
                }
            }
        }
    }
    return $arr;
}

/** 获取所有选修课程信息
 * @return array|null
 */
function get_sel_info(){
    $course_sql="select* from course where main = 2";
    $course_objs=getObjs($course_sql);
    return $course_objs;
}

/** 获取当前选修这门课的人数
 * @param $cid 选修课课程号
 * @return null 返回选修人数
 */
function get_count($cid){
    $sql = "select count(*) from select_course where cid = ".$cid;
    return getId($sql);
}