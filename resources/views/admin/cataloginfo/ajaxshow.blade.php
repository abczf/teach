@foreach($info as $v)
    <tr class="text-c">
        <td><input type="checkbox" value="" name=""></td>
        <td>{{$v->info_id}}</td>
        <td class="text-l"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']) ?>{{$v->info_name}}</td>
        <td>{{$v->catalog_name}}</td>
        <td>{{$v->pid}}</td>
        <td>{{$v->info_desc}}</td>
        <td>{{date('Y-m-d H:i:s'),$v->add_time}}</td>
        <td class="f-14 td-manage">
            <a style="text-decoration:none" class="ml-5" href="{{url('admin/cataloginfo/edit')}}?info_id={{$v->info_id}}" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
            <a style="text-decoration:none" class="del" info_id="{{$v->info_id}}" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
    </tr>
@endforeach