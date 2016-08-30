<?php
header("Content-type:text/html;charset=utf-8");
session_start();
/*error_reporting(0);*/
include('../../conn.php');
$id=$_POST['id'];
$name=$_POST['name'];
$ke=$_POST['ke'];
$mu=$_POST['mu'];
$area=$_POST['area'];
$introduction=$_POST['introduction'];
$date=$_POST['date'];

$sql = mysql_query("update db_yuye set Y_name='$name',Y_introduction='$introduction',Y_area='$area',Y_data='$date',Y_belong='$ke',Y_mu='$mu' where Y_id='$id'");
if($sql){
    echo "<script>alert('信息修改成功');window.location.href='SouthSeaResource-yuye.php';</script>";
}else{
    echo "<script>alert('信息修改失败');history.back(-1);</script>";
}
?>