<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../../conn.php');
$id=$_GET['id'];
$sql = mysql_query("delete from db_nansha where N_id='$id'");
if($sql){
    echo "<script>alert('岛礁删除成功');history.back(-1);window.location.href = document.referrer;</script>";
}else{
    echo "<script>alert('岛礁删除失败');history.back(-1);</script>";
}
?>