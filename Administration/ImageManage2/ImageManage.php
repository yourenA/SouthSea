<?php
header("Content-type:text/html;charset=utf-8");
include('../../conn.php');
error_reporting(0);
$sql = mysql_query("select * from db_images order by images_id desc ");
$row=mysql_fetch_object($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../IslandsBuild/IslandBuild.css">
    <link rel="stylesheet" href="../SouthSeaResource-kuangchan/SouthSeaResource.css">
    <script src="../js/adminJs.js"></script>
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <script>
        function check(form){
            if(form.N_name.value==""){
                alert("请输入完整查询");
                form.N_name.focus();
                return false;
            }
        }
        function del(id){
            if(window.confirm("你确定要删除吗，删除后不可恢复！")){
                window.location='checkImageMangeDel.php?id='+id;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="caption">
        <h1>岛礁图片</h1>
    </div>
    <div class="formDiv">
        <form name="form" method="post" action="">
            <select name="N_belong" onchange="chinaChange(this,document.getElementById('city'));" style=" width:10%; height:30px;line-height:30px; ">
                <option value ="请选择">请选择群岛</option>
                <option value ="xisha">西沙 </option>
                <option value ="zhongsha">中沙 </option>
                <option value ="nansha">南沙 </option>
                <option value ="dongsha">东沙 </option>
            </select>
            <select name="N_name" id="city" style=" width:10%; height:30px;line-height:30px; ">
                <option value ="请选择">请选择岛礁名</option>
            </select>
            <input type="submit" name="submit" class="btn" value="搜索" onclick="return check(form)">
            <input type="button" class="btn addbtn" value="添加图片" onclick="window.location.href='ImageManageAdd.php'">
        </form>
    </div>
    <div class="resourceBox">
        <ul>
            <?php
            $keyword=@substr($_POST['N_name'],2);
            $sql = mysql_query("select * from db_images  where island_name like '%$keyword%'  ");
            $row=mysql_fetch_object($sql);
            if(!$row){
                echo "<script>alert('你搜索的图片不存在');history.back(-1);</script>";
            }
            do {
                ?>
                <li style="height: 350px">
                    <div class="item">
                        <div class="item-top">
                            <img src="../../<?php echo $row->images_path;?>" alt="">
                        </div>
                        <div class="item-center " style="height: 100px;border-top: 1px solid black">
                            <h5><?php echo $row->island_name;?></h5>
                            <i style="font-size: 16px;font-weight: normal;text-indent: 0" >描述 : <?php echo $row->images_describe;?></i>
                        </div>
                        <div class="item-bottom" >
                            <a href="ImageManageEdit.php?id=<?php echo $row->images_id;?>">编辑</a>
                            <a  href="javascript:;" onclick="return del(<?php echo $row->images_id;?>)" >删除</a>
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