<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_POST['id'];
$name=$_POST['name'];
$belong=$_POST['belong'];
$desc=$_POST['desc'];
$start=$_POST['start'];
$pass=$_POST['pass'];
$now=$_POST['now'];

$sql = mysql_query("update db_build set B_name='$name',B_desc='$desc',B_belong='$belong',B_start='$start',B_pass='$pass',B_now='$now' where B_id='$id'");
if($sql){
    echo "<script>alert('信息修改成功');window.location.href='IslandsBuild.php';</script>";
}else{
    echo "<script>alert('信息修改失败');history.back(-1);</script>";
}
?>