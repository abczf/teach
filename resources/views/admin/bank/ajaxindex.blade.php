 					@foreach($bank as $k=>$v)
					<tr class="text-c">
						<td>
							<input type="checkbox" value="1" name="">
						</td>
						<td>{{$v['bank_id']}}</td>
						<td>{{$v['bank_title']}}</td>
						<td>{{$v['cou_name']}}</td>
						<th width="50">{{$v['bank_cate_name']}}</th>
						 <!-- <td>{{$v['bank_content']}}</td> -->
						 <td><a href="javascript:;" onclick="showContent('{{$v->bank_content}}')">查看选项</a></td>						<td>{{$v['bank_anwser']}}</td>
						<td>{{date('Y-m-d H:i:s',$v['add_time'])}}</td>
						<td class="td-status"><span class="label label-success radius">已上线</span></td>
						<td class="td-manage">
							<a style="text-decoration:none" onClick="admin_stop(this,'10001')" href="javascript:;" title="停用">
								<i class="Hui-iconfont">&#xe631;</i>
							</a> 
							<a title="编辑" href="{{url('admin/bank/edit/'.$v->bank_id)}}" class="ml-5" style="text-decoration:none">
								<i class="Hui-iconfont">&#xe6df;</i></a> 
							<a title="删除"  class="ml-5 del" style="text-decoration:none" bank_id="{{$v->bank_id}}">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
						</td>
					</tr>
					 @endforeach
					 <tr><td colspan=17 align="center">{{$bank->appends(['bank_title'=>$bank_title])->links()}}</td></tr>
					



					