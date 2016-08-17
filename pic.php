<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Insert title here</title>
    <script type="text/javascript">

        var china=new Object();
        china['xisha']=new Array('01永兴岛','02金银岛');
        china['zhongsha']=new Array('01黄岩岛','02西门暗沙');
        china['nansha']=new Array('01永暑礁','02赤瓜礁');
        china['dongsha']=new Array('01东沙岛','02东沙礁');

        function chinaChange(province, city,id) {
            var pv, cv;
            var i, ii;
            pv = province.value;
            cv = city.value;

            city.length = 1;
            if (pv == '0') return;
            if (typeof (china[pv]) == 'undefined') return;


            for (i = 0; i < china[pv].length; i++) {
                ii = i + 1;

                city.options[ii] = new Option();
                city.options[ii].text = china[pv][i];
                city.options[ii].value = china[pv][i];

            }
            city.options[0].text = "请选择岛礁名";

        };
    </script>
</head>
<body>
<form action="doAction3.php" method="post" enctype="multipart/form-data">
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value='176942' /> -->
    <select name="N_belong" onchange="chinaChange(this,document.getElementById('city'));" style=" width:10%; height:30px;line-height:30px; ">
        <option value ="请选择市区">请选择群岛</option>
        <option value ="xisha">西沙 </option>
        <option value ="zhongsha">中沙 </option>
        <option value ="nansha">南沙 </option>
        <option value ="dongsha">东沙 </option>
    </select>
    <select name="N_name" id="city" style=" width:10%; height:30px;line-height:30px; ">
        <option value ="请选择市区">请选择岛礁名</option>
    </select>

    请选择您要上传的文件：<input type="file" name='myFile' />
    <textarea name="describe" id="" cols="30" rows="10"></textarea>
    <!-- <input type="file" name="myFile"  accept="image/jpeg,image/gif,image/png"/><br /> -->
    <input type="submit" value="上传文件" />
</form>
</body>
</html>