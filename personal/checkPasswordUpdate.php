<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../conn.php');

$name=$_POST['name'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$sql = mysql_query("select password from user where username='$name'");
$row=mysql_fetch_object($sql);
if($password1!=$row->password){
    echo "<script>alert('原密码错误，请重新输入');history.back(-1);</script>";
    exit;
}else{
    $sql2 = mysql_query("update user set password='$password2' where username='$name'");
    if($sql2){
        echo "<script>alert('密码修改成功');history.back(-1);</script>";
    }else{
        echo "<script>alert('出现错误，请重新测试');history.back(-1);</script>";
    }
}

?>