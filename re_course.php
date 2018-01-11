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
include "controller/re_course_controller.php";
is_submit();
?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 800px;">
    <div class="text-center" style="width: 50%;margin: 0 auto;">
        <h1>修改课程信息</h1>
        <form action="re_course.php" method="get">
            <?php
                select_block("course_id");
            ?>
            <script type="text/javascript">
                var fragment = document.createDocumentFragment();

            </script>
            <input class="form-control item-margin" type="text" name="cname" placeholder="课程名称">
            <input class="form-control item-margin" name="teacher" type="text" placeholder="任课教师">
            <input class="form-control item-margin" name="score" type="text" placeholder="学分">
            <input class="form-control item-margin" name="date" type="text" placeholder="上课时间">
            <input class="form-control item-margin" name="place" type="text" placeholder="上课地点">
            <select class="form-control item-margin" name="main" id="">
                <option class="form-control" value="">请选择课程类型</option>
                <option class="form-control" value="1">必修</option>
                <option class="form-control" value="2">选修</option>
            </select>
            <input class="btn btn-success item-margin pull-left" name="submit" type="submit" value="确认提交">
            <input class="btn btn-info item-margin pull-right" type="reset" value="重置">
        </form>
    </div>
</div>
</body>
</html>