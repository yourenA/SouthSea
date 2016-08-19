<?php
header("Content-type:text/html;charset=utf-8");
include('../../conn.php');
$sql = mysql_query("select * from db_build  ");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="IslandBuild.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>

    <script>
        function check(form){
            if(form.keyword.value==""){
                alert("请输入查询关键字");
                form.keyword.focus();
                return false;
            }
        }
        function del(id){
            if(window.confirm("你确定要删除吗，删除后不可恢复！")){
                window.location='checkBuildDel.php?id='+id;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="caption">
        <h1>岛礁建设</h1>
    </div>
    <div class="formDiv">
        <form name="form" method="post" action="">
            <label for="search">请输入搜索内容:</label>
            <input type="text" name="keyword" class="search" id="search">
            <input type="submit" name="submit" class="btn" value="搜索" onclick="return check(form)">
            <input type="button" class="btn addbtn" value="添加建设岛礁" onclick="window.location.href='IslandsBuildAdd.php'">
        </form>
    </div>

    <div class="tableDiv">

        <table>
            <tr>
                <td>岛礁名</td>
                <td>图片</td>
                <td>概述</td>
                <td>开始阶段</td>
                <td>建设历程</td>
                <td>现在状态</td>
                <td>操作</td>
            </tr>
            <?php
            $keyword=@$_POST['keyword'];
            $sql = mysql_query("select * from db_build where B_desc like '%$keyword%' or B_name like  '%$keyword%' or B_start like  '%$keyword%'  or B_pass like  '%$keyword%'  or B_now like  '%$keyword%'");
            $row=mysql_fetch_object($sql);
            if(!$row){
                echo "<script>alert('你搜索的信息不存在');history.back(0);</script>";
                exit;
            }
            do {
                ?>
                <tr>
                    <td><?php echo $row->B_name;?></td>
                    <td><img src="../../build/<?php echo $row->B_image;?>"></td>
                    <td>
                        <?php
                        $text1=$row->B_desc;
                        echo  substr_text($text1,0,30)."......";
                        ?>
                    </td>
                    <td>
                        <?php
                        $text2=$row->B_start;
                        echo  substr_text($text2,0,30)."......";
                        ?>
                    </td>
                    <td>
                        <?php
                        $text3=$row->B_pass;
                        echo  substr_text($text3,0,30)."......";
                        ?>
                    </td>
                    <td>
                        <?php
                        $text4=$row->B_now;
                        echo  substr_text($text4,0,30)."......";
                        ?>
                    </td>
                    <td class="edit">
                        <a href="showIslandBuild.php?id=<?php echo $row->B_id;?>">查看</a><br/>
                        <a href="editIslandBuild.php?id=<?php echo $row->B_id;?>">编辑</a><br/>
                        <a href="javascript:;" onclick="return del(<?php echo $row->B_id;?>)" >删除</a><br/>
                    </td>
                </tr>
                <?php
            }while( $row=mysql_fetch_object($sql));
            ?>

        </table>
    </div>


</div>
<a href="javascript:;" class="btn-back" id="btn-back" title="回到上页" onClick="javascript :history.go(-1);">
    <span id="back-span">   返回上页</span>
    <img src="../../SouthSea/images/turn-back.png" alt="">

</a>
<a href="javascript:;" class="btn-top" id="btn-top" title="回到顶部">
    <img src="../../SouthSea/images/turn-top.png" alt="">
    <span id="top-span">返回顶部</span>
</a>

</body>
</html>