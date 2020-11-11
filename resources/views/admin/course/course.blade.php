<!--_header 作为公共模版分离出去-->
@include('admin.public.top')
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
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
		color: black;
		border: 1px solid #4CAF50;
	}
	ul.pagination li a:hover:not(.active) {background-color: #ddd;}
</style>
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		课程管理
		<span class="c-gray en">&gt;</span>
		课程列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
				<input type="text" class="input-text" style="width:250px" placeholder="输入课程名称" id="" name="cou_name">
				<button type="submit" class="btn btn-success" id="submit" name=""><i class="Hui-iconfont">&#xe665;</i> 搜课程</button>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l"> 
					<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
						<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
					</a> 
					<a href="{{url('admin/course/add')}}"  class="btn btn-primary radius">
						<i class="Hui-iconfont">&#xe600;</i> 添加课程
					</a>
				</span>
			</div>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th scope="col" colspan="9">课程列表</th>
					</tr>
					<tr class="text-c">
						<th width="25"><input type="checkbox" name="" value=""></th>
						<th width="40">ID</th>
						<th>课程名称</th>
						<th>讲师名称</th>
						<th>分类名称</th>
						<th>目录名称</th>
						<th>学习状态</th>
						<th>课程封面</th>
						<th>课程视频</th>
						<th width="130">添加时间</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
				@foreach($course as $v)
					<tr class="text-c">
						<td><input type="checkbox" value="1" name=""></td>
						<td>{{$v->cou_id}}</td>
						<td>{{$v->cou_name}}</td>
						<td>{{$v->lect_name}}</td>
						<td>{{$v->cate_name}}</td>
						<td>{{$v->catalog_name}}</td>
						<td>
							@if($v->cou_status==1)
								未学习
							@elseif($v->cou_status==2)
								学习中
							@elseif($v->cou_status==3)
								已学完
							@endif
						</td>
						<td><img src="/{{$v->cou_img}}" width="200px"></td>
						<td><video src="/{{$v->cou_video}}" controls="controls" width="200px"></video></td>
						<td>{{date("Y-m-d H:i:s",$v->add_time)}}</td>
						<td class="td-manage">
							<a style="text-decoration:none" class="ml-5" id="upd" href="{{url('/admin/course/upd/'.$v->cou_id)}}" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" href="javascript:;" cou_id="{{$v->cou_id}}" onclick="cou_del(this,cou_id={{$v->cou_id}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
				<td colspan="11" align="center">{{$course->appends(['cou_name'=>$cou_name])->links()}}</td>
			</table>
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
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
//删除
function cou_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		var cou_id = $(this).attr('cou_id');
		var url="/admin/course/del/"+id;
		$.ajax({
			url:url,
			data: {cou_id: id},
			type: "post",
			adync:true,
			success: function (res) {
					$(obj).parents("tr").remove();
					layer.msg('已删除!', {icon: 1, time: 1000});
					location.href=res;
			}
		})
	});
}
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
	var cou_name=$("input[name='cou_name']").val();
	$.ajax({
		url:"{{url('/admin/course/show')}}",
		type:'get',
		data:{cou_name:cou_name},
		success:function(res){
			$("table").html(res);
		}
	})
	return;
})
/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>