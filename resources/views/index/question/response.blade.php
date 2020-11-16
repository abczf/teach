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
<link rel="stylesheet" href="/index/css/course.css"/>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<link rel="stylesheet" href="/index/css/article.css">
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script src="/index/js/mine.js"></script>

<script src="/index/js/jquery.tabs.js"></script>

@extends('../index/public/layout')
@section('subject')
    <link rel="stylesheet" href="/css/course.css"/>

    <!-- InstanceBeginEditable name="EditRegion1" -->
    <div class="coursecont">
        <!--<div class="coursepic">-->
        <!--<h3 class="righttit">全部问题</h3>-->
        <!--<div class="clearh"></div>-->
        <!--<span class="bread nob">-->
        <!--<a class="fombtn cur" href="articlelist.html">全部资讯</a>-->
        <!--<a class="fombtn" href="articlelist.html">热门资讯</a>-->
        <!--<a class="fombtn" href="articlelist.html">考试指导</a>-->
        <!--<a class="fombtn" href="articlelist.html">精彩活动</a>-->
        <!--</span>-->
    {{--            <div class="coursecont">--}}
    {{--                <div class="courseleft">--}}
    {{--        <span class="select">--}}
    {{--          <input type="text" value="请输入关键字" class="pingjia_con"/>--}}
    {{--          <a href="#" class="sellink"></a>--}}
    {{--        </span>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    <!--</div>-->
        <div class="clearh"></div>
        <div class="coursetext">
            <div class="articlelist">
                @foreach($response as $k1=>$v1)
                    <h3><p>{{$v1->r_content}}</p></h3>
                @endforeach
            </div>
            <div class="clearh" style="height:20px;"></div>
            <span class="pagejump">


    </span>

        </div>
        <div class="courightext">
            <div class="ctext">
                <div class="cr1">
                    <h3 class="righttit">热门问题</h3>
                    <div class="gonggao">
                        @foreach($que as $k=>$v)
                            <ul class="hotask">
                                <li><a class="ask_link" href="#"><strong>●</strong>{{$v->q_title}}</a></li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearh"></div>
        <!-- InstanceEndEditable -->
        <div class="clearh"></div>
        @endsection
        <style>
            page-item {
                border-radius: 5px;
            }
            /*ul.pagination li a:hover:not(.active) {background-color: #ddd;}*/
        </style>

