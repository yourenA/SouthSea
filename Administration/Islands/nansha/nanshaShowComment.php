<?php
header("Content-type:text/html;charset=utf-8");
error_reporting(0);
include('../../../conn.php');
$id=$_GET['id'];
$belong=$_GET['belong'];
$name=$_GET['name'];
$sql = mysql_query("select * from db_comment where island_id='$id' and island_belong='$belong'  ");
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
    <link rel="stylesheet" href="../css/Island.css">
    <link rel="stylesheet" href="../../css/btn.css">
    <script src="../../../js/index.js"></script>
</head>
<body>
<div class="container">
    <div class="caption">
        <h1>留言管理--<?php echo $name;?></h1>
    </div>

    <div class="tableDiv">

        <table class="comment">
            <tr>
                <td>岛礁名</td>
                <td>留言者</td>
                <td>留言内容</td>
                <td>留言日期</td>
                <td>操作</td>
            </tr>
            <?php
            if($sql){
            do {
                ?>
                <tr>
                    <td><?php echo $row->island_name;?></td>
                    <td><?php echo $row->comment_user;?></td>
                    <td><?php echo $row->comment_content;?></td>
                    <td class="date"><?php echo $row->comment_date;?></td>
                    <td><a href="nanshaDelComment.php?id=<?php echo $row->comment_id;?>">删除留言</a></td>
                </tr>
                <?php
            }while( $row=mysql_fetch_object($sql));
            }
            else{
                echo "没有留言内容";
            }
            ?>

        </table>
    </div>
</div>
<a href="javascript:;" class="btn-back" id="btn-back" title="回到上页" onClick="javascript :history.go(-1);">
    <span id="back-span">   返回上页</span>
    <img src="../../../SouthSea/images/turn-back.png" alt="">

</a>
<a href="javascript:;" class="btn-top" id="btn-top" title="回到顶部">
    <img src="../../../SouthSea/images/turn-top.png" alt="">
    <span id="top-span">返回顶部</span>
</a>
</body>
</html>