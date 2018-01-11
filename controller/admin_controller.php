<?php
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/11/29
 * Time: 5:32
 */

/**
 * 当教务秘书输入教师管理成绩时间时将开始时间和结束时间写入teacher.txt中
 */
if (isset($_POST['start_time'])) {
    $time = strstr($_POST['start_time'], ' ', true) . ":00";
    $start = strtotime($_POST['start_day'] . ' ' . $time);

    $time = strstr($_POST['end_time'], ' ', true) . ":00";
    $end = strtotime($_POST['end_day'] . ' ' . $time);

    $data = $start."\r\n".$end;
    $rs = file_put_contents('teacher.txt', $data);
    echo '<script>alert("设置成功~")</script>';
    echo '<script>history.go(-2)</script>';
}
/**
 * 当教务秘书输入学生选课时间时将开始时间和结束时间写入student.txt中
 */
if (isset($_GET['start_time'])) {
    $time = strstr($_GET['start_time'], ' ', true) . ":00";
    $start = strtotime($_GET['start_day'] . ' ' . $time);

    $time = strstr($_GET['end_time'], ' ', true) . ":00";
    $end = strtotime($_GET['end_day'] . ' ' . $time);

    $data = $start."\r\n".$end;
    $rs = file_put_contents('student.txt', $data);
    echo '<script>alert("设置成功~")</script>';
    echo '<script>history.go(-2)</script>';
}