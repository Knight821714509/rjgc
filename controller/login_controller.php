<?php session_start();
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/10/13
 * Time: 22:18
 */
include "config.php";

echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
$arr = preg_split('[-]',date('Y-m-d h:i:s',time()));
if ($arr[1]<9&&$arr[1]>3){
    $_SESSION['now_term'] = $arr[0].'-'.(string)((int)$arr[0]+1).'/第二学期';
}else{
    $_SESSION['now_term'] = $arr[0].'-'.(string)((int)$arr[0]+1).'/第一学期';
}
if (isset($_POST['submit'])){
    if (trim($_POST['code']) == $_SESSION['code']){
        /*验证码匹配成功*/
        $sql="";
        $ide=$_POST['ide'];
        $_SESSION['mode']=0;
        if (0==$ide){
            $sql = "select name from admin where uid = '$_POST[uname]' and pwd = '$_POST[upwd]'";
        }elseif ($ide==1){
            $sql = "select name from teacher where uid = '$_POST[uname]' and pwd = '$_POST[upwd]'";
            $date = getDateArr("teacher.txt");
            $_SESSION['date'] = $date;
            if ((time()+3600*7>$date[0]&&time()+3600*7<$date[1])||(time()+3600*7-3600*12>(int)$date[0]&&time()+3600*7-3600*12<(int)$date[1])){
                $_SESSION['score_able']=1;
            }else{
                $_SESSION['score_able']=0;
            }
        }else{
            $sql = "select name from student where uid = '$_POST[uname]' and pwd = '$_POST[upwd]'";
            $date = getDateArr("student.txt");
            $_SESSION['date'] = $date;
            $_SESSION['mode'] = 1;
            if ((time()+3600*7>$date[0]&&time()+3600*7<$date[1])||(time()+3600*7-3600*12>(int)$date[0]&&time()+3600*7-3600*12<(int)$date[1])){
                $_SESSION['select_able']=1;
            }else{
                $_SESSION['select_able']=0;
            }
        }
        $result = getArray($sql);
        if (!empty($result)) {
            if ($ide==2) {
                $class_sql = "select level,class from category where cate_id = (select cate_id from student where uid = '" . $_POST['uname'] . "')";
                $_SESSION['class'] = getObj($class_sql);
                $check_sql = "select * from select_course where uid = '$_POST[uname]'";
                if (!empty(getArray($check_sql)))
                    $_SESSION['select_able'] = 3;
            }
            if ($ide==1){
                $cid_sql = "select cid from course where teacher = '".$result[0]."'";
                $_SESSION['tea_cid'] = getObjs($cid_sql);
            }
            $_SESSION['group']=$ide;
            $_SESSION['user']=$result[0];
            $_SESSION['uid']=$_POST['uname'];
            $_SESSION['isLog']=1;
            header('Location: ..\index.php');
        } else {
            echo '<script charset="utf-8">alert("用户名或密码错误~");history.go(-1)</script>';
        }
    }
    else{
        echo '<script charset="utf-8">alert("验证码错误~");history.go(-1)</script>';
    }
}
/**获取文件中的信息
 * @param $path 文件路径
 * @return array 文件中的数据
 */
function getDateArr($path){
    $file = fopen($path, "r");
    $date=array();
    $i=0;
    //输出文本中所有的行，直到文件结束为止。
    while(! feof($file))
    {
        $date[$i]= fgets($file);//fgets()函数从文件指针中读取一行
        $i++;
    }
    fclose($file);
    $date=array_filter($date);
    return $date;
}
