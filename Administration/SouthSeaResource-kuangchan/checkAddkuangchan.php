<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
include_once '../../upload.func.php';
$name=$_POST['name'];
$ntroduction=$_POST['introduction'];
$development=$_POST['development'];
$date=$_POST['date'];

$fileInfo=$_FILES['myFile'];
$allowExt=array('jpeg','jpg','png','gif');
$newName=uploadFile($fileInfo,'../../resource/resourcepic',false,$allowExt,2097152,15);
$sql = mysql_query("insert into db_kuangchan(K_name,K_introduction,K_development,K_data,K_image)values('$name','$ntroduction','$development','$date','$newName')");
if($sql){
    echo "<script>alert('信息添加成功');window.location.href='SouthSeaResource-kuangchan.php';</script>";
}else{
    echo "<script>alert('信息添加失败');history.back(-1);</script>";
}
?>