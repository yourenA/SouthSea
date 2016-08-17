<?php
session_start();
include('../conn.php');
include('../substr_text.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>南海群岛</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="SouthSea-Board.css">
    <script src="../js/index.js"></script>
<script src="../js/checkSearch.js"></script>
    <script>
        function check(form){
            if(form.txt_content.value==""){
                alert("你在留言板输入的内容为空，请输入！");form.txt_content.focus();return false;
            }
            if(form.txt_content.value.length<10){
                alert("你在留言板输入的内容过短，请输入多点内容！");form.txt_content.focus();return false;
            }
            if(form.txt_content.value.length>300){
                alert("你在留言板输入的内容过长，请输入少点内容！");form.txt_content.focus();return false;
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
                <li class="active"><a href="../SouthSea/SouthSea.php">首页</a></li>
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

            </ul>
        </div>
    </div>

    <!--中间内容-->
    <div class="center">
        <div class="center-content c1">
            <div class="center-content-caption">
                <h3>南沙群岛</h3>
            </div>
            <div class="center-content-pic">
                <img src="images/nansha.jpg" alt="">
            </div>
            <div class="center-content-p">
                <p>
                    <a href="../nansha/nansha.php">
                        南沙群岛是中国南海诸岛四大群岛中居南、岛礁最多、散布最广的群岛。主体是南沙六群礁。著名岛礁有永暑礁、美济礁、渚碧礁、太平岛、中业岛、南威岛、万安滩等。立地暗沙最南。
                        汉武帝时期起中国开始较大规模地利用南海，宋代以来中国海事发达、南沙群岛进入中国版图。明清时期经营的层次更深，中国渔民甚至在中业岛等一些岛上建房建水井而它国所无。2015年10月28日报道的英美海军航海旧记录证明，清代和民国前期，只有中国渔民遍布南海各岛礁，并在有的岛上常年居住。二战结束时中国收回南沙，驻军太平岛、中业岛、敦谦沙洲等并广泛巡护，含九段线的中国地图被国际认可。
                    </a>

                </p>
            </div>
        </div>
        <div class="center-content c2">
            <div class="center-content-caption">
                <h3>西沙群岛</h3>
            </div>
            <div class="center-content-pic">
                <img src="images/xisha.jpg" alt="">
            </div>
            <div class="center-content-p">
                <p>
                    <a href="../xisha/xisha.php">
                        西沙群岛，中国南海诸岛四大群岛之一，由宣德群岛、永乐群岛、华光礁、东岛、中建岛等构成，共有22个岛屿，7个沙洲，另有10多个暗礁暗滩。
                        西沙群岛自古以来就是中国神圣不可侵犯的领土。西沙群岛中的珊瑚岛自1956年起由南越西贡政权占领，1974年1月17日越军又占领了甘泉岛和金银岛。1974年1月19日，中越西沙海战随即爆发，中国军队收复了珊瑚岛、甘泉岛、金银岛等三岛，越军被驱逐出整个西沙群岛。
                        其中住人的有：①宣德群岛里的永兴岛-石岛、赵述岛；②永乐群岛里的晋卿岛、鸭公岛、银屿、羚羊礁有渔民常住，珊瑚岛、琛航岛、金银岛有驻军；③其它的岛礁里，东岛和中建岛有驻军。
                    </a>

                </p>
            </div>
        </div>
        <div class="center-content c2">
            <div class="center-content-caption">
                <h3>中沙群岛</h3>
            </div>
            <div class="center-content-pic">
                <img src="images/zhongs.jpg" alt="">
            </div>
            <div class="center-content-p">
                <p>
                    <a href="../zhongsha/zhongsha.php">
                        中沙群岛，是中国南海诸岛四大群岛中位置居中的群岛。西距三沙市西沙群岛的永兴岛约200公里。北纬 15°24′～16°15′，东经113°40′～114°57′。主要部分由隐没在水中的3座暗沙、滩、礁、岛所组成。长约140公里（不包括黄岩岛），宽约60公里，从东北向西南延伸，略呈椭圆形。包括南海海盆西侧的中沙大环礁、北侧的神狐暗沙、一统暗沙及耸立在深海盆上的宪法暗沙、中南暗沙、黄岩岛等。几乎全部隐没于海面之下，距海面约10～26米，只有黄岩岛南面露出了水面。中沙群岛自古以来就是中国神圣不可侵犯的领土。
                    </a>

                </p>
            </div>
        </div>
        <div class="center-content c1">
            <div class="center-content-caption">
                <h3>东沙群岛</h3>
            </div>
            <div class="center-content-pic">
                <img src="images/dongsha.jpg" alt="">
            </div>
            <div class="center-content-p">
                <p>
                    <a href="../zhongsha/zhongsha.php">
                        东沙群岛：中国南海诸岛中位置最北的一组群岛，共有三个珊瑚环礁即：东沙环礁（东沙岛和东沙礁）、南卫滩环礁（暗礁）及北卫滩环礁（暗礁）。
                        它是南海诸岛中离大陆最近、岛礁最少的一组群岛。
                        位处国际航海重要的交通枢纽，属中国的领土，名义上归广东省汕尾市陆丰市碣石镇管辖，目前隶属于台湾当局高雄市旗津区。
                    </a>

                </p>
            </div>
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
                <form action="../put_message.php" method="post">
                    <textarea name="txt_content" id="" cols="32" rows="6"  placeholder="<?php echo $tip;?>" <?php echo $variable;?>></textarea><br>
                    <input type="reset" value="重置">
                    <input type="submit" value="提交">
                </form>
            </div>
        </div>
    </div>
    <!--返回顶部及返回上一页-->
    <a href="javascript:;" class="btn-back" id="btn-back" title="回到上页" onClick="javascript :history.go(-1);">
        <span id="back-span">   返回上页</span>
        <img src="../SouthSea/images/turn-back.png" alt="">

    </a>
    <a href="javascript:;" class="btn-top" id="btn-top" title="回到顶部">
        <img src="../SouthSea/images/turn-top.png" alt="">
        <span id="top-span">返回顶部</span>
    </a>
</div>
</body>
</html>