@include('admin.public.top')

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span>
        精彩活动管理
        <span class="c-gray en">&gt;</span>
        精彩活动添加
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <article class="page-container">
    <form class="form form-horizontal" action='javascript:;'>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>精彩活动标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="" id="act_title" name="act_title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>活动开始时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="" id="act_title" name="act_title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>活动结束时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="date" class="input-text" placeholder="" id="act_title" name="act_title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="act_content" id="act_content" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button class="btn btn-primary radius" type="sutton" id="sub"><i class="Hui-iconfont">&#xe632;</i> 保存并提交</button>
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
            var act_title = $("#act_title").val();
            var is_hot = $("#is_hot").val();
            var act_content = $("#act_content").val();
            if(act_title==''){
                alert('精彩活动标题必填')
                return false;
            }
            var url = "/admin/active/store";
            var data={};
            data.act_title = act_title;
            data.is_hot =is_hot;
            data.act_content=act_content;
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
})

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>