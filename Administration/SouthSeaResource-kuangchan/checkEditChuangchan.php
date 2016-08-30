<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_POST['id'];
$name=$_POST['name'];
$introduction=$_POST['introduction'];
$development=$_POST['development'];
$date=$_POST['date'];

$sql = mysql_query("update db_kuangchan set K_name='$name',K_introduction='$introduction',K_development='$development',K_data='$date' where K_id='$id'");
if($sql){
    echo "<script>alert('信息修改成功');window.location.href='SouthSeaResource-kuangchan.php';</script>";
}else{
    echo "<script>alert('信息修改失败');history.back(-1);</script>";
}
?>