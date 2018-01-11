<?php
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/10/13
 * Time: 22:04
 */
/** 连接数据库
 * @return mysqli 数据库连接
 */
function getCon()
{
    $link = mysqli_connect('localhost', 'root', 'root');
    if (!$link) {
        die('Fail!');
    }
    mysqli_select_db($link,"cjglxt") or die('不能使用cjglxt表' . mysqli_error($link));
    mysqli_query($link,"set character set 'utf8'");
    mysqli_query($link,"set names 'utf8'");
    return $link;
}

/**以数组的方式获取数据库中的内容
 * @param $sql SQL语句
 * @return array|null 查询结果集
 */
function getArray($sql){
    $link = getCon();
    $result = mysqli_query($link,$sql);
    if (empty($result)){
        echo '<script>alert("服务器注水错误，请稍候重试~");history.go(-1)</script>';
    }
    else {
        return mysqli_fetch_array($result);
    }
    return array();
}

/** 获取单值
 * @param $sql
 * @return null 查询结果集
 */
function getId($sql){
    $link = getCon();
    $result = mysqli_query($link,$sql);
    if (empty($result)){
        return null;
    }
    else {
        return mysqli_fetch_array($result)[0];
    }
}

/** 以对象的形式返回数据库中的查询结果
 * @param $sql
 * @return null|object 查询结果集
 */
function getObj($sql){
    $link = getCon();
    $result = mysqli_query($link,$sql);
    if (empty($result)){
        echo '<script>alert("服务器注水错误，请稍候重试~");history.go(-1)</script>';
    }
    else {
        return mysqli_fetch_object($result);
    }
    return null;
}

/**以对象数组的形式返回查询结果集
 * @param $sql
 * @return array|null 查询结果集
 */
function getObjs($sql){
    $link = getCon();
    $result = mysqli_query($link,$sql);
    if (empty($result)){
        echo '<script>alert("服务器注水错误，请稍候重试~");history.go(-1)</script>';
    }
    else {
        $objs = array();
        while($obj = mysqli_fetch_object($result)){
            array_push($objs,$obj);
        }
        return $objs;
    }
    return null;
}

/**执行SQL语句
 * @param $sql
 * @return bool 返回执行结果是否成功
 */
function exec_sql($sql){
    $link = getCon();
    $result = mysqli_query($link,$sql);
    if (empty($result)){
        echo '<script>alert("服务器注水错误，请稍候重试~");history.go(-1)</script>';
    }
    else {
        return true;
    }
    return false;
}