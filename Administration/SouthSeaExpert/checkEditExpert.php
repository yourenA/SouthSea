<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_POST['id'];
$title=$_POST['title'];
$name=$_POST['name'];
$introduction=$_POST['introduction'];
$content=$_POST['content'];
$date=$_POST['date'];
$user=$_SESSION['Susername'];
$sql = mysql_query("update db_expert set title='$title',D_name='$name',introduction='$introduction',content='$content',D_date='$date',editor='$user' where id='$id'");
if($sql){
    echo "<script>alert('信息修改成功');window.location.href='SouthSeaExpert.php';</script>";
}else{
    echo "<script>alert('信息修改失败');history.back(-1);</script>";
}
?>