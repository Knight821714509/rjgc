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
include "controller/in_course_controller.php";
is_submit();
?>
<body style="background: url(img/bg.png) repeat">
    <div class="container box-style" style="margin: auto;min-height: 850px;overflow:auto;">
        <div class="text-center">
            <h1>添加课程信息</h1>
            <div class="bs-example bs-example-tabs col-md-12" data-example-id="togglable-tabs" style="margin-top: 50px;margin-bottom: 50px;">
                <ul class="nav nav-pills" role="tablist" style="border-radius: 10px;padding: 15px;background-color: #eeeeee">
                    <li role="presentation" class="active col-md-6 " style="padding: 0"><a href="#home" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">添加课程表</a></li>
                    <li role="presentation" class="col-md-6" style="margin-right: -2px;padding: 0"><a href="#profile" role="tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">添加开设课程</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <form action="in_course.php" method="get">
                            <table class="table table-hover text-center" style="margin-top: 50px">
                                <thead>
                                    <tr>
                                        <div style="margin-top: 50px">
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
                                        </div>
                                    </tr>
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
                                    $time_arr = array("8:00-9:50", "10:10-12:00", "14:30-16:20", "16:30-18:20", "19:30-21:20");
                                    for ($i = 0; $i < 5; $i++) {
                                        ?>
                                        <tr>
                                            <?php
                                            echo "<td>" . $time_arr[$i] . "</td>";
                                            for ($j = 0; $j < 7; $j++) {
                                                echo "<td>";
                                                select_block($i . $j);
                                                echo "</td>";
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                            <input class="btn btn-success" style="width: 70%" type="submit" value="确认">
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade col-md-6" id="profile" aria-labelledby="profile-tab" style="margin: 0 auto;float: none">
                        <form action="in_course.php" method="get">
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
            </div>
        </div>
    </div>
</body>
</html>