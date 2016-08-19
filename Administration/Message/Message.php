<?php
header("Content-type:text/html;charset=utf-8");
include('../../conn.php');
$sql =mysql_query("select * from de_message order by M_date desc");
$row=@mysql_fetch_object($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../IslandsBuild/IslandBuild.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <script>
        function check(form){
            if(form.keyword.value==""){
                alert("请输入查询用户名");
                form.keyword.focus();
                return false;
            }
        }
        function del(id){
            if(window.confirm("你确定删除用户留言吗？")){
                window.location='checkMessageDel.php?id='+id;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="caption">
        <h1>用户留言管理</h1>
    </div>
    <div class="formDiv">
        <form name="form" method="post" action="">
            <label for="search">请输入搜索用户名:</label>
            <input type="text" name="keyword" class="search" id="search">
            <input type="submit" name="submit" class="btn" value="搜索" onclick="return check(form)">
        </form>
    </div>

    <div class="tableDiv">

        <table class="message-edit">
            <tr>
                <td>用户名</td>
                <td>留言内容</td>
                <td>留言时间</td>
                <td>操作</td>
            </tr>
            <?php
            $keyword=@$_POST['keyword'];
            $sql = mysql_query("select * from db_message where M_user like '%$keyword%'");
            $row=mysql_fetch_object($sql);
            if(!$row){
                echo "<script>alert('你搜索的用户不存在');history.back(0);</script>";
                exit;
            }
            do {
                ?>
                <tr>
                    <td><?php echo $row->M_user;?></td>
                    <td><?php echo $row->M_content;?></td>
                    <td><?php echo $row->M_date;?></td>
                    <td >
                        <a href="javascript:;" onclick="return del(<?php echo $row->M_id;?>) " >删除</a><br/>
                    </td>
                </tr>
                <?php
            }while( $row=mysql_fetch_object($sql));
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