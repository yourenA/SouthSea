<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_GET['id'];
$belong=$_GET['belong'];
$sql = mysql_query("select * from db_news where id='$id' and belong='$belong'");
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
            if(form.name.value==""){
                alert("标题为空，请输入！");form.name.focus();return false;
            }
            if(form.belong.value==""){
                alert("所属为空，请选择！");form.belong.focus();return false;
            }
            if(form.introduction.value==""){
                alert("概述内容为空，请输入！");form.introduction.focus();return false;
            }
            if(form.content.value==""){
                alert("正文为空，请输入！");form.content.focus();return false;
            }
            if(form.from.value==""){
                alert("所属为空，请输入！");form.from.focus();return false;
            }
            if(form.date.value==""){
                alert("所属为空，请输入！");form.date.focus();return false;
            }


            form.submit();
        }

    </script>
</head>
<body style="background:  rgb(264,220,200)">
<div class="container">
    <div class="caption">
        <h1 id="caption">南海动态编辑</h1>
    </div>
    <div class="updateForm">
        <form  name="form1" action="checkEditNews.php" method="post">
            <table>
                <tr>
                    <td><label for="name">标题</label></td>
                    <td><label for="jingdu">图片</label></td>
                    <td><label for="pic">所属</label></td>
                    <td><label for="weidu">概述</label></td>
                    <td><label for="belong">正文</label></td>
                    <td><label for="pic">来源</label></td>
                    <td><label for="text">日期</label></td>

                </tr>
                <tr>
                    <td><textarea name="name" id="title" cols="20" rows="13"><?php echo $row->title;?></textarea></td>
                    <td><img src="../../news/" alt=""></td>
                    <td>
                        <select  class="input" name="belong">
                            <option value="" >请选择</option>
                            <option value="dongtai">新闻动态</option>
                            <option value="weiquan">南海维权</option>
                        </select>
                    </td>
                    <td><textarea name="introduction" id="text" cols="40" rows="20"><?php echo $row->introduction;?></textarea></td>
                    <td><textarea name="content" id="text" cols="40" rows="20"><?php echo $row->content;?></textarea></td>
                    <td><input type="text" name="from" value="<?php echo $row->D_from;?>"></td>
                    <td><input type="date" name="date"  value="<?php echo $row->D_date;?>"    ></td>
                </tr>
                <tr>
                    <td colspan="7">
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