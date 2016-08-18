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


    /*首页显示四个群岛的名字*/
    var areas=document.getElementsByTagName('area');
    var body_pic=document.getElementById('body-pic');
    var tools=body_pic.getElementsByTagName('span');
    for(var i=0;i<areas.length;i++){
        (function(i){
            areas[i].onmouseover=function(){
                tools[i].style.display='block';
            }
            areas[i].onmouseout=function(){
                tools[i].style.display='none';
            }
        })(i);
    }

    /*矿产资源资料的显示与隐藏*/
    var boxs=document.getElementsByClassName('resource-content-box');
    for (var i=0;i<boxs.length;i++){
        (function(i){
            var caption=boxs[i].getElementsByClassName('resource-content-box-caption')[0];
            var content=boxs[i].getElementsByClassName('resource-content-box-content')[0];
            caption.onclick=function(){
                content.style.display='block';
            }
            var close=boxs[i].getElementsByClassName('resource-content-box-close')[0];
            close.onclick=function(){
                content.style.display='none';
            }
        })(i)

    }

    /*轮播图*/
    var ul=document.getElementById('ul');
    var lis=ul.getElementsByTagName('li');
    var top_pic=document.getElementById('body-top-pic');
    var turn_right=document.getElementById('turn-right');
    var turn_left=document.getElementById('turn-left');
    var liWidth=lis[0].offsetWidth;

    var num=0;
    var timer2;
    function  move(index){

    }

    function  change(){

        if (num>lis.length-1){
            num=0;
        }
        if (num<0){
            num=lis.length-1;
        }
        ul.style.left=-num*liWidth+'px';
    }
    ul.onmouseover=turn_right.onmouseover=turn_left.onmouseover=function(){
        clearInterval(timer2);
    };
    ul.onmouseout=turn_right.onmouseout=turn_left.onmouseout=function(){
        timer2=setInterval(change2,2000);
    }
    turn_right.onclick=function(){
        num++;
        change();
        console.log(num);
    }
    turn_left.onclick=function(){
        num--;
        change();
        console.log(num);

    }
    timer2=setInterval(change2,2000);
    function change2(){
        num++;
        change();
    }
}