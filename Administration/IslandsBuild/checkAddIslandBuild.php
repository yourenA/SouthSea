<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
include_once '../../upload.func.php';
$name=$_POST['name'];
$belong=$_POST['belong'];
$desc=$_POST['desc'];
$start=$_POST['start'];
$pass=$_POST['pass'];
$now=$_POST['now'];

$fileInfo=$_FILES['myFile'];
$allowExt=array('jpeg','jpg','png','gif');
$newName=uploadFile($fileInfo,'../../build/buildpic',false,$allowExt,2097152,12);
$sql = mysql_query("insert into db_build(B_name,B_belong,B_desc,B_start,B_pass,B_now,b_image)values('$name','$belong','$desc','$start','$pass','$now','$newName')");
if($sql){
    echo "<script>alert('岛礁添加成功');window.location.href='IslandsBuild.php';</script>";
}else{
    echo "<script>alert('岛礁添加失败');history.back(-1);</script>";
}
?>