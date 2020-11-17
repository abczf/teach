<link rel="stylesheet" href="/index/css/course.css"/>
<link rel="stylesheet" href="/index/css/member.css"/>
<script src="/index/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<script src="/index/js/jquery.tabs.js"></script>
<script src="/index/js/mine.js"></script>
<script type="text/javascript">
$(function(){


	$('.demo2').Tabs({
		event:'click'
	});



});
</script>
@extends('../index/public/layout')
@section('subject')
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="clearh"></div>
<div class="membertab">

@include('index/public/personal/left')


<h3 class="mem-h3">我的课程</h3>
<div class="box demo2" style="width:820px;">
			<ul class="tab_menu" style="margin-left:30px;">
				<li class="current">学习中</li>
				<li>已学完</li>
			</ul>
			<div class="tab_box">
				<div>
					<ul class="memb_course">
                    @foreach($data as $v)
                        <li>
                            <div class="courseli">
                            <a href="{{url('index/video/show')}}" target="_blank"><img src="/{{$v->cou_img}}" width="230px"></a>
                            <p class="memb_courname"><a href="{{url('index/video/show')}}?cou_id={{$v->cou_id}}" class="blacklink">{{$v->cou_name}}</a></p>
                            <div class="mpp">
                                <div class="lv" style="width:20%;"></div>
                            </div>
                            <p class="goon"><a href="{{url('index/video/show')}}?cou_id={{$v->cou_id}}"><span>继续学习</span></a></p>
                            </div>
                        </li>
                        @endforeach
                        <div style="height:10px;" class="clearfix"></div>
                    </ul>

				</div>
				<div class="hide">
					<div>
					<ul class="memb_course">
                        @foreach($completed as $v)
                        <li>
                            <div class="courseli">
                            <a href="video.html" target="_blank"><img src="/{{$v->cou_img}}" width="230px"></a>
                            <p class="memb_courname"><a href="coursecont.html" class="blacklink">{{$v->cou_name}}</a></p>
							<div class="mpp">
                                <div class="lv" style="width:100%;"></div>
                            </div>
                            <p class="goon"><a href="{{url('index/detail/info')}}?cou_id={{$v->cou_id}}"><span>查看课程</span></a></p>
                            </div>
                        </li>
                        @endforeach
                        <div class="clearfix" style="height:10px;"></div>
                    </ul>

				</div>
				</div>
				<div class="hide">
					<div>
					<ul class="memb_course">
                        <li>
                            <div class="courseli mysc">
                            <a href="video.html" target="_blank"><img width="230" src="/index/images/c8.jpg" class="mm"></a>
                            <p class="memb_courname"><a href="video.html" class="blacklink">会计基础</a></p>
                            <div class="mpp">
                                <div class="lv" style="width:20%;"></div>
                            </div>
                            <p class="goon"><a href="#"><span>继续学习</span></a></p>
							<div class="mask"><span class="qxsc"  title="移除收藏">▬</span></div>
                            </div>
                        </li>
                        <li>
                            <div class="courseli mysc">
                            <a href="video.html" target="_blank"><img width="230" src="/index/images/c8.jpg" class="mm"></a>
                            <p class="memb_courname"><a href="video.html" class="blacklink">会计基础</a></p>
                            <div class="mpp">
                                <div class="lv" style="width:20%;"></div>
                            </div>
                            <p class="goon"><a href="#"><span>继续学习</span></a></p>
							<div class="mask"><span class="qxsc"  title="移除收藏">▬</span></div>
                            </div>
                        </li>
                        <div class="clearfix" style="height:10px;"></div>
                    </ul>
				</div>
				</div>

			</div>
		</div>
</div>


<div class="clearh"></div>
</div>

<!-- InstanceEndEditable -->


<div class="clearh"></div>
@endsection
