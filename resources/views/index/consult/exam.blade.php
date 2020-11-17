    <link rel="stylesheet" href="/index/css/article.css">
    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <script src="/index/js/mine.js"></script>

@extends('../index/public/layout')
@section('subject')
    
<!-- InstanceBeginEditable name="EditRegion1" -->
    <style>
        ul.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        ul.pagination li {display: inline;}

        ul.pagination li {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
        }

        ul.pagination li.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
        ul.pagination li a:hover:not(.active) {background-color: #ddd;}
    </style>
<div class="coursecont">
<div class="coursepic">
    <h3 class="righttit">全部资讯</h3>
    <div class="clearh"></div>
    <span class="bread nob">
        <a class="fombtn cur" href="{{url('index/consult/show')}}">全部资讯</a>
        @foreach($cate as $v)
            <a class="fombtn" href="{{$v->cate_url}}">{{$v->cate_name}}</a>
        @endforeach
    </span>
    
</div>
<div class="clearh"></div>
<div class="coursetext">
    @foreach($consult as $v)
    <div class="articlelist">
        <h3><a class="artlink" href="{{url('index/consultInfo/show')}}?infor_id={{$v->infor_id}}">{{$v->infor_title}}</a></h3>
        <p>{{$v->infor_content}}</p>
        <p class="artilabel">
        <span class="ask_label">{{$v->cate_name}}</span>
        <b class="labtime">{{date('Y-m-d H:i:s'),$v->add_time}}</b>
        </p>
        <div class="clearh"></div>
    </div>
    @endforeach
    <div class="clearh" style="height:20px;"></div>
    <span class="pagejump">
        <p class="userpager-list">
            {{$consult->links()}}
        </p>
    </span>
    <div class="clearh" style="height:10px;"></div>
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">热门资讯</h3>
    <div class="gonggao">
    <ul class="hotask">
        @foreach($hot as $v)
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
                <a href="{{url('index/courseinfo/cont')}}?cou_id={{$v->cou_id}}"  target="_blank"><img src="/{{$v->cou_img}}" width="150px"></a>
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



@endsection
