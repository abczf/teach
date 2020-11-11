 					@foreach($consult as $k=>$v)
						<tr class="text-c">
							<td><input type="checkbox" value="" name=""></td>
							<td>{{$v['infor_id']}}</td>
							<td class="text-l">{{$v['infor_title']}}</td>
							<td>{{$v['infor_content']}}</td>
							<td> {{date('Y-m-d H:i:s',$v['add_time'])}}</td>
							<td class="td-status"><span class="label label-success radius">已发布</span></td>
							<td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>
								<a style="text-decoration:none" class="ml-5"  href="{{url('/admin/consult/edit/'.$v->infor_id)}}" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
								<a style="text-decoration:none" class="ml-5 del" infor_id="{{$v->infor_id}}" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
						</tr>
						 @endforeach
						 <tr><td colspan=17 align="center">{{$consult->appends(['infor_title'=>$infor_title])->links()}}</td></tr>