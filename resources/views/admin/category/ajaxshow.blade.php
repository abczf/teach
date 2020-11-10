@foreach($info as $v)
    <tr class="text-c va-m">
        <td><input name="" type="checkbox" value=""></td>
        <td>{{$v->cate_id}}</td>
        <td class="text-l"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']) ?>{{$v->cate_name}}</td>
        <td>{{$v->pid}}</td>
        <td>{{date('Y-m-d H:i:s'),$v->add_time}}</td>
        <td class="td-manage">
            <a style="text-decoration:none" class="ml-5" href="{{url('admin/category/edit')}}?cate_id={{$v->cate_id}}" title="编辑">
                <i class="Hui-iconfont">&#xe6df;</i></a>
            <a style="text-decoration:none" class="ml-5" cate_id="{{$v->cate_id}}"  onclick="cate_del(this,cate_id={{$v->cate_id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
        </td>
    </tr>
@endforeach