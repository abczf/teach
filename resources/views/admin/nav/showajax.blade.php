<table class="table table-border table-bordered table-bg table-hover table-sort">
    <thead>
    <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
        <th width="80">导航栏ID</th>
        <th width="80">导航栏标题</th>
        <th width="80">导航栏url</th>
        <th width="120">更新时间</th>
        <th width="120">操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
        <tr class="text-c">
            <td><input type="checkbox" value="" name=""></td>
            <td>{{$v['nav_id']}}</td>
            <td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看">{{$v['nav_name']}}</u></td>
            <td>{{$v['nav_url']}}</td>
            <td>{{date("Y-m-d H:i:s",$v['add_time'])}}</td>
            <td class="f-14 td-manage">
                <a style="text-decoration:none" href="{{url('/admin/nav/update')}}?nav_id={{$v['nav_id']}}" title="编辑"><i class="upd Hui-iconfont">&#xe6df; 编辑</i></a>
                <a style="text-decoration:none" href="javascript:;" title="删除"><i class="dels Hui-iconfont" id="{{$v['nav_id']}}">&#xe6e2; 删除</i></a>
            </td>
        </tr>

    @endforeach
    </tbody>
    <tr>
        <td align="center" colspan="6">{{$data->appends(['name'=>$name])->links()}}</td>
    </tr>
</table>
