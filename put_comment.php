<?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
session_start();
include('conn.php');
$comment_content=$_POST['txt_content'];
$comment_user=$_SESSION['username'];
$comment_date=date("Y-m-d");
$island_id=$_POST['island_id'];
$island_name=$_POST['island_name'];
$island_belong=$_POST['island_belong'];
/*echo $comment_content,$comment_user,$comment_date,$island_id,$island_name,$island_belong;*/
$sql="insert into db_comment (island_id,island_name,island_belong,comment_content,comment_date,comment_user) values('$island_id','$island_name','$island_belong','$comment_content','$comment_date','$comment_user')";

if(mysql_query($sql)){
    echo "<script> alert('留言成功！');javascript:history.go(-1);</script>";
}else{
    echo "<script> alert('留言失败！');javascript:history.go(-1);</script>";
}
mysql_free_result($sql);
mysql_close($conn);
?>