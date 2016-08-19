<?php
session_start();
include('../conn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>南海群岛--自然资源</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../nansha/nansha.css">
    <link rel="stylesheet" href="../css/news.css">
    <link rel="stylesheet" href="resource.css">
    <script src="../js/index2.js"></script>
<script src="../js/checkSearch.js"></script>
    <script>
        function checkMessage(form){
            if(form.message_content.value==""){
                alert("你在留言板输入的内容为空，请输入！");form.message_content.focus();return false;
            }
            if(form.message_content.value.length<10){
                alert("你在留言板输入的内容过短，请输入多点内容！");form.message_content.focus();return false;
            }
            if(form.message_content.value.length>300){
                alert("你在留言板输入的内容过长，请输入少点内容！");form.message_content.focus();return false;
            }

            form.submit();
        }

    </script>
</head>
<body>
<div class="container">
    <!--头部-->
    <div class="head">
        <div class="head-left-top"></div>
        <div class="head-top">
            <div class="head-top-content">
                <div class="head-top-content-span">
                        <span id="time" class="time">
                            <?php
                            echo date("Y-m-d");
                            ?>
                            |</span>
                    <?php
                    if(isset($_SESSION['username'] )){
                        echo "欢迎你 <a href=\"../personal/personal.php\">{$_SESSION['username']}</a>";
                        echo " <span>| <a href=\"../login/check_login.php?action=logout\" class=\"register\">退出</a></span>";
                    }else{
                        echo "<span><a href=\"../login/login.php\" class=\"login\">登陆</a></span>
                        <span>| <a href=\"../login/register.php\" class=\"register\">注册</a></span>";
                    }
                    ?>


                </div>

            </div>

        </div>
        <div class="head-logo">
            <div class="head-logo-pic">
                <div class="head-logo-logo"></div>
<div class="head-search">
                        <form method="get" action="../search/search.php" name="search_form">
                            <table>
                                <tr>
                                    <td><input class="search-input" name="search_input" placeholder="请输入搜索内容" type="text"></td>
                                    <td>
                                        <select class="search-select" name="search_select" id="">
                                            <option value="岛礁">岛礁</option>
                                            <option value="新闻">新闻</option>
                                            <option value="矿产">矿产</option>
                                            <option value="鱼类">鱼类</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit"  id="scbar_btn" class="search-submit" onclick="return checkSearch(search_form) " ></button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
            </div>
        </div>
        <div class="head-nav">
            <ul class="head-nav-ul">
                <li class="active"><a href="../SouthSea/SouthSea.php">首页</a></li>
                <li ><a href="../SouthSea-Board/SouthSea-Board.php">南海群岛</a>
                    <ul>
                        <li ><a href="../nansha/nansha.php">南沙群岛</a></li>
                        <li ><a href="../xisha/xisha.php">西沙群岛</a></li>
                        <li ><a href="../zhongsha/zhongsha.php">中沙群岛</a></li>
                        <li ><a href="../dongsha/dongsha.php">东沙群岛</a></li>
                    </ul>
                </li>
                <li ><a href="../build/build.php">岛礁建设</a></li>
                <li ><a href="../news/news.php">南海动态</a>
                    <ul>
                        <li ><a href="../news/dongtai.php">新闻动态</a></li>
                        <li ><a href="../news/weiquan.php">南海维权</a></li>
                    </ul>
                </li>
                <li ><a href="../expert/expert.php">专家建议</a></li>
                <li ><a href="../resource/resource.php">自然资源</a>
                    <ul>
                        <li ><a href="../resource/kuangchan.php">矿产资源</a></li>
                        <li ><a href="../resource/yuye.php">渔类资源</a></li>
                    </ul>
                </li>
                <li ><a href="../video/video.php">影像资料</a></li>

            </ul>
        </div>
    </div>

    <!--中间正文-->
    <div class="resource">
        <div id="resource-content" class="resource-content">
            <h2 class="resource-content-title">南海资源之矿产资源</h2>
            <p class="resource-content-p">
                南海是亚洲大陆东南部的大型边缘海，海域面积约350万平方公里，大部分属我国领海，其中属海南省管辖的海域面积达200多万平方公里。辽阔的南海蕴藏着丰富的自然资源，特别是石油天然气尤其丰富，有“第二海湾”之称。据有关方面测算，南海的石油总潜量约550亿吨，天然气约20万亿立方米;其中属我国传统海疆线内的石油潜量约425亿吨，天然气约13亿立方米，具有广阔、良好的勘查、开发前景。目前，南海油气开发是周边国家争夺的焦点。一些国家无视我国政府历次严正声明，入侵我国海域，掠夺我国的油气资源。南海面临严峻的形势。本文着重从南海所处的区域地质构造部位，新生代沉积盆地的分布、沉积岩性特征、油气的生成层次、储集层和圈闭类型及保存条件，分析论述南海油气资源的有利成矿地质条件;概述南海一些周边国家无视我国海疆和主权，侵占我国岛屿和侵入我国领海区掠夺性勘查、开发油气资源的严峻形势，阐述我国和周边国家在南海勘查、开发油气资源的现状;论述南海油气资源的预测潜量及其在世界、我国海域油气资源潜量中的比例和发展前景，同时就今后南海地质矿产资源开发提出一些构想和建议。
            </p>


            <div class="resource-content-box">
                <div class="resource-content-box-caption">
                    南海油气资源的成矿地质条件
                </div>
                <div id="resource-content-box-content" class="resource-content-box-content">
                    <div class="resource-content-box-article">
                        南海位于欧亚板块、印度，澳大利亚板块和太平洋板块交接的地质构造环境，属亚洲大陆东南部与菲律宾，马来西亚火山岛弧之间的大型边缘海，以及著名地质学家李四光早在三十年代就称之谓东亚大陆边缘濒太平洋新华夏系第一沉降带西南段的南海油气远景区;东自菲律宾、西至越南和马来半岛，南起马来西亚和文莱、北止中国的广西、广东、福建和台湾(包括东沙群岛、海南岛、西沙群岛、中沙群岛、南沙群岛、纳士纳群岛、亚南巴斯群岛、两兄弟群岛及其海域)，水深20-4400米，最深5559米，总面积约350万平方公里，广泛接受新生代第三纪三角洲相、滨海、浅海相为主的碎屑岩、礁灰岩和碳酸盐岩沉积。在南海的海底沉积盆地，蕴藏着丰富的石油、天然气、锰结核等矿产资源;在南海的海岸带和近岸浅水海域，蕴藏着丰富的钛、锆、锡、独居石、石英砂等砂矿资源。根据我国地质矿产部、原石油部、中国海洋石油总公司、中国科学院等部门和南海周边国家有关部门所获的地质、地球物理和石油天然气勘查资料综合分析研究，南海油气资源的生成、运移、储集、圈闭、保存等成矿地质条件十分有利。主要表现在：
                        <p>
                            (一)沉积盆地多、面积广、厚度大
                        </p>
                        <p>
                            南海海域共发现38个沉积盆地(或盆地群)，以2000米新生代沉积物等厚线计算盆地的累计总面积约82.5万平方公里。其中，全部或大部位于陆架区的盆地有19个，约占南海陆架区面积的45.8%;面积在1万平方公里以上的大型沉积盆地有珠江口盆地(17.5万Km2)、莺歌海盆地(5万Km2)、琼东南盆地(4.5万Km2)、北部湾盆地(2.8万Km2)、台西南盆地、笔架南盆地、西沙海槽盆地、礼乐盆地、郑和盆地、南华盆地、巴拉望盆地、北苏绿海盆地、文莱沙巴盆地、曾母盆地(17.9万Km2)、万安盆地(6.6万Km2)、中越盆地、湄公盆地、昆仑盆地、西纳士纳盆地、马来贫地、彭尤盆地等20多个;在我国传统海域疆界内的盆地25个，横跨我国和邻国海域疆界的盆地6个。盆地内以第三纪三角洲相、滨浅海相的碎屑岩、泥岩、礁灰岩、碳酸盐岩为主，厚度多在3000-12000米，最大超过15000米，为油气的生成、聚集、保存提供了极为有利的地质条件。
                        </p>
                        <p>
                            (二)油气生成的层次多
                            </p>

                        <p>
                            南海第三系生油气层主要有下、中、上三层;岩性有三角洲和港湾沼泽相的泥岩、泥页岩和滨浅海相的礁灰岩或碳酸盐岩;油气源丰富，类型多，主要生油气层的生气强度一般为8.25-15.17亿m3/Km2，最大达30.18亿m3/Km2。
                        </p>
                        <p>
                            (三)油气储集层类型多
                            </p>
                        <p>
                            油气储集层按地质时代可分三套：①下部始新统储集层(主要分布在南海北部各盆地);②中部渐下中新统储集层(广布在南海各盆地);③上部中上新统储集层(主要分布在南沙各盆地)。按岩性划分，油气储集层主要以碎屑岩(特别是三角洲砂岩体和浊积扇砂岩体)最重要，如南海北部和西部的珠江口盆地、莺歌海盆地、湄公盆地等;其次是礁灰岩和碳酸盐岩，如南海南部、东部各盆地和北部湾盆地;岩浆岩或火山碎屑岩裂隙性储集层仅在局部小规模出现。
                        </p>
                        <p>
                            (四)圈闭类型多
                        </p>
                        <p>
                            由于构造活动强度的不均衡和性质的差异，不同海域发育着不同的油气圈闭类型。南海西部、北部各盆地以断块、泥底辟断背斜和披覆背斜为主;南海东部和南部各盆地以背斜、同生背斜、泥刺穿背斜及礁隆圈闭为主。
                        </p>
                        <p>
                            (五)保存条件好
                        </p>
                        <p>
                            南海新生代的构造活动虽然频繁，但强度较小且具有自盆地边部往内减弱的趋势，沉积间断面上下岩性变化不大，一般未遭受长期抬升剥蚀;同时，在多数油气储集层之上往往有良好的泥质岩覆盖，保存条件既广又好。
                        </p>
                    </div>
                    <div class="resource-content-box-close">
                        <span>收起</span>
                    </div>
                </div>


            </div>
            <div class="resource-content-box">
                <div class="resource-content-box-caption">
                    南海油气资源的形势及勘查开发现状
                </div>
                <div class="resource-content-box-content">
                    <div class="resource-content-box-article">
                        <p>
                            (一)南海油气资源的严峻形势
                        </p>
                        <p>
                            从本世纪50年代后期开始，特别是70年代初以来，南海周边的印度尼西亚、马来西亚、菲律宾、文莱、越南等国家出于不同的政治、经济目的，凭借他们籍近南海南部海域的地理优势，先后侵入我国管辖的南沙海域进行掠夺性的油气勘查开发活动。他们置我国传统海疆线而不顾，无视我国政府历次严正声明，各自单方面宣布其大陆架、专属经济区范围和油气探采招标区，不仅瓜分了南海南部整个陆架区，又将边界扩展到200公里以外的深海区，还派军舰对我国在领海内的油气勘查蛮加干扰。据至1992年的有关资料，越南、马来西亚、文莱、菲律宾、印度尼西亚先后共侵占我国南沙群岛的岛屿42个，侵占我国海疆面积约84万Km2;在侵占的我国海域探明油田11个，天然气田15个。马来西亚、文莱、印度尼西亚在曾母盆地内北康台地以南已探明可采储量为石油8.5亿吨，天然气2.12万亿m3。越南近年同外国(原苏联)公司合作，在万安盆地北部拗陷我国传统海疆线以内的4个含油构造打了一批钻井，探明了大熊油田(可采储量1.14亿吨)，在其他几个构造也打出了高产工业油流。据不完全统计，在南沙海域已有20多个国家60多家石油公司投标与其周边国家合作油气资源勘查开发，总投资达235亿美元。由此可见，我国的南沙海疆已处于“岛屿被侵占，海域被瓜分，资源被掠夺，疆界被践踏”的严峻形势;捍卫我国南海的传统海疆、蓝色国土海洋权益，保护我国领海的油气资源和其他资源，已到了刻不容缓的时候。
                        </p>
                        <p>
                            (二)南海油气资源的勘查开发现状
                        </p>
                        <p>
                            南海的油气勘查工作始于二十世纪50年代;60-70年代为第一个勘查高潮，探明了一批油气田;80年代转为开发高潮;80年代后期开始第二个勘探开发高潮。
                            我国在传统海疆内开展油气勘查开发的，有地质矿产部、原石油部、中国科学院，以及中国海洋石油总公司的南海东部公司和南海西部公司及其与外国合作的油气勘查开发等单位。(1)南海东部公司的工作重点是珠江口盆地和东沙群岛毗邻各盆地;共发现含油气构造22个;有惠州21-1、26-1、32-2、32-3，西江24-3、30-2，陆丰13-1、22-1，流花11-1等9个油田投入开发;1995年石油产能为582.7万吨，预计1996年石油产能将突破1000万吨。(2)南海西部公司的工作重点是海南岛毗邻的北部湾盆地。莺歌海盆地、琼东南盆地、珠江口盆地西南部的珠三凹陷和南沙的万安北-21区块;共发现含油气构造28个，获基本探明储量为石油6022万吨(为涠12-1、涠12-8油田储量)、天然气1888.55亿立方米，(为崖13-1、东方1-1和乐东15-1气田总储量);已投入开发的有北部湾盆地的涠10-3和涠11-4油田(1996年石油产能110万吨)，琼东南盆地的崖 13-1气田(1996年天然气产能34亿立方米、凝析油27万吨);正在立项开发的东方1-1气田探明储量801.55亿立方米，设计天然气年产能26亿立方米;正在勘查的崖35-1气田已控制储量700亿立方米，在多个油气构造中分别打出工业油气流的还有文昌8-3-1井(产原油1378m3/日，天然气36.3万m3/日)、文昌9-1-1井(产油206吨/日，产气46.8万m3/日)乐东22-1-1井(产气122万m3/日)和岭头1-1-1井(产气23万m3/日)。(3)地质矿产部广州海洋地质调查局的工作重点是北纬3°40′-12°、东经108°-119°的南沙海域约80万Km2 和万安盆地(6.6万Km2，其中属我国海域4.8万km2)，曾母盆地(17.87km2，其中属于我国海域12.9万km2)：共完成综合物探(多道地震、重力、磁力、测探)测线共75851Km,发现大中型沉积盆地15个，总面积达35万Km2;在重点工作的万安盆地内划分出北部、中部、南部、东部拗陷和南部、中部、东部低隆起等7个二级构造单元，新生代沉积厚度达3000-12000米，由下部的古新统、始新统陆相生油良好的泥岩和上部的渐新统、中新统海相已进入生油门限的碳酸盐岩、三角洲相的泥岩组成。在曾母盆地划分出万安南、康西、南薇、琼台拗陷，安康、安屏低隆起，南康、北康台地和立地斜坡等9个二级构造单元，新生代沉积厚度达12000米，由渐新统、早中新统的河漫滩砂岩和港湾沼泽相煤系、中中新统一第四系浅海一半深海生物礁、碳酸盐岩、泥岩组成。经综合研究所获地质资料，圈定了I级含油远景区，初步查明南沙具有生油气的岩层多且厚度大、油气储集和圈闭类型多，生油气时间与构造形成时间搭配好等特点，具备大型油气田的成矿有利地质条件;预测南沙海域油气资源潜量为320亿吨，其中的万安盆地60亿吨(以油为主)、曾母盆地170亿吨(以气为主，约5.9万亿m3)，万安和曾母盆地油气资源的70%在我国海域之内。④中国科学院南海海洋研究所：于1987-1991年在南沙海域做过4个航次的科学考察，调查项目包括测深、重力、磁力、地震、热流、表层海水和海面空气汞含量等，同样证实南沙海域发育有一系列含油气盆地。
                        </p>
                    </div>
                    <div class="resource-content-box-close">
                        <span>收起</span>
                    </div>
                </div>
            </div>
            <div class="resource-content-box">
                <div class="resource-content-box-caption">
                    南海油气资源的发展前景、开发构想和对策建议
                </div>
                <div class="resource-content-box-content">
                    <div class="resource-content-box-article">
                        <p>
                            海南是我国唯一有海域行政管辖职能的海洋大省和经济特区省，位处祖国的南大门和南海的战略前沿，担负着捍卫我国领海、合理开发和保护海洋资源的重任。
                        </p>
                        <p>
                            根据海南省环境资源厅编制的《海南省地质矿产资源和矿业发展“九五”计划及2010年远景目标》，为了把海南建成我国新兴的工业省和依托省辖海域油气资源优势建设成在国内外享有声誉的外向型油气炼制化肥、化工、电力基地，拟提出我省对所辖南海油气资源勘查开发的基本构想和规划目标是：“九五”期间，在“八五”期间省辖海域已探明崖13-1、东方1-1和乐东15-1气田共1888亿m3天然气的基础上，新增探明天然气储量3000亿m3、石油储量5000万吨;在崖13-1和东方1-1气田年产天然气60亿m3，年产值约38亿元;油气的炼制、化肥、化工和电力产业年产值219亿元。到2010年，在省辖海域新增探明天然气储量1万亿m3，石油2亿吨;年产天然气100亿m3、石油1000万吨，年产值约150亿元;油气的炼制、化肥、化工和电力产业年产值620亿元。
                        </p>
                        <p>
                            (1)在南海权益上，坚决维护我国传统海疆领海的主权和尊严，反对外国的侵占和干扰。同时，建议国家与赋予海南省管辖南海的我国领海和保护领海资源的授权一样，赋予海南省在南海领海油气资源的自营或者对外合作勘查、开发方面的权力。
                        </p>
                        <p>
                            (2)在产业政策上，正确处理以油气勘查探明储量先行的基础地位与发展油气系列炼制，加工为主导的关系，确立依托油气优势资源发展高技术、高增值、高效益的集约化外向型能源、化肥、化工为重点的支柱产业，促进资源优势向经济优势的高效转化。
                        </p>
                        <p>
                            (3)在指导思想上，充分发挥海南省的区位优势和经济特区的功能优势，切实改善投资油气勘查、开发的软硬环境，本着我国政府提出“主权属我、搁置争议、共同开发”的主张，以及尊重国家主权，真诚合作，互利互惠，优势互补和综合补偿的原则，大力支持、积极参与油气勘查、开发、炼制、加工产业的国内、国际与区域性合作，并使之成为海南经济社会发展和现代化建设的强大基础产业和首要支柱产业。
                        </p>
                        <p>
                            (4)在经济体制和发展方式上，以外引内联的有效形式，组建跨地区、跨行业甚致跨国，探采工贸一体化的股份制现代化企业集团，多渠道开拓勘查、开发资金来源加大投入，采用先进的技术设备、工艺流程，走集约化发展海洋油气产业经济的道路。
                        </p>
                        <p>
                            (5)在具体操作上，建议省政府组织有关部门，加强与国务院、有关部委和中国海洋石油总公司以及国内外实力雄厚的石油公司的联系，把省辖海域油气勘探、开发项目列入国家和省的经济社会发展“九五”计划及2010年规划分步实施，并在南沙海域的项目实施上能得到国务院的领导和外交部、总参谋部、地矿部从外交、军事及矿法上的大力协作支持。
                        </p>
                    </div>
                    <div class="resource-content-box-close">
                        <span>收起</span>
                    </div>
                </div>
            </div>
            
            <div class="resource-content-list">
                <ul>
                    <?php
                    /*
                    * Created on 2010-4-17
                    *
                    * Order by Kove Wong
                    */

                    $Page_size=8;

                    $result=mysql_query("select * from  db_kuangchan");
                    $count = mysql_num_rows($result);//mysql_num_rows — 取得结果集中行的数目
                    $page_count = ceil($count/$Page_size);//ceil向上取整，页数，天花板

                    $init=1;
                    $page_len=5;//要显示分页的个数
                    $max_p=$page_count;
                    $pages=$page_count;

                    //判断当前页码
                    if(empty($_GET['page'])||$_GET['page']<0){//如果page为空或者小于0，page赋值为1
                        $page=1;
                    }else {
                        $page=$_GET['page'];//将page值赋值为传递过来的值
                    }
                    $offset=$Page_size*($page-1);//$offset为一页显示的条数乘以当前页数减1，就是每一页开始的位置
                    $sql="select * from db_kuangchan order by K_data  limit $offset,$Page_size" ;//select * from table limit 开始的条数，要显示的条数
                    $result=mysql_query($sql);
                    $row=mysql_fetch_object($result);

                    do{
                        ?>
                        <li><a href="kuangchanPage.php?id=<?php echo $row->K_id;?>"><img src="<?php echo $row->K_image;?>" alt=""><p><?php echo $row->K_name;?></p></a></li>
                    <?php }while($row=mysql_fetch_object($result));

                    ?>
                </ul>

                <table>
                    <?php
                    $page_len = ($page_len%2)?$page_len:$page_len+1;//页码个数
                    $pageoffset = ($page_len-1)/2;//页码个数左右偏移量

                    $key='<div >';
                    $key.="<span>$page/$pages</span> "; //第几页,共几页
                    if($page!=1){//当不是第一页
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">第一页</a> "; //第一页，.$_SERVER['PHP_SELF']指向当前的页面
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页
                    }else {//如果是第一页，则只显示文字，不显示连接
                        $key.="<span>第一页</span> ";//第一页,
                        $key.="<span>上一页</span>"; //上一页
                    }
                    if($pages>$page_len){
//如果当前页小于等于左偏移
                        if($page<=$pageoffset){
                            $init=1;
                            $max_p = $page_len;
                        }else{//如果当前页大于左偏移
//如果当前页码右偏移超出最大分页数
                            if($page+$pageoffset>=$pages+1){
                                $init = $pages-$page_len+1;
                            }else{
//左右偏移都存在时的计算
                                $init = $page-$pageoffset;
                                $max_p = $page+$pageoffset;
                            }
                        }
                    }
                    for($i=$init;$i<=$max_p;$i++){
                        if($i==$page){//如果是当前页，则直接输出文字
                            $key.=' <span>'.$i.'</span> ';
                        } else {//如果不是当前页，则输出连接
                            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>";
                        }
                    }
                    if($page!=$pages){
                        $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页
                    }else {
                        $key.="<span>下一页</span> ";//下一页
                        $key.="<span>最后一页</span>"; //最后一页
                    }
                    $key.='</div>';
                    ?>
                    <tr>
                        <td colspan="2" height="60"><div class="pageList" align="center"><?php echo $key?></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!--脚部内容-->
    <div class="footer">
        <div class="footer-content">
            <div class="footer-content-logo"></div>
            <div class="footer-content-link">
                <h3>友情链接</h3>
                <div class="link-content">
                    <a href="http://www.soa.gov.cn/" target="_blank">国家海洋局</a>
                    <a href="http://www.nanhai.org.cn/" target="_blank">中国南海研究院</a>
                    <a href="http://scstt.org/" target="_blank">南海智库</a>
                    <a href="http://www.nhjd.net/" target="_blank">南海研究论坛</a>
                    <a href="http://www.haohanfw.com/forum.php?gid=1" target="_blank">浩汉防务</a>
                    <a href="http://www.daijiaru.site/index/index.html" target="_blank">"友人A"个人网站</a>

                </div>
            </div>
            <div class="footer-content-message">
                <?php
                if(isset($_SESSION['username'] )){
                    $variable='';
                    $tip='如果你有什么意见或建议，请在这里留言';
                }else{
                    $tip='如果你有什么意见或建议,需要留言，请先登陆';
                    $variable='disabled';
                }
                ?>
                <form action="../put_message.php" method="post" name="form_message">
                    <textarea name="message_content" id="" cols="32" rows="6"  placeholder="<?php echo $tip;?>" <?php echo $variable;?>></textarea><br>
                    <input type="reset" value="重置">
                    <input type="submit" value="提交" onclick="return checkMessage(form_message)">
                </form>
            </div>
        </div>
    </div>
    <!--返回顶部及返回上一页-->
    <a href="javascript:;" class="btn-back" id="btn-back" title="回到上页" onClick="javascript :history.go(-1);">
        <span id="back-span">   返回上页</span>
        <img src="../SouthSea/images/turn-back.png" alt="">

    </a>
    <a href="javascript:;" class="btn-top" id="btn-top" title="回到顶部">
        <img src="../SouthSea/images/turn-top.png" alt="">
        <span id="top-span">返回顶部</span>
    </a>
</div>
</body>
</html>