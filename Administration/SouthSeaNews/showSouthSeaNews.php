<?php
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
    <title><?php echo $row->N_name; ?></title>
    <link rel="stylesheet" href="SouthSeaNews.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
</head>
<body>
<div class="container">
    <!--中间正文-->
    <div class="center">
        <div class="center-article">
            <h2><?php echo $row->title; ?></h2>
            <span><?php echo $row->D_date; ?></span><span>来源:<?php echo $row->from; ?></span>
            <div class="introduction">
                <?php echo $row->introduction; ?>
            </div>
            <div class="content">
                <?php echo $row->content; ?>
            </div>
            <span class="editor">责任编辑: <?php echo $row->editor; ?></span>
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