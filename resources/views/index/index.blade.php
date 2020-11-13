<!-- 头部栏位 -->
@extends('../index/public/common')
@section('subject')

<div class="content">
    <div class="fullwidthbanner-container">
        <div id="revolution-slider" style="max-height:575px !important; background:#46B0AC">
            <ul>
                @foreach($slide as $k=>$v)
                <li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="images-slider/thumbs/thumb1.jpg">
                    <!--  BACKGROUND IMAGE -->
                    <img src="{{env('URL')}}{{$v['slide_img']}}" alt="" />
                    <!-- THE CAPTIONS IN THIS SLIDE -->
                    <div class="tp-caption sfl"
                         data-x="-130"
                         data-y="100"
                         data-speed="300"
                         data-start="300"
                         data-easing="easeOutBack">
                        <img src="images-slider/rb.png" alt="">
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="td1">
        <div class="tdcont">
            <span class="tdimg"><img src="/index/images/ico4.jpg" width="450"></span>
            <span class="tdtext">
        	<h3>完全免费课程</h3>
            <p>精心录制视频课程与讲解，全部课程完全免费。</p><br/>
            <p><a href="courselist.html" class="btninto">开始学习</a></p>
        </span>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="td2">
        <div class="tdcont">
            <span class="tdimg1"><img src="/index/images/ico5.jpg" width="500"></span>
            <span class="tdtext1">
        	<h3 class="co1">智能评估题库</h3>
            <p>智能能力评估，学员可以通过具体题目，匹配相
关知识点,文字解析与视频解析相结合。</p><br/>
			<p><a href="training.html" class="btninto">点击测评</a></p>
        </span>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="td1">
        <div class="tdcont np">
            <span class="tdimg" style="margin-top:80px"><img src="/index/images/ico6.jpg" width="550"></span>
            <span class="tdtext" style="margin-top:120px">
        	<h3 class="co2">智能匹配练习</h3>
            <p class="tex1">跟随视频课程同步练习，紧扣重点难
点，点点精通。</p><br/>
			<p><a href="training.html" class="btninto">开始练习</a></p>
        </span>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="td2 np">
        <div class="tdcont np">
            <span class="tdimg1 ni"><img src="/index/images/ico7.png" width="300"></span>
            <span class="tdtext1" style="margin-top:100px;">
        	<h3 class="co3">全天答疑解惑</h3>
            <p class="tex1">谋刻答疑社区，老师学员共同交流，我们的讲师更是倾囊相授，有问必答。</p><br/>
            <p><a href="#" class="btninto">提问问题</a></p>
        </span>
            <div style="clear:both"></div>
        </div>
    </div>

    <div class="crdiv">

        <div class="course">
            <h2 style="text-align:center; font-weight:normal; font-size:34px">精品课程</h2>
            <div class="clearh" style="height:20px;"></div>

            <div>
                <ul id="myTab3">
                    <li class="current" onClick="nTabs(this,0);">IT技能</li>
                    <li class="norma3" onClick="nTabs(this,1);">IT技能</li>
                    <li class="norma3" onClick="nTabs(this,2);">IT技能</li>
                    <li class="norma3" onClick="nTabs(this,3);">IT技能</li>
                </ul>
                <div class="clearh"></div>
                <div>
                    <ul class="courseul" id="myTab3_Content0" style="display: block;">
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>.
                        <div class="clearh"></div>
                    </ul>
                </div>
                <div>
                    <ul class="courseul" id="myTab3_Content1" style="display: none;">
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <div class="clearh"></div>
                    </ul>
                </div>
                <div>
                    <ul class="courseul" id="myTab3_Content2" style="display: none;">
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <div class="clearh"></div>
                    </ul>
                </div>
                <div>
                    <ul class="courseul" id="myTab3_Content3" style="display: none;">
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="courselist">
                                <img width="263" style="border-radius:3px 3px 0 0;" src="/index/images/c1.jpg" >
                                <p class="courTit">HTTP下载课程</p>
                                <div class="gray">
                                    <span>1小时前更新</span>
                                    <span class="sp1">1255555人学习</span>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </li>
                        <div class="clearh"></div>
                    </ul>
                </div>
            </div>
            <div class="line no"></div>
        </div>
        <span class="morecourse"><a href="courselist.html" class="btnlink">更多课程</a></span>


    </div>

@endsection


