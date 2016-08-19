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
$newName=uploadFile($fileInfo,'../../../dongsha/images',false,$allowExt,2097152,17);
$sql = mysql_query("insert into db_dongsha(N_name,N_size,N_positionX,N_positionY,N_belong,N_text,N_pic,N_size)values('$name','$size','$jingdu','$weidu','$belong','$text','$newName','$size')");

if($sql){
    echo "<script>alert('信息添加成功');window.location.href='dongsha.php';</script>";
}else{
    echo "<script>alert('信息添加失败');history.back(-1);</script>";
}
?>