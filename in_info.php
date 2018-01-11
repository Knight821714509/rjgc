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
include "controller/in_info_controller.php";
insert_info();
?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 800px;">
    <div class="text-center" style="width: 50%;margin: 0 auto;">
        <h1>添加学生信息</h1>
        <form action="in_info.php" method="post">
            <input class="form-control item-margin" name="uid" type="text" placeholder="学生学号">
            <input class="form-control item-margin" name="name" type="text" placeholder="学生姓名">
            <label class="full-width item-margin text-left pull-left" for="班级">
                <select class="form-control pull-left" style="width: 20%" name="level">
                    <option value="">年级：</option>
                    <?php
                        for ($i=0;$i<30;$i++){
                            $level = $i+2015;
                            echo '<option value="'.$level.'">'.$level.'级</option>';
                        }
                    ?>
                </select>
                <select class="form-control pull-left" style="width: 20%;margin-left: 50px" name="class">
                    <option value="">班级：</option>
                    <option value="1">1班</option>
                    <option value="2">2班</option>
                </select>
            </label>
            <input class="btn btn-success item-margin pull-left" name="submit" type="submit" value="确认提交">
            <input class="btn btn-info item-margin pull-right" type="reset" value="重置">
        </form>
    </div>
</div>
</body>
</html>