<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
include_once '../../upload.func.php';
$title=$_POST['title'];
$name=$_POST['name'];
$ntroduction=$_POST['introduction'];
$content=$_POST['content'];
$date=$_POST['date'];
$editor=$_SESSION['Susername'];
$fileInfo=$_FILES['myFile'];
$allowExt=array('jpeg','jpg','png','gif');
$newName=uploadFile($fileInfo,'../../expert/expertpic',false,$allowExt,2097152,13);

$sql = mysql_query("insert into db_expert(title,D_name,introduction,content,D_date,editor,image)values('$title','$name','$ntroduction','$content','$date','$editor','$newName')");
if($sql){
    echo "<script>alert('信息添加成功');window.location.href='SouthSeaExpert.php';</script>";
}else{
    echo "<script>alert('信息添加失败');history.back(-1);</script>";
}
?>