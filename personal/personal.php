﻿<?php
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

                <a class="active" href="">查看评论</a>
                <a  href="personal-modify.php">修改密码</a>
            </div>
            <div class="personal-content">
                <div class="tableDiv">
                    <?php
                    /*
                    * Created on 2010-4-17
                    *
                    * Order by Kove Wong
                    */

                    $Page_size=8;

                    $result=mysql_query("select * from db_comment where comment_user='$user' order by comment_date desc  ");
                    $count = mysql_num_rows($result);//mysql_num_rows — 取得结果集中行的数目
                    $page_count = ceil($count/$Page_size);//ceil向上取整，页数，天花板

                    $init=1;
                    $page_len=5;//要显示分页的个数
                    $max_p=$page_count;
                    $pages=$page_count;

                    //判断当前页码
                    if(empty($_GET['page'])||$_GET['page']<0){//如果page为空或者小于0，page赋值为1
                        $page=1;
                    }else {
                        $page=$_GET['page'];//将page值赋值为传递过来的值
                    }
                    $offset=$Page_size*($page-1);//$offset为一页显示的条数乘以当前页数减1，就是每一页开始的位置
                    $sql="select * from db_comment where comment_user='$user' order by comment_date desc  limit $offset,$Page_size" ;//select * from table limit 开始的条数，要显示的条数
                    $result=mysql_query($sql);
                    $row=mysql_fetch_object($result);

                    ?>
                    <table  id="news">
                        <tr>
                            <td>评论岛礁</td>
                            <td>评论内容</td>
                            <td>评论日期</td>
                            <td>操作</td>
                        </tr>
                        <?php
                        if(!$row){
                            echo "<tr><td colspan='5' style='padding: 10px'>你还没有评论</td></tr>";
                        }else{
                            do {
                                ?>
                                <tr>
                                    <td><?php echo $row->island_name;?></td>
                                    <td><?php echo $row->comment_content;?></td>
                                    <td><?php echo $row->comment_date;?></td>
                                    <td class="edit">
                                        <a href="javascript:;" onclick="return del(<?php echo $row->comment_id;?>)">删除</a>
                                    </td>
                                </tr>
                                <?php
                            }while( $row=mysql_fetch_object($result));
                        }

                        ?>

                    </table>
                    <table>
                        <?php
                        $page_len = ($page_len%2)?$page_len:$page_len+1;//页码个数
                        $pageoffset = ($page_len-1)/2;//页码个数左右偏移量

                        $key='<div >';
                        $key.="<span>$page/$pages</span> "; //第几页,共几页
                        if($page!=1){//当不是第一页
                            $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">第一页</a> "; //第一页，.$_SERVER['PHP_SELF']指向当前的页面
                            $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页
                        }else {//如果是第一页，则只显示文字，不显示连接
                            $key.="<span>第一页</span> ";//第一页,
                            $key.="<span>上一页</span>"; //上一页
                        }
                        if($pages>$page_len){
//如果当前页小于等于左偏移
                            if($page<=$pageoffset){
                                $init=1;
                                $max_p = $page_len;
                            }else{//如果当前页大于左偏移
//如果当前页码右偏移超出最大分页数
                                if($page+$pageoffset>=$pages+1){
                                    $init = $pages-$page_len+1;
                                }else{
//左右偏移都存在时的计算
                                    $init = $page-$pageoffset;
                                    $max_p = $page+$pageoffset;
                                }
                            }
                        }
                        for($i=$init;$i<=$max_p;$i++){
                            if($i==$page){//如果是当前页，则直接输出文字
                                $key.=' <span>'.$i.'</span> ';
                            } else {//如果不是当前页，则输出连接
                                $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>";
                            }
                        }
                        if($page!=$pages){
                            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页
                            $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页
                        }else {
                            $key.="<span>下一页</span> ";//下一页
                            $key.="<span>最后一页</span>"; //最后一页
                        }
                        $key.='</div>';
                        ?>
                        <tr>
                            <td colspan="2" height="60"><div class="pageList" align="center"><?php echo $key?></div></td>
                        </tr>
                    </table>
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