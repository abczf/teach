<!--_meta 作为公共模版分离出去-->
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
    <script>DD_belatedPNG.fix('*');</script><![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>编辑课程 - 课程管理 - H-ui.admin v3.0</title>
    <meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="cl pd-20">
    <form action="javascript:;" class="form form-horizontal" id="form-admin-add">
        <input type="hidden" name="cou_id" value="{{$course->cou_id}}">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$course->cou_name}}" placeholder="" id="cou_name" name="cou_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学习状态：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="cou_status" type="radio" value="1" id="" @if($course->cou_status==1) checked @endif>
                    <label for="sex-1">未学习</label>
                </div>
                <div class="radio-box">
                    <input type="radio"  id="" value="2" name="cou_status" @if($course->cou_status==2) checked @endif>
                    <label for="sex-2">学习中</label>
                </div>
                <div class="radio-box">
                    <input type="radio"  id="" value="3" name="cou_status" @if($course->cou_status==3) checked @endif>
                    <label for="sex-2">已学完</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程讲师：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="lect_id" size="1">
                    <option value="">选择讲师</option>
                    @foreach($lect as $v)
                        <option value='{{$v->lect_id}}' @if($v->lect_id==$course->lect_id) selected @endif>{{$v->lect_name}}</option>
                    @endforeach
                </select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程分类：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="cate_id" size="1">
                    <option value="">选择分类</option>
                    @foreach($cate as $v)
                        <option value="{{$v->cate_id}}" @if($v->cate_id==$course->cate_id) selected @endif><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']) ?>{{$v->cate_name}}</option>
                    @endforeach
                </select>
				</span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程目录：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="catalog_id" size="1">
                    <option value="">选择目录</option>
                    @foreach($cata as $v)
                        <option value='{{$v->catalog_id}}' @if($v->catalog_id==$course->catalog_id) selected @endif>{{$v->catalog_name}}</option>
                    @endforeach
                </select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程封面：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="file" name="cou_imgs" id="cou_img">
                <input type="hidden" name="cou_img" value="" id="img_paths">
                <div id="imgesap">
                    <img src='/{{$course->cou_img}}' id="hide" width='200px'>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程视频：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="file" name="cou_videos" id="cou_video">
                <input type="hidden" name="cou_video" value="" id="video_paths">
                <div id="videoesap">
                    <video src='/{{$course->cou_video}}' controls="controls" id="videohide" width='200px'></video>
                </div>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" id="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<link rel="stylesheet" href="/uploadify/uploadify.css">
<script src="/uploadify/jquery.js"></script>
<script src="/uploadify/jquery.uploadify.js"></script>
<script>
    $(document).ready(function() {
        //alert(111);
        //封面
        $("#cou_img").uploadify({
            uploader: "/admin/course/img",
            swf: "/uploadify/uploadify.swf",
            onUploadSuccess: function (res, data, msg) {
                var imgPsth = data;
                $("#img_paths").val(imgPsth);
                var imgstr = "<img src='/"+imgPsth+"' width='200px'>";
                $("#hide").hide();
                $("#imgesap").append(imgstr);
            }
        });
        //视频
        $("#cou_video").uploadify({
            uploader: "/admin/course/video",
            swf: "/uploadify/uploadify.swf",
            onUploadSuccess: function (res, data, msg) {
                var videoPsth = data;
                $("#video_paths").val(videoPsth);
                var videostr = "<video src='/"+videoPsth+"' controls='controls' width='200px'></video>";
                $("#videohide").hide();
                $("#videoesap").append(videostr);
            }
        });
    })
    //修改
    $("#submit").click(function(){
        var _this = $(this);
        var cou_id=$("input[name='cou_id']").val();
        var cou_name = $("input[name='cou_name']").val();
        var cou_status = $("input[name='cou_status']:checked").val();
        var lect_id = $("select[name='lect_id']").val();
        var cate_id = $("select[name='cate_id']").val();
        var catalog_id = $("select[name='catalog_id']").val();
        var cou_img = $("input[name='cou_img']").val();
        var cou_video = $("input[name='cou_video']").val();
        if("cou_name"==""||cou_status==""||lect_id==""||cate_id==""||catalog_id==""||cou_img==""||cou_video==""){
            alert("数据不能为空");
        }
        var	url = "/admin/course/updDo/"+cou_id;
        $.ajax({
            //提交地址
            url:url,
            //提交方式
            type:"post",
            //提交数据
            data:{cou_name:cou_name,cou_status:cou_status,lect_id:lect_id,cate_id:cate_id,catalog_id:catalog_id,cou_img:cou_img,cou_video:cou_video},
            //是否为同步
            adync:true,
            //回调函数
            success:function(res){
                location.href=res;
            }
        })
    });
</script>



<!--_footer 作为公共模版分离出去-->

<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.page.js"></script>

<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            rules:{
                adminName:{
                    required:true,
                    minlength:4,
                    maxlength:16
                },
                password:{
                    required:true,
                },
                password2:{
                    required:true,
                    equalTo: "#password"
                },
                sex:{
                    required:true,
                },
                phone:{
                    required:true,
                    isPhone:true,
                },
                email:{
                    required:true,
                    email:true,
                },
                adminRole:{
                    required:true,
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit();
                var index = parent.layer.getFrameIndex(window.name);
                parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>