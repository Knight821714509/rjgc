<?php
session_start();
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/10/15
 * Time: 14:01
 */
include dirname(__FILE__).'\utils\mysql_link.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <title>软件工程专业学生成绩管理系统ヽ(•ω•ゞ)</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="background: url(img/bg.png) repeat;">
<?php
if ($_SESSION['user']==''){
    header('Location:login.php');
}else{
    if ($_SESSION['isLog']==1) {
        echo '<script>alert("欢迎使用本系统~' . $_SESSION['user'] . '")</script>';
        if ($_SESSION['group']==1) {
            if ($_SESSION['score_able']) {
                echo '<script>alert("请尽快添加成绩~ \\n 管理成绩时间为：' . date('Y-m-d h:i:s', $_SESSION['date'][0]) . '————' . date('Y-m-d h:i:s', $_SESSION['date'][1]) . '")</script>';
            }
        }elseif($_SESSION['group']==2){
            if ($_SESSION['select_able']==1){
                echo '<script>alert("请尽快添加成绩~ \\n 选修课程时间为：' . date('Y-m-d h:i:s', $_SESSION['date'][0]) . '————' . date('Y-m-d h:i:s', $_SESSION['date'][1]) . '")</script>';
            }
        }
    }
    $_SESSION['isLog'] = 0;
}
?>
<div class="container" style="margin-top: 50px;margin-bottom: 50px">
    <?php
    if ($_SESSION['group']==0): ?>
        <?php
                echo "<div class=\"pull-right\">
                    " . $_SESSION['user'] . "
                    <a href=\"changePwd.php\">修改密码</a>
                    <a href=\"logout.php\">注销</a>
                </div>";
            ?>
        <div class="container bg">
            <div class="col-md-5 box-style text-center">
                <h3>课程信息管理</h3>
                <div class="text-center">
                    <a href="in_course.php"><div class="item-style">录入课程信息</div></a>
                    <a href="re_course.php"><div class="item-style">修改课程信息</div></a>
                    <a href="del_course.php"><div class="item-style">删除课程信息</div></a>
                    <a href="find_course.php"><div class="item-style">查询课程信息</div></a>
                </div>
            </div>
            <div class="col-md-5 box-style text-center" style="margin-top: 20px">
                <h3>学生信息管理</h3>
                <div class="text-center">
                    <a href="in_info.php"><div class="item-style">录入学生信息</div></a>
                    <a href="find_info.php"><div class="item-style">查询学生信息</div></a>
                </div>
            </div>
            <div class="col-md-5 box-style text-center">
                <h3>成绩信息管理</h3>
                <div class="text-center">
                    <a href="in_score.php"><div class="item-style">录入成绩信息</div></a>
                    <a href="re_score.php"><div class="item-style">修改成绩信息</div></a>
                    <a href="find_score.php?mode=0"><div class="item-style">查询成绩信息</div></a>
                    <a href="admin.php?mode=0"><div class="item-style">教师录入成绩时间</div></a>
                </div>
            </div>
            <div class="col-md-5 box-style text-center">
                <h3>选课信息管理</h3>
                <div class="text-center">
                    <a href="in_sel_course.php"><div class="item-style">录入选课信息</div></a>
                    <a href="admin.php?mode=1"><div class="item-style">选课开始时间</div></a>
                    <a href="find_sel_course.php"><div class="item-style">查询选课信息</div></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php
    if ($_SESSION['group']==1):
        echo "<div class=\"pull-right\">
                    " . $_SESSION['user'] . "
                    <a href=\"changePwd.php\">修改密码</a>
                    <a href=\"logout.php\">注销</a>
                </div>";
    ?>
    <div class="container bg">
        <a href="find_course.php">
            <div class="box-style col-md-5">
                <div class="single-style">
                    查询课表
                </div>
            </div>
        </a>
        <a href="controller/2017版软件工程专业教学大纲.doc">
            <div class="box-style col-md-5" style="margin-top: 20px">
                <div class="single-style">
                    教学大纲
                </div>
            </div>
        </a>
        <a href="<?php if ($_SESSION['score_able']) echo 'in_score.php'?>">
            <div class="box-style col-md-5">
                <div class="single-style">
                    <?php
                    if ($_SESSION['score_able']) {
                        echo '学生成绩管理';
                    }else{
                        echo '暂未开放成绩管理';
                    }
                    ?>
                </div>
            </div>
        </a>
        <a href="statistics.php">
            <div class="box-style col-md-5">
                <div class="single-style">
                    成绩统计
                </div>
            </div>
        </a>
    </div>
    <?php endif; ?>
    <?php
    if ($_SESSION['group']==2):
            echo "<div class=\"pull-right\">
                    " . $_SESSION['user'] . "
                    <a href=\"update_info.php\">编辑信息</a>
                    <a href=\"logout.php\">注销</a>
                </div>";
    ?>
    <div class="container bg">
        <a href="find_course.php?mode=2">
            <div class="box-style col-md-5">
                <div class="single-style">
                    查询课表
                </div>
            </div>
        </a>
        <a href="<?php if ($_SESSION['select_able']==1) echo 'find_sel_course.php?mode=2';?>">
            <div class="box-style col-md-5" style="margin-top: 20px">
                <div class="single-style">
                    <?php
                    if ($_SESSION['select_able']==1) {
                        echo '选修课程';
                    }elseif($_SESSION['select_able']==0){
                        echo '暂未开放选修课程';
                    }else{
                        echo '您已选过课程';
                    }
                    ?>
                </div>
            </div>
        </a>
        <a href="find_score.php">
            <div class="box-style col-md-5">
                <div class="single-style">
                    查询成绩
                </div>
            </div>
        </a>
        <a href="find_score.php?export=1">
            <div class="box-style col-md-5">
                <div class="single-style">
                    成绩导出
                </div>
            </div>
        </a>
    </div>
    <?php endif;   ?>
</div>
</body>
</html>