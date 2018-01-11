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
        <h1>查询选修课程信息</h1>
        <div class="bs-example bs-example-tabs col-md-12" data-example-id="togglable-tabs" style="margin-top: 50px;margin-bottom: 50px;">
            <?php
            if (!$_SESSION['mode']) {
                ?>
                <ul class="nav nav-pills" role="tablist"
                    style="border-radius: 10px;padding: 15px;background-color: #eeeeee">
                    <li role="presentation" class="active col-md-6 " style="padding: 0"><a href="#home" role="tab"
                                                                                           data-toggle="tab"
                                                                                           aria-controls="home"
                                                                                           aria-expanded="true">查询选修课表</a>
                    </li>
                    <li role="presentation" class="col-md-6" style="margin-right: -2px;padding: 0"><a href="#profile"
                                                                                                      role="tab"
                                                                                                      data-toggle="tab"
                                                                                                      aria-controls="profile"
                                                                                                      aria-expanded="false">查询课程选修情况</a>
                    </li>
                </ul>
                <?php
            }
            ?>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    <form action="find_sel_course.php?flag=1" method="post"  style="margin-top: 50px">
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
                                $_SESSION["del_course_category"] = array($_POST['level'],$_POST['class'],$_POST['term']);
                                $arr = getArr($_POST['level'],$_POST['class'],$_POST['term'],2);
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
                <?php
                if (!$_SESSION['mode']) {
                    ?>
                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                        <div class="list-group">
                            <?php
                            $course_arr = get_sel_info();
                            for ($i = 0; $i < count($course_arr); $i++) {
                                echo "<div class=\"col-md-3\" style='margin-top: 20px'><a href=\"#\" class=\"list-group-item\">" . $course_arr[$i]->cname . "<br>" . $course_arr[$i]->teacher . "<br>学分：" . $course_arr[$i]->score . "<br>" . $course_arr[$i]->date . "<br>" . $course_arr[$i]->place . "<br>选修人数：" . get_count($course_arr[$i]->cid) . "人</a></div>";
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>