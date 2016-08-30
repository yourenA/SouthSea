<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_GET['id'];
$sql = mysql_query("select * from db_expert where id='$id'");
$row=mysql_fetch_object($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../IslandsBuild/edit.css">
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
        <h1 id="caption">专家有话说</h1>
    </div>
    <div class="updateForm">
        <form  name="form1" action="checkEditExpert.php" method="post">
            <table>
                <tr>
                    <td><label >标题</label></td>
                    <td><label>图片</label></td>
                    <td><label>姓名</label></td>
                    <td><label>介绍</label></td>
                    <td><label>正文</label></td>
                    <td><label >日期</label></td>

                </tr>
                <tr>
                    <td><textarea name="title" id="title" cols="20" rows="13"><?php echo $row->title;?></textarea></td>
                    <td width="100"><img width="200" src="../../expert/<?php echo $row->image;?>" alt=""></td>
                    <td><input  type="text" name="name" value="<?php echo $row->D_name;?>"></td>
                    <td><textarea name="introduction" id="text" cols="40" rows="20"><?php echo $row->introduction;?></textarea></td>
                    <td><textarea name="content" id="text" cols="40" rows="20"><?php echo $row->content;?></textarea></td>
                    <td><input type="date" name="date"  value="<?php echo $row->D_date;?>"    ></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <input type="hidden" name="id" value="<?php echo $row->id;?>">
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