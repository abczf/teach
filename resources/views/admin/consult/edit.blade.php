@include('admin.public.top')

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span>
        资讯管理
        <span class="c-gray en">&gt;</span>
        资讯修改
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <article class="page-container">
    <form class="form form-horizontal" action='javascript:;'>
        <input type="hidden" id="infor_id" value="{{$consult->infor_id}}">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资讯标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="" id="infor_title" name="infor_title" value="{{$consult->infor_title}}">
            </div>
        </div>

     <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否热门：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="is_hot" type="radio" {{$consult->is_hot==1?'checked':''}} id="is_hot" checked value="1">是
                   
                </div>
                <div class="radio-box">
                    <input type="radio" id="is_hot" {{$consult->is_hot==2?'checked':''}} name="is_hot" value="2">否
                   
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="infor_content" id="infor_content" cols="30" rows="10">{{$consult->infor_content}}</textarea>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button class="btn btn-primary radius" type="sutton" id="sub"><i class="Hui-iconfont">&#xe632;</i> 保存并修改</button>
                <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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

<script type="text/javascript">
    
   $(function(){
       $(document).on('click','#sub',function(){
            var infor_title = $("#infor_title").val();
            var is_hot = $("#is_hot").val();
            var infor_content = $("#infor_content").val();
            if(infor_title==''){
                alert('资讯标题必填')
                return false;
            }
            var url = "/admin/consult/update/{{$consult->infor_id}}";
            var data={};
            data.infor_id={{$consult->infor_id}}
            data.infor_title = infor_title;
            data.is_hot =is_hot;
            data.infor_content=infor_content;
            $.ajax({
                url:url,
                data:data,
                type:"post",
                dataType:"json",
                success: function(res){
                  if(res.success == 200){
                        // alert(res.msg);
                        layer.msg('修改成功',{icon:1,time:1000});
                        var url = res.url;
                        window.location.href = url;
                  }
                }
            });

       })
})

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>