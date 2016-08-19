<?php
session_start();
error_reporting(0);
include('../../../conn.php');
include_once '../../../upload.func.php';
$id=$_POST['id'];
$name=$_POST['name'];
$size=$_POST['size'];
$jingdu=$_POST['jingdu'];
$weidu=$_POST['weidu'];
$belong=$_POST['belong'];
$text=$_POST['text'];
$fileInfo=$_FILES['myFile'];
$allowExt=array('jpeg','jpg','png','gif');
$newName=uploadFile($fileInfo,'../../../zhongsha/images',false,$allowExt,2097152,18);
$sql = mysql_query("insert into db_zhongsha(N_name,N_positionX,N_positionY,N_belong,N_text,N_pic,N_size)values('$name','$jingdu','$weidu','$belong','$text','$newName','$size')");

if($sql){
    echo "<script>alert('信息添加成功');window.location.href='zhongsha.php';</script>";
}else{
    echo "<script>alert('信息添加失败');history.back(-1);</script>";
}
?>