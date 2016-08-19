<?php
session_start();
include('../conn.php');
//注销登录
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>登陆</title>
</head>
<body>
<?php
@session_start();
if(@$_GET['action'] == "logout"){
    unset($_SESSION['Suserid']);
    unset($_SESSION['Susername']);
    echo "<script>alert('退出成功！');window.top.location.href='../SouthSea/SouthSea.php';</script>";
    exit;
}

?>
</body>
</html>
