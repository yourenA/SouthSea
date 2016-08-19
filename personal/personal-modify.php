<?php
header("Content-type:text/html;charset=utf-8");
session_start();
error_reporting(0);
include('../conn.php');
$user=$_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="personal.css">
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
        function del(id){
            if(window.confirm("你确定要删除吗，删除后不可恢复！")){
                window.location='../Administration/Member/checkCommentDel.php?id='+id;
            }
        }
        function check(form){
            if (form.password1.value == "")
            {
                alert("请输入原密码!");
                form.password1.focus();
                return false;
            }
            if (form.password2.value == ""|| form.password2.value.length<6 )
            {
                alert("请输入新密码，密码长度不能少于6!");
                form.password2.focus();
                return false;
            }
            if (form.password3.value == "")
            {
                alert("请再次输入密码!");
                form.password3.focus();
                return false;
            }
            if (form.password2.value != form.password3.value)
            {
                alert("两次密码不一致!");
                form.password3.focus();
                return false;
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
        <div class="personal">
            <h2>个人中心</h2>
            <div class="personal-head">

                <a  href="personal.php">查看评论</a>
                <a class="active" href="">修改密码</a>
            </div>
            <div class="personal-content">
                <div class="updateForm">
                    <form action="checkPasswordUpdate.php" method="post" name="form">
                        <table>
                            <tr>
                                <td><label for="name">用户名:</label></td><td><input readonly type="text" name="name" id="name" value="<?php echo $user?>"  onchange="startRequest()"></td>
                                <td><span id="span"></span></td>
                            </tr>
                            <tr>
                                <td><label for="password1">原密码:</label></td><td><input type="password" name="password1" id="password1" value=""></td>
                            </tr>
                            <tr>
                                <td><label for="password2">新密码:</label></td><td><input type="password" name="password2" id="password2" value=""></td>
                            </tr>
                            <tr>
                                <td><label for="password2">重复密码:</label></td><td><input type="password" name="password3" id="password3" value=""></td>
                            </tr>
                            <tr>
                                <td colspan="3"><input class="btnUpdate" type="button" onclick=" window.location.href='../SouthSea/SouthSea.php';" value="返回首页"><input id="form1" class="btnUpdate" type="submit" value="确定" onclick="return check(form)"></td>
                            </tr>

                        </table>
                    </form>
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