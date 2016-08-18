/**
 * Created by Administrator on 2016/4/19.
 */
/**
 * Created by Administrator on 2016/4/15.
 */
window.onload=function(){
    /*放回顶部及返回上层*/
    var topbtn=document.getElementById("btn-top");
    var topspan=document.getElementById("top-span");
    topbtn.onmouseover=function(){
        topspan.style.display="block";
    };
    topbtn.onmouseout=function(){
        topspan.style.display="none";
    };
    var backbtn=document.getElementById("btn-back");
    var backspan=document.getElementById("back-span");
    backbtn.onmouseover=function(){
        backspan.style.opacity=1;
    };
    backbtn.onmouseout=function(){
        backspan.style.opacity=0;
    };

    var timer=null;
    var  pageheight=document.documentElement.clientHeight;//页面一屏的高度
    //alert(pageheight)
    window.onscroll=function(){
        var backtop=document.body.scrollTop;//滚动的高度
        if(backtop>=300){
            topbtn.style.display="block";
        }else {
            topbtn.style.display="none";
        }
    }
    topbtn.onclick=function(){
        var backtop=document.body.scrollTop;//滚动的高度
        var speedtop=backtop/5;
        document.body.scrollTop=backtop-speedtop;
        timer=setInterval(function(){
            var backtop=document.body.scrollTop;
            document.body.scrollTop-=100;
            if(backtop==0){
                clearInterval(timer);
            }
        },30)

    }

    waterfall('main','pin');


   /* var center_pic=document.getElementById('center-pic');
    var ul=center_pic.getElementsByTagName('ul')[0];
    var li=ul.getElementsByTagName('li');
    var speed=-2;

    /!*ul.innerHTML=ul.innerHTML+ul.innerHTML;*!/
    ul.style.width=li[0].offsetWidth*li.length+'px'
    function movePic(){
        if(ul.offsetLeft<-ul.offsetWidth/2){
            ul.style.left='0';
        }
        if(ul.offsetLeft>0){
            ul.style.left=-ul.offsetWidth/2+'px'
        }
        ul.style.left=ul.offsetLeft+speed+'px';
    }

    var timer=setInterval(movePic,30);

    center_pic.onmouseover=function(){
        clearInterval(timer);
    }
    center_pic.onmouseout=function(){
        timer=setInterval(movePic,30);
    }*/

}

/*
 parend 父级id
 pin 元素id
 */
function waterfall(parent,pin){

    var oParent=document.getElementById(parent);// 父级对象
    var aPin=getClassObj(oParent,pin);// 获取存储块框pin的数组aPin
    var iPinW=aPin[0].offsetWidth;// 一个块框pin的宽
    var num=5;/*Math.floor(document.documentElement.clientWidth/iPinW);*///每行中能容纳的pin个数【窗口宽度除以一个块框宽度】
    oParent.style.cssText='width:'+iPinW*num+'px;margin-right: auto;margin-left: auto;';//设置父级居中样式：定宽+自动水平外边距

    var pinHArr=[];//用于存储 每列中的所有块框相加的高度。
    for(var i=0;i<aPin.length;i++){//遍历数组aPin的每个块框元素
        var pinH=aPin[i].offsetHeight;
        if(i<num){
            pinHArr[i]=pinH; //第一行中的num个块框pin 先添加进数组pinHArr
        }else{
            var minH=Math.min.apply(null,pinHArr);//数组pinHArr中的最小值minH
            var minHIndex=getminHIndex(pinHArr,minH);
            aPin[i].style.position='absolute';//设置绝对位移
            aPin[i].style.top=minH+'px';
            aPin[i].style.left=aPin[minHIndex].offsetLeft+'px';
            //数组 最小高元素的高 + 添加上的aPin[i]块框高
            pinHArr[minHIndex]+=aPin[i].offsetHeight;//更新添加了块框后的列高
        }
    }
    oParent.style.height=aPin[aPin.length-1].offsetTop+100+aPin[aPin.length-1].offsetHeight+"px";

}

/****
 *通过父级和子元素的class类 获取该同类子元素的数组
 */
function getClassObj(parent,className){
    var obj=parent.getElementsByTagName('*');//获取 父级的所有子集
    var pinS=[];//创建一个数组 用于收集子元素
    for (var i=0;i<obj.length;i++) {//遍历子元素、判断类别、压入数组
        if (obj[i].className==className){
            pinS.push(obj[i]);
        }
    };
    return pinS;
}
/****
 *获取 pin高度 最小值的索引index
 */
function getminHIndex(arr,minH){
    for(var i in arr){
        if(arr[i]==minH){
            return i;
        }
    }
}