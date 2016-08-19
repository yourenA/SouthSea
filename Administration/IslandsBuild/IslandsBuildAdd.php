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
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <script>
        function check(form){
            if(form.name.value==""){
                alert("名称为空，请输入！");form.name.focus();return false;
            }
            if(form.belong.value==""){
                alert("岛礁所属为空，请选择！");form.belong.focus();return false;
            }
            if(form.myFile.value==""){
                alert("图片不能为空");form.myFile.focus();return false;
            }
            if(form.desc.value==""){
                alert("概述内容为空，请输入！");form.desc.focus();return false;
            }
            if(form.start.value==""){
                alert("开始阶段内容为空，请输入！");form.start.focus();return false;
            }
            if(form.pass.value==""){
                alert("建设历程内容为空，请输入！");form.pass.focus();return false;
            }
            if(form.now.value==""){
                alert("选择状态内容为空，请输入！");form.now.focus();return false;
            }

            form.submit();
        }

    </script>
</head>
<body style="background:  rgb(264,220,200)">
<div class="container">
    <div class="caption">
        <h1>添加建设岛礁</h1>
    </div>
    <div class="updateForm">
        <form  name="form1" action="checkAddIslandBuild.php" method="post"  enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="name">名称</label></td>
                    <td style="width: 100px"><label for="jingdu" >图片</label></td>
                    <td><label for="jingdu">所属</label></td>
                    <td><label for="weidu">概述</label></td>
                    <td><label for="belong">开始阶段</label></td>
                    <td><label for="pic">建设历程</label></td>
                    <td><label for="text">现在状态</label></td>

                </tr>
                <tr>
                    <td><input class="input" type="text" name="name" id="name" value=""></td>
                    <td><input type="file" name="myFile"  ></td>
                    <td>
                        <select  class="input" name="belong">
                            <option value="" >请选择</option>
                            <option value="nansha">南沙</option>
                            <option value="xisha">西沙</option>
                            <option value="zhongsha">中沙</option>
                            <option value="dongsha">东沙</option>
                        </select>
                    </td>
                    <td><textarea name="desc" id="text" cols="40" rows="20"></textarea></td>
                    <td><textarea name="start" id="text" cols="40" rows="20"></textarea></td>
                    <td><textarea name="pass" id="text" cols="40" rows="20"></textarea></td>
                    <td><textarea name="now" id="text" cols="40" rows="20"></textarea></td>
                </tr>
                <tr>
                    <td colspan="7">
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