<?php
header("Content-type:text/html;charset=utf-8");
include('../../conn.php');
error_reporting(0);
$sql = mysql_query("select * from db_expert order by D_date desc ");
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
    <link rel="stylesheet" href="../IslandsBuild/IslandBuild.css">
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
                window.location='checkExpertDel.php?id='+id;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="caption">
        <h1>专家建议</h1>
    </div>
    <div class="formDiv">
        <form name="form" method="post" action="">
            <label for="search">请输入搜索内容:</label>
            <input type="text" name="keyword" class="search" id="search">
            <input type="submit" name="submit" class="btn" value="搜索" onclick="return check(form)">
            <input type="button" class="btn addbtn" value="添加专栏信息" onclick="window.location.href='SouthSeaExpertAdd.php'">
        </form>
    </div>

    <div class="tableDiv">

        <table id="news">
            <tr>
                <td>标题</td>
                <td>图片</td>
                <td>姓名</td>
                <td>介绍</td>
                <td>内容</td>
                <td>日期</td>
                <td>责任编辑</td>
                <td>操作</td>
            </tr>
            <?php
            $keyword=@$_POST['keyword'];
            $sql = mysql_query("select * from db_expert where content like '%$keyword%' or title like '%$keyword%' or  D_name like '%$keyword%' or introduction  like '%$keyword%' order by D_date desc ");
            $row=mysql_fetch_object($sql);
            if(!$row){
                echo "<script>alert('你搜索的信息不存在');history.back(0);</script>";
                exit;
            }
            do {
                ?>
                <tr>
                    <td><?php echo $row->title;?></td>
                    <td><img src="../../expert/<?php echo $row->image;?>"></td>
                    <td><?php echo $row->D_name;?></td>
                    <td>
                        <?php
                        $text1=$row->introduction;
                        echo  substr_text($text1,0,30)."......";
                        ?>
                    </td>
                    <td>
                        <?php
                        $text2=$row->content;
                        echo  substr_text($text2,0,60)."......";
                        ?>
                    </td>
                    <td><?php echo $row->D_date;?></td>
                    <td><?php echo $row->editor;?></td>
                    <td class="edit">
                        <a href="showSouthSeaExpert.php?id=<?php echo $row->id;?>">查看</a><br/>
                        <a href="editSouthSeaExpert.php?id=<?php echo $row->id;?>">编辑</a><br/>
                        <a href="javascript:;" onclick="return del(<?php echo $row->id;?>)" >删除</a><br/>
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