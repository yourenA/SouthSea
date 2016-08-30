<?php
session_start();
error_reporting(0);
include('../../conn.php');

$name=$_POST['name'];
$password1=$_POST['password1'];

$sql = mysql_query("insert into super_user(username,password)values('$name','$password1')");
if($sql){
    echo "<script>alert('管理员添加成功');window.location.href='superMember.php';</script>";
}else{
    echo "<script>alert('管理员添加失败');history.back(-1);</script>";
}
?>