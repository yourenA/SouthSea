<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_POST['id'];
$name=$_POST['name'];
$belong=$_POST['belong'];
$introduction=$_POST['introduction'];
$content=$_POST['content'];
$from=$_POST['from'];
$date=$_POST['date'];
$user=$_SESSION['Susername'];
$sql = mysql_query("update db_news set title='$name',belong='$belong',introduction='$introduction',content='$content',D_from='$from',D_date='$date',editor='$user' where id='$id'");
if($sql){
    echo "<script>alert('信息修改成功');window.location.href='SouthSeaNews.php';</script>";
}else{
    echo "<script>alert('信息修改失败');history.back(-1);</script>";
}
?>