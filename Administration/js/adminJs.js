/**
 * Created by Administrator on 2016/4/14.
 */

var china=new Object();
china['xisha']=new Array('01永兴岛','02金银岛','03珊瑚岛','04甘泉岛','05全富岛','06鸭公岛','07银屿','09琛航岛','10广金岛','11晋卿岛','12羚羊礁'
    ,'13银屿仔','14咸舍屿','15筐仔沙洲','16石屿','17华光礁','18玉琢礁','20北礁','21中建岛','22银砾滩','23西沙洲','24赵述岛','25北岛','26中岛'
    ,'27南岛','28北沙洲','29中沙洲','30南沙洲','31东新沙洲','32西新沙洲','33东岛','34高尖石','35北边廊','36湛涵滩','37滨湄滩','38浪花礁','39西渡滩','40嵩焘滩');
china['zhongsha']=new Array('01黄岩岛','02西门暗沙','03本固暗沙','04美滨暗沙','05鲁班暗沙','06立夫暗沙','07比微暗沙','08隐矶滩'
    ,'09武勇暗沙','10济猛暗沙','11海鸠暗沙','12安定连礁','13美溪暗沙','14布德暗沙','15波洑暗沙');
china['nansha']=new Array('01永暑礁','02渚碧岛','05美济岛','06太平岛','07中业岛 ','08华阳岛','09东门礁','10弹丸礁','17西月岛','18南子岛','19南薰礁','20景宏岛'
    ,'21南威岛','23北子岛','24染青沙洲','25赤瓜礁 ','26南华礁','27西礁','28贡士礁','29奈罗礁','30双黄沙洲','31南钥岛','32杨信沙洲'
    ,'33中洲礁','34敦谦沙洲','35舶兰礁','36安达礁 ','37鸿庥岛','38南门礁','39西门礁','40安乐礁','41长线礁','42主权礁','43牛轭礁'
    ,'44屈原礁','45琼礁','46鬼喊礁','47西月岛 ','48小现礁','49大现礁','50大渊滩','51安塘礁','52马欢岛','53费信岛','54信义礁'
    ,'55海口礁','56半月礁','57舰长礁','58仁爱礁 ','59牛车轮礁','60仙宾礁','61蓬勃暗沙','62中礁','63东礁','64蓬勃堡','65常骏暗沙'
    ,'66金盾暗沙','67奥南暗沙','68单柱石','69鸟鱼锭石 ','70日积礁','71人骏滩','72万安滩','73无乜礁','74六门礁','75毕生礁','76安波沙洲'
    ,'77二角礁','78浪口礁','79线头礁','80破浪礁 ','81光星仔礁','82南屏礁','83海安礁','84隐波暗沙','85澄平礁','86海宁礁','87琼台礁'
    ,'88潭门礁','89欢乐暗沙','90司令礁','91簸箕礁 ','92光星礁','93南海礁','94皇路礁','95南通礁','96曾母暗沙');
china['dongsha']=new Array('01东沙岛','02东沙礁','03北卫滩','04南卫滩');

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