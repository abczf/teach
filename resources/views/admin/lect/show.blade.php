<!--_header 作为公共模版分离出去-->
@include('admin.public.top')
        <!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
@include('admin.public.left')
        <!--/_menu 作为公共模版分离出去-->
<style>
    ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.pagination li {display: inline;}

    ul.pagination li {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
    }

    ul.pagination li.active {
        background-color: #4CAF50;
        color: black;
        border: 1px solid #4CAF50;
    }
    ul.pagination li a:hover:not(.active) {background-color: #ddd;}
</style>
<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span>
        讲师管理
        <span class="c-gray en">&gt;</span>
        讲师列表
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <div class="text-c">
                <input type="text" name="lect_name" id="" placeholder=" 讲师名称" style="width:250px" class="input-text">
                <button name="submit" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜讲师</button>
            </div>
            <div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
				<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
				<a class="btn btn-primary radius" data-title="添加讲师" _href="article-add.html"  href="{{url('admin/lect/add')}}"><i class="Hui-iconfont">&#xe600;</i> 添加讲师</a>
				</span>
            </div>
            <div class="mt-20">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="25"><input type="checkbox" name="" value=""></th>
                        <th width="80">ID</th>
                        <th width="80">讲师名字</th>
                        <th width="80">讲师头像</th>
                        <th >个人简介</th>
                        <th width="80">授课风格</th>
                        <th width="120">添加时间</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lect as $v)
                    <tr class="text-c">
                        <td><input type="checkbox" value="" name=""></td>
                        <td>{{$v->lect_id}}</td>
                        <td >{{$v->lect_name}}</td>
                        <td><img src="/{{$v->lect_img}}" width="200px"></td>
                        <td >{{$v->lect_resume}}</td>
                        <td>{{$v->lect_style}}</td>
                        <td>{{date("Y-m-d H:i:s",$v->add_time)}}</td>
                        <td class="f-14 td-manage">
                            <a style="text-decoration:none" class="ml-5"  id="upd" href="{{url('/admin/lect/upd/'.$v->lect_id)}}" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                            <a style="text-decoration:none" class="ml-5"  id="del" href="javascript:;" lect_id="{{$v->lect_id}}" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tr>
                        <td colspan="8" align="center">{{$lect->appends(['lect_name'=>$lect_name])->links()}}</td>
                    </tr>
                </table>
            </div>
        </article>
    </div>
</section>
<script src="/jquery.js"></script>
<script>
    //删除
    $(function(){
        $("#del").click(function(){
            var _this = $(this);
            var lect_id = _this.attr("lect_id");
            if(window.confirm("确定删除吗？")){
                var url = "/admin/lect/del/"+lect_id;
                location.href=url;
            }
        });
    });
    //ajax 分页
    $(document).on("click",'.page-item a',function(){
        var url = $(this).attr('href');
        $.get(url,function(res){
            $('table').html(res);
        });
        return false;
    });
    //ajax搜索
    $(document).on('click','#submit',function(){
        var lect_name=$("input[name='lect_name']").val();
        $.ajax({
            url:"{{url('/admin/lect/show')}}",
            type:'get',
            data:{lect_name:lect_name},
            success:function(res){
                $("table").html(res);
            }
        })
        return;
    })
</script>

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
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
        ]
    });

    /*资讯-添加*/
    function article_add(title,url,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*资讯-编辑*/
    function article_edit(title,url,id,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*资讯-删除*/
    function article_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*资讯-审核*/
    function article_shenhe(obj,id){
        layer.confirm('审核文章？', {
                    btn: ['通过','不通过','取消'],
                    shade: false,
                    closeBtn: 0
                },
                function(){
                    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                    $(obj).remove();
                    layer.msg('已发布', {icon:6,time:1000});
                },
                function(){
                    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
                    $(obj).remove();
                    layer.msg('未通过', {icon:5,time:1000});
                });
    }
    /*资讯-下架*/
    function article_stop(obj,id){
        layer.confirm('确认要下架吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
            $(obj).remove();
            layer.msg('已下架!',{icon: 5,time:1000});
        });
    }

    /*资讯-发布*/
    function article_start(obj,id){
        layer.confirm('确认要发布吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            $(obj).remove();
            layer.msg('已发布!',{icon: 6,time:1000});
        });
    }
    /*资讯-申请上线*/
    function article_shenqing(obj,id){
        $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
        $(obj).parents("tr").find(".td-manage").html("");
        layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
    }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
