<?php
session_start();
include('../conn.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>南海群岛--南沙群岛</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="nansha.css">
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

    <!--中间正文-->
    <div class="center">
        <div class="center-content">
            <div class="center-content-article">
                <img src="../images/South.jpg" alt=""><h2>南沙群岛</h2>
                <p>
                    南沙群岛位于中国南疆的九段线内的南部，在南海诸岛中岛礁最多，散布范围最广的一椭圆形珊瑚礁群。
                    位于北纬3°40'至11°55'，东经109°33'至117°50'。北起雄南滩，南至曾母暗沙，东至海里马滩，西到万安滩，南北长500多海里，东西宽400多海里，水域面积约82万平方海里，约占中国南海传统海域面积的40%。
                </p>
                <p>
                    汉武帝时期起中国开始较大规模地利用南海，宋代以来中国海事发达、南沙群岛进入中国版图。明清时期经营的层次更深，中国渔民甚至在中业岛等一些岛上建房建水井而它国所无。2015年10月28日报道的英美海军航海旧记录证明，清代和民国前期，只有中国渔民遍布南海各岛礁，并在有的岛上常年居住[1]  。二战结束时中国收回南沙，驻军太平岛、中业岛、敦谦沙洲等并广泛巡护，含九段线的中国地图被国际认可。
                </p>
                <p>
                    中国分裂导致南沙的蒋介石海防力量积弱数十年而大陆海军长期未涉足南沙（1951年海南船主在南子岛搭棚暂住过），加之20世纪70年代起诸国重视南沙石油，周边国家开始声索主权并抢去蒋军所驻守和巡守的一批重要岛洲，蒋军龟缩到太平岛，南沙大面积沦陷。文革内斗环境里没有同意刘华清等海军官员的两次进驻建议，面对南越崩溃而失去大好的收回时机；1987年刘华清等强烈要求而中国最终同意去建永暑礁国际海洋观察站，赤瓜礁海战后退出大现礁等造成遗憾[2]  。中国大陆数十年的消极做法导致大部分重要岛屿被越南、菲律宾、马来西亚等国侵占。
                </p>
                <p>
                    越菲马数十年来在南沙填海造陆、修机场等，中国2013年底开始在七礁上吹沙填海，以改善驻守条件，更多的是服务于民事和作为大国承担的国际公益责任[3]  ，如海上搜寻与救援。
                </p>
                <p>
                    岛上灌木繁茂，海鸟群集，盛产鸟粪，两栖生物丰富，水产种类繁多，是我国海洋渔业最大的热带渔场，有浮藻植物155种，浮游动物200多种，贝壳66种。海域蕴藏着丰富的矿藏资源，有石油和天然气、铁、铜、锰、磷等多种。其中油气资源尤为丰富，地质储量约为350亿吨，有“第二个波斯湾”之称，主要分布在曾母暗沙、万安西和北乐滩等十几个盆地，总面积约41万平方公里，仅曾母暗沙盆地的油气质储量约有126至137亿吨。[4]
                </p>
                <p>
                    南沙群岛地处热带，渔业资源特别丰富，
                    主要有软体类动物、甲壳类动物和藻类
                    。富含海藻、海 带等热带资源，其中很多具有极高的经济价值。中国南海海洋鱼类约1,500多种，大多数种类在南沙群岛海域都有分布，其中很多具有极高的经济价值。
                </p>
            </div>

            <?php
            $page1=@$_GET['page1'];
            if ($page1==""){
                $page1=1;}
            if (is_numeric($page1)){
            $page_size1=8;     								//每页显示8条记录
            $query1="select count(*) as total from db_nansha order by N_id desc";
            $result1=mysql_query($query1);      					//查询符合条件的记录总条数
            $message_count1=@mysql_result($result1,0,"total");		//要显示的总记录数
            $page_count1=ceil($message_count1/$page_size1);	  	//根据记录总数除以每页显示的记录数求出所分的页数
            $offset1=($page1-1)*$page_size1;						//计算下一页从第几条数据开始循环
            $sql1=@mysql_query("select * from db_nansha order by N_id limit $offset1, $page_size1");
            $row1=@mysql_fetch_object($sql1);
            ?>
            <div class="center-content-list">
                <h2> &nbsp;岛礁列表</h2>
                <ul>
                    <?php
                    do{
                    ?>
                    <li>
                        <div>
                            <a href="yongshu.php?id=<?php echo $row1->N_id; ?>&belong=<?php echo $row1->N_belong; ?>" >
                            <img src="<?php echo $row1->N_pic; ?>" alt="">

                            </a>
                            <p><?php echo $row1->N_name; ?></p>
                        </div>
                    </li>
                    <?php }while($row1=mysql_fetch_object($sql1));
                    }
                    ?>

                </ul>
                <table class="table"   border="0" cellspacing="10" >
                    <tr>
                        <td>
                            <?php echo $page1;?>/<?php echo $page_count1;?>
                        </td>
                        <td>共<?php echo $message_count1;?>条记录 </td>

                            <?php
                            /*  如果当前页不是首页  */
                            if($page1!=1){
                                /*  显示“首页”超链接  */
                                echo  "<td ><a style='color:black;' href='nansha.php?page1=1'>首页</a> </td>";
                                /*  显示“上一页”超链接  */
                                echo "<td><a style='color:black;'  href=nansha.php?page1=".($page1-1).">上一页</a></td>";
                            }else{
                                /*  显示“首页”超链接  */
                                echo  "<td ><a style='color:black;' href='javascript:;'>首页</a> </td>";
                                /*  显示“上一页”超链接  */
                                echo "<td><a style='color:black;'  href='javascript:;'>上一页</a></td>";
                            }
                            /*  如果当前页不是尾页  */
                            if($page1<$page_count1){
                                /*  显示“下一页”超链接  */
                                echo "<td><a style='color:black;'  href=nansha.php?page1=".($page1+1).">下一页</a></td>";
                                /*  显示“尾页”超链接  */
                                echo  "<td><a style='color:black;'  href=nansha.php?page1=".$page_count1.">尾页</a></td>";
                            }else{
                                /*  显示“下一页”超链接  */
                                echo "<td><a style='color:black;'  href='javascript:;'>下一页</a></td>";
                                /*  显示“尾页”超链接  */
                                echo  "<td><a style='color:black;'  href='javascript:;'>尾页</a></td>";
                            }
                            mysql_free_result($sql1);

                            ?>
                        </tr>
                </table>

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