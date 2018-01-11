<?php
/**
 * Created by PhpStorm.
 * User: ironman
 * Date: 2017/11/21
 * Time: 16:39
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

/** 获取当前学期的班级号
 * @return null 返回班级号
 */
function get_cate_id(){
    $cate_sql = "select cate_id from category where level = ".$_GET['level']." and class = ".$_GET['class']." and term = ".$_GET['term'];
    return getId($cate_sql);
}

/** 获取当前班级的学生信息
 * @return array|null 学生信息
 */
function get_stu_arr(){
    $sql = "select* from student where cate_id = ".get_cate_id();
    return getObjs($sql);;
}

/**获取当前班级的所有成绩信息
 * @return array|null 成绩信息
 */
function get_score_course(){
    $sql = "select * from score where cate_id = ".get_cate_id();
    return getObjs($sql);
}

/** 获取该生的信息
 * @param $uid 学生学号
 * @return null|object 学生信息
 */
function get_stu_info($uid){
    $sql = "select * from student where uid = '".$uid."'";
    return getObj($sql);
}

/** 获取这门课程的所有成绩
 * @param $cid 课程号
 * @return array|null 成绩信息
 */
function get_stu($cid){
    $sql = "select * from score where cid = ".$cid;
    return getObjs($sql);
}

/** 获取登录学生的成绩信息
 * @return array|null 成绩信息
 */
function get_stu_score(){
    $sql = "select * from score where uid = '".$_SESSION['uid']."'";
    return getObjs($sql);
}
function get_score($cid,$uid){
    $sql = "select * from score where cid = ".$cid." and uid = '".$uid."'";
    return getObj($sql);
}

/**获取课程信息
 * @param $cid 课程号
 * @return null|object 课程信息
 */
function get_course($cid){
    $sql = "select * from course where cid = ".$cid;
    return getObj($sql);
}