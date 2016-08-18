<?php
session_start();
error_reporting(0);
include('../conn.php');
$id=$_GET['id'];
$belong=$_GET['belong'];
$sql = mysql_query("select * from db_dongsha where N_id='$id'");
$row=mysql_fetch_object($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $row->N_name; ?></title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/yongshu.css">
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
<div class="container" style="margin:40px auto">
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
                <img src="<?php echo $row->N_pic; ?>" alt=""><h2><?php echo $row->N_name; ?></h2>
                <p>坐标: <?php echo $row->N_positionX; ?> &nbsp;<?php echo $row->N_positionY; ?></p>
                <p>面积: <?php echo $row->N_size; ?></p>
                <p>
                    <?php echo $row->N_text; ?>
                </p>
            </div>

            <hr/>
            <h3 style="margin-top: 20px">岛礁图片</h3>
            <div class="center-pic" id="main">

                <?php
                $sqlpic=mysql_query("select * from db_images where island_id='$id' and island_belong='$belong' order by images_id desc limit 15");
                $rowpic=@mysql_fetch_object($sqlpic);
                $rownum=mysql_num_rows($sqlpic);
                if($rownum>=1){
                    ?>
                    <?php
                    do{
                        ?>

                        <div class="pin">
                            <div class="box">
                                <a href="../<?php echo $rowpic->images_path; ?>"><img src="../<?php echo $rowpic->images_path; ?>" alt=""></a>
                                <p><?php echo $rowpic->images_describe; ?></p>
                            </div>
                        </div>
                    <?php }while($rowpic=mysql_fetch_object($sqlpic));
                }else{
                    echo "<p style='color: red;font-size: 16px;'>该岛礁暂时没有图片</p>";
                }
                ?>

            </div>


            <div class="message">
                <h3>岛礁评论</h3>
                <div class="message-content">
                    <ul class="message-content-list">
                        <?php
                        $page=@$_GET['page'];
                        if ($page==""){
                            $page=1;}
                        if (is_numeric($page)){
                            $page_size=6;     								//每页显示6条记录
                            $query="select count(*) as total from db_comment where island_id='$id' and island_belong='$belong'  order by comment_id desc ";
                            $result=mysql_query($query);      					//查询符合条件的记录总条数
                            $message_count=mysql_result($result,0,"total");		//要显示的总记录数
                            $page_count=ceil($message_count/$page_size);	  	//根据记录总数除以每页显示的记录数求出所分的页数
                            $offset=($page-1)*$page_size;						//计算下一页从第几条数据开始循环
                            $sql2=mysql_query("select * from db_comment  where island_id='$id' and island_belong='$belong' order by comment_id desc limit $offset, $page_size");
                            $row2=mysql_fetch_object($sql2);
                            $rownum2=mysql_num_rows($sql2);
                            if($rownum2>=1){

                                ?>

                                <?php
                                do{
                                    ?>
                                    <li>
                                        <h3><i class="fa fa-hand-o-right"></i><?php echo $row2->comment_user; ?></h3>
                                        <div class="message-content-list-date"><?php echo $row2->comment_date; ?></div>
                                        <div class="message-content-list-body">
                                            <?php echo $row2->comment_content; ?>
                                        </div>
                                    </li>
                                <?php }while($row2=mysql_fetch_object($sql2));
                            }else{
                                echo "<p style='color: red;font-size:16px;width:100%;text-align: center; '>该岛礁暂时没有留言</p>";
                            }}
                        ?>

                    </ul>


                </div>
                <div class="page">
                    <div class="page">
                    <table class="table"   border="0" cellspacing="10" >
                        <tr>
                            <td>
                                <?php echo $page;?>/<?php echo $page_count;?>
                            </td>
                            <td>共<?php echo $message_count;?>条记录 </td>

                            <?php
                            /*  如果当前页不是首页  */
                            if($page!=1){
                                /*  显示“首页”超链接  */
                                echo  "<td ><a style='color:black;' href='dongshadao.php?page=1'>首页</a> </td>";
                                /*  显示“上一页”超链接  */
                                echo "<td><a style='color:black;'  href=dongshadao.php?page1=".($page-1).">上一页</a></td>";
                            }else{
                                /*  显示“首页”超链接  */
                                echo  "<td ><a style='color:black;' href='javascript:;'>首页</a> </td>";
                                /*  显示“上一页”超链接  */
                                echo "<td><a style='color:black;'  href='javascript:;'>上一页</a></td>";
                            }
                            /*  如果当前页不是尾页  */
                            if($page<$page_count1){
                                /*  显示“下一页”超链接  */
                                echo "<td><a style='color:black;'  href=dongshadao.php?page1=".($page+1).">下一页</a></td>";
                                /*  显示“尾页”超链接  */
                                echo  "<td><a style='color:black;'  href=dongshadao.php?page1=".$page_count.">尾页</a></td>";
                            }else{
                                /*  显示“下一页”超链接  */
                                echo "<td><a style='color:black;'  href='javascript:;'>下一页</a></td>";
                                /*  显示“尾页”超链接  */
                                echo  "<td><a style='color:black;'  href='javascript:;'>尾页</a></td>";
                            }
                            mysql_free_result($sql2);

                            ?>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="putMessage">
                <form action="../put_comment.php" method="post" name="form1">
                    <?php
                    if(isset($_SESSION['username'] )){
                        $variable='';
                        $tip='请在这里写下你的留言';
                    }else{
                        $tip='需要留言，请先登陆';
                        $variable='disabled';
                    }
                    ?>
                    <textarea name="txt_content" class="textarea" id="" cols="30" rows="10" placeholder="<?php echo $tip;?>" <?php echo $variable;?>></textarea><br>
                    <input type="hidden" name="island_id" value="<?php echo $row->N_id;?>">
                    <input type="hidden" name="island_name" value="<?php echo $row->N_name;?>">
                    <input type="hidden" name="island_belong" value="<?php echo $row->N_belong;?>">
                    <input class="btn" type="submit" onClick="return check(form1);">
                    <input class="btn" type="reset">
                </form>
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