<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $row->B_name; ?></title>
    <link rel="stylesheet" href="../IslandsBuild/edit.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <script>
        function check(form){
            if(form.name.value==""){
                alert("名称为空，请输入！");form.name.focus();return false;
            }
            if(form.myFile.value==""){
                alert("图片不能为空");form.myFile.focus();return false;
            }
            if(form.introduction.value==""){
                alert("开发现状为空，请选择！");form.introduction.focus();return false;
            }
            if(form.development.value==""){
                alert("开发建议为空，请输入！");form.development.focus();return false;
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
        <h1>岛礁建设编辑</h1>
    </div>
    <div class="updateForm">
        <form  name="form1" action="checkAddkuangchan.php" method="post"  enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="name">名称</label></td>
                    <td><label for="jingdu">图片</label></td>
                    <td><label for="weidu">开发现状</label></td>
                    <td><label for="belong">开发建议</label></td>
                    <td><label for="pic">日期</label></td>

                </tr>
                <tr>
                    <td><input type="text" name="name" style="padding: 20px"></td>
                    <td><input type="file" name="myFile"  style="padding: 20px"></td>
                    <td><textarea name="introduction" id="" cols="40" rows="20"></textarea></td>
                    <td><textarea name="development" id="" cols="40" rows="20"></textarea></td>
                    <td><input type="date" name="date"  style="padding: 20px"></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <input type="hidden" name="id" value="">
                        <input class="btnUpdate" type="button" onclick=" history.back(-1);" value="取消">
                        <input class="btnUpdate" type="submit" onClick="return check(form1);" value="添加">
                    </td>
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