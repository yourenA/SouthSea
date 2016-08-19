<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js01.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="css01.css" type="text/css">
    <!--<script language=JavaScript>
        &lt;!&ndash;

        function InputCheck(RegForm)
        {
            if (RegForm.username.value == "")
            {
                alert("用户名不可为空!");
                RegForm.username.focus();
                return (false);
            }
            if (RegForm.password.value == "" || RegForm.password.value.length<6)
            {
                alert("密码长度不能少于6!");
                RegForm.password.focus();
                return (false);
            }
            if (RegForm.repass.value != RegForm.password.value)
            {
                alert("两次密码不一致!");
                RegForm.repass.focus();
                return (false);
            }
            if (RegForm.email.value == "")
            {
                alert("电子邮箱不可为空!");
                RegForm.email.focus();
                return (false);
            }
            if (RegForm.zones.value == "")
            {
                alert("地址不能为空，请输入!");
                RegForm.zones.focus();
                return (false);
            }
            if (RegForm.authcode.value == "")
            {
                alert("请输入验证码!");
                RegForm.authcode.focus();
                return (false);
            }
        }

        //&ndash;&gt;
    </script>-->
</head>
<body>
<div class="container" style="margin-top: 100px">
    <h2 style="font-size: 36px;height: 36px;text-align: center;margin-top: 30px;font-weight: 600;color: #333">南海群岛用户注册</h2>
    <div class="content">

        <div class="head-left-top"></div>
        <div class="body2">
            <form action="check_register.php" method="post" onsubmit="return InputCheck(this)" >
                <p class="pclass1"><span class="u_logo"> </span>
                    <input type="text" class="ipt" id="name" name="username" placeholder="请输入用户名" >
                </p>
                <p class="pclass2"><span class="p_logo"> </span>
                    <input type="password"  id="password" name="password"  class="ipt pass" placeholder="请输入密码" >
                </p>
                <p class="pclass4"><span class="p_logo2"> </span>
                    <input type="password"  id="password2" class="ipt pass" name="password2" placeholder="请再次输入密码" >
                </p>
                <p class="pclass4"><span class="p_logo2"> </span>
                    <input type="text"  id="email" class="ipt pass" name="email" placeholder="请输入邮箱" >
                </p>
                <p class="pclass4">
                    <select name="province" id="province" style="padding: 10px 17px">
                        <option value="" selected="">请选择省或则直辖市</option>
                        <!--这里遍历省和直辖市-->

                    </select>
                    <select name="zones" id="zones"  style="padding: 10px 17px">
                        <option value="" selected="">请选择市或则区</option>
                        <!--根据省和直辖市获取相应的区-->
                    </select>
                </p>
                <p class="pclass4">
                    <input type="text"  id="authcode" class="ipt ipt2 " name="authcode" placeholder="请输入验证码" >
                    <img style="position: relative ;top: 12px" id="captcha_img" border="1" src="./captcha.php?r=<?php echo rand();?>" width="100">
                    <a href="javascript:void(0)" onClick="document.getElementById('captcha_img').src='./captcha.php?r='+Math.random()">换一个？</a>
                </p>

                <div class="botton">
                    <p class="pclass3">
                        <a href="login.php" style="width: 74px;font-size: 13px;display: block;height: 30px;line-height:30px;padding: 0;margin: 0" class="spanclass1 aid1">返回登陆</a>
                        <input type="submit"  class="spanclass2 aid2" id="submit" name="submit" value="确认">
                        <input type="reset"  class="spanclass2 aid2"   value="清空">
                    </p>
                </div>
            </form>
            <div class="msg msg-name" id="msg-name"></div>
            <span class="msg msg-password" id="msg-password"></span>
            <span class="msg msg-password2" id="msg-password2"></span>
            <span class="msg msg-email" id="msg-email"></span>
        </div>
    </div>
</div>
<script>
    var flag=true;
    var Nflag=false;
    var Pflag=false;
    var Eflag=false;
    window.onload=function(){
        var name=document.getElementById('name');
        var msg_name=document.getElementById('msg-name');
        var password=document.getElementById('password');
        var msg_password=document.getElementById('msg-password');
        var password2=document.getElementById('password2');
        var msg_password2=document.getElementById('msg-password2');

        name.onfocus=function(){
            msg_name.style.display='block';
            msg_name.innerHTML='名称为6-20位的字母或字母与数字组合';
        }
        name.onblur=function(){
            var reg_n = /[^\d]/g;
            var val=name.value;
            if(val.length<6){
                msg_name.innerHTML='<span class="err"><span class="fa fa-times"></span>用户名不能小于6个字符！</span>';
                Nflag=false;
            }else if(val.length>20){
                msg_name.innerHTML='<span class="err"><span class="fa fa-times">用户名不能大于20个字符！</span>';
                Nflag=false;
            }else if(!reg_n.test(val)){
                msg_name.innerHTML='<span class="err"><span class="fa fa-times">用户名不能全为数字！</span>';
                Nflag=false;
            }else{
                msg_name.innerHTML='<span  style="color: green" class="fa fa-check"></span>输入正确';
                Nflag=true;
            }
        }
        password.onfocus=function(){
            msg_password.style.display='block';
            msg_password.innerHTML='密码长度不能少于6个字符';
        }
        password.onblur=function(){
            var pass_val=password.value;
            if (pass_val.length<6){
                msg_password.innerHTML='<span class="err"><span class="fa fa-times">密码长度不能少于6个字符</span>';
                Pflag=false;
            }else{
                msg_password.innerHTML='<span  style="color: green" class="fa fa-check"></span>密码正确';
                Pflag=true;

            }
        }
        password2.onblur=function(){
            msg_password2.style.display='block';
            var pass_val=password.value;
            var pass_val2=password2.value;
            if(pass_val.length<6 && pass_val2.length<6){
                msg_password2.innerHTML='<span class="err"><span class="fa fa-times">密码长度过短</span>';
                Pflag=false;
            }else if (pass_val===pass_val2 && pass_val2!==''){
                msg_password2.innerHTML='<span  style="color: green" class="fa fa-check"></span>正确';
                Pflag=true;
            } else{
                msg_password2.innerHTML='<span class="err"><span class="fa fa-times">两次密码不相同</span>';
                Pflag=false;
            }
        }
        var email=document.getElementById('email');
        var msg_email=document.getElementById('msg-email');
        email.onblur=function(){
            var reg_e=/\w+((-w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+/;
            msg_email.style.display='block';
            var val_email=email.value;
            if (!reg_e.test(val_email)){
                msg_email.innerHTML='<span class="err"><span class="fa fa-times">邮箱格式错误</span>';
                Eflag=false;
            }else{
                msg_email.innerHTML='<span style="color: green" class="fa fa-check"></span>正确';
                Eflag=true;

            }
        }

    }
    function InputCheck(RegForm)
    {
        var reg_n = /[^\d]/g;
        var reg_e=/\w+((-w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+/;
        var  name=RegForm.username.value;
        var  password=RegForm.password.value;
        var password2=RegForm.password2.value;
        var email=RegForm.email.value;
        var zones=RegForm.zones.value;
        var authcod=RegForm.authcode.value
        if (  name.length>6 &&name.length<21&&reg_n.test(name) && password.length>5 &&password2.length>5 && password==password2
        && email.length>1 && reg_e.test(email)&&zones.length>1&&authcod.length>1)
        {
            RegForm.submit();
        }else {

            alert("请完善相关信息");
		RegForm.username.focus();
            return false;

        }

    }



</script>
</body>
</html>