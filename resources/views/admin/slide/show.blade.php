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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 轮播图管理 <span class="c-gray en">&gt;</span> 轮播图列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
						<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
					</a> 
					<a class="btn btn-primary radius" href="{{url('admin/slide/add')}}">
						<i class="Hui-iconfont">&#xe600;</i> 添加轮播图
					</a>
				</span>
			</div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
						<tr class="text-c">
							<th width="40"><input name="" type="checkbox" value=""></th>
							<th width="80">ID</th>
							<th >地址</th>
							<th width="300">轮播图</th>
							<th width="150">权重</th>
							<th width="150">添加时间</th>
							<th width="100">操作</th>
						</tr>
					</thead>
					<tbody>
					@foreach($slide as $v)
						<tr class="text-c">
							<td><input name="" type="checkbox" value=""></td>
							<td>{{$v->slide_id}}</td>
							<td>{{$v->slide_url}}</td>
							<td><img src="/{{$v->slide_img}}" width="200px"></td>
							<td>{{$v->slide_weight}}</td>
							<td>{{date("Y-m-d H:i:s",$v->add_time)}}</td>
							<td class="td-manage">
								<a style="text-decoration:none" class="ml-5" id="upd" href="{{url('/admin/slide/upd/'.$v->slide_id)}}" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
								<a style="text-decoration:none" class="ml-5" id="del" slide_id="{{$v->slide_id}}" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
						</tr>
					@endforeach
					</tbody>
					<tr>
						<td colspan="7" align="center">{{$slide->links()}}</td>
					</tr>
				</table>
			</div>
		</article>
	</div>
</section>

<script src="/jquery.js"></script>
<script>
	$(function(){
		//删除
		$("#del").click(function(){
			var _this = $(this);
			var slide_id = _this.attr("slide_id");
			if(window.confirm("确定删除吗？")){
				var url = "/admin/slide/del/"+slide_id;
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
	  {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
	]
});
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-查看*/
function picture_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-审核*/
function picture_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过'], 
		shade: false
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});	
}
/*图片-下架*/
function picture_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*图片-发布*/
function picture_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*图片-申请上线*/
function picture_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}
/*图片-编辑*/
function picture_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>