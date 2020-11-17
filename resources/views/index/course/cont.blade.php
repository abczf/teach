<!-- 头部栏位 -->
@extends('../index/public/layout')
@section('subject')
    <link rel="stylesheet" href="/index/css/course.css"/>
    <link rel="stylesheet" href="/index/css/tab.css" media="screen">
    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <script src="/index/js/jquery.tabs.js"></script>
    <script src="/index/js/mine.js"></script>

    <div class="coursecont">
        <div class="coursepic">
            <div class="course_img"><img src="/{{$course->cou_img}}" width="500px"></div>
            <div class="coursetitle">
                <a class="state">
                    @if($course->cou_status==1)
                        未学习
                    @elseif($course->cou_status==2)
                        学习中
                    @elseif($course->cou_status==3)
                        已学完
                    @endif
                </a>
                <h2 class="courseh2">{{$course->cou_name}}</h2>
                <p class="courstime">总课时：<span class="course_tt">{{$count2}}课时</span></p>
                <p class="courstime">课程录入时间：<span class="course_tt">{{date('Y-m-d H:i:s',$course->add_time)}}</span></p>
                <p class="courstime">学习人数：<span class="course_tt">25987人</span></p>
                <p class="courstime">讲师：{{$course->lect_name}}</p>
                <!--<p><a class="state end">完结</a></p>-->
                <span class="coursebtn"><a cou_id="{{$course->cou_id}}" class="btnlink" href="{{'/index/detail/info?cou_id='.$course->cou_id}}">加入学习</a>
                    {{--<a cou_id="{{$course->cou_id}}" class="codol sc" href="#">收藏课程</a>--}}
                </span>
                <div style="clear:both;"></div>
            </div>
            <div class="clearh"></div>
        </div>

        <div class="clearh"></div>
        <div class="coursetext">
            <div class="clearh"></div>
            <h3 class="leftit">课程目录</h3>
            <dl class="mulu">
                @foreach($catalog as $v)
                    <dt><a href="{{url('index/detail/info')}}?cou_id={{$v->cou_id}}" class="graylink">{{$v->catalog_name}}</a></dt>
                    <dd>{{$v->catalog_desc}}</dd>
                @endforeach
            </dl>
        </div>

        <div class="courightext">
            <div class="ctext">
                <div class="cr1">
                    <h3 class="righttit">授课讲师</h3>
                    <div class="teacher">
                        <div class="teapic ppi">
                            <a href="teacher.html" target="_blank"><img src="/{{$course->lect_img}}" width="150px"></a>
                            <h3 class="tname"><a href="teacher.html" class="peptitle" target="_blank">{{$course->lect_name}}</a><p style="font-size:14px;color:#666">{{$course->cou_name}}</p></h3>
                        </div>
                        <div class="clearh"></div>
                        <p>{{$course->lect_resume}}</p>
                    </div>
                </div>
            </div>

            <div class="ctext">
                <div class="cr1">
                    <h3 class="righttit">课程公告</h3>
                    <div class="gonggao">
                        <div class="clearh"></div>
                        <p>{{$notice->notice_desc}}<br/>
                            <span class="gonggao_time">{{date('Y-m-d H:i:s',$notice->add_time)}}</span>
                        </p>
                        <div class="clearh"></div>
                    </div>
                </div>
            </div>

            <div class="ctext">
                <div class="cr1">
                    <h3 class="righttit">推荐课程</h3>
                    <div class="teacher">
                        @foreach($desc as $v)
                            <div class="teapic">
                                <a href="#"  target="_blank"><img src="/{{$v->cou_img}}" width="150px"></a>
                                <h3 class="courh3"><a href="#" class="peptitle" target="_blank">{{$v->cou_name}}</a></h3>
                            </div>
                            <div class="clearh"></div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>



        <div class="clearh"></div>
    </div>
    <script>
            {{--$(document).on('click','.codol',function(){--}}
                {{--var cou_id = $(this).attr('cou_id');--}}

                {{--$.ajax({--}}
                    {{--url:"{{url('index/courseinfo/collect')}}",--}}
                    {{--data:{cou_id:cou_id},--}}
                    {{--dataType:'json',--}}
                    {{--type:'post',--}}
                    {{--success:function (res) {--}}
                        {{--// console.log(res);--}}
{{--//                        alert(res['msg']);--}}
                    {{--}--}}
                {{--})--}}
            {{--})--}}
    </script>
@endsection

