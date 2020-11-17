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
        <h3 class="righttit">全部试题</h3>
        <div class="clearh"></div>
        <span class="bread nob">
                <a class="fombtn cur">课程分类</a>
            @foreach($course as $v)
                <a class="fombtn" href="{{$v->cou_type}}">{{$v->cou_name}}</a>
            @endforeach
        </span>   
    </div>
    <div class="clearh"></div>
    <!-- 右边 -->
    <div class="coursetext">
        @foreach($java as $v)
        <div class="articlelist">
            <h3><a class="artlink" href="{{url('index/bank/bankinfo')}}?bank_id={{$v->bank_id}}">{{$v->bank_title}}</a>
            </h3>
             <p style="margin-top: 30px">{{$v->bank_content}}</p>
        </div>
        @endforeach
        <div class="clearh" style="height:20px;"></div>
        <span class="pagejump">
            <p class="userpager-list">
              {{$bank->links()}}
            </p>
        </span>
        <div class="clearh" style="height:10px;"></div>
    </div>

    <div class="courightext">
    <div class="ctext">
        <div class="cr1">
        <h3 class="righttit">Java常见试题</h3>
        <div class="gonggao">
        <ul class="hotask">
            @foreach($java as $v)
                <li><a class="ask_link" href="{{url('index/bank/bankinfo')}}?bank_id={{$v->bank_id}}"><strong>●</strong>{{$v->bank_title}}</a></li>
            @endforeach
            </ul>
        </div>
        </div>
    </div>
    <!-- 左下 -->
    <div class="ctext">
        <div class="cr1">
        <h3 class="righttit">推荐课程</h3>
        <div class="teacher">
            @foreach($desc as $v)
                <div class="teapic">
                    <a href="{{url('index/course/cont')}}?cou_id={{$v->cou_id}}"  target="_blank"><img src="/{{$v->cou_img}}" width="150px"></a>
                    <h3 class="courh3"><a href="#" class="ask_link" target="_blank">{{$v->cou_name}}</a></h3>
                </div>
            @endforeach
        </div>
        </div>
    </div>
    </div>

<div class="clearh"></div>
</div>
<!-- InstanceEndEditable -->



@endsection
