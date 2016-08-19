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
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo "<script>alert('退出成功！');javascript:history.back(-1);</script>";
    exit;
}
if(!isset($_POST['submit'])){
    exit('非法访问!');
}

$username = $_POST['username'];
$password = $_POST['password'];
$authcode = $_POST['authcode'];
$check_query = mysql_query("select uid from user where username='$username' and password='$password'limit 1");
/*echo $_SESSION['authcode'];
echo $authcode ;*/
if($result = mysql_fetch_array($check_query)  && strtolower($authcode)==$_SESSION['authcode']){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['uid'];
    echo "<script>window.location.href='../SouthSea/SouthSea.php';</script>";
} else {
    echo "<script>alert('验证码或密码错误，请重新输入');history.back(-1);</script>";
}
?>
</body>
</html>
