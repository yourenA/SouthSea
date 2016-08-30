<?php
session_start();
error_reporting(0);
include('../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $row->N_name; ?></title>
    <link rel="stylesheet" href="../Islands/css/Island.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <script>
        function check(form){
            if(form.title.value==""){
                alert("标题为空，请输入！");form.title.focus();return false;
            }
            if(form.name.value==""){
                alert("姓名为空，请选择！");form.name.focus();return false;
            }
            if(form.myFile.value==""){
                alert("图片不能为空");form.myFile.focus();return false;
            }
            if(form.introduction.value==""){
                alert("介绍为空，请输入！");form.introduction.focus();return false;
            }
            if(form.content.value==""){
                alert("正文为空，请输入！");form.content.focus();return false;
            }
            if(form.date.value==""){
                alert("日期为空，请输入！");form.date.focus();return false;
            }

            form.submit();
        }

    </script>
</head>
<body style="background:  rgb(264,220,200)">
<div class="container">
    <div class="caption">
        <h1>添加专栏信息</h1>
    </div>
    <div class="updateForm">
        <form action="checkSouthSeaExpertAdd.php" method="post"  enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="name">标题:</label></td><td><input type="text" name="title" id="title" value="" width="300"></td>
                </tr>
                <tr>
                    <td><label for="name">姓名</label></td><td><input type="text" name="name" value="" width="300"></td>
                </tr>
                <tr>
                    <td><label for="pic">图片:</label></td><td><input type="file" name="myFile"  ></td>
                </tr>
                <tr>
                    <td><label for="introduction">介绍:</label></td><td><textarea name="introduction" id="introduction" cols="60" rows="8"></textarea></td>
                </tr>
                <tr>
                    <td><label for="content">内容:</label></td><td><textarea name="content" id="content"  cols="60" rows="15"></textarea></td>
                </tr>
                <tr>
                    <td><label for="date">日期:</label></td><td><input type="date" name="date" id="date" value=""></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value=""></td><td><input class="btnUpdate" type="button" onclick=" history.back(-1);" value="取消"><input class="btnUpdate" type="submit" value="添加" onclick="return check(form)"></td>
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