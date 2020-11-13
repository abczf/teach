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
						 <td>{{$v['bank_content']}}</td>
						<!-- <td><a href="javascript:;" onclick="showOptions()">查看选项</a></td> -->
						<td>{{$v['bank_anwser']}}</td>
						<td>{{date('Y-m-d H:i:s',$v['add_time'])}}</td>
						<td class="td-status"><span class="label label-success radius">已上线</span></td>
						<td class="td-manage"><a style="text-decoration:none" onClick="admin_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
					 @endforeach
					 <tr><td colspan=17 align="center">{{$bank->appends(['bank_title'=>$bank_title])->links()}}</td></tr>




