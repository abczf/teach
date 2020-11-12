<table class="table table-border table-bordered table-bg table-sort">
    <thead>
    <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
        <th width="70">公告ID</th>
        {{--							<th width="80">排序</th>--}}
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
            {{--							<td><input type="text" class="input-text text-c" value="1"></td>--}}
            <td>{{$v['cou_id']}}</td>
            <td>{{$v->notice_desc}}</td>
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
