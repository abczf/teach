<!-- 头部栏位 -->
@extends('../index/public/layout')
@section('subject')
    <link rel="stylesheet" href="/index/css/course.css"/>
    <link rel="stylesheet" href="/index/css/tab.css" media="screen">
    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <script src="/index/js/jquery.tabs.js"></script>
    <script src="/index/js/mine.js"></script>

    <div class="coursecont">
        <div class="courseleft">
	<span class="select">
      <input type="text" value="请输入关键字" class="pingjia_con"/>
      <a href="#" class="sellink"></a>
    </span>
            <ul class="courseul">
                <li class="curr" style="border-radius:3px 3px 0 0;background:#fb5e55;"><h3 style="color:#fff;"><a href="#" class="whitea">全部课程</a></h3>
                @foreach($cateInfo as $k=>$v)
                <li>

                    <ul class="sortul">
{{--                        <li class="course_curr"><a href="#"></a></li>--}}
                        <li><a href="#"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']) ?>{{$v->cate_name}}</a></li>

                    </ul>

                    <div class="clearh"></div>
                </li>
                @endforeach
            </ul>
            <div style="height:20px;border-radius:0 0 5px 5px; background:#fff;box-shadow:0 2px 4px rgba(0, 0, 0, 0.1)"></div>
        </div>
        <div class="courseright">
            <div class="clearh"></div>
            <ul class="courseulr">
                @foreach($data as $v)
                <li>
                    <div class="courselist">
                        <a href="{{url("index/courseinfo/cont")}}?cou_id={{$v->cou_id}}" ><img style="border-radius:3px 3px 0 0;" width="240" src="/{{$v->cou_img}}" title="{{$v->cou_name}}"></a>
                        <p class="courTit"><a href="{{url("index/coursecont")}}" >{{$v->cou_name}}</a></p>
                        <div class="gray">
                            <span>{{date("Y-m-d H:i:s",$v->add_time)}}</span>

                            <div style="clear:both"></div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clearh"></div>
    </div>

    </div>

@endsection
