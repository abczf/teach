
<link rel="stylesheet" href="/index/css/course.css"/>
<script src="/index/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<script src="/index/js/jquery.tabs.js"></script>
<script src="/index/js/mine.js"></script>


@extends('../index/public/layout')
@section('subject')
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont" style="background: none repeat scroll 0 0 #fff;border-radius: 3px;box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);" >
    <h3 class="righttit" style="padding-left:50px;">优秀讲师</h3>
	@foreach($teacher as $v)
	<div class="coursepic tecti">
		<div class="teaimg">
		<a href="{{url('index/teacherInfo/show')}}?lect_id={{$v->lect_id}}" target="_blank"><img src="/{{$v->lect_img}}" width="200px"></a>
		</div>
		<div class="teachtext">
			<h3><a href="{{url('index/teacherInfo/show')}}?lect_id={{$v->lect_id}}" target="_blank" class="teatt">{{$v->lect_name}}</a>&nbsp;&nbsp;<strong>会计基础、会计电算化讲师</strong></h3>
			<h4>个人简介</h4>
			<p>{{$v->lect_resume}}</p>
			<h4>授课风格</h4>
			<p>{{$v->lect_style}}</p>
		</div>

		<div class="clearh"></div>
	</div>
	@endforeach
</div>
<!-- InstanceEndEditable -->


<div class="clearh"></div>

@endsection
