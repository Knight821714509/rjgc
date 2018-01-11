<?php
/**
 * Created by PhpStorm.
 * User: artorias
 * Date: 2017/11/1
 * Time: 13:57
 */
session_start();
$_SESSION=array();
setCookie(session_name(),'',time()-3600,'/');
session_destroy();
header("Location:index.php");