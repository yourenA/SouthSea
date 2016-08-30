<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



    <!--/////////////// head区代码开始16css.com ////////////////////-->

    <link rel="stylesheet" href="css/styles.css" type="text/css" />

    <script type="text/javascript" src="../javascript/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="../javascript/main.js"></script>
    <!--/////////////// head区代码结束16css.com ////////////////////-->
</head>

<body>


<div id="content">
    <ul id="expmenu-freebie">
        <li>
            <!-- Start Freebie -->
            <ul class="expmenu">
                <li>
                    <div class="header">
                        <span class="label" style="background-image: url(images/messages.png);"><a href="default.php" target="myframe">首&nbsp;&nbsp;&nbsp;&nbsp;  页</a></span>
                    </div>

                </li>
                <li>
                    <div class="header">
                        <span class="label" style="background-image: url(images/user.png);">南海群岛</span>
                        <span class="arrow up"></span>
                    </div>
                    <ul class="menu"  style="display:none">
                        <li><a href="Islands/nansha/nansha.php"   target="myframe">南沙群岛</a></li>
                        <li><a href="Islands/xisha/xisha.php"   target="myframe">西沙群岛</a></li>
                        <li><a href="Islands/dongsha/dongsha.php"   target="myframe">东沙群岛</a></li>
                        <li><a href="Islands/zhongsha/zhongsha.php"   target="myframe">中沙群岛</a></li>
                    </ul>
                </li>
                <li>
                    <div class="header">
                        <span class="label" style="background-image: url(images/search.png);"><a href="ImageManage/ImageManage.php"  target="myframe">岛礁图片管理</a></span>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <span class="label" style="background-image: url(images/pc.png);"><a href="IslandsBuild/IslandsBuild.php"  target="myframe">岛礁建设</a></span>
                    </div>

                </li>
                <li>
                    <div class="header">
                        <span class="label" style="background-image: url(images/search.png);"><a href="SouthSeaNews/SouthSeaNews.php"  target="myframe">南海动态</a></span>
                    </div>
                   
                </li>
                <li>
                    <div class="header">
                        <span class="label" style="background-image: url(images/search.png);"><a href="SouthSeaExpert/SouthSeaExpert.php"  target="myframe">专家建议</a></span>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <span class="label" style="background-image: url(images/search.png);">自然资源</span>
                        <span class="arrow up"></span>
                    </div>
                    <ul class="menu" style="display:none">
                        <li><a href="SouthSeaResource-kuangchan/SouthSeaResource-kuangchan.php"  target="myframe">矿产资源</a></li>
                        <li><a href="SouthSeaResource-yuye/SouthSeaResource-yuye.php"  target="myframe">渔业资源</a></li>
                    </ul>
                </li>

                <li>
                    <div class="header">
                        <span class="label" style="background-image: url(images/user.png);"><a href="Member/Member.php"  target="myframe">会员管理</a></span>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <span class="label" style="background-image: url(images/user.png);"><a href="Message/Message.php"  target="myframe">留言管理</a></span>
                    </div>
                </li>
                <?php
                    if ($_SESSION['Susername']=='daijiaru'){
                        echo "
                    <li>
                        <div class=\"header\">
                            <span class=\"label\" style=\"background-image: url(images/user.png);\"><a href=\"superMenber/superMember.php\"  target=\"myframe\">管理员管理</a></span>
                        </div>
                    </li>
                    ";
                    }
                ?>

            </ul>
            <!-- End Freebie -->
        </li>
    </ul>
</div>

<!--////////////////////////////////////// 代码结束 www.16css.com ///////////////////////////////////////-->

</div>


</body>
</html>