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
 * User: iron man
 * Date: 2017/11/15
 * Time: 11:55
 */
include "header.php";
include "utils/mysql_link.php";
?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 850px;overflow:auto;">
    <div class="text-center">
        <h1>修改密码</h1>
        <form action="controller/change_controller.php" method="post">
            <div style="width: 50%;margin: 0 auto">
                <div class="form-group item-margin">
                    <label class="pull-left" for="原密码">请输入原密码</label>
                    <input class="form-control" name="pwd" type="password" placeholder="原密码">
                </div>
                <div class="form-group">
                    <label class="pull-left" for="新密码">请输入新密码</label>
                    <input class="form-control" name="new_pwd" type="password" placeholder="新密码">
                </div>
                <div class="form-group">
                    <label class="pull-left" for="确认密码">请重新输入新密码</label>
                    <input class="form-control" name="re_pwd" type="password" placeholder="重新输入密码">
                </div>
                <input type="submit" class="btn btn-success col-md-12 item-margin" value="确认">
            </div>
        </form>
    </div>
</div>
</body>
</html>