<?php
session_start();
error_reporting(0);
include('../../conn.php');
$id=$_GET['id'];
$sql = mysql_query("select * from db_yuye where Y_id='$id'");
$row=mysql_fetch_object($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $row->R_name; ?></title>
    <link rel="stylesheet" href="../../resource/resource.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
</head>
<body>
<div class="container">

    <!--中间正文-->
    <div class="resource">
        <div class="resource-contentPage">
            <img src="../../resource/<?php echo $row->Y_image;?>" alt=""><h2><?php echo $row->Y_name;?></h2>
            <p>
                <span>所属科目 :</span> <?php echo $row->Y_belong;?>&nbsp;<?php echo $row->Y_mu;?>
            </p>
            <p>
                <span>主要产地 :</span> <?php echo $row->Y_area;?>
            </p>
            <p>
                <span>简 &nbsp;&nbsp;&nbsp;介 :</span> <?php echo $row->Y_introduction;?>
            </p>
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