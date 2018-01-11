<?php
/**
 * Created by PhpStorm.
 * User: ironman
 * Date: 2017/11/19
 * Time: 18:59
 */

include "config.php";
/**
 * 获取当前成绩表中当前这一学期的课程信息
 * @return array|null
 */
function get_score_arr(){
    $sql='SELECT * FROM score JOIN category ON score.cate_id = category.cate_id;';
    return getObjs($sql);
}