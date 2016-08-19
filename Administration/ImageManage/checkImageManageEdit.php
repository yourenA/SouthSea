<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_POST['id'];
$name=$_POST['name'];
$text=$_POST['text'];

$sql = mysql_query("update db_images set island_name='$name',images_describe='$text' where images_id='$id'");
if($sql){
    echo "<script>alert('信息修改成功');window.location.href='ImageManage.php';</script>";
}else{
    echo "<script>alert('信息修改失败');history.back(-1);</script>";
}
?>