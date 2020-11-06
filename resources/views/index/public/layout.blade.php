<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>谋刻职业教育在线测评与学习平台</title>
    <link rel="stylesheet" href="/index/css/course.css"/>
    <link rel="stylesheet" href="/index/css/register-login.css"/>
    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <link rel="stylesheet" href="/index/css/tab.css" media="screen">
    <script src="/index/js/jquery.tabs.js"></script>
    <script src="/index/js/mine.js"></script>
</head>
<body>

{{--头部--}}
@include("index/public/head")
{{--头部--}}

    {{--内容--}}
    @section('subject')

    @show
    {{--内容--}}

{{--底部--}}
@include("index/public/foot")
{{--底部--}}

<!--右侧浮动-->
@include("index/public/right")
<!--右侧浮动-->

</body>
</html>
