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
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />

<!-- 上传文件 -->
 <link rel="stylesheet" href="/uploadify/uploadify.css">
   <script src="/uploadify/jquery.uploadify.js"></script>
<!--/meta 作为公共模版分离出去-->
<title>新增图片</title>
<link href="/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
		<div class="form form-horizontal" id="form-article-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>轮播图地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="轮播图地址" id="slide_url" name="slide_url">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">权重：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="权重" id="slide_weight" name="slide_weight">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">轮播图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="file" id="brand_log" name="slide_log">
				<div class="showimg"></div>
				<input type="hidden" name='img_path' id='log_path'>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="sutton" id="sub"><i class="Hui-iconfont">&#xe632;</i> 保存并提交</button>
				
			</div>
		</div>
	</div>
</div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script> 
 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.page.js"></script> 

<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript">
$(function(){
	$(document).on('click',"#sub",function(){
		var slide_url = $("#slide_url").val();
		var slide_weight = $("#slide_weight").val();
		 var url = "/admin/slide/store";
            var data={};
            data.slide_url = slide_url;
            data.slide_weight =slide_weight;
            $.ajax({
                url:url,
                data:data,
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
	
});


</script>
</body>
</html>