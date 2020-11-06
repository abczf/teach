<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>谋刻职业教育在线测评与学习恋爱</title>
    <script src="js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/rev-setting-1.js"></script>
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/tab.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/main.css" id="main-css">
    <!--课程选项卡-->
    <script type="text/javascript">
        function nTabs(thisObj,Num){
            if(thisObj.className == "current")return;
            var tabObj = thisObj.parentNode.id;
            var tabList = document.getElementById(tabObj).getElementsByTagName("li");
            for(i=0; i <tabList.length; i++)
            {
                if (i == Num)
                {
                    thisObj.className = "current";
                    document.getElementById(tabObj+"_Content"+i).style.display = "block";
                }else{
                    tabList[i].className = "normal";
                    document.getElementById(tabObj+"_Content"+i).style.display = "none";
                }
            }
        }
    </script>
</head>
<body>
<div class="head" id="fixed">
    <div class="nav">
        <span class="navimg"><a href="index.html"><img border="0" src="images/logo.png"></a></span>
        <ul class="nag">
            <li><a href="courselist.html" class="link1">课程</a></li>
            <li><a href="articlelist.html" class="link1">资讯</a></li>
            <li><a href="teacher.html" class="link1">讲师</a></li>
            <li><a href="exam_index.html" class="link1" target="_blank">题库</a></li>
            <li><a href="askarea.html" class="link1" target="_blank">问答</a></li>
        </ul>
        <span class="massage">
            <a href="mycourse.html"  onMouseOver="logmine()" style="width:70px" class="link2 he ico" target="_blank">sherley</a>
            <span id="lne" style="display:none" onMouseOut="logclose()" onMouseOver="logmine()">
                <span style="background:#fff;">
                	<a href="mycourse.html" style="width:70px; display:block;" class="link2 he ico" target="_blank">sherley</a>
                </span>
                <div class="clearh"></div>
                <ul class="logmine" >
                    <li><a class="link1" href="#">我的课程</a></li>
                    <li><a class="link1" href="#">我的题库</a></li>
                    <li><a class="link1" href="#">我的问答</a></li>
                    <li><a class="link1" href="#">退出</a></li>
                </ul>
            </span>
        </span>
    </div>
</div>

{{--内容--}}
@include("index/public/index")

<!--右侧浮动-->
@include("index/public/right")

</body>
</html>
<script>
    function logmine(){
        document.getElementById("lne").style.display="block";
    }
    function logclose(){
        document.getElementById("lne").style.display="none";
    }
    /*右侧客服飘窗*/
    $(".label_pa li").click(function() {
        $(this).siblings("li").find("span").css("background-color", "#fff").css("color", "#666");
        $(this).find("span").css("background", "#fb5e55").css("color", "#fff");
    });
    $(".em").hover(function() {
        $(".showem").toggle();
    });
    $(".qq").hover(function() {
        $(".showqq").toggle();
    });
    $(".wb").hover(function() {
        $(".showwb").toggle();
    });
    $("#top").click(function() {
        if (scroll == "off") return;
        $("html,body").animate({
                scrollTop: 0
            },
            600);
    });
</script>
