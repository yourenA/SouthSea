<?php
session_start();
include('../conn.php');
$sql = mysql_query("select * from db_build ");
$row=mysql_fetch_object($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>南海群岛--岛礁建设</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../nansha/nansha.css">
    <link rel="stylesheet" href="../css/build.css">
    <script src="../js/index.js"></script>
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
                        echo "欢迎你 {$_SESSION['username']}";
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

    <!--中间正文-->
    <div class="center">
        <div class="center-build">
            <div class="center-build-title">
                <h1>南海岛礁建设</h1>
                <p>为了改善中国在南海岛礁的驻军条件，更好的维护中国的海洋领土主权，目前，中国正在中国南海的西沙群岛，南沙群岛进行岛礁人工陆地建设。截止于今年3月10日网上曝光透露的外方消息，中国已经在西沙群岛的永兴岛，深航岛和南沙群岛的永暑礁，诸碧礁，赤瓜礁，南薰礁，东门礁，美济礁，华阳礁都开展了人工岛建设或岛屿扩建。其中，永暑礁，赤瓜礁，南薰礁，东门礁，华阳礁人工陆地已经基本成型，剩下的就是完善后续设施建设；而诸碧礁，美济礁，永兴岛，深航岛则在全力施工。我们为这届中央领导、军方为维护国家领土、领海主权所做的务实努力而喝彩，我们更期待在维护中国南海领土主权上的务实效果更上一层。</p>
                <p>扩建的岛礁会给中国实施自己的南海政策带来主动性。目前在战略上最在意南海和平的恰是中国，因为这是中国战略机遇期的重要条件之一。不能说其他方面愿意打仗，但美国显然最在意它对东南亚的“主导权”，菲律宾越南等对算计具体利益似乎更专注，这几方相互勾结增加了南海的复杂性，中国一旦在南沙有了稳定的立足点，必会把那个海域朝着和平稳定的正轨上扳。</p>

<p>扩建的岛礁会给中国实施自己的南海政策带来主动性。目前在战略上最在意南海和平的恰是中国，因为这是中国战略机遇期的重要条件之一。不能说其他方面愿意打仗，但美国显然最在意它对东南亚的“主导权”，菲律宾越南等对算计具体利益似乎更专注，这几方相互勾结增加了南海的复杂性，中国一旦在南沙有了稳定的立足点，必会把那个海域朝着和平稳定的正轨上扳。</p> 
<p>而中国在实际控制岛礁进行的建设，也有助于声索被别国非法侵占的岛礁。岛礁建设完成后，解放军和海监部门的飞机、大型舰只都可以停靠甚至入驻。与从海南或者永兴岛出发相比，这显著缩短了舰机到达南沙以及南海其他地区的距离。中国可以从这些岛礁派遣舰机到附近被非法侵占的岛礁经行拍摄取证、喊话等多种执法行动，并使其成为常态。2013年来，中国开始常态性的在钓鱼岛周边海
域和空域进行巡逻，显著改善了对钓鱼岛的维权情况。钓鱼岛由原先的被日本实际控制，到如今的中日舰机都在附近巡逻，由原先的日本海警船频繁驱逐中国的渔船，到如今中国海警船也对别国渔船进行驱离作业。中国具备在南沙停靠、常驻大型舰机的能力以后也可以进行常态化的维权行动。 </p>
<p>与此同时，南海主权涉及到中国的战略安全，维护国家主权和战略安全并不取决于可能性。南海是中国重要的生命线，全球有50%的海运货物由此经过，此外南海还蕴藏着丰富的油气资源。南海发生大规模冲突甚至被别国封锁，将会对中国的国家安全造成致命威胁。  在南海进行大规模的岛礁吹填作业，实际上为中国在南海建造了多艘不沉的航空母舰。在此之前，越南和菲律宾从本土机场出发的战机以及美国从航母上起飞的战机都能比中国战机更早到达南沙上空。中国从本土起飞的战机经过长途奔袭到达后（民航客机从海口起飞至永暑礁机场耗时2小时有余），还面临着滞空时间短、载弹量少、缺乏预警机辅助等多项劣势。岛礁上建成3000米的跑道意味着可以起降几乎所有类型的军用飞机，战斗机、加油机、预警机以及战略轰炸机入驻南沙诸岛可以使中国空军在战时可以掌握制空权，并把打击范围向外延伸数千公里。而岛礁上的设施也可以为空军战机提供远程预警、防空、反舰等方面的支援。</p>
           </div>
            <div class="center-build-content">
                <ul>
                    <?php
                    do{
                    ?>
                    <a href="buildIsland.php?id=<?php echo $row->B_id;?>">
                        <li  style="background: url('<?php echo $row->B_image;?>');background-size: 100% 100%">
                            <div class="center-build-content-mask">
                                <p><?php echo $row->B_name;?></p>
                            </div>
                        </li>
                    </a>
                    <?php }while($row=mysql_fetch_object($sql));

                    ?>
                </ul>
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
        <img src="../SouthSea/images/turn-back.png" alt="">

    </a>
    <a href="javascript:;" class="btn-top" id="btn-top" title="回到顶部">
        <img src="../SouthSea/images/turn-top.png" alt="">
        <span id="top-span">返回顶部</span>
    </a>
</div>
</body>
</html>