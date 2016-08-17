<?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
session_start();
include('conn.php');
$comment_content=$_POST['message_content'];
$comment_user=$_SESSION['username'];
$comment_date=date("Y-m-d");
$sql="insert into db_message (M_user,M_content,M_date) values('$comment_user','$comment_content','$comment_date')";

if(mysql_query($sql)){
    echo "<script> alert('留言成功！');javascript:history.go(-1);window.location.href = document.referrer;</script>";
}else{
    echo "<script> alert('留言失败！');javascript:history.go(-1);</script>";
}
mysql_free_result($sql);
mysql_close($conn);
?>