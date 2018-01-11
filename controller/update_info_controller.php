<?php
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/12/2
 * Time: 14:43
 */

include "config.php";
/**获取登录学生信息
 * @return null|object 学生信息
 */
function get_info(){
    $sql = "select * from student where uid = '".$_SESSION['uid']."'";
    return getObj($sql);
}

/**
 * 当学生修改信息提交后将学生信息写入数据库
 */
function is_submit(){
    if (isset($_POST['idnum'])){
        $sql = "update student set idnum = '".$_POST['idnum']."',number = '".$_POST['number']."',email = '".$_POST['email']."', gender = '".$_POST['gender']."' where uid ='".$_SESSION['uid']."'";
        exec_sql($sql);
        echo '<script>alert("修改成功~");history.go(-1)</script>';
    }
}