<?php
//设置PHP的显示语言
header('Content-Type:text/html;charset=UTF-8');
session_start();
error_reporting(0);
include('../../conn.php');
//获取输入的用户名
$tmp=$_GET["UserID"];


$query="select * from super_user where username='$tmp'";
$result = mysql_query($query) or  die ($query.mysql_error());
$rows=mysql_num_rows($result);
if($rows>0)
{ //存在记录
    echo "1";
}else{
    echo("2");
}
?>