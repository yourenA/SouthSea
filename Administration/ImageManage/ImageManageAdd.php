<?php
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_GET['id'];
$sql = mysql_query("select * from db_images where images_id='$id'");
$row=mysql_fetch_object($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../Islands/css/Island.css">
    <script src="../js/adminJs.js"></script>
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <script>
        function check(form){
            if(form.N_name.value==""){
                alert("岛礁名称不能为空");form.N_name.focus();return false;
            }
            if(form.myFile.value==""){
                alert("岛礁名称不能为空");form.myFile.focus();return false;
            }
            if(form.describe.value==""){
                alert("介绍不能为空");form.describe.focus();return false;
            }
            if(form.describe.value.length>100){
                alert("介绍内容过长，输入内容长度不要超过100");form.describe.focus();return false;
            }

            form.submit();
        }

    </script>
</head>
<body style="background:  rgb(264,220,200)">
<div class="container">
    <div class="caption">
        <h1>图片添加</h1>
    </div>
    <div class="updateForm">
        <form action="checkImageManageAdd.php" method="post"  enctype="multipart/form-data"><!-- enctype="multipart/form-data"没有这个不能传文件-->
            <table>
                <tr>
                    <td><label for="name">选择岛礁:</label></td>
                    <td style="width: 200px">
                        <select name="N_belong" onchange="chinaChange(this,document.getElementById('city'));" style="  height:30px;line-height:30px; ">
                            <option value ="请选择市区">请选择群岛</option>
                            <option value ="xisha">西沙 </option>
                            <option value ="zhongsha">中沙 </option>
                            <option value ="nansha">南沙 </option>
                            <option value ="dongsha">东沙 </option>
                        </select>
                        <select name="N_name" id="city" style="  height:30px;line-height:30px; ">
                            <option value ="请选择市区">请选择岛礁名</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label >选择图片:</label></td><td><input type="file" name='myFile' /></td>
                </tr>
                <tr>
                    <td><label for="text">图片简介:</label></td><td><textarea  name="describe" id="text" cols="40" rows="7"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><input class="btnUpdate" type="button" onClick=" history.back(-1);" value="取消"><input class="btnUpdate" type="submit" value="添加" onclick="return check(form)"></td>
                </tr>

            </table>
        </form>
    </div>
</div>
<a href="javascript:;" class="btn-back" id="btn-back" title="回到上页" onClick="javascript :history.go(-1);">
    <span id="back-span">   返回上页</span>
    <img src="../../SouthSea/images/turn-back.png" alt="">

</a>
<a href="javascript:;" class="btn-top" id="btn-top" title="回到顶部">
    <img src="../../SouthSea/images/turn-top.png" alt="">
    <span id="top-span">返回顶部</span>
</a>
</body>
</html>