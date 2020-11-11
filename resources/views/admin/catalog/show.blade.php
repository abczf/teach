<!--_header 作为公共模版分离出去-->
@include('admin.public.top')
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
@include('admin.public.left')
<!--/_menu 作为公共模版分离出去-->
<!-- 分页样式 -->
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

/*    ul.pagination li.active {
        background-color: #4CAF50;
        color: white;
        border: 1px solid #4CAF50;
    }*/
    ul.pagination li a:hover:not(.active) {background-color: #ddd;}
</style>
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		课程目录管理
		<span class="c-gray en">&gt;</span>
		课程目录列表
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
				<input type="text" name="" id="infor_title" placeholder="请输入课程目录名称" style="width:250px" class="input-text">
				<button name="" id="" class="btn btn-success ss" ><i class="Hui-iconfont">&#xe665;</i> 搜目录</button>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
				<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
					<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
				</a>
				<a class="btn btn-primary radius" data-title="添加课程目录"  href="{{url('admin/catalog/add')}}">
					<i class="Hui-iconfont">&#xe600;</i> 添加课程目录
				</a>
				</span>
				<span class="r">共有数据：<strong>{{$count}}</strong> 条</span>
			</div>
			<div class="mt-20" id='catalog_info'>
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
						<tr class="text-c">
							<th width="25"><input type="checkbox" name="" value=""></th>
							<th width="80">ID</th>
							<th>目录名称</th>
							<th width="80">描述</th>
							<th width="80">添加时间</th>
							<th width="120">操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $v)
						<tr class="text-c">
							<td><input type="checkbox" value="" name=""></td>
							<td>{{$v->catalog_id}}</td>
							<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看">{{$v->catalog_name}}</u></td>
							<td>{{$v->catalog_desc}}</td>
							<td>{{date('Y-m-d H:i:s'),$v->add_time}}</td>
							<td class="f-14 td-manage">
								<a style="text-decoration:none" class="edit" href="{{url('admin/catalog/edit')}}?catalog_id={{$v->catalog_id}}" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
								<a style="text-decoration:none" class="del" catalog_id="{{$v->catalog_id}}" onclick="admin_del(this,catalog_id={{$v->catalog_id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{$data->appends(['infor_title'=>$infor_title])->links()}}
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
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		{"orderable":false,"aTargets":[0,8]}// 不参与排序的列
	]
});

/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		var catalog_id = $(this).attr('catalog_id');

		// if(window.confirm("是否删除")){
		$.ajax({
			url:"{{url('admin/catalog/del')}}",
			dataType:'json',
			data:{catalog_id:id},
			type:"post",
			success:function(res){
				if(res.status == 200){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
					// alert(res.message);
					//页面刷新
					// history.go(0);
					// layer.msg('已删除!',{icon:1,time:1000});
					window.location.href="{{'show'}}";
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
<script>
	$(document).ready(function(){
		// 搜索
	    $(document).on("click",".ss",function(){
		    var infor_title = $("#infor_title").val();
		        // alert(infor_title);
		    var url = "/admin/catalog/show";
		    var data={};
		    data.infor_title = infor_title;
		    $.ajax({
		        url:url,
		        data:data,
		        type:"get",
		        success: function(res){
		            $('#catalog_info').html(res)
		        }
		    });
		});

	    // 分页
	    $(document).on('click','.page-item a',function(){
            var url = $(this).attr('href');
            //alert(url);
            $.get(url,function(res){
            	$('#catalog_info').html(res);
        	});
         	return false;
    	})
    });
</script>