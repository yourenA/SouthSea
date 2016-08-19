<?php
header("Content-type:text/html;charset=utf-8");
include('../../conn.php');
$user=$_GET['username'];
$sql = mysql_query("select * from db_comment where comment_user='$user' order by comment_date desc");
$row=mysql_fetch_object($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../IslandsBuild/IslandBuild.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <style>
        td{
            min-width: 100px;
            padding: 10px;
        }
    </style>
    <script>
        function del(id){
            if(window.confirm("你确定要删除吗，删除后不可恢复！")){
                window.location='checkCommentDel.php?id='+id;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="caption">
        <h1>用户评论</h1>
    </div>
    <div class="tableDiv">

        <table>
            <tr>
                <td>用户名</td>
                <td>评论岛礁</td>
                <td>评论内容</td>
                <td>评论日期</td>
                <td>操作</td>
            </tr>
            <?php
            if(!$row){
                echo "<tr><td colspan='5' style='padding: 10px'>该用户还没有评论</td></tr>";
            }else{
                do {
                    ?>
                    <tr>
                        <td><?php echo $row->comment_user;?></td>
                        <td><?php echo $row->island_name;?></td>
                        <td><?php echo $row->comment_content;?></td>
                        <td><?php echo $row->comment_date;?></td>
                        <td class="edit">
                            <a href="javascript:;" onclick="return del(<?php echo $row->comment_id;?>)">删除</a>
                        </td>
                    </tr>
                    <?php
                }while( $row=mysql_fetch_object($sql));
            }

            ?>

        </table>
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