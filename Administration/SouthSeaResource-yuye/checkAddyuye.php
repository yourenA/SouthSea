<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
include_once '../../upload.func.php';
$name=$_POST['name'];
$ke=$_POST['ke'];
$mu=$_POST['mu'];
$area=$_POST['area'];
$introduction=$_POST['introduction'];
$date=$_POST['date'];

$fileInfo=$_FILES['myFile'];
$allowExt=array('jpeg','jpg','png','gif');
$newName=uploadFile($fileInfo,'../../resource/yuyepic',false,$allowExt,2097152,15);
$sql = mysql_query("insert into db_yuye (Y_name,Y_introduction,Y_area,Y_data,Y_belong,Y_mu,Y_image)values('$name','$introduction','$area','$date','$ke','$mu','$newName')");
if($sql){
    echo "<script>alert('信息添加成功');window.location.href='SouthSeaResource-yuye.php';</script>";
}else{
    echo "<script>alert('信息添加失败');history.back(-1);</script>";
}
?>