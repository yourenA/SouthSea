<?php
session_start();
error_reporting(0);
include('../../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $row->N_name; ?></title>
    <link rel="stylesheet" href="../css/Island.css">
    <link rel="stylesheet" href="../../css/btn.css">
    <script src="../../../js/index.js"></script>
    <script>
        function check(form){
            if(form.name.value==""){
                alert("名称不能为空");form.name.focus();return false;
            }
            if(form.size.value==""){
                alert("面积不能为空");form.size.focus();return false;
            }
            if(form.jingdu.value==""){
                alert("经度不能为空！");form.jingdu.focus();return false;
            }
            if(form.weidu.value==""){
                alert("维度不能为空");form.weidu.focus();return false;
            }
            if(form.myFile.value==""){
                alert("图片不能为空");form.myFile.focus();return false;
            }
            if(form.text.value==""){
                alert("介绍不能为空");form.text.focus();return false;
            }

            form.submit();
        }
        function backTo{
            history.back(-1);
        }
    </script>
</head>
<body style="background:  rgb(264,220,200)">
<div class="container">
    <div class="caption">
        <h1>中沙群岛--添加岛礁</h1>
    </div>
    <div class="updateForm">
        <form action="checkzhongshaAdd.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="name">名称:</label></td><td><input type="text" name="name" id="name" value=""></td>
                </tr>
                <tr>
                    <td><label for="name">面积:</label></td><td><input type="text" name="size" id="" value=""></td>
                </tr>
                <tr>
                    <td><label for="jingdu">经度:</label></td><td><input type="text" name="jingdu" id="jingdu" value=""></td>
                </tr>
                <tr>
                    <td><label for="weidu">维度:</label></td><td><input type="text" name="weidu" id="weidu" value=""></td>
                </tr>
                <tr>
                    <td><label for="belong">所属:</label></td><td><input type="text" name="belong" id="belong " readonly value="zhongsha"></td>
                </tr>
                <tr>
                    <td><label for="pic">图片:</label></td><td><input type="file" name="myFile"  ></td>
                </tr>
                <tr>
                    <td><label for="text">介绍:</label></td><td><textarea name="text" id="text" cols="40" rows="20"></textarea></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $row->N_id;?>"></td><td><input class="btnUpdate" type="button" onclick=" history.back(-1);" value="取消"><input class="btnUpdate" type="submit" value="添加" onclick="return check(form)"></td>
                </tr>

            </table>
        </form>
    </div>
</div>
<a href="javascript:;" class="btn-back" id="btn-back" title="回到上页" onClick="javascript :history.go(-1);">
    <span id="back-span">   返回上页</span>
    <img src="../../../SouthSea/images/turn-back.png" alt="">

</a>
<a href="javascript:;" class="btn-top" id="btn-top" title="回到顶部">
    <img src="../../../SouthSea/images/turn-top.png" alt="">
    <span id="top-span">返回顶部</span>
</a>
</body>
</html>