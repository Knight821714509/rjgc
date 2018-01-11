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
include "controller/in_score_controller.php";
is_submit();
?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 800px;">
    <div class="text-center">
        <h1>添加成绩信息</h1>
        <form class="item-margin" action="in_score.php" method="get">
            <label for="">
                <select name="level" id="" class="form-control">
                    <?php
                    $level_arr = getLevel();
                    foreach ($level_arr as &$value){
                        echo "
                              <option value=\"".$value."\">".$value."级</option>";
                    }
                    ?>
                </select>
            </label>
            <label for="">
                <select name="class" id="" class="form-control">
                    <option value="1">1班</option>
                    <option value="2">2班</option>
                </select>
            </label>
            <label for="">
                <select name="term" id="" class="form-control">
                    <option value="1">第一学期</option>
                    <option value="2">第二学期</option>
                </select>
            </label>
            <input class="btn btn-primary" name="submit" type="submit" value="检索">
        </form>
        <form action="in_score.php" method="post">
            <div id="stu-info">
                <?php
                getList();
                ?>
                <input class="btn btn-success form-control item-margin" style="width: 40%;margin-left: auto;margin-right: auto" name="submit" type="submit" value="确认提交">
            </div>
        </form>
    </div>
</div>
</body>
</html>