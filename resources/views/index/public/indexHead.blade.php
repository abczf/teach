<div class="head" id="fixed">
    <div class="nav">
        <span class="navimg"><a href="{{'/index'}}"><img border="0" src="/index/images/logo.png"></a></span>
        <ul class="nag">
            <li><a href="{{url('index/course/list')}}" class="link1">课程</a></li>
            <li><a href="{{url('index/consult/show')}}" class="link1">资讯</a></li>
            <li><a href="{{url('index/teacher/show')}}" class="link1">讲师</a></li>
            <li><a href="exam_index.html" class="link1" target="_blank">题库</a></li>
            <li><a href="{{url('index/question/add')}}  " class="link1" target="_blank">问答</a></li>
        </ul>
        <span class="massage">
        <!--<span class="select">
        	<a href="#" class="sort">课程</a>
        	<input type="text" value="关键字"/>
            <a href="#" class="sellink"></a>
            <span class="sortext">
            	<p>课程</p>
                <p>题库</p>
                <p>讲师</p>
            </span>
        </span>-->
            <a href="{{url('index/personal/course/show')}}"  onMouseOver="logmine()" style="width:70px" class="link2 he ico" target="_blank">sherley</a>
            <span id="lne" style="display:none" onMouseOut="logclose()" onMouseOver="logmine()">
                <span style="background:#fff;">
                	<a href="{{url('index/personal/course/show')}}" style="width:70px; display:block;" class="link2 he ico" target="_blank">sherley</a>
                </span>
                <div class="clearh"></div>
                <ul class="logmine" >
                    <li><a class="link1" href="{{'/index/course/list'}}">我的课程</a></li>
                    <li><a class="link1" href="#">我的题库</a></li>
                    <li><a class="link1" href="#">我的问答</a></li>
                    <li><a class="link1" href="#">退出</a></li>
                </ul>
            </span>
        </span>
    </div>
</div>
