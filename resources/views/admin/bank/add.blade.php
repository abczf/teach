

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

<title>添加题库 - 题库管理 - H-ui.admin v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="cl pd-20">
    <form action="" method="post" class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>题干：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="bank_title" name="bank_title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所属课程：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
                <select class="select" name="cou_id" id="cou_id" size="1">
                    <option value="0">请选择课程课程</option>
                    @foreach($course as $k=>$v)
                    <option value="{{$v->cou_id}}">{{$v->cou_name}}</option>
                    @endforeach
                </select>
                </span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">题干分类：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
                <select class="select" name="bank_cate_id" id="bank_cate_id" size="1">
                    <option value="0">请选择提醒</option>
                    @foreach($anwsercate as $k=>$v)
                    <option value="{{$v->bank_cate_id}}">{{$v->bank_cate_name}}</option>
                    @endforeach     
                </select>
                </span> </div>
        </div>
          <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">选项:</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="bank_content" id="bank_content" cols="" rows="" class="textarea"  placeholder="选择题选项" dragonfly="true" onKeyUp="textarealength(this,100)"></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>答案：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" autocomplete="off"  placeholder="正确答案" id="bank_anwser" name="bank_anwser">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" id="sub" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
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
    $(document).on('click','#sub',function(){
        var bank_title = $("#bank_title").val();
        var cou_id = $("#cou_id").val();
        var bank_cate_id  = $("#bank_cate_id").val();
        var bank_content = $("#bank_content").val();
        var bank_anwser = $("#bank_anwser").val();
        var url = "/admin/bank/store";
        var data={};
        data.bank_title = bank_title;
        data.cou_id = cou_id;
        data.bank_cate_id = bank_cate_id;
        data.bank_content = bank_content;
        data.bank_anwser = bank_anwser;
        $.ajax({
            url:url,
            data,data,
            type:"post",
            dataType:"json",
                success: function(res){
                  if(res.success == 200){
                        // alert(res.msg);
                        var url = res.url;
                        layer.msg('添加成功',{icon:1,time:1000});
                        window.location.href = url;
                }
            }
        });
    })


// 模板自带
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