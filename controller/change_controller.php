<?php session_start();
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/12/2
 * Time: 13:15
 */

include "config.php";
/**
 * 当用户修改密码并提交时修改密码
 */
if (isset($_POST['pwd'])) {
    $pw = $_POST['pwd'];
    $updatepw = $_POST['new_pwd'];
    $sure = $_POST['re_pwd'];
    if ($updatepw == $sure) {
        if ($_SESSION['group'] == 0) {
            $sql = "select * from admin where uid = '" . $_SESSION['uid'] . "' and pwd='$pw'";
            $update_sql = "update admin set pwd='$sure' where pwd='$pw' and uid = '" . $_SESSION['uid'] . "'";
        } elseif ($_SESSION['group'] == 1) {
            $sql = "select * from teacher where uid = '" . $_SESSION['uid'] . "' and pwd = '$pw'";
            $update_sql = "update teacher set pwd='$sure' where pwd='$pw' and uid = '" . $_SESSION['uid'] . "'";
        } else {
            $sql = "select * from student where uid = '" . $_SESSION['uid'] . "' and pwd = '$pw'";
            $update_sql = "update student set pwd='$sure' where pwd='$pw' and uid = '" . $_SESSION['uid'] . "'";
        }
        echo $sql;
        $result = getArray($sql);
        if (!empty($result)) {
            exec_sql($update_sql);
            echo '<script>alert("修改成功~");history.go(-1)</script>';
        } else {
            echo '<script>alert("原密码错误~");history.go(-1)</script>';
        }
    }else{
        echo '<script>alert("新密码两次输入不一致~");history.go(-1)</script>';
    }
}