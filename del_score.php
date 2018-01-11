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
/**
 * Created by PhpStorm.
 * User: ironman
 * Date: 2017/11/15
 * Time: 11:55
 */
include "header.php";
include "controller/del_score_controller.php";
?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 850px;overflow:auto;">
    <div class="text-center" style="width: 50%;margin: 0 auto;">
        <h1>删除成绩信息</h1>
        <div class="list-group">
            <?php
            $score_arr = get_score_arr();
            $cid_arr = array();
            $cate_arr = array();
            for ($i=0;$i<count($score_arr);$i++){
                $sql="select * from course where cid = ".$score_arr[$i]->cid;
                $cate = getObj($sql);
                echo "<div class=\"col-md-3\" style='margin-top: 20px'><a href=\"del_score.php?score_id=".$score_arr[$i]->cate_id."\" class=\"list-group-item\">".$cate->level."级".$cate->class."班".$cate->term."<span class=\"glyphicon glyphicon-remove pull-right\" style=\"color: red;\"></span></a></div>";
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>