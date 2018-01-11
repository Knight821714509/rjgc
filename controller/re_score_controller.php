<?php
/**
 * Created by PhpStorm.
 * User: ironman
 * Date: 2017/11/19
 * Time: 18:59
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

/** 获取学生成绩信息
 * @return array 成绩信息
 */
function get_stu_arr(){
    if ($_SESSION['group']==1)
        $sql = "select* from score where cid = ".$_SESSION['tea_cid'][0]->cid." and cate_id = (select cate_id from category where level = ".$_GET['level']." and class = ".$_GET['class']." and term = ".$_GET['term'].")";
    else
        $sql = "select* from score where cate_id = (select cate_id from category where level = ".$_GET['level']." and class = ".$_GET['class']." and term = ".$_GET['term'].")";
    $temp_arr = getObjs($sql);
    $data_arr = array();
    $cid_arr = array();
    foreach ($temp_arr as &$item){
        $sql = "select * from course where cid = ".$item->cid;
        array_push($cid_arr,getId($sql));
        $sql = "select * from student where uid = '".$item->uid."'";
        $obj = getObj($sql);
        array_push($data_arr,$obj);
    }
    $_SESSION['cname_arr'] = $cid_arr;
    return $data_arr;
}

/**获取当前学生信息
 * @param $name 表单名称
 */
function select_block($name){
    if (isset($_GET['submit']))
        $arr = get_stu_arr();
    echo "<select name=\"".$name."\" id=\"\" class=\"form-control\">
            <option class=\"form-control\" value=''>——请选择学生——</option>";
    for ($i=0;$i<count($arr);$i++){
        echo "<option class=\"form-control\" value=\"".$arr[$i]->uid."\">".$arr[$i]->uid." | ".$arr[$i]->name." | ".$_SESSION['cname_arr'][$i]->cname;
        echo "</option>";
    }
    echo "</select>";
}

/**
 * 当用户修改成绩后将修改后的成绩信息写入数据库
 */
function is_submit(){
    if (isset($_POST['uid'])){
        if ($_SESSION['group']==1)
            $sql = "update score set grade = '" . $_POST['grade'] . "' where cid = ".$_SESSION['tea_cid'][0]->cid." and uid = '" . $_POST['uid'] ."';";
        else
            $sql = "update score set grade = '" . $_POST['grade'] . "' where cid = ".$_SESSION['tea_cid'][0]->cid." and uid = '" . $_POST['uid'] ."';";
        exec_sql($sql);
        echo "<script>alert(\"修改成功~\")</script>";
    }
}