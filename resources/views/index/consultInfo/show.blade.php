<link rel="stylesheet" href="/index/css/article.css">
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script src="/index/js/mine.js"></script>
@extends('../index/public/layout')
@section('subject')
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
<div class="coursepic">
    <h3 class="righttit">全部资讯</h3>
    <div class="clearh"></div>
    <span class="bread">
    <a class="ask_link" href="articlelist.html">全部资讯</a>&nbsp;/&nbsp;<a class="ask_link" href="articlelist.html">{{$consult['cate_name']}}</a>
        &nbsp;/&nbsp;{{$consult['infor_title']}}
    </span>
    
</div>
<div class="clearh"></div>
<div class="coursetext">
        <span class="articletitle">
            <h2>{{$consult['infor_title']}}</h2>
            <p class="gray">{{date('Y-m-d H:i:s'),$consult['add_time']}}</p>
        </span>
        <p class="coutex">{{$consult['infor_content']}}</p>
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">热门资讯</h3>
    <div class="gonggao">
    <ul class="hotask">
        @foreach($data as $k=>$v)
            <li><a class="ask_link" href="{{url('index/consultInfo/show')}}?infor_id={{$v->infor_id}}"><strong>●</strong>{{$v->infor_title}}</a></li>
        @endforeach
        </ul>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">推荐课程</h3>
    <div class="teacher">
        @foreach($desc as $v)
            <div class="teapic">
                <a href="{{url('index/course/cont')}}?cou_id={{$v->cou_id}}"  target="_blank"><img src="/{{$v->cou_img}}" width="150px"></a>
                <h3 class="courh3"><a href="#" class="ask_link" target="_blank">{{$v->cou_name}}</a></h3>
            </div>
            <div class="clearh"></div>
        @endforeach
    </div>
    </div>
</div>
   
</div>



<div class="clearh"></div>
</div>
<!-- InstanceEndEditable -->


<div class="clearh"></div>
@endsection
