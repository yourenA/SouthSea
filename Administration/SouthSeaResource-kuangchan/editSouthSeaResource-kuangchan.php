<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_GET['id'];
$sql = mysql_query("select * from db_kuangchan where K_id='$id'");
$row=mysql_fetch_object($sql);
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
        <h1>矿产编辑</h1>
    </div>
    <div class="updateForm">
        <form  name="form1" action="checkEditChuangchan.php" method="post">
            <table>
                <tr>
                    <td><label >名称</label></td>
                    <td><label >图片</label></td>
                    <td><label >开发现状</label></td>
                    <td><label >开发建议</label></td>
                    <td><label >日期</label></td>

                </tr>
                <tr>
                    <td><input class="input" type="text" name="name"  value="<?php echo $row->K_name;?>"></td>
                    <td><input class="input" type="file" name="pic" value=""></td>
                    <td><textarea name="introduction"  cols="40" rows="20"><?php echo $row->K_introduction;?></textarea></td>
                    <td><textarea name="development" cols="40" rows="20"><?php echo $row->K_development;?></textarea></td>
                    <td><input type="date" name="date" value="<?php echo $row->K_data;?>"></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <input type="hidden" name="id" value="<?php echo $row->K_id;?>">
                        <input class="btnUpdate" type="button" onclick=" history.back(-1);" value="取消">
                        <input class="btnUpdate" type="submit" onClick="return check(form1);">
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