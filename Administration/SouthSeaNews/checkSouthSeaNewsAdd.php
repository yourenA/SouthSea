<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
include_once '../../upload.func.php';
$title=$_POST['title'];
$belong=$_POST['belong'];
$ntroduction=$_POST['introduction'];
$content=$_POST['content'];
$from=$_POST['from'];
$date=$_POST['date'];
$editor=$_SESSION['Susername'];
$fileInfo=$_FILES['myFile'];
$allowExt=array('jpeg','jpg','png','gif');
$newName=uploadFile($fileInfo,'../../news/images',false,$allowExt,2097152,11);
$sql = mysql_query("insert into db_news(title,belong,introduction,content,D_from,D_date,editor,images)values('$title','$belong','$ntroduction','$content','$from','$date','$editor','$newName')");
if($sql){
    echo "<script>alert('新闻添加成功');window.location.href='SouthSeaNews.php';</script>";
}else{
    echo "<script>alert('新闻添加失败');history.back(-1);</script>";
}
?>