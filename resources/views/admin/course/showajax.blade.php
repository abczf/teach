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