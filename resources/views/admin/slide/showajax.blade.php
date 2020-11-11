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