<?php
session_start();
include('../../conn.php');
$id=$_GET['id'];
$sql = mysql_query("select * from db_build where B_id='$id' ");
$row=mysql_fetch_object($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>南海群岛--岛礁建设</title>
    <link rel="stylesheet" href="IslandBuild.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
</head>
<body style="background-color:  rgb(264,220,200)">
<div class="container">
    <!--中间正文-->
    <div class="center">
        <div class="center-island">
            <div class="center-island-pic">
                <img src="../../build/<?php echo $row->B_image;?>" alt="">
            </div>
            <div class="center-island-article">
                <h2><?php echo $row->B_name;?></h2>
                <p><?php echo $row->B_desc;?></p>
            </div>
            <div class="center-island-process">
                <div class="center-island-process-content center-island-process-start">
                    <div class="icon">1.开始阶段</div>
                    <p><?php echo $row->B_start;?></p>

                </div>
                <hr>
                <div class="center-island-process-content center-island-process-start">
                    <div class="icon">2.建设历程</div>
                    <p><?php echo $row->B_pass;?></p>
                </div>
                <hr>
                <div class="center-island-process-content center-island-process-start">
                    <div class="icon">3.现在状态</div>
                    <p><?php echo $row->B_now;?></p>

                </div>
            </div>
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