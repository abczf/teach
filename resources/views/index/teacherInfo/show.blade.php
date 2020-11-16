<link rel="stylesheet" href="/index/css/course.css"/>
<script src="/index/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<script src="/index/js/jquery.tabs.js"></script>
<script src="/index/js/mine.js"></script>

@extends('../index/public/layout')
@section('subject')
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
	<div class="coursepic tecti">
		<div class="teaimg">
			<img src="/{{$course->lect_img}}" width="150px">
		</div>
		<div class="teachtext">
			<h3>{{$course->lect_name}}&nbsp;&nbsp;<strong>{{$course->cou_name}}</strong></h3>
			<h4>个人简介</h4>
			<p>{{$course->lect_resume}}</p>
			<h4>授课风格</h4>
			<p>{{$course->lect_style}}</p>
		</div>
		<div class="clearh"></div>
	</div>
<div class="clearh"></div>

<div class="tcourselist">
<h3 class="righttit" style="padding-left:50px;">在教课程</h3>
<ul class="tcourseul">
	@foreach($data as $v)
		<li>
			 <span class="courseimg tcourseimg"><a href="{{url('index/courseinfo/cont')}}?cou_id={{$v->cou_id}}" target="_blank"><img src="/{{$v->cou_img}}" width="150px"></a></span>
			 <span class="tcoursetext">
				<h4><a href="{{url('index/courseinfo/cont')}}?cou_id={{$v->cou_id}}" target="_blank" class="teatt">{{$v->cou_name}}</a>
					<a class="state end">
						@if($v->cou_status==1)
						未学习
						@elseif($v->cou_status==2)
						学习中
						@elseif($v->cou_status==3)
						已学完
						@endif
					</a>
				</h4>
				<p class="teadec">{{$v->catalog_desc}}</p>
				<p class="courselabel clock">{{date('Y-m-d H:i:s',$v->add_time)}}<span class="courselabel student">2555人学习</span><span class="courselabel pingjia">评价：<img width="71" height="14" src="/index/images/evaluate.png" data-bd-imgshare-binded="1"></span></p>
			 </span>
			 <div style="height:0" class="clearh"></div>
		</li>
	@endforeach
<div class="clearh"></div>
</ul>
</div>




<div class="clearh"></div>
</div>
<!-- InstanceEndEditable -->


<div class="clearh"></div>
@endsection
