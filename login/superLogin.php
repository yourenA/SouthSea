<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>南海群岛--管理员登陆</title>
    <link rel="stylesheet" href="css01.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js01.js"></script>
    <script>
        function InputCheck(LoginForm)
        {
            if (LoginForm.username.value == "")
            {
                alert("请输入用户名!");
                LoginForm.username.focus();
                return (false);
            }
            if (LoginForm.password.value == "")
            {
                alert("请输入密码!");
                LoginForm.password.focus();
                return (false);
            }
            if (LoginForm.authcode.value == "")
            {
                alert("请输入验证码!");
                LoginForm.authcode.focus();
                return (false);
            }
        }
    </script>
</head>
<body>
<div class="container" style="margin-top: 100px">
    <h2 style="font-size: 36px;height: 36px;text-align: center;margin-top: 80px;font-weight: 600;color: #333">南海群岛管理员登陆</h2>
    <!--头部-->
    <div class="content">
        <div class="head-left-top"></div>
        <div class="body">

            <form action="../Administration/Administration.php" method="post" onSubmit="return InputCheck(this)">

                <p class="pclass1"><span class="u_logo"> </span>
                    <input type="text" class="ipt" name="username" placeholder="请输入用户名" >
                </p>
                <p class="pclass2"><span class="p_logo"> </span>
                    <input type="password"  id="password" class="ipt pass" name="password" placeholder="请输入密码" >
                </p>
                <p class="pclass4">
                    <input type="text"  id="authcode" class="ipt ipt2 pass" name="authcode" placeholder="请输入验证码" >
                    <img  style="position: relative ;top: 12px" id="captcha_img" border="1" src="./captcha.php?r=<?php echo rand();?>" width="100">
                    <a href="javascript:void(0)" onClick="document.getElementById('captcha_img').src='./captcha.php?r='+Math.random()">换一个？</a>
                </p>
                <div class="botton">
                    <p class="pclass3">
                        <a href="../SouthSea/SouthSea.php" style="width: 74px;font-size: 13px;display: block;height: 30px;line-height:30px;padding: 0;margin: 0" class="spanclass1 aid1">返回首页</a>
                        <input type="submit" name="submit" class="spanclass2 aid2" value="登陆">
                        <input type="reset" class="spanclass2 aid2"  value="清空">
                    </p>
                </div>
            </form>
        </div>

    </div>



    <!--中间正文-->
    <!--脚部内容-->
</div>
</body>
</html>
