<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/backcss.css">
    <style>
        body{
            background-color: rgb(264,220,200);
            background-image: -webkit-gradient(linear, 0 0, 100% 100%,
            color-stop(.25, #99cccc), color-stop(.25, transparent),
            color-stop(.5, transparent), color-stop(.5, #99cccc),
            color-stop(.75, #99cccc), color-stop(.75, transparent),
            to(transparent));
            background-image: -moz-linear-gradient(-45deg, #99cccc 25%, transparent 25%,
            transparent 50%,#99cccc 50%, rgba(255, 255, 255, .1) 75%,
            transparent 75%, transparent);
            background-image: -o-linear-gradient(-45deg, #99cccc 25%, transparent 25%,
            transparent 50%, #99cccc 50%,#99cccc 75%,
            transparent 75%, transparent);
            background-image: linear-gradient(-45deg,#99cccc 25%, transparent 25%,
            transparent 50%, #99cccc 50%, #99cccc 75%,
            transparent 75%, transparent);
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="content-top">
            <div class="content-top-content">
                <span id="time" class="time">
                            <?php
                            echo date("Y-m-d");
                            ?>
                |</span>
                <?php
                if(isset($_SESSION['Susername'] )){
                    if($_SESSION['Susername']=='daijiaru'){
                        $range="超级";
                    }else{
                        $range="";
                    }
                    echo "欢迎你 {$range}管理员 {$_SESSION['Susername']}";
                    echo " <span>| <a href=\"../login/check_superLogin.php?action=logout\" class=\"register\">退出</a></span>";
                }
                ?>

            </div>
        </div>
        <div class="content-pic">
            <img src="images/logo.png" alt="">
        </div>

    </div>

</body>
</html>