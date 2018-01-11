<html>
<head>
    <meta charset="utf-8">
    <title>软件工程专业学生成绩管理系统ヽ(•ω•ゞ)</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="all">
    <link rel="stylesheet" href="css/timedropper.css">
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/timedropper.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // date time picker
            if($(".iDate.date").length>0){
                $(".iDate.date").datetimepicker({
                    locale:"zh-cn",
                    format:"YYYY-MM-DD",
                    dayViewHeaderFormat:"YYYY年 MMMM"
                });
            }
        })
    </script>
</head>
<?php
/**
 * Created by PhpStorm.
 * User: iron man
 * Date: 2017/11/15
 * Time: 11:55
 */
include "header.php";
include "controller/admin_controller.php";
?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 850px;overflow:auto;">
    <div class="text-center">
        <?php
        if ($_GET['mode']==0){
            echo '<h1>设置教师录入成绩时间</h1>';
        ?>
            <form name="form1" method="post" action="controller/admin_controller.php">
                <script src="/demos/googlegg.js"></script>
                <div class="item-margin col-md-6">
                    开始时间：
                    <div class="iDate date">
                        <input name="start_day" type="text">
                        <button type="button" class="addOn"></button>
                    </div>
                    <input name="start_time" type="text" class="button alarm" style="width: 70px"/>
                </div>
                <script src="/demos/googlegg.js"></script>
                <div class="item-margin col-md-6">
                    结束时间：
                    <div class="iDate date">
                        <input name="end_day" type="text">
                        <button type="button" class="addOn"></button>
                    </div>
                    <input name="end_time" type="text" class="button alarm" style="width: 70px"/>
                    <script>$( ".alarm" ).timeDropper();</script>
                </div>
                <input class="btn btn-success" type="submit" value="确认">
            </form>
        <?php
        }else{
            echo '<h1>设置学生选课时间</h1>';
        ?>
            <form name="form1" method="get" action="controller/admin_controller.php">
                <script src="/demos/googlegg.js"></script>
                <div class="item-margin col-md-6">
                    开始时间：
                    <div class="iDate date">
                        <input name="start_day" type="text">
                        <button type="button" class="addOn"></button>
                    </div>
                    <input name="start_time" type="text" class="button alarm" style="width: 70px"/>
                </div>
                <script src="/demos/googlegg.js"></script>
                <div class="item-margin col-md-6">
                    结束时间：
                    <div class="iDate date">
                        <input name="end_day" type="text">
                        <button type="button" class="addOn"></button>
                    </div>
                    <input name="end_time" type="text" class="button alarm" style="width: 70px"/>
                    <script>$( ".alarm" ).timeDropper();</script>
                </div>
                <input class="btn btn-success" type="submit" value="确认">
            </form>
        <?php
        }
        ?>
    </div>
</div>
</body>
</html>