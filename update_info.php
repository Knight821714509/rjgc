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
include "controller/update_info_controller.php";
$info = get_info();
is_submit();
?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 850px;overflow:auto;">
    <div class="text-center">
        <h1>修改密码</h1>
        <form action="update_info.php" method="post">
            <div style="width: 50%;margin: 0 auto">
                <div class="form-group item-margin">
                    <label class="pull-left" for="原密码">身份证号：</label>
                    <input class="form-control item-margin" name="idnum" type="text" placeholder="身份证号" value="<?php echo $info->idnum?>">
                </div>
                <div class="form-group">
                    <label class="pull-left" for="新密码">手机号码：</label>
                    <input class="form-control item-margin" name="number" type="text" placeholder="手机号码" value="<?php echo $info->number?>">
                </div>
                <div class="form-group">
                    <label class="pull-left" for="确认密码">电子邮箱：</label>
                    <input class="form-control item-margin" name="email" type="text" placeholder="电子邮箱" value="<?php echo $info->email?>">
                </div>
                <label class="full-width item-margin text-left pull-left" for="性别">
                    <select class="form-control" style="width: 20%" name="gender">
                        <option value="">性别：</option>
                        <option class="form-control" value="男">男</option>
                        <option class="form-control" value="女">女</option>
                    </select>
                </label>
                <a class="btn btn-info" href="changePwd.php">修改密码</a>
                <input type="submit" class="btn btn-success col-md-12 item-margin" value="确认">
            </div>
        </form>
    </div>
</div>
</body>
</html>