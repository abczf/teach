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

    ul.pagination li.page-item{display: inline;}

    ul.pagination li.page-item{
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .1s;
        border: 1px solid #ddd;
    }

    ul.pagination li.active span.page-link{
        background-color: #4CAF50;
        color: black;
        border: 1px solid #4CAF50;
    }
    ul.pagination li.page-item:hover:not(.active) {background-color: #ddd;}
</style>
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		题库管理
		<span class="c-gray en">&gt;</span>
		题库列表
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
				<input type="text" name="" id="bank_title" placeholder="题干名称" style="width:250px" class="input-text">
				<button name="" id="" class="btn btn-success ss" ><i class="Hui-iconfont">&#xe665;</i> 搜题库</button>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
				<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
				<a class="btn btn-primary radius" data-title="添加题库" _href="article-add.html" onclick="article_add('添加题库','{{url('admin/bank/add')}}')" href="{{url('admin/bank/add')}}"><i class="Hui-iconfont">&#xe600;</i> 添加题库</a>
				<span class="btn btn-primary radius" id="but" data-title="存入考卷" _href="article-add.html"><i class="Hui-iconfont">&#xe600;</i> 存入考卷</span>

				</span>
				<span class="r">共有数据：<strong>54</strong> 条</span>
			</div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th scope="col" colspan="9">题库列表</th>
					</tr>
					<tr class="text-c">
						<th width="25">
							<input type="checkbox" name="" value="">
						</th>
						<th width="40">ID</th>
						<th width="150">题干</th>
						<th width="50">所属课程</th>
						<th width="50">所属课程</th>
						<th width="150">选项</th>
						<th width="50">答案</th>
						<th width="130">加入时间</th>
						<th width="100">是否已上传</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody id="active_info">
					 @foreach($bank as $k=>$v)
					<tr class="text-c">
						<td>
                            @if(in_array($v['bank_id'],$bank_ids))
                            <input type="checkbox" value="{{$v['bank_id']}}" class="box" name=""  checked>
                            @else
							<input type="checkbox" value="{{$v['bank_id']}}" class="box" name="" >
                            @endif
						</td>
						<td>{{$v['bank_id']}}</td>
						<td>{{$v['bank_title']}}</td>
						<td>{{$v['cou_name']}}</td>
						<th width="50">{{$v['bank_cate_name']}}</th>
						 <!-- <td>{{$v['bank_content']}}</td> -->
						<td><a href="javascript:;" onclick="showContent('{{$v->bank_content}} ')">查看选项</a></td>
						<td>{{$v['bank_anwser']}}</td>
						<td>{{date('Y-m-d H:i:s',$v['add_time'])}}</td>
						<td class="td-status">
							<span class="label label-success radius">已上线</span>
						</td>
						<td class="td-manage">
							<a style="text-decoration:none" onClick="admin_stop(this,'10001')" href="javascript:;" title="停用">
								<i class="Hui-iconfont">&#xe631;</i>
							</a>
							<a title="编辑" href="{{url('admin/bank/edit/'.$v->bank_id)}}" class="ml-5" style="text-decoration:none">
								<i class="Hui-iconfont">&#xe6df;</i></a>
								<a title="删除"  class="ml-5 del" style="text-decoration:none" bank_id="{{$v->bank_id}}">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
							</td>
					</tr>
					 @endforeach
					 <tr><td colspan=17 align="center">{{$bank->appends(['bank_title'=>$bank_title])->links()}}</td></tr>
				</tbody>
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
$(function(){
	 // 搜索
    $(document).on("click",".ss",function(){
        var bank_title = $("#bank_title").val();
        // alert(bank_title);
         var url = "/admin/bank/show";
         var data={};
         data.bank_title = bank_title;
          $.ajax({
            url:url,
            data:data,
            type:"get",
            success: function(res){
                $('#active_info').html(res);
                // alert(123);
        }
    });
          // 查看资讯内容
});

    //删除
	$(document).on('click','.del',function(){
		 var bank_id = $(this).attr("bank_id");
		 // alert(bank_id);
		 var data = {bank_id:bank_id};
         var url = "{{url('/admin/bank/Fdel')}}";
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
	 //无刷新分页
        $(document).on('click','.pagination a',function(){
            var url = $(this).attr('href');
            //alert(url);
            $.get(url,function(res){
            $('tbody').html(res);
        });
         return false;
    })
})


//查看选项方法
function showContent(bank_content){
	//按照~进行
	var arr = bank_content.split('~');
	// 循环
	var content = '';
	for(var i = 0;i < arr.length;i++){
		content += arr[i] + '</br>';
	}
    layer.alert(content);
 }



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

<!-- /*<style>
    page-item {
        border-radius: 5px;
    }
    ul.pagination li a:hover:not(.active) {background-color: #ddd;}
</style>*/ -->
<script>
    $(function(){
        $('#but').bind('click',function(){
            var exam_id=$("#exam_id").val();
            // alert(exam_id);
            var str='';
            $(".box").each(function(){
                if($(this).prop("checked")==true){
                    str=str+$(this).val()+",";
                }
            })
            var bank_id=str.substr(0,str.length-1);
               // alert(bank_id);
            if(bank_id=='')
                return false;

            $.ajax({
                url:"/admin/bank/exam_add",
                type:'post',
                dataType:'json',
                data:{'exam_id':exam_id,'bank_id':bank_id},
                success:function(res){
                    if(res.error==200){
                        alert(res.msg);
                        location.href="/admin/exam/show";
                    }else{
                        alert(res.msg);
                    }

                }
            })
            return false;
        });
    })
</script>
