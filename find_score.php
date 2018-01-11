<html>
<head>
    <meta charset="utf-8">
    <title>软件工程专业学生成绩管理系统ヽ(•ω•ゞ)</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style>
        th{
            text-align:center;
        }
    </style>
</head>
<?php
/**
 * Created by PhpStorm.
 * User: ironman
 * Date: 2017/11/15
 * Time: 11:55
 */
include "header.php";
include "controller/find_score_controller.php";
?>
<body style="background: url(img/bg.png) repeat">
<div class="container box-style" style="margin: auto;min-height: 850px;overflow:auto;">
    <div class="text-center">
        <h1>查询成绩信息</h1>
        <?php
        if ($_SESSION['group']==0) {
            ?>
            <form class="item-margin" action="find_score.php" method="get">
                <label for="">
                    <select name="level" id="" class="form-control">
                        <?php
                        $level_arr = getLevel();
                        foreach ($level_arr as &$value) {
                            echo "
                              <option value=\"" . $value . "\">" . $value . "级</option>";
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
                <input class="btn btn-primary" name="submit" type="submit" value="检索">
            </form>
            <?php
        }
        ?>
        <form action="find_score.php" method="post">
            <table class="table table-hover text-center item-margin">
                <thead>
                    <tr>
                        <?php if ($_SESSION['group']==0) { ?>
                            <?php
                            if (isset($_GET['level'])) {
                                echo '
                            <th>学号</th>
                            <th>姓名</th>
                                ';
                                $course = get_score_course();
                                $cou_arr=array();
                                foreach ($course as &$item){
                                    array_push($cou_arr,$item->cid);
                                }
                                $cou_arr = array_unique($cou_arr);
                                foreach ($cou_arr as &$item){
                                    $course_obj = get_course($item);
                                    echo '<th>'.$course_obj->cname.'</th>';
                                }
                            }
                            ?>
                            <?php }elseif($_SESSION['group']==1){
                            ?>
                            <th>学号</th>
                            <th>姓名</th>
                            <th>成绩</th>
                        <?php }else{?>
                            <th>课程名</th>
                            <th>学分</th>
                            <th>课程成绩</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($_SESSION['group']==0){
                    if (isset($_GET['level'])) {
                        $uid_arr = array();
                        foreach ($course as &$item) {
                            array_push($uid_arr, $item->uid);
                        }
                        $uid_arr = array_unique($uid_arr);
                        $stu_arr = array();
                        foreach ($uid_arr as &$item) {
                            $stu_info = get_stu_info($item);
                            array_push($stu_arr,$stu_info);
                        }
                        for ($i = 0; $i < count($uid_arr); $i++) {
                            echo '<tr>
                                <td>' . $stu_arr[$i]->uid . '</td>
                                <td>' . $stu_arr[$i]->name . '</td>';
                            foreach ($cou_arr as &$item) {
                                $score = get_score($item, $stu_arr[$i]->uid);
                                echo '  <td>' . $score->grade . '</td>';
                            }
                            echo '</tr>';
                        }
                    }
                }elseif ($_SESSION['group']==1){
                    $tea = get_stu($_SESSION['tea_cid'][0]->cid);
                    for ($i=0;$i<count($tea);$i++) {
                        $stu = get_stu_info($tea[$i]->uid);
                        echo '<tr>
                                <td>'.$stu->uid.'</td>
                                <td>'.$stu->name.'</td>
                                <td>'.$tea[$i]->grade.'</td>
                              </tr>';
                    }
                }else{
                    $stu = get_stu_score();
                    $score_arr = array();
                    for ($i = 0;$i<count($stu);$i++) {
                        $course = get_course($stu[$i]->cid);
                        $temp_arr = array();
                        array_push($temp_arr,$course->cname,$course->score,$stu[$i]->grade);
                        echo '<tr>
                                <td>'.$course->cname.'</td>
                                <td>'.$course->score.'</td>
                                <td>'.$stu[$i]->grade.'</td>
                              </tr>';
                        array_push($score_arr,$temp_arr);
                    }
                    $_SESSION['score_arr'] = $score_arr;
                    if (isset($_GET['export'])){
                        echo '<script>window.location.href="export_score.php"</script>';
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