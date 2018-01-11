<html>
<head>
    <meta charset="utf-8">
    <title>软件工程专业学生成绩管理系统ヽ(•ω•ゞ)</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style>
        .table > tbody > tr > td{
            vertical-align:middle;
        }
    </style>
</head>
<?php
/**
 * Created by PhpStorm.
 * User: iron man
 * Date: 2017/11/15
 * Time: 11:55
 */
include "header.php";
include "controller/find_course_controller.php";

?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 850px;overflow:auto;">
    <div class="text-center">
        <h1>查询课程信息</h1>
        <form action="find_course.php" method="post"  style="margin-top: 50px">
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
            <input class="btn btn-success" name="submit" type="submit" value="检索">
        </form>
        <form action="controller/in_course_controller.php" method="get">
            <table class="table table-hover text-center" style="margin-top: 50px">
                <thead>
                    <tr>
                        <th class="text-center">时间</th>
                        <th class="text-center">周一</th>
                        <th class="text-center">周二</th>
                        <th class="text-center">周三</th>
                        <th class="text-center">周四</th>
                        <th class="text-center">周五</th>
                        <th class="text-center">周六</th>
                        <th class="text-center">周日</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_POST["level"])){
                    $arr = getArr($_POST['level'],$_POST['class'],$_POST['term'],1);
                    $time_arr = array("8:00-9:50","10:10-12:00","14:30-16:20","16:30-18:20","19:30-21:20");
                    for ($i=0;$i<5;$i++){
                    ?>
                        <tr>
                            <?php
                            echo "<td>".$time_arr[$i]."</td>";
                            for ($j=0;$j<7;$j++){
                                echo "<td>".$arr[$i][$j]."</td>";
                            }
                            ?>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
</body>
</html>