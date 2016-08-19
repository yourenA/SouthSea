<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_GET['id'];
$username=$_GET['username'];
$sql = mysql_query("delete from user where uid='$id'");
$sql2 = mysql_query("delete from db_comment where comment_user='$username'");
if($sql && $sql2){
    echo "<script>alert('用户删除成功');history.back(-1);window.location.href = document.referrer;</script>";
}else{
    echo "<script>alert('用户删除失败');history.back(-1);</script>";
}
?>