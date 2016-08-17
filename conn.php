<?php
/*****************************
 *数据库连接
 *****************************/
$conn = @mysql_connect("localhost","root","");
if (!$conn){
    die("连接数据库失败：" . mysql_error());
}
mysql_select_db("sea", $conn);
//字符转换，读库
mysql_query("set character set 'UTF8'");
//写库
mysql_query("set names 'UTF8'");
?>