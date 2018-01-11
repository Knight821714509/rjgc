<?php session_start();
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/12/2
 * Time: 21:46
 */
include "config.php";
/**
 * 选手确认选课后获取课程号并写入数据库
 */
echo $_SESSION['now_term'];
if (preg_split('[/]',$_SESSION['now_term'])[1] == '第一学期')
    $term=1;
else
    $term=2;
$sql = "insert into select_course values(".$_GET['cid'].",".$_SESSION['uid'].",(select cate_id from category where level = ".$_SESSION['class']->level." and class = ".$_SESSION['class']->class." and term = ".$term."))";

exec_sql($sql);
$_SESSION['select_able'] = 3;
echo '<script>alert("选修成功~");history.go(-3)</script>';