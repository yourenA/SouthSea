<?php
header('content-type:text/html;charset=utf-8');
error_reporting(0);
include_once '../../upload.func.php';
include_once '../../conn.php';
$N_belong=$_POST['N_belong'];
$N_name=substr($_POST['N_name'],2);
$N_id=substr($_POST['N_name'],0,2);
$N_describe=$_POST['describe'];
$fileInfo=$_FILES['myFile'];
// $newName=uploadFile($fileInfo);
// echo $newName;
// $newName=uploadFile($fileInfo,'imooc');
// echo $newName;
//$allowExt='txt';
$allowExt=array('jpeg','jpg','png','gif');
$newName=uploadFile($fileInfo,'../../pictures',false,$allowExt);
$sql="insert into db_images (island_id,island_name,island_belong,images_path,images_describe) values('$N_id','$N_name','$N_belong','$newName','$N_describe')";

if(mysql_query($sql)){
    echo "<script> alert('图片添加成功！');javascript:history.go(-1);</script>";
}else{
    echo "<script> alert('上传失败！');javascript:history.go(-1);</script>";
}
mysql_free_result($sql);
mysql_close($conn);
?>

