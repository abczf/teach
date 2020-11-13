<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
<link href="/admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script><![endif]-->
<title>后台登录</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
    <style>
        #tck{
            margin-top: 615px;
            margin-left: 757px;
            float:left;
        }
        #spans{
            padding-top: 17.5px;
        }
    </style>

</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">

	<div id="loginform" class="loginBox">
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
				<div class="formControls col-xs-8">
					<input id="logoname" name="admin_name" type="text" placeholder="账户" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
				<div class="formControls col-xs-8">
					<input id="logopass" name="password" type="password" placeholder="密码" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<label for="online">
						<input type="checkbox" name="online" id="online" value="">
						使我保持登录状态</label>
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3 ddd">
					<input  type="submit"  class="btn btn-success radius size-L deng" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
					<input type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
				</div>
			</div>
	</div>
    <div style="display: none;" id="zzl">
    <div style="width: 200px;height: 55px;background-color: #ffffff;" id="tck">
        <p id="spans" style="padding-left: 60px;"></p>
    </div>
    </div>
</div>

</body>
</html>
<script src="/jquery.js"></script>
<script>
    $(document).ready(function(){
        $(".deng").click(function(){
            var name = $("input[name = 'admin_name']").val();
            var pwd  = $("input[name = 'password']").val();
            if(name == '' || pwd == ''){
                alert("用户名密码不能为空!");
                return false;
            }
            var data = {name:name,pwd:pwd};
            var url = "{{url('admin/login/Do')}}";
            $.ajax({
                url  : url,
                type : "post",
                data : data,
                dataType : "json",
                success:function(res){
                    if(res.status == 200){
                        $("#spans").html(res.msg)
                        aa("/admin")
                    }else{
                        $("#spans").html(res.msg)
                        aa("/admin/login")
                    }
                }
            })
        });

        function aa(va) {
            s=0;
            var aa=setInterval(function () {
                if(s==200){
                    $("#zzl").hide()
                    s=0
                    location.href=va
                    clearInterval(aa)
                }else{
                    $("#zzl").show()
                    s=s+10
                    $("#tx").remove()
                    // $("#spans").remove()
                    var str='<div style="width:'+ s+'px;height: 3px;background-color: red;" id="tx"></div>'
                    $("#tck").prepend(str)

                }
            },50)
        }

    });
</script>
