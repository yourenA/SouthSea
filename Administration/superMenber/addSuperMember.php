<?php
session_start();
error_reporting(0);
include('../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Islands/css/Island.css">
    <link rel="stylesheet" href="../css/btn.css">
    <script src="../../js/index.js"></script>
    <script>
        function check(form){
            if(form.name.value==""){
                alert("管理员名称不能为空");form.name.focus();return false;
            }
            var patterm=/^[A-Za-z]+$/
            if(!patterm.test(form.name.value)){
                alert("管理员名称非法");form.name.focus();return false;
            }
	    if (form.password1.value.length < 6)
            {
                alert("密码长度必须大于6!");
                form.password1.focus();
                return false;
            }
            if (form.password1.value == "")
            {
                alert("必须设定登录密码!");
                form.password1.focus();
                return false;
            }
            if (form.password1.value != form.password2.value)
            {
                alert("两次密码不一致!");
                form.password2.focus();
                return false;
            }

            form.submit();
        }

        var xmlHttp;
        function createXMLHttpRequest()
        {
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari 现代浏览器
                xmlHttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5 用户低版本ie
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            return xmlHttp;
        }
        //方式请求
        function startRequest()
        {
            //获取用户输入的信息
            var UserID = document.getElementById("name").value;
            //输入的用户名是否为空
            if(UserID!="")
            {
                //创建XMLHttpRequest对象
                createXMLHttpRequest();
                var url = "checkSuperName.php?UserID="+encodeURI(UserID); //指定url
                xmlHttp.open("GET",url,true);
                xmlHttp.onreadystatechange = handleStateChange;  //指定回调函数
                xmlHttp.send(null);
            }
        }
        function handleStateChange()
        {
            var span=document.getElementById('span');
           

            if(xmlHttp.readyState==4)
            {
                if(xmlHttp.status == 200)
                {
                    var form1=document.getElementById('form1');
                    var text=xmlHttp.responseText;
                    if(text==1){
                        form1.disabled=true;
                        span.innerHTML="该管理员名称已经被注册";
                    }else if(text==2) {
                        form1.disabled=false;
                        span.innerHTML="该管理员名称可以被使用";
                    }

                }

            }
        }
    </script>
</head>
<body style="background:  rgb(264,220,200)">
<div class="container">
    <div class="caption">
        <h1>添加管理员</h1>
    </div>
    <div class="updateForm">
        <form action="checkSuperMenberAdd.php" method="post" name="form">
            <table>
                <tr>
                    <td><label for="name">管理员名称:</label></td><td><input type="text" name="name" id="name" value=""  onchange="startRequest()"></td>
                    <td><span id="span"></span></td>
                </tr>
                <tr>
                    <td><label for="password1">密码:</label></td><td><input type="password" name="password1" id="password1" value=""></td>
                </tr>
                <tr>
                    <td><label for="password2">重复密码:</label></td><td><input type="password" name="password2" id="password2" value=""></td>
                </tr>
                <tr>
                   <td colspan="3"><input class="btnUpdate" type="button" onclick=" history.back(-1);" value="取消"><input id="form1" class="btnUpdate" type="submit" value="添加" onclick="return check(form)"></td>
                </tr>

            </table>
        </form>
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