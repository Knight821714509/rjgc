<?php
/**
 * Created by PhpStorm.
 * User: ironman
 * Date: 2017/11/19
 * Time: 18:51
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
 * 获取当前班级的学生信息并等待用户输入
 */
function getList(){
    if (isset($_GET['submit'])){
        $cate_sql = "SELECT cate_id from category where `level`=".$_GET['level']." and class = ".$_GET['class']." and term =".$_GET['term'];
        $_SESSION['cate_id'] = getId($cate_sql);
        $stu_sql="SELECT * from student where cate_id = ".$_SESSION['cate_id'].";";
        $stu = getObjs($stu_sql);
        echo '<div style="width: 40%;margin-left: auto;margin-right: auto">';
        select_block('course_id');
        echo '</div>';
        foreach ($stu as &$item){
            echo '
                            <div class="form-inline item-margin">
                                <div class="form-group">
                                    <input style="border:0px;" name="uid[]" value="'.$item->uid.'：" for="name">
                                    <input type="text" class="form-control" name="grade[]" placeholder="'.$item->name.'">
                                </div>
                            </div>'
            ;
        }
    }
}

/**
 * 接收用户输入的成绩信息表单并存入数据库
 */
function is_submit(){
    if (isset($_POST['submit'])) {
        for ($i = 0; $i < count($_POST['uid']); $i++) {
            $score_sql = "insert into score VALUES ('" . $_POST['uid'][$i] . "',".$_POST['course_id'].",".$_SESSION['cate_id']."," . $_POST['grade'][$i] . ")";
            exec_sql($score_sql);
        }
        echo '<script>alert("添加成功~")</script>';
    }
}

/** 显示当前所有课程并等待用户选择
 * @param $name 表单名
 */
function select_block($name){
    $arr = get_course_arr();
    echo "<select name=\"".$name."\" id=\"\" class=\"form-control\">";
    if ($_SESSION['group'] == 0||count($_SESSION['tea_cid'])>1)
        echo "<option class=\"form-control\" value=''>——请选择课程——</option>";
    for ($i=0;$i<count($arr);$i++){
        echo "<option class=\"form-control\" value=\"".$arr[$i]->cid."\">".$arr[$i]->cname." | ".$arr[$i]->teacher." | ".$arr[$i]->date." | ".$arr[$i]->place." | "."学分:".$arr[$i]->score;
        if ($arr[$i]->main==2){
            echo "(选修)";
        }
        echo "</option>";
    }
    echo "</select>";
}

/**当用户身份为老师时获取老师所授课程信息，否则为所有课程
 * @return array|null 课程信息
 */
function get_course_arr(){
    if ($_SESSION['group']==1)
        $sql = "select* from course where cid = ".$_SESSION['tea_cid'][0]->cid;
    else
        $sql = "select* from course";
    $data_arr=getObjs($sql);
    return $data_arr;
}