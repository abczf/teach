<link rel="stylesheet" href="/index/css/course.css"/>
<link rel="stylesheet" href="/index/css/register-login.css"/>
<script src="/index/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<script src="/index/js/jquery.tabs.js"></script>
<script src="/index/js/mine.js"></script>
<script type="text/javascript">
$(function(){

	$('.demo2').Tabs({
		event:'click'
	});
	$('.demo3').Tabs({
		event:'click'
	});
});
</script>

@extends('../index/public/layout')
@section('subject')
<!-- InstanceBeginEditable name="EditRegion1" -->


<div class="coursecont">
<div class="coursepic1">
   <div class="coursetitle1">
    	<h2 class="courseh21">{{$course->cou_name}}</h2>
   </div>
   <div class="course_img1">
       <img src="/{{$course->cou_img}}" width="140px">
   </div>
   <div class="course_xq">
       <span class="courstime1"><p>课时<br/><span class="coursxq_num">{{$count2}}课时</span></p></span>
	   <span class="courstime1"><p>学习人数<br/><span class="coursxq_num">25987人</span></p></span>
	   <span class="courstime1"><p style="border:none;">课程录入时间<br/><span class="coursxq_num">{{date('Y-m-d H:i:s',$course->add_time)}}</span></p></span>
   </div>
   <div class="course_xq2">
      <a class="course_learn" href="{{url('index/video/show')}}">开始学习</a>
   </div> 
    <div class="clearh"></div>
</div>

<div class="clearh"></div>
<div class="coursetext">
	<div class="box demo2" style="position:relative">
			<ul class="tab_menu">
				<li class="current course1">章节</li>
				<li class="course1">评价</li>
				<li class="course1">问答</li>
			</ul>
			<!--<a class="fombtn" style=" position:absolute; z-index:3; top:-10px; width:80px; text-align:center;right:0px;" href="#">下载资料包</a>-->
			<div class="tab_box">
				<div>
					<dl class="mulu noo">
                        @foreach($count as $v)
					<div>
                        <dt class="mulu_title"><span class="mulu_img"></span>&nbsp;&nbsp;{{$v['catalog_name']}}
						<span class="mulu_zd">+</span></dt>
						<div class="mulu_con">
							<dd class="smalltitle"><strong>&nbsp;&nbsp;{{$v['info_name']}}</strong></dd>
							<a href="video.html"><dd><strong class="cataloglink">{{$v['info_name']}}</strong><i class="fini nn"></i></dd></a>
						</div>
					</div>
                            @endforeach
                   </dl>
				</div>
				<div class="hide">
					<div>
                    <div class="c_eform">
                        <input type="hidden" value="{{$course->cou_id}}" id="cou_id">
                        <textarea rows="7" class="pingjia_con" name="e_desc" placeholder="评价详细内容..."></textarea>
                       <a class="issue">发布评论</a>
                       <div class="clearh"></div>
                    </div>
					<ul class="evalucourse">

                        @foreach($access as $v)
                            <li>
                                <span class="pephead"><img src="/index/images/0-0.JPG" width="50" title="候候">
                                <p class="pepname">候候15kpiii</p>
                                </span>
                                <span class="pepcont"><p>{{$v->e_desc}}</p>
                                <p class="peptime pswer">{{date('Y-m-d H:i:s',$v->add_time)}}</p></span>
                            </li>
                        @endforeach
                    </ul>
				</div>
				</div>
                <div class="hide">
					<div>
                     <h3 class="pingjia">提问题</h3>
                    <div class="c_eform">
                        <input type="text" name="q_title" class="pingjia_con" placeholder="请输入问题标题"><br/>
                        <a href="#" class="fombtn">发布</a>
                       <div class="clearh"></div>
                    </div>
					<ul class="evalucourse">
                        @foreach($response as $v)
                            <li>
                                <span class="pephead"><img src="/index/images/0-0.JPG" width="50" title="候候">
                                <p class="pepname">候候</p>
                                </span>
                                <span class="pepcont">
                                <p><a href="{{url('index/detail/show/'.$v->q_id)}}" class="peptitle" target="_blank">{{$v->q_title}}</a></p>
                                <p class="peptime pswer"><span class="pepask">回答(<strong><a class="bluelink" href="#">{{$quecount}}</a></strong>)&nbsp;&nbsp;&nbsp;&nbsp;浏览(<strong><a class="bluelink" href="#">10</a></strong>)</span>2015-01-02</p>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    
				</div>
				</div>
				<div class="hide">
					<div>
					<ul class="notelist" >
  </ul>
                    
				</div>
				</div>
				
			</div>
		</div>
   
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">授课讲师</h3>
    <div class="teacher">
    <div class="teapic ppi">
    <a href="teacher.html" target="_blank"><img src="/{{$course->lect_img}}" width="80px"></a>
     <h3 class="tname"><a href="teacher.html" class="peptitle" target="_blank">{{$course->lect_name}}</a><p style="font-size:14px;color:#666">{{$course->cou_name}}</p></h3>
    </div>
    <div class="clearh"></div>
    <p>{{$course->lect_resume}}</p>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit" onclick="reglog_open();">最新学员</h3>
        <div class="teacher zxxy">
        <ul class="stuul">
            @foreach($userinfo as $v)
                <li><img src="/{{$v->details_head}}" width="60px"><p class="stuname">{{$v->details_name}}</p></li>
            @endforeach
        </ul>
        <div class="clearh"></div>
        </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">相关课程</h3>
    <div class="teacher">
    @foreach($related as $v)
        <div class="teapic">
            <a href="#"  target="_blank"><img src="/{{$v['cou_img']}}" width="60px"></a>
            <h3 class="courh3"><a href="#" class="peptitle" target="_blank">{{$v['cou_name']}}</a></h3>
        </div>
        <div class="clearh"></div>
    @endforeach
    </div>
    </div>
