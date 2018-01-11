<?php
/**
 * Created by PhpStorm.
 * User: ironman
 * Date: 2017/11/19
 * Time: 18:45
 */

include "config.php";
/**
 * 接收用户提交的表单写入数据库
 */
function insert_info(){
    if (isset($_POST['submit'])){
        $cate_sql ="select cate_id from category where level = ".$_POST['level']." and class = ".$_POST['class'];
        $cate_id = getId($cate_sql);
        if ($cate_id==null){
            $cate_insert_sql = "insert into category values ( null,".$_POST['level'].",".$_POST['class'].",1)";
            exec_sql($cate_insert_sql);
            $cate_sql = "select max(cate_id) from category";
            $cate_id = getId($cate_sql);
        }
        $sql = "insert into student (uid,pwd,name,cate_id) values('".$_POST['uid']."',default,'".$_POST['name']."',".$cate_id.")";
        exec_sql($sql);
        echo '<script>alert("添加成功~")</script>';
    }
}