<!--_meta 作为公共模版分离出去-->
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
	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span> 产品管理
		<span class="c-gray en">&gt;</span> 品牌管理
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
			<i class="Hui-iconfont">&#xe68f;</i>
		</a>
	</nav>

	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
				<form class="Huiform" method="post" action="" target="_self">
					<input type="text" placeholder="分类名称" value="" class="input-text" style="width:120px">
					<span class="btn-upload form-group">
					<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
					<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
					<input type="file" multiple name="file-2" class="input-file">
					</span> <span class="select-box" style="width:150px">
					<select class="select" name="brandclass" size="1">
						<option value="1" selected>国内品牌</option>
						<option value="0">国外品牌</option>
					</select>
					</span><button type="button" class="btn btn-success" id="" name="" onClick="picture_colume_add(this);"><i class="Hui-iconfont">&#xe600;</i> 添加</button>
				</form>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
						<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
					</a>
					<a class="btn btn-primary radius" data-title="添加课程公告"  href="{{url('admin/notice/add')}}">
					<i class="Hui-iconfont">&#xe600;</i> 添加课程公告
				</a>
				</span>

				<span class="r">共有数据：<strong>54</strong> 条</span>

			</div>

            <div class="sou">
                相关内容 : <input placeholder="请输入关键字" name="name" id="name">
                <button class="btn sos btn-danger" id="submit">点击搜索一下</button>
            </div>

			<div class="mt-10">
				<table class="table table-border table-bordered table-bg table-sort">
					<thead>
						<tr class="text-c">
							<th width="25"><input type="checkbox" name="" value=""></th>
							<th width="70">公告ID</th>
							<th width="80">排序</th>
							<th width="200">课程ID</th>
                            <th width="400">公告内容</th>
                            <th width="120">添加时间</th>
							<th width="100">操作</th>
						</tr>
					</thead>
					<tbody>
                    @foreach($data as $k=>$v)
						<tr class="text-c">
							<td><input name="" type="checkbox" value=""></td>
							<td>{{$v->notice_id}}</td>
            				<td><input type="text" class="input-text text-c" value="1"></td>
							<td>{{$v['cou_id']}}</td>
							<!-- <td>{{$v->notice_desc}}</td> -->
                            <td><a href="javascript:;" onclick="showContent('{{$v->notice_desc}} ')">查看资讯内容</a></td>
							<td>{{date("Y-m-d H:i:s",$v['add_time'])}}</td>
							<td class="f-14 product-brand-manage">
                                <a style="text-decoration:none" href="{{url('/admin/notice/upd')}}?id={{$v['notice_id']}}" title="编辑">
                                    <i class="upd Hui-iconfont">&#xe6df; 编辑</i>
                                </a>
                                <a style="text-decoration:none" href="javascript:;" title="删除">
                                    <i class="del Hui-iconfont" id="{{$v->notice_id}}">&#xe6e2; 删除</i>
                                </a>
                            </td>
						</tr>
                    @endforeach
					</tbody>
                    <tr>
                        <td align="center" colspan="6">{{$data->appends([$name => 'name'])->links()}}</td>
                    </tr>
				</table>
			</div>
		</article>
	</div>
</section>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
{{--<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.js"></script>--}}
{{--<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.page.js"></script>--}}
<!--/_footer /作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/datatables/1.10.15/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script src="/jquery.js"></script>
<script type="text/javascript">

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
<script>
    $(document).ready(function(){

        // 软删除  + 弹框提示 + 页面刷新
        $(".del").click(function(){
            var id   = $(this).attr("id");
            var data = {notice_id : id};
            var url  = "{{url('/admin/notice/del')}}";
            if (window.confirm("是否删除"))
            {
                $.ajax({
                    url  : url,
                    data : data,
                    type : "post",
                    dataType : "json",
                    success:function(res){
                        if(res.code == 200){
                            $(id).parents("tr").remove();
                            layer.msg('已删除!',{code:200,time:1000});
                            window.location.reload();
                        }
                    }
                });
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

    //搜索
    $(document).on('click','#submit',function(){
        var name=$("input[name='name']").val();
        $.ajax({
            url:"{{url('/admin/notice/show')}}",
            type:'get',
            data:{name:name},
            success:function(res){
                $("table").html(res);
            }
        })
        return;
    })
//查看资讯内容方法
function showContent(notice_desc){
    
    layer.alert(notice_desc);
 }
</script>



