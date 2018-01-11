<html>
<head>
    <meta charset="utf-8">
    <title>软件工程专业学生成绩管理系统ヽ(•ω•ゞ)</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<?php

include "header.php";
include "utils\mysql_link.php";
function get_avg(){
    $sql = "select avg(grade) from score where cid = ".$_SESSION['tea_cid'][0]->cid;
    return getId($sql);
}
function get_fail(){
    $sql = "select count(*) from score where grade < 60 and cid = ".$_SESSION['tea_cid'][0]->cid;
    return getId($sql);
}
function get_pass(){
    $sql = "select count(*) from score where grade < 60 and cid = ".$_SESSION['tea_cid'][0]->cid;
    $fail = getId($sql);
    $sql = "select count(*) from score where cid = ".$_SESSION['tea_cid'][0]->cid;
    return round( $fail/getId($sql) * 100 , 2) . "％";
}
function get_max(){
    $sql = "select max(grade) from score where cid = ".$_SESSION['tea_cid'][0]->cid;
    return getId($sql);
}
?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 800px;">
    <div class="text-center" style="width: 50%;margin: 0 auto;">
        <h1>成绩统计</h1>
        <div class="item-margin">
            <p class="item-margin">平均成绩：<?php echo get_avg() ?></p>
            <p class="item-margin">挂科人数：<?php echo get_fail() ?></p>
            <p class="item-margin">不及格率：<?php echo get_pass() ?></p>
            <p class="item-margin">最高分：<?php echo get_max() ?></p>
        </div>
    </div>
</div>
</body>
</html>