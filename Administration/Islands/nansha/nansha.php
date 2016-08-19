<?php
header("Content-type:text/html;charset=utf-8");
include('../../../conn.php');
$sql = mysql_query("select * from db_nansha  ");
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
                window.location='checknanshaDel.php?id='+id;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="caption">
        <h1>南沙群岛</h1>
    </div>
    <div class="formDiv">
        <form name="form" method="post" action="">
            <label for="search">请输入搜索内容:</label>
            <input type="text" name="keyword" class="search" id="search">
            <input type="submit" name="submit" class="btn" value="搜索" onclick="return check(form)">
            <input type="button" class="btn addbtn" value="添加岛礁" onclick="window.location.href='nanshaAdd.php'">
        </form>
    </div>

    <div class="tableDiv">

        <table>
            <tr>
                <td>岛礁名</td>
                <td>图片</td>
                <td>面积</td>
                <td>经纬度</td>
                <td>描述</td>
                <td>操作</td>
            </tr>
            <?php
            $keyword=@$_POST['keyword'];
            $sql = mysql_query("select * from db_nansha where N_name  like '%$keyword%' or  N_text like '%$keyword%' ");
            $row=mysql_fetch_object($sql);
            if(!$row){
                echo "<script>alert('你搜索的信息不存在');history.back(0);</script>";
                exit;
            }
            do {
                ?>
                <tr>
                    <td><?php echo $row->N_name;?></td>

                    <td><img src="../../../nansha/<?php echo $row->N_pic;?>"></td>
                    <td width="100"><?php echo $row->N_size;?> </td>
                    <td><?php echo $row->N_positionX;?>
                        <?php echo $row->N_positionY;?></td>
                    <td>
                        <?php

                            $text=$row->N_text;
                            echo substr_text($text,0,100)."......";
                        ?>
                    </td>
                    <td><a href="nanshaUpdate.php?id=<?php echo $row->N_id;?>">修改</a>
                        &nbsp;<a href="javascript:;" onclick="return del(<?php echo $row->N_id;?>)" >删除</a><br/>
                        <a href="nanshaShowComment.php?id=<?php echo $row->N_id;?>&belong=nansha&name=<?php echo $row->N_name;?>">查看留言</a>
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
    <img src="../../../SouthSea/images/turn-back.png" alt="">

</a>
<a href="javascript:;" class="btn-top" id="btn-top" title="回到顶部">
    <img src="../../../SouthSea/images/turn-top.png" alt="">
    <span id="top-span">返回顶部</span>
</a>
</body>
</html>