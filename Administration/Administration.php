<?php
header("Content-type:text/html;charset=utf-8");
session_start();
include('../conn.php');
if(!isset($_POST['submit'])){
    echo "<script>alert('非法访问，请登录！');window.location.href='../login/superLogin.php';</script>";
    exit;
}

$Susername = $_POST['username'];
$Spassword = $_POST['password'];
$Sauthcode = $_POST['authcode'];
$check_query = mysql_query("select uid from super_user where username='$Susername' and password='$Spassword'limit 1");
/*echo $_SESSION['authcode'];
echo $authcode ;*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>南海群岛--后台管理</title>
</head>
<?php
if($result = mysql_fetch_array($check_query)  && strtolower($Sauthcode)==$_SESSION['authcode']){
    //登录成功
    $_SESSION['Susername'] = $Susername;
    $_SESSION['Suserid'] = $result['uid'];
    echo "<frameset rows = \"185,*\">
    <frame src = \"top.php\"  scrolling=\"no\"/>
    <frameset cols = \"250,*\">
        <frame src = \"left.php\" noresize>
        <frame src = \"default.php\"  name = \"myframe\">
    </frameset>
</frameset>";
} else {
    echo "<script>alert('验证码或密码错误，请重新输入');history.back(-1);</script>";
}
?>

</html>