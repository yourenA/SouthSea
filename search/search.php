<?php
session_start();
error_reporting(0);
include('../conn.php');

$row=mysql_fetch_object($sql);
?>
<?php
//截取中文字符串
function substr_text($str, $start=0, $length, $charset="utf-8", $suffix="")
{
    if(function_exists("mb_substr")){
        return mb_substr($str, $start, $length, $charset).$suffix;
    }
    elseif(function_exists('iconv_substr')){
        return iconv_substr($str,$start,$length,$charset).$suffix;
    }
    $re['utf-8']  = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    return $slice.$suffix;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $row->N_name; ?></title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="search.css">
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
   <!-- --><?php
/*    header("Content-type:text/html;charset=utf-8");
    $search_input=$_GET['search_input'];
    $search_select=$_GET['search_select'];
    if($search_select=="岛礁"){
        echo"<script>alert('转到岛礁');window.location.href='zhongsha.php';</script>";
    }else if($search_select=="新闻") {
        echo"<script>alert('转到新闻');</script>";
    }else if($search_select=="矿产"){
        echo"<script>alert('转到特产');</script>";
    }else{
        echo"<script>alert('转到鱼类');</script>";
    }
    */?>
    <div class="tableDiv">
        <h2>查询结果</h2>
            <?php
            $search_input=$_GET['search_input'];
            $search_select=$_GET['search_select'];
            if($search_select=="新闻") {
                ?>
                <table id="news">
                    <tr>
                        <td>标题</td>
                        <td>图片</td>
                        <td>概述</td>
                        <td>所属</td>
                        <td>日期</td>
                        <td>来源</td>
                        <td>责任编辑</td>
                        <td>操作</td>
                    </tr>
                    <?php
                     $sql = mysql_query("select * from db_news where content like '%$search_input%' or belong like  '%$search_input%' or title like  '%$search_input%'  or introduction like  '%$search_input%'  order by D_date desc ");
                    $row = mysql_fetch_object($sql);
                    if (!$row) {
                        echo "<script>alert('你搜索的信息不存在');history.back(0);</script>";
                        exit;
                    }
                    do {
                        ?>
                        <tr>
                            <td><?php echo $row->title; ?></td>
                            <td><img src="../news/<?php echo $row->images; ?>"></td>
                            <td>
                                <?php
                                $text1 = $row->introduction;
                                echo substr_text($text1, 0, 30) . "......";
                                ?>
                            </td>
                            <td><?php
                                $belong = $row->belong;
                                if ($belong == "weiquan") {
                                    $be = "南海维权";
                                } else if ($belong == "dongtai") {
                                    $be = "新闻动态";
                                }
                                echo $be;
                                ?></td>
                            <td><?php echo $row->D_date; ?></td>
                            <td><?php echo $row->D_from; ?></td>
                            <td><?php echo $row->editor; ?></td>
                            <td class="edit">
                                <a href="../news/dongtaiPage.php?id=<?php echo $row->id; ?>&belong=<?php echo $row->belong; ?>">查看详情</a><br/>
                            </td>
                        </tr>

                        <?php
                    } while ($row = mysql_fetch_object($sql));
                   ?>
                </table>
                    <?php
                    }else if($search_select=="矿产"){
                    ?>
                    <table id="news">
                        <tr>
                            <td>名称</td>
                            <td>图片</td>
                            <td>开发状况</td>
                            <td>开发建议</td>
                            <td>操作</td>
                        </tr>
                        <?php
                        $sql = mysql_query("select * from db_kuangchan where K_name like '%$search_input%'");
                        $row = mysql_fetch_object($sql);
                        if (!$row) {
                            echo "<script>alert('你搜索的信息不存在');history.back(0);</script>";
                            exit;
                        }
                        do {
                            ?>
                            <tr>
                                <td><?php echo $row->K_name;?></td>
                                <td> <img src="../resource/<?php echo $row->K_image;?>" alt=""></td>
                                <td>
                                    <?php
                                    $text1 = $row->K_introduction;
                                    echo substr_text($text1, 0, 60) . "......";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $text2 = $row->K_development;
                                    echo substr_text($text2, 0, 60) . "......";
                                    ?>
                                </td>

                                <td class="edit">
                                    <a href="../resource/kuangchanPage.php?id=<?php echo $row->K_id;?>">查看详情</a>
                                </td>
                            </tr>
                            <?php
                        } while ($row = mysql_fetch_object($sql));
                        ?>
                        </table>
                        <?php
                    }else if($search_select=="鱼类"){
                        ?>
                        <table id="news">
                            <tr>
                                <td>名称</td>
                                <td>图片</td>
                                <td>科目</td>
                                <td>分布地区</td>
                                <td>简介</td>
                                <td>操作</td>
                            </tr>
                            <?php
                            $sql = mysql_query("select * from db_yuye where Y_name like '%$search_input%'");
                            $row = mysql_fetch_object($sql);
                            if (!$row) {
                                echo "<script>alert('你搜索的信息不存在');history.back(0);</script>";
                                exit;
                            }
                            do {
                                ?>
                                <tr>
                                    <td><?php echo $row->Y_name;?></td>
                                    <td> <img src="../resource/<?php echo $row->Y_image;?>" alt=""></td>
                                    <td><?php echo $row->Y_belong;?><?php echo $row->Y_mu;?></td>
                                    <td>
                                        <?php
                                        $text3= $row->Y_area;
                                        echo substr_text($text3, 0, 60) . "......";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $text4 = $row->Y_introduction;
                                        echo substr_text($text4, 0, 60) . "......";
                                        ?>
                                    </td>

                                    <td class="edit">
                                        <a href="../resource/yuyePage.php?id=<?php echo $row->Y_id;?>">查看详情</a>
                                    </td>
                                </tr>
                                <?php
                            } while ($row = mysql_fetch_object($sql));

                            ?>
                            </table>
                            <?php
                            }else if($search_select=="岛礁"){
            ?>
        <table id="news">
            <tr>
                <td>岛礁名</td>
                
                <td>面积</td>
                <td>经纬度</td>
                <td>描述</td>
                <td>操作</td>
            </tr>
            <?php
            $sql = mysql_query("
				SELECT * FROM db_nansha where N_name like '%$search_input%'
				UNION
				SELECT * FROM db_xisha where N_name like '%$search_input%'
                                UNION
                                SELECT * FROM db_zhongsha where N_name like '%$search_input%'
                                UNION
                                SELECT * FROM db_dongsha where N_name like '%$search_input%'");
            $row = mysql_fetch_object($sql);
            if (!$row) {
                echo "<script>alert('你搜索的信息不存在');history.back(0);</script>";
                exit;
            }
            if($row->N_belong=="nansha"){
                $path_img='../nansha/';
                $path_router='../nansha/yongshu.php';
            }else if($row->N_belong=="xisha"){
                $path_img='../xisha/';
                $path_router='../xisha/yongxing.php';
            }else if($row->N_belong=="zhongsha"){
                $path_img='../zhongsha/';
                $path_router='../zhongsha/huangyandao.php';
            }else if($row->N_belong=="dongsha"){
                $path_img='../dongsha/';
                $path_router='../dongsha/dongshadao.php';
            }
            do {
                ?>
                <tr>
                    <td><?php echo $row->N_name;?></td>
          
                    <td width="100"><?php echo $row->N_size;?> </td>
                    <td><?php echo $row->N_positionX;?>
                        <?php echo $row->N_positionY;?></td>
                    <td style="padding:10px;text-align:left;">
                        <?php
                        $text=$row->N_text;
                        echo substr_text($text,0,100)."......";
                        ?>
                    </td>
                    <td>
                        <a href="<?php echo $path_router;?>?id=<?php echo $row->N_id;?>&belong=<?php echo $row->N_belong;?>">查看详情</a>
                    </td>
                </tr>
                <?php
            } while ($row = mysql_fetch_object($sql));
            ?>
            </table>
            <?php
            }
            ?>


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