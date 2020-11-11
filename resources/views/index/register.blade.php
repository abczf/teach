<!-- 头部栏位 -->
@extends('../index/public/layout')
@section('subject')
    <link rel="stylesheet" href="/index/css/course.css"/>
    <link rel="stylesheet" href="/index/css/register-login.css"/>
    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <link rel="stylesheet" href="/index/css/tab.css" media="screen">
    <script src="/index/js/jquery.tabs.js"></script>
    <script src="/index/js/mine.js"></script>

<div class="register" style="background:url(/index/images/13.jpg) right center no-repeat #fff">
    <h2>注册</h2>
    <form>
        <div>
            <p class="formrow"><label class="control-label" for="register_email">手机号</label>
                <input type="text" name="user_tel" placeholder="请输入你的手机号" >
            </p>
        </div>
        <div>
            <p class="formrow"><label class="control-label" for="register_email">短信验证码</label>
                <input type="text" name="code" placeholder="请输入你的验证码" >
                <button type="button" id="code" class="sendVerifyCode">发送验证码</button>
            </p>
        </div>
        <div>
            <p class="formrow"><label class="control-label" for="register_email">昵称</label>
                <input type="text" name="user_name" placeholder="该怎么称呼你？"></p>
        </div>
        <div>
            <p class="formrow"><label class="control-label" for="register_email">密码</label>
                <input type="password" name="user_pwd" placeholder="5-20位英文、数字"></p>
        </div>
        <div>
            <p class="formrow"><label class="control-label" for="register_email">确认密码</label>
                <input type="password" name="user_repwd" placeholder="再输入一次密码" ></p>
        </div>
        <div class="loginbtn reg">
            <button type="button" class="uploadbtn ub1">注册</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        // 触发器
        function vals() {
            var str=60;
            var vm=setInterval(function(){
                str--;
                $(".sendVerifyCode").text(str+"s");
                $(".sendVerifyCode").attr("disabled", true);
                if(str<=0){
                    $(".sendVerifyCode").attr("disabled", false);
                    $('.sendVerifyCode').text('获取验证码');
                    clearInterval(vm)
                }
            },1000);
        }

        // 验证码
        $(document).on('click','#code',function(){
            var user_tel = $("input[name='user_tel']").val();
            vals();
            $.ajax({
                url:"{{url('index/sendSmsCode')}}",
                data:{user_tel:user_tel},
                dataType:"json",
                type:"post",
                success:function(){
                    if(res.status == 000000){
                        $(".sendVerifyCode").text("60s");//这个是吧span里面值改成5s
                        _t=setInterval(vals,1000);//定时器
                        $(".sendVerifyCode").css("pointer-events", "none")//置灰
                        alert(res.msg);
                    }else{
                        alert(res.msg);
                    }
                }
            })
        });

        // 注册
        $(document).on('click','.ub1',function(){
            var user_tel = $("input[name='user_tel']").val();
            var code = $("input[name='code']").val();
            var user_name = $("input[name='user_name']").val();
            var user_pwd = $("input[name='user_pwd']").val();
            var user_repwd = $("input[name='user_repwd']").val();

            $.ajax({
                url:"{{url('index/save')}}",
                data:{user_tel:user_tel,code:code,user_name:user_name,user_pwd:user_pwd,user_repwd:user_repwd},
                dataType:"json",
                type:"post",
                success:function(res){
                    if(res.status == 000000){
                        window.location.href="{{url('index/login')}}";
                    }
                }
            })
        })
    });
</script>
@endsection