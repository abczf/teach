 					@foreach($active as $k=>$v)
						<tr class="text-c">
							<td><input type="checkbox" value="" name=""></td>
							<td>{{$v['act_id']}}</td>
							<td class="text-l">{{$v['act_title']}}</td>
							<td>{{$v['act_content']}}</td>
							<td>{{date('Y-m-d H:i:s',$v['add_time'])}}</td>
							<td class="td-status"><span class="label label-success radius">已发布</span></td>
							<td class="f-14 td-manage">
								<a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架">
									<i class="Hui-iconfont">&#xe6de;</i>
								</a>
								<a href="{{url('admin/active/edit/'.$v->act_id)}}" style="text-decoration:none" class="ml-5"  title="编辑">
									<i class="Hui-iconfont">&#xe6df;</i>
								</a>
								<a style="text-decoration:none" class="ml-5 del" act_id="{{$v->act_id}}" title="删除">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
							</td>
						</tr>
						 @endforeach
						 <tr><td colspan=17 align="center">{{$active->appends(['act_title'=>$act_title])->links()}}</td></tr>