<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="favicon.ico" >
    <link rel="Shortcut Icon" href="favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/admin/lib/html5.js"></script>
    <script type="text/javascript" src="/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>搭伙毕业</title>
    <meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
    <style>
        .sou {
            float: right;
        }
    </style>
</head>
{{--@include('admin.public.top')--}}
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<article class="page-container">
    <form class="form form-horizontal" id="form-article-add" action="javascript:;">
        <input type="hidden" value="{{$myinfo->details_id}}" id="details_id">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户头像：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="file" name="details_head" id="details_heads">
                <input type="hidden" name="details_head" value="" id="details_head">
                <div  class="input-group" id="imgs_desc"></div>
                <div id="imgesap">
                    <img src='/{{$myinfo->details_head}}' id="hide" width='200px'>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$myinfo->details_name}}" placeholder="" id="" name="details_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户年龄：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$myinfo->details_age}}" placeholder="" id="" name="details_age">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用户性别：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="radio" value="1" placeholder="" id="" name="details_sex" {{$myinfo['details_sex']==1?'checked':''}}>男
                <input type="radio" value="2" placeholder="" id="" name="details_sex" {{$myinfo['details_sex']==2?'checked':''}}>女
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button class="btn btn-primary radius" type="button" id="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
{{--    <a href="{{url('/index/personal/personalinfo/update')}}"><h1>去修改</h1></a>--}}
</article>

<script src="/jquery.js"></script>
<link rel="stylesheet" href="/uploadify/uploadify.css">
<script src="/uploadify/jquery.uploadify.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", "#submit", function () {
            // alert(123);

            var data = {};
            data.details_name = $("input[name = 'details_name']").val();
            data.details_id = $("#details_id").val();
            data.details_sex = $("input[name='details_sex']").val();
            data.details_head = $("input[name = 'details_head']").val();
            data.details_age = $("input[name = 'details_age']").val();
            data.user_id = 1;

            var url = "/index/personal/personalinfo/doupdate";
            $.ajax({
                type: "post",
                data: data,
                url: url,
                dataType: "json",
                success: function (msg) {
                    if (msg.success == true) {
                        window.location.href = "/index/personal/course/show";
                    } else {
                        alert(msg.msg);
                    }
                }
            })
        })
        $(document).ready(function () {
            $("#details_heads").uploadify({
                uploader: "/index/personal/personalinfo/addimg",
                swf: "/uploadify/uploadify.swf",
                onUploadSuccess: function (res, data, msg) {
                    var imgPsth = data;
                    $("#details_head").val(imgPsth);
                    var imgstr = "<img src='/" + imgPsth + "' width='200px'>";
                    $("#imgs_desc").append(imgstr);
                }
            });
        });
    });
</script>
