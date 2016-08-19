<?php
header("Content-type:text/html;charset='utf-8'");?>
<?php
/*if(!isset($_POST['submit'])){
    exit('非法访问!');
}*/
session_start();
error_reporting(0);
$username = $_POST['username'];
$password=$_POST['password'];
$email = $_POST['email'];
$province=$_POST['province'];
$zone=$_POST['zones'];
$authcode = $_POST['authcode'];
//注册信息判断

if(!preg_match('/\w+((-w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+/', $email)){
    echo "<script>alert('验证码错误，请重新输入');history.back(-1);</script>";
    exit;

}
//包含数据库连接文件
include('../conn.php');
//检测用户名是否已经存在
$check_query = mysql_query("select uid from user where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
    echo "<script>alert('用户名已存在');history.back(-1);</script>";
    exit;
}
//写入数据
if(strtolower($authcode)==$_SESSION['authcode']){
    $regdate =date("Y-m-d");
    $sql = "INSERT INTO user(username,password,email,regdate,province,zone)VALUES('$username','$password','$email','$regdate','$province','$zone')";
    if(mysql_query($sql,$conn)){
        echo "<script>alert('注册成功');window.location.href='login.php';</script>";
    }
}else{
    echo "<script>alert('验证码错误，请重新输入');history.back(-1);</script>";
}

?>