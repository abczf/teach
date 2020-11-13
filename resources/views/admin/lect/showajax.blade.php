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