<?php
session_start();
error_reporting(0);
include('../../../conn.php');
$id=$_POST['id'];
$name=$_POST['name'];
$size=$_POST['size'];
$jingdu=$_POST['jingdu'];
$weidu=$_POST['weidu'];
$belong=$_POST['belong'];
$text=$_POST['text'];

$sql = mysql_query("update db_zhongsha set N_name='$name',N_positionX='$jingdu',N_positionY='$weidu',N_belong='$belong',N_text='$text',N_size='$size' where N_id='$id'");
if($sql){
    echo "<script>alert('信息修改成功');window.location.href='zhongsha.php';</script>";
}else{
    echo "<script>alert('信息修改失败');history.back(-1);</script>";
}
?>
