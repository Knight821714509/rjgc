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

/** 获取用户选择的班的所有学生信息
 * @param $level 年级
 * @param $class 班级
 * @return array|null  返回学生信息
 */
function get_info($level, $class){
    $sql = "select cate_id from category where level = ".$level." and class = ".$class;
    $cate_id = getobj($sql);
    $info_sql = "select * from student where cate_id = ".$cate_id->cate_id;
    $info = getObjs($info_sql);
    return $info;
}