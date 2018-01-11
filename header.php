<?php session_start();
?>
<div class="container">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">软件工程专业学生成绩管理系统</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if ($_SESSION['group']==0){ ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">课程信息管理 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="in_course.php">录入课程信息</a></li>
                            <li><a href="re_course.php">修改课程信息</a></li>
                            <li><a href="del_course.php">删除课程信息</a></li>
                            <li><a href="find_course.php">查询课程信息</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">学生信息管理 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="in_info.php">录入学生信息</a></li>
                            <li><a href="find_info.php">查询学生信息</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">成绩信息管理 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="in_score.php">录入成绩信息</a></li>
                            <li><a href="re_score.php">修改成绩信息</a></li>
                            <li><a href="find_score.php?mode=0">查询成绩信息</a></li>
                            <li><a href="admin.php?mode=0">教师录入成绩时间</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">选课信息管理 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="in_sel_course.php">录入选课信息</a></li>
                            <li><a href="admin.php?mode=1">选课开始时间</a></li>
                            <li><a href="find_sel_course.php">查询选课信息</a></li>
                        </ul>
                    </li>
                <?php }elseif ($_SESSION['group']==1){ ?>
                    <li><a href="find_course.php">查询课程信息</a></li>
                    <?php
                    if ($_SESSION['score_able']){
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">成绩信息管理 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="in_score.php">录入成绩信息</a></li>
                            <li><a href="re_score.php">修改成绩信息</a></li>
                            <li><a href="find_score.php?mode=1">查询成绩信息</a></li>
                        </ul>
                    </li>
                <?php }
                }elseif ($_SESSION['group']==2){?>
                    <li><a href="find_course.php">查询课表</a></li>
                    <?php
                    if ($_SESSION['select_able']) {
                    ?>
                        <li><a href="find_sel_course.php?mode=2">选修课程</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="find_score.php?mode=2">查询成绩</a></li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</div>