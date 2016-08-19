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
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <script>
        function check(form){
            if(form.name.value==""){
                alert("岛礁名称不能为空");form.name.focus();return false;
            }
            if(form.text.value==""){
                alert("介绍不能为空");form.text.focus();return false;
            }
            if(form.text.value.length>100){
                alert("介绍内容过长，输入内容长度不要超过100");form.text.focus();return false;
            }

            form.submit();
        }

    </script>
</head>
<body style="background:  rgb(264,220,200)">
<div class="container">
    <div class="caption">
        <h1>图片编辑</h1>
    </div>
    <div class="updateForm">
        <form action="checkImageManageEdit.php" method="post">
            <table>
                <tr>
                    <td><label for="name">岛礁名称:</label></td><td><input type="text" name="name" id="name" value="<?php echo $row->island_name;?>"></td>
                </tr>
                <tr>
                    <td><label >图片:</label></td><td><img style="width: 310px;height: auto" src="../../<?php echo $row->images_path;?>" alt=""></td>
                </tr>
                <tr>
                    <td><label for="text">图片简介:</label></td><td><textarea  name="text" id="text" cols="40" rows="7"><?php echo $row->images_describe;?></textarea></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $row->images_id;?>"></td><td><input class="btnUpdate" type="button" onClick=" history.back(-1);" value="取消"><input class="btnUpdate" type="submit" value="修改" onclick="return check(form)"></td>
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