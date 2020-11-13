<!DOCTYPE HTML>
<html>
@include('admin.public.top')
<body>
@include('admin.public.left')


<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 考卷管理 <span class="c-gray en">&gt;</span> 考卷管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a class="btn btn-primary radius" href="{{url('admin/exam/add')}}" ><i class="Hui-iconfont">&#xe600;</i> 添加考卷</a> </span></div>
            <div class="mt-10">
                <table class="table table-border table-bordered table-hover table-bg">
                    <thead>
                    <tr>
                        <th scope="col" colspan="6">考卷管理</th>
                    </tr>
                    <tr class="text-c">
                        <th width="25"><input type="checkbox" value="" name=""></th>
                        <th width="40">ID</th>
                        <th width="200">考试名称</th>
                        <th width="200">题库名称</th>
                        <th width="70">编号</th>
                        <th width="70">添加时间</th>
                        <th width="70">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exam as $k=>$v)
                    <tr class="text-c">
                        <td><input type="checkbox" value="" name=""></td>
                        <td>{{$v->paper_id}}</td>
                        <td>{{$v->exam_name}}</td>
                        <td>{{$v->bank_id}}</td>
                        <td>{{$v->parper_num}}</td>
                        <td>{{date('Y-m-d H:i:s'),$v->add_time}}</td>
                        <td class="f-14">
                            <a title="编辑" href="{{url('admin/exam/edit/')}}?paper_id={{$v->paper_id}}"  style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                            <a title="删除" href="javascript:;" paper_id="{{$v->paper_id}}" class="del" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                            <a href="{{url('/admin/bank/show')}}?paper_id={{$v->paper_id}}">题库</a></td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>、

        </article>
    </div>
</section>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/datatables/1.10.15/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    /*管理员-角色-添加*/
    function admin_role_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-角色-编辑*/
    function admin_role_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-角色-删除*/
    function admin_role_del(obj,id){
        layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……


            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
<script>
    $(document).ready(function () {
        $(document).on('click','.del',function () {
            var _this = $(this);
            var paper_id = $(this).attr('paper_id');

            $.ajax({
                url:"{{url('admin/exam/del')}}",
                data:{paper_id:paper_id},
                dataType:"json",
                type:"post",
                success:function (res) {
                    if(res.status == 200){
                        _this.parents('tr').remove();
                    }
                }
            });
        });
    });
</script>
