<?php
session_start();
include('../conn.php');
include('../substr_text.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>南海群岛--首页</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="SouthSea.css">
    <link rel="stylesheet" href="../css/font-awesome.css">  
    <script src="../js/index.js"></script>
    <script src="SouthSea.js"></script>
    <script src="../js/checkSearch.js"></script>
    <script>
        function checkMessage(form){
            if(form.message_content.value==""){
                alert("你在留言板输入的内容为空，请输入！");form.message_content.focus();return false;
            }
            if(form.message_content.value.length<10){
                alert("你在留言板输入的内容过短，请输入多点内容！");form.message_content.focus();return false;
            }
            if(form.message_content.value.length>300){
                alert("你在留言板输入的内容过长，请输入少点内容！");form.message_content.focus();return false;
            }

            form.submit();
        }

    </script>
</head>
<body>
    <div class="container">
        <!--头部-->
        <div class="head">
            <div class="head-left-top"></div>
            <div class="head-top">
                <div class="head-top-content">
                    <div class="head-top-content-span">
                        <span id="time" class="time">
                            <?php
                                echo date("Y-m-d");
                            ?>
                            |</span>
                        <?php
                            if(isset($_SESSION['username'] )){
                                echo "欢迎你 <a href=\"../personal/personal.php\">{$_SESSION['username']}</a>";
                                echo " <span>| <a href=\"../login/check_login.php?action=logout\" class=\"register\">退出</a></span>";
                            }else{
                                echo "<span><a href=\"../login/login.php\" class=\"login\">登陆</a></span>
                        <span>| <a href=\"../login/register.php\" class=\"register\">注册</a></span>";
                            }
                        ?>


                    </div>
                </div>

            </div>
            <div class="head-logo">
                <div class="head-logo-pic">
                    <div class="head-logo-logo"></div>
<div class="head-search">
                        <form method="get" action="../search/search.php" name="search_form">
                            <table>
                                <tr>
                                    <td><input class="search-input" name="search_input" placeholder="请输入搜索内容" type="text"></td>
                                    <td>
                                        <select class="search-select" name="search_select" id="">
                                            <option value="岛礁">岛礁</option>
                                            <option value="新闻">新闻</option>
                                            <option value="矿产">矿产</option>
                                            <option value="鱼类">鱼类</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit"  id="scbar_btn" class="search-submit" onclick="return checkSearch(search_form) " ></button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="head-nav">
                <ul class="head-nav-ul">
                    <li class="active"><a href="#">首页</a></li>
                    <li ><a href="../SouthSea-Board/SouthSea-Board.php">南海群岛</a>
                        <ul>
                            <li ><a href="../nansha/nansha.php">南沙群岛</a></li>
                            <li ><a href="../xisha/xisha.php">西沙群岛</a></li>
                            <li ><a href="../zhongsha/zhongsha.php">中沙群岛</a></li>
                            <li ><a href="../dongsha/dongsha.php">东沙群岛</a></li>
                        </ul>
                    </li>
                    <li ><a href="../build/build.php">岛礁建设</a></li>
                    <li ><a href="../news/news.php">南海动态</a>
                        <ul>
                            <li ><a href="../news/dongtai.php">新闻动态</a></li>
                            <li ><a href="../news/weiquan.php">南海维权</a></li>
                        </ul>
                    </li>
                    <li ><a href="../expert/expert.php">专家建议</a></li>
                    <li ><a href="../resource/resource.php">自然资源</a>
                        <ul>
                            <li ><a href="../resource/kuangchan.php">矿产资源</a></li>
                            <li ><a href="../resource/yuye.php">渔类资源</a></li>
                        </ul>
                    </li>
                    <li ><a href="../video/video.php">影像资料</a></li>
                    <li class="superLogin"><a href="../login/superLogin.php">管理员入口</a></li>
                </ul>
            </div>
        </div>

        <!--中间内容-->
        <div class="body">
            <div class="body-top">
                <div class="body-top-pic" id="body-top-pic">
                    <span id="turn-left" class="turn-left"></span>
                    <span id="turn-right" class="turn-right"></span>
                    <ul id="ul">
                    <li>
                        <a href="../nansha/nansha.php"><img src="images/yongshu.jpg" alt=""></a>
                        <p class="body-top-pic-text">南沙群岛</p>
                    </li>
                    <li>
                        <a href="../xisha/xisha.php"><img src="../xisha/images/yongxing.jpg" alt=""></a>
                        <p class="body-top-pic-text">西沙群岛</p>
                    </li>
                    <li>
                        <a href="../zhongsha/zhongsha.php"><img src="../zhongsha/images/huangyan.jpg" alt=""></a>
                        <p class="body-top-pic-text">中沙群岛</p>
                    </li>
                    <li>
                        <a href="../dongsha/dongsha.php"><img src="../dongsha/images/dongsha.jpg" alt=""></a>
                        <p class="body-top-pic-text">东沙群岛</p>
                    </li>
                </ul>

                </div>
                <div class="body-top-news">
                    <div class="body-top-news-content">
                        <h2 class="body-top-news-content-title">
                            南海动态
                        </h2>
                        <ul>
                            <?php
                                $Page_size=8;
                                $sql="select * from db_news order by D_date desc limit 0,9" ;//select * from table limit 开始的条数，要显示的条数
                                $result=mysql_query($sql);
                                $row=mysql_fetch_object($result);

                                do{
                            ?>
                                    <li> <a href="../news/dongtaiPage.php?id=<?php echo $row->id;?>&belong=<?php echo $row->belong;?>"><i class="fa fa-hand-o-right"></i> <?php $text=$row->title;echo substr_text($text,0,14)."...";?></a><span>[<?php echo $row->D_date;?>]</span></li>

                            <?php }while($row=mysql_fetch_object($result));

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="body-title">
                <h2>南海诸岛</h2>
                <h3>South China Sea Islands</h3>

            </div>
            <div class="body-content">
                <p>
                    南海是一个位于东南亚，被中国大陆、台湾本岛、菲律宾群岛、马来群岛及中南半岛所环绕的陆缘海，为西太平洋的一部分。中国汉代、南北朝时称其为涨海、沸海，清代以后逐渐改称南海，并延续至今。新加坡、马
                    来西亚、印尼及英殖民时期的香港等从国际上通用的英语名称“South China Sea”称之为南中国海。南海海域面积有350万平方公里，其中有超过200个无人居住的岛屿和岩礁，这些岛礁被合称为南海诸岛。除了是主要的海上运输航线外，南海据信还蕴藏着丰富的石油和天然气。
                </p>
                <p>
                    南海诸岛是南海中中国许多岛屿、沙洲、礁、暗沙和浅滩的总称。它们分布的范围很广。南北绵延1800公里，东西分布约900多公里。共有岛、礁、沙、滩200多个。诸岛北起海岸附近的北卫滩，西起万安滩，南至曾母暗沙，东止黄岩岛、自北至南，大致可以分为东沙、西沙、中沙和南沙四大群岛。
                    南沙群岛:是中国南海诸岛四大群岛中位置最南、岛礁最多、散布最广的群岛。主要岛屿有太平岛、南威岛、中业岛、郑和群礁、万安滩等。曾母暗沙是中国领土最南点。
                    南海诸岛历来是中国领土的一部分。1984年5月31日第六届全国人民代表大会第二次会议审议国务院议案，决定设立海南行政区，将西沙群岛、南沙群岛、中沙群岛改由海南行政区管辖。
                <p>    2012年，中国设立地级三沙市，管辖西沙群岛、中沙群岛、南沙群岛的岛礁及其海域。三沙市人民政府驻西沙永兴岛。此次设立地级三沙市，是我国对海南省西沙群岛、中沙群岛、南沙群岛的岛礁及其海域行政管理体制的调整和完善。
                </p>
            </div>
            <div class="body-pic" id="body-pic">
                <img src="images/swa.jpg" usemap="#map-pic" alt="">
                <map name="map-pic" id="map-pic">
                    <area shape="poly" coords="524,81,652,111,624,191,496,134" href="../dongsha/dongsha.php" alt=""><span class="dongsha area-tooltip">东沙群岛</span>
                    <area shape="poly" coords="384,240,263,300,207,400,304,490,423,363" href="../xisha/xisha.php" alt=""><span class="xisha area-tooltip">西沙群岛</span>
                    <area shape="poly" coords="362,441,486,300,568,280,708,400,635,500,515,500" href="../zhongsha/zhongsha.php" alt=""><span class="zhongsha area-tooltip">中沙群岛</span>
                    <area shape="poly" coords="450,570,720,630,668,750,556,920,334,1050,280,1080,180,1060,100,850" href="../nansha/nansha.php" alt=""><span class="nansha area-tooltip">南沙群岛</span>
                </map>




            </div>
        </div>

        <!--脚部内容-->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-content-logo"></div>
                <div class="footer-content-link">
                    <h3>友情链接</h3>
                    <div class="link-content">
                        <a href="http://www.soa.gov.cn/" target="_blank">国家海洋局</a>
                        <a href="http://www.nanhai.org.cn/" target="_blank">中国南海研究院</a>
                        <a href="http://scstt.org/" target="_blank">南海智库</a>
                        <a href="http://www.nhjd.net/" target="_blank">南海研究论坛</a>
                        <a href="http://www.haohanfw.com/forum.php?gid=1" target="_blank">浩汉防务</a>
                        <a href="http://www.daijiaru.site/index/index.html" target="_blank">"友人A"个人网站</a>

                    </div>
                </div>
                <div class="footer-content-message">
                    <?php
                    if(isset($_SESSION['username'] )){
                        $variable='';
                        $tip='如果你有什么意见或建议，请在这里留言';
                    }else{
                        $tip='如果你有什么意见或建议,需要留言，请先登陆';
                        $variable='disabled';
                    }
                    ?>
                    <form action="../put_message.php" method="post" name="form_message">
                        <textarea name="message_content" id="" cols="32" rows="6"  placeholder="<?php echo $tip;?>" <?php echo $variable;?>></textarea><br>
                        <input type="reset" value="重置">
                        <input type="submit" value="提交" onclick="return checkMessage(form_message)">
                    </form>
                </div>
            </div>
        </div>
        <!--返回顶部及返回上一页-->
        <a href="javascript:;" class="btn-back" id="btn-back" title="回到上页" onClick="javascript :history.go(-1);">
            <span id="back-span">   返回上页</span>
            <img src="images/turn-back.png" alt="">

        </a>
        <a href="javascript:;" class="btn-top" id="btn-top" title="回到顶部">
            <img src="images/turn-top.png" alt="">
            <span id="top-span">返回顶部</span>
        </a>
    </div>

</body>
</html>