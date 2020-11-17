<!-- 头部栏位 -->
@extends('../index/public/layout')
@section('subject')
    <link rel="stylesheet" href="/index/css/course.css"/>
    <link rel="stylesheet" href="/index/css/register-login.css"/>
    <script src="/index/js/jquery-1.8.0.min.js"></script>
    <link rel="stylesheet" href="/index/css/tab.css" media="screen">
    <script src="/index/js/jquery.tabs.js"></script>
    <script src="/index/js/mine.js"></script>

<div>




<div class="login" style="background:url(/index/images/12.jpg) right center no-repeat #fff;">


    

    <div style="width:600px">
        <h2>登录</h2>
        <div>
            <p class="formrow">
                <label class="control-label" for="register_email">帐号</label>
                <input type="text" name="user_name" id="user_name">
            </p>
            <span class="text-danger">请输入Email地址 / 用户昵称</span>
        </div>
        <div>
            <p class="formrow">
                <label class="control-label" for="register_email">密码</label>
                <input type="password" name="user_pwd" id="user_pwd">
            </p>
        </div>
        <div class="loginbtn">
            <label><input type="checkbox"  checked="checked"> <span class="jzmm">记住密码</span> </label>&nbsp;&nbsp;
            <button type="submit" class="uploadbtn ub1 sub">登录</button>
        </div>
        <div class="loginbtn lb">
            <a href="#" class="link-muted">还没有账号？立即免费注册</a>
        </div>
    </div>
    <div class="hezuologo">
        <span class="hezuo">使用合作网站账号登录</span>
        <div class="hezuoimg">
            <img src="/index/images/hezuoqq.png" class="hzqq" title="QQ" width="40" height="40"/>
            <img src="/index/images/hezuowb.png" class="hzwb" title="微博" width="40" height="40"/>
        </div>

    </div>
<!-- <div style="display: none;" id="zzl">
    <div style="width: 200px;height: 55px;background-color: yellow;" id="tck">
        <p id="spans" style="padding-left: 60px;"></p>
    </div>
    </div> -->
    
    <div style="display: none;" id="zzl">
        <div id="tck" style="width: 250px;height: 70px;background-color: #c3c3c3;float: left;margin-left: 70px;">
            <p id="spans" style="padding-top: 20px;padding-left:85px;"></p>
        </div>
    </div>

</div>



</div>

<script>
 $(document).ready(function(){
        $(".sub").click(function(){
            var user_name = $("#user_name").val();
            var user_pwd = $("#user_pwd").val();
            // alert(user_name);
            var url = "login/Do";
            var data={};
            data.user_name = user_name;
            data.user_pwd =user_pwd;
            $.ajax({
                url  : url,
                type : "post",
                data : data,
                dataType : "json",
                success:function(res){
                    if(res.status == 200){
                        // alert(res.msg)
                         $("#spans").html(res.msg)
                        aa("/index")
                    }else{
                        // alert(res.msg)
                        $("#spans").html(res.msg)
                        aa("/index/login")
                    }
                }
            })
        });
        function aa(va) {
            s=0;
            var aa=setInterval(function () {
                if(s==250){
                    $("#zzl").hide()
                    s=0
                    location.href=va
                    clearInterval(aa)
                }else{

                    $("#zzl").show()
                    s=s+10
                    $("#tx").remove()
                    // $("#spans").remove()
                    var str='<div style="width:'+ s+'px;height: 3px;background-color: #66cc00;" id="tx"></div>'
                    $("#tck").prepend(str)

                }
            },50)
        }
    })

    // 跳转动画
    
</script>
@endsection
