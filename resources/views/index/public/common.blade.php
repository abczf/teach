<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>谋刻职业教育在线测评与学习平台</title>
    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="/index/js/rev-setting-1.js"></script>
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <link rel="stylesheet" href="/index/css/style.css"/>
    <link rel="stylesheet" href="/index/css/tab.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/index/css/main.css" id="main-css">
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

{{--头部--}}
@include("index/public/indexHead")
{{--头部--}}

    {{--内容--}}
    @section('subject')

    @show
    {{--内容--}}

{{--底部--}}
@include('index/public/foot')
{{--底部--}}

</div>

{{--右侧--}}
@include('index/public/right')
{{--右侧--}}

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
