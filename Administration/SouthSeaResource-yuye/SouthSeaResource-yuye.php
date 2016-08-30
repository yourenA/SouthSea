<?php
header("Content-type:text/html;charset=utf-8");
include('../../conn.php');
$sql = mysql_query("select * from db_yuye order by Y_id desc ");
$row=mysql_fetch_object($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../IslandsBuild/IslandBuild.css">
    <link rel="stylesheet" href="SouthSeaResource.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <script>
        function check(form){
            if(form.keyword.value==""){
                alert("请输入查询关键字");
                form.keyword.focus();
                return false;
            }
        }
        function del(id){
            if(window.confirm("你确定要删除吗，删除后不可恢复！")){
                window.location='checkYuyeDel.php?id='+id;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="caption">
        <h1>南海鱼类</h1>
    </div>
    <div class="formDiv">
        <form name="form" method="post" action="">
            <label for="search">请输入搜索内容:</label>
            <input type="text" name="keyword" class="search" id="search">
            <input type="submit" name="submit" class="btn" value="搜索" onclick="return check(form)">
            <input type="button" class="btn addbtn" value="添加渔业信息" onclick="window.location.href='yuyeAdd.php'">
        </form>
    </div>
    <div class="resourceBox">
        <ul>
            <?php
            $keyword=@$_POST['keyword'];
            $sql = mysql_query("select * from db_yuye where Y_name like '%$keyword%' ");
            $row=mysql_fetch_object($sql);
            if(!$row){
                echo "<script>alert('你搜索的信息不存在');history.back(0);</script>";
                exit;
            }
            do {
            ?>
            <li>
                <div class="item">
                    <div class="item-top">
                        <img src="../../resource/<?php echo $row->Y_image;?>" alt="">
                    </div>
                    <div class="item-center">
                        <span><?php echo $row->Y_name;?></span>
                    </div>
                    <div class="item-bottom">
                        <a href="showSouthSeaResource-yuye.php?id=<?php echo $row->Y_id;?>">查看</a>
                        <a href="editSouthSeaResource-yuye.php?id=<?php echo $row->Y_id;?>">编辑</a>
                        <a  href="javascript:;" onclick="return del(<?php echo $row->Y_id;?>)" >删除</a>
                    </div>
                </div>
            </li>
                <?php
            }while( $row=mysql_fetch_object($sql));
            ?>
        </ul>
        <div class="empty">

        </div>
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