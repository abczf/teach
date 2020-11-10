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
					<tbody id='catalog_info'>
						@foreach($data as $v)
						<tr class="text-c">
							<td><input type="checkbox" value="" name=""></td>
							<td>{{$v->catalog_id}}</td>
							<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看">{{$v->catalog_name}}</u></td>
							<td>{{$v->catalog_desc}}</td>
							<td>{{date('Y-m-d H:i:s'),$v->add_time}}</td>
							<td class="f-14 td-manage">
								<a style="text-decoration:none" class="edit" href="{{url('admin/catalog/edit')}}?catalog_id={{$v->catalog_id}}" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
								<a style="text-decoration:none" class="del" catalog_id="{{$v->catalog_id}}" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{$data->appends(['infor_title'=>$infor_title])->links()}}