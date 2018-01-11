<html>
<head>
    <meta charset="utf-8">
    <?php include "controller/login_controller.php" ?>
    <title>登录-软件工程专业学生成绩管理系统ヽ(•ω•ゞ)</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="background:url(img/bg.png)">
<form method="post" action="controller/login_controller.php" class="col-md-3" style="position: absolute;left: 37%;top: 30%;">
    <h2 style="color: #ffffff;margin-bottom: 80px">软件工程专业学生成绩管理系统</h2>
    <input class="form-control" type="text" name="uname" placeholder="用户名"><br>
    <input class="form-control" type="password" name="upwd" placeholder="密码"><br>
    <input type="text" placeholder="验证码" name="code" class="captcha form-control"><br>
    <img id="captcha_img" style="width: 100px" src="utils/vcode.php" alt="验证码">
    <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='utils/vcode.php?r='+Math.random()" style="color: #FFFFBB;">看不清？换一个</a> &nbsp;&nbsp;&nbsp;&nbsp;<br><br>
    <label class="col-md-4" style="color: #ffffff;font-size: 20px" for="管理员"><input id="管理员" type="radio" name="ide" value="0" checked="checked"> 管理员</label>
    <label class="col-md-4" style="color: #ffffff;font-size: 20px" for="教师"><input id="教师" type="radio" name="ide" value="1"> 教师</label>
    <label class="col-md-4" style="color: #ffffff;font-size: 20px" for="学生"><input id="学生" type="radio" name="ide" value="2"> 学生</label>
    <input class="btn btn-success col-md-12" type="submit" name="submit" value="登录">
</form>
</body>
</html>
