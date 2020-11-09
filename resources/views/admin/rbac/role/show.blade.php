
<!DOCTYPE HTML>
<html>
@include('admin.public.top')
<body>
@include('admin.public.left')
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
        color: white;
        border: 1px solid #4CAF50;
    }
    ul.pagination li a:hover:not(.active) {background-color: #ddd;}
</style>

<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="{{url('admin/role/add')}}" onclick="admin_role_add('添加角色','{{url('')}}','800')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
            <div class="mt-10">
                <table class="table table-border table-bordered table-hover table-bg">
                    <thead>
                    <tr>
                        <th scope="col" colspan="6">角色管理</th>
                    </tr>
                    <tr class="text-c">
                        <th width="25"><input type="checkbox" value="" name=""></th>
                        <th width="40">ID</th>
                        <th width="200">角色名</th>
                        <th width="70">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $k=>$v)
                    <tr class="text-c">
                        <td><input type="checkbox" value="" name=""></td>
                        <td>{{$v->role_id}}</td>
                        <td>{{$v->role_name}}</td>
                        <td class="f-14"><a title="编辑" href="{{url('admin/role/upd')}}?role_id={{$v->role_id}}" onclick="admin_role_edit('角色编辑','admin-role-add.html','1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                            <a title="删除" href="javascript:;" onclick="admin_role_del(this,role_id={{$v->role_id}})" class="ml-5" style="text-decoration:none" role_id="{{$v->role_id}}"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
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
    /*管理员-删除*/
    function admin_role_del(obj,id){
        layer.confirm('确认要删除    吗？',function(index){
            var data = {};
            data.role_id = id;
            var url = "{{url('/admin/role/del')}}";
            // if(window.confirm("是否删除")){
            $.ajax({
                type:"post",
                data:data,
                url:url,
                dateType:"json",
                success:function(res){
                    if(res.success==true){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                        // alert(res.message);
                        //页面刷新
                        // history.go(0);
                        // layer.msg('已删除!',{icon:1,time:1000});
                        window.location.reload();
                    }
                }
            })

            //此处请求后台程序，下方是成功后的前台处理……
            // })

        });
    }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
<style>
    page-item {
        border-radius: 5px;
    }
    /*ul.pagination li a:hover:not(.active) {background-color: #ddd;}*/
</style>