</div>
   
</div>

<div id="reglog">
<span class="close"  onclick="reglog_close();">×</span>
<div class="loginbox">
    <div class="demo3 rlog">
			<ul class="tab_menu rlog">
				<li class="current">登录</li>
				<li>注册</li>
			</ul>
			<div class="tab_box">
				<div>
                <form class="loginform pop">
                <div>
                    <p class="formrow">
                    <label class="control-label pop" for="register_email">帐号</label>
                    <input type="text" class="popinput">
                    </p>
                    <span class="text-danger">请输入Email地址 / 用户昵称</span>
                </div>
                
                <div>
                    <p class="formrow">
                    <label class="control-label pop" for="register_email">密码</label>
                    <input type="password" class="popinput">
                    </p>
                    <p class="help-block"><span class="text-danger">密码错误</span></p>
                </div>
                <div class="clearh"></div>
                <div class="popbtn">
                    <label><input type="checkbox" checked="checked"> <span class="jzmm">记住密码</span> </label>&nbsp;&nbsp;
                    <button type="submit" class="uploadbtn ub1">登录</button>
                    
                </div>
                <div class="popbtn lb">
                   <a href="#" class="link-muted">还没有账号？立即免费注册</a>
                   <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>   
                   <a href="forgetpassword.html" class="link-muted">找回密码</a>
                </div>
              
                        
                        <div class="popbtn hezuologo">
                        <span class="hezuo z1">使用合作网站账号登录</span>
                        <div class="hezuoimg z1">
                        <img src="/index/images/hezuoqq.png" class="hzqq" title="QQ" width="40" height="40">
                        <img src="/index/images/hezuowb.png" class="hzwb" title="微博" width="40" height="40">
                        </div>
                        </div>
                </form>
				</div>
				<div class="hide">
					<div>
					<form class="loginform pop">
                     <div>
                        <p class="formrow">
                        <label class="control-label pop" for="register_email">邮箱地址</label>
                        <input type="text" class="popinput">
                        </p>
                        <span class="text-danger">请输入Email地址 / 用户昵称</span>
                    </div>
                	<div>
                        <p class="formrow">
                        <label class="control-label pop" for="register_email">昵称</label>
                        <input type="text" class="popinput">
                        </p>
                        <span class="text-danger">请输入Email地址 / 用户昵称</span>
                    </div>
                    <div>
                        <p class="formrow">
                        <label class="control-label pop" for="register_email">密码</label>
                        <input type="password" class="popinput">
                        </p>
                        <p class="help-block"><span class="text-danger">密码错误</span></p>
                    </div>
                    <div>
                        <p class="formrow">
                        <label class="control-label pop" for="register_email">确认密码</label>
                        <input type="password" class="popinput">
                        </p>
                        <p class="help-block"><span class="text-danger">密码错误</span></p>
                    </div>
                    
                    
                    <button type="submit" class="uploadbtn ub1">注册</button>
                   
                    
                
                </form>
                    
				</div>
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
<script>
    $(document).ready(function(){
        // 评论
        $(document).on('click','.issue',function(){
            var cou_id = $("#cou_id").val();
            var e_desc = $("textarea[name='e_desc']").val();

            $.ajax({
                url:"{{url('index/detail/save')}}",
                type:"post",
                data:{cou_id:cou_id,e_desc:e_desc},
                dataType:"json",
                success:function(res){

                }
            })
        })

        // 问题
        $(document).on('click','.fombtn',function(){
            var q_title = $("input[name='q_title']").val();

            $.ajax({
                url:"{{url('index/detail/ask')}}",
                type:"post",
                data:{q_title:q_title},
                dataType:"json",
                success:function(res){
                    if(res.status == 200){
                        window.location.href="{{url('index/detail/info')}}";
                    }
                }
            })
        })
    })
</script>
