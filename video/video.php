<?php
session_start();
include('../conn.php');
include('../substr_text.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>南海群岛--西沙群岛</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="video.css">
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
        <div class="video">
            <div class="video-left">
                <img src="video.png" alt="">
            </div>
            <div class="video-right">
                <div class="video-right-content">
                    <h2>视频资料</h2>
                    <ul>
                        <li><a href="http://www.iqiyi.com/w_19rqy32mf1.html#vfrm=2-3-0-1"><img src="images/88.jpg" alt=""><div class="play"></div></a><p class="video-title">1988年南沙海战</p><p class="video-desc">军事战争纪录 1988年南沙海战</p></li>
                        <li><a href="http://www.iqiyi.com/a_19rrjvw2md.html#vfrm=2-3-0-1"><img src="images/74.jpg" alt=""><div class="play"></div></a><p class="video-title">1974西沙海战</p><p class="video-desc">1974西沙海战记录</p></li>
                        <li><a href="http://www.iqiyi.com/w_19rqv9vpo9.html#vfrm=2-3-0-1"><img src="images/cg.jpg" alt=""><div class="play"></div></a><p class="video-title">南沙赤瓜礁海战视频</p><p class="video-desc">南沙赤瓜礁海战记录视频</p></li>
                        <li><a href="http://www.iqiyi.com/v_19rroj8zgs.html#vfrm=2-3-0-1"><img src="images/zy.jpg" alt=""><div class="play"></div></a><p class="video-title">盘点中越南海问题对峙</p><p class="video-desc">盘点中越南海问题的半世纪对峙</p></li>
                        <li><a href="http://v.ifeng.com/history/shishijianzheng/201208/b4cf866d-996c-4d13-b5df-b71780035363.shtml"><img src="images/ny.jpg" alt=""><div class="play"></div></a><p class="video-title">南越侵占中国南海岛屿</p><p class="video-desc">回顾1973年南越侵占中国南海岛屿</p></li>
                        <li><a href="http://v.ifeng.com/news/mainland/201206/a54fc125-f735-4d25-9a2e-a8d9fc8a6196.shtml"><img src="images/ss.jpg" alt=""><div class="play"></div></a><p class="video-title">我国设立三沙市</p><p class="video-desc">我国设立三沙市管辖南海三群岛</p></li>
                        <li><a href="http://www.iqiyi.com/w_19rslan4ft.html#vfrm=2-3-0-1"><img src="images/xm.jpg" alt=""><div class="play"></div></a><p class="video-title">三沙市建市两年新貌</p><p class="video-desc">航拍南海三沙市建市两年现新貌</p></li>
                        <li><a href="http://www.iqiyi.com/v_19rrl69mso.html?list=19rrobcv9y#vfrm=2-3-0-1"><img src="images/jc.jpg" alt=""><div class="play"></div></a><p class="video-title">南沙机场试飞成功</p><p class="video-desc">南沙机场试飞成功视频</p></li>
                    </ul>
                </div>
                <div class="video-right-content" style="margin-top: 50px">
                    <h2>书籍资料</h2>
                    <ul>
                        <li><a href="http://www.nansha.org.cn/books/1/19.html"><img src="images/hb.png" alt=""><div class="play see"></div></a><p class="video-title">《我国南海诸岛..》</p><p class="video-desc">韩振华 编</p></li>
                        <li><a href="http://www.nansha.org.cn/books/1/15.html"><img src="images/xy.png" alt=""><div class="play see"></div></a><p class="video-title">《西洋番国志》</p><p class="video-desc">巩珍 编</p></li>
                        <li><a href="http://www.nansha.org.cn/books/1/12.html"><img src="images/zg.png" alt=""><div class="play see "></div></a><p class="video-title">《中国南洋交通史》</p><p class="video-desc">冯承钧 著</p></li>
                        <li><a href="http://www.nansha.org.cn/books/1/18.html"><img src="images/lg.png" alt=""><div class="play see"></div></a><p class="video-title">《中国与邻国海洋..》</p><p class="video-desc">张良福 著</p></li>
                        <li><a href="http://www.nansha.org.cn/books/1/16.html"><img src="images/yj.png" alt=""><div class="play see"></div></a><p class="video-title">《南沙群岛法律..》</p><p class="video-desc">杨翠柏 唐磊 著</p></li>
                        <li><a href="http://www.nansha.org.cn/books/1/17.html"><img src="images/nx.png" alt=""><div class="play see"></div></a><p class="video-title">《南海万里行》</p><p class="video-desc">张良福 著</p></li>
                        <li><a href="http://www.nansha.org.cn/books/1/02.html"><img src="images/hyf.png" alt=""><div class="play see"></div></a><p class="video-title">《海洋法专题研究》</p><p class="video-desc">傅崐成 著</p></li>
                        <li><a href="http://www.nansha.org.cn/books/1/11.html"><img src="images/111.png" alt=""><div class="play see"></div></a><p class="video-title">《中国南海疆域研究》</p><p class="video-desc">李金明 著</p></li>
                    </ul>
                </div>
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