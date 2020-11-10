<!--_header 作为公共模版分离出去-->
@include('admin.public.top')
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
@include('admin.public.left')
<!--/_menu 作为公共模版分离出去-->
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		题库分类管理
		<span class="c-gray en">&gt;</span>
		题库分类列表
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
				<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
				<a class="btn btn-primary radius" data-title="添加题库分类" _href="article-add.html" onclick="article_add('添加题库分类','{{url('admin/anwsercate/add')}}')" href="{{url('admin/anwsercate/add')}}"><i class="Hui-iconfont">&#xe600;</i> 添加题库分类</a>
				</span>
				<span class="r">共有数据：<strong>54</strong> 条</span>
			</div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
						<tr class="text-c">
							<th width="25"><input type="checkbox" name="" value=""></th>
							<th width="80">ID</th>
							<th width="80">分类名称</th>
							<th width="80">添加时间</th>
							<th width="60">发布状态</th>
							<th width="120">操作</th>
						</tr>
					</thead>
					
					<tbody class="active_info">
						@foreach($anwsercate as $k=>$v)
						<tr class="text-c">
							<td><input type="checkbox" value="" name=""></td>
							<td>{{$v['bank_cate_id']}}</td>
							<td class="text-l">{{$v['bank_cate_name']}}</td>
							<td>{{date('Y-m-d H:i:s',$v['add_time'])}}</td>
							<td class="td-status"><span class="label label-success radius">已发布</span></td>
							<td class="f-14 td-manage">
								<a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架">
									<i class="Hui-iconfont">&#xe6de;</i>
								</a>
								<a href="{{url('admin/anwsercate/edit/'.$v->bank_cate_id)}}" style="text-decoration:none" class="ml-5"  title="编辑">
									<i class="Hui-iconfont">&#xe6df;</i>
								</a>
								<a style="text-decoration:none" class="ml-5 del" bank_cate_id = "{{$v->bank_cate_id}}" title="删除">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
							</td>
						</tr>
						@endforeach
					</table>
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

<script type="text/javascript">
	$(document).on('click','.del',function(){
		 var bank_cate_id = $(this).attr("bank_cate_id");
		 // alert(bank_cate_id);
		 var data = {bank_cate_id:bank_cate_id};
         var url = "{{url('/admin/anwsercate/Fdel')}}";
		 if(layer.confirm("确定要删除吗")){
                $.ajax({
                    type:"post",
                    data:data,
                    url:url,
                    dateType:"json",
                    success:function(res){
                        if(res.success==true){
                            //页面刷新
                            // history.go(0);
                            layer.msg('已删除!',{icon:1,time:1000});
                            window.location.reload();
                        }
                    }
                })
            }
	})
/*题库分类-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*题库分类-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}


/*题库分类-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*题库分类-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*题库分类-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

<!-- /*<style>
    page-item {
        border-radius: 5px;
    }
    ul.pagination li a:hover:not(.active) {background-color: #ddd;}
</style>*/ -->
