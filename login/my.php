<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>登陆成功</title>
</head>
<body>
<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    echo "<script>alert('请先登录');window.location.href='login.php';</script>";
    exit();
}

//包含数据库连接文件
include('../conn.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$user_query = mysql_query("select * from user where uid=$userid limit 1");
$row = mysql_fetch_array($user_query);
echo '用户信息：<br />';
echo '用户ID：',$userid,'<br />';
echo '用户名：',$username,'<br />';
echo '邮箱：',$row['email'],'<br />';
echo '注册日期：',date("Y-m-d", $row['regdate']),'<br />';
echo '<a href="check_login.php?action=logout">注销</a> 登录<br />';
?>
</body>
</html>


