<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>考试</title>

</head>
<body>
<center>
    <h1>考试添加</h1>
</center>
<div class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">考试名称</label>
        <div class="col-sm-10">
            <input class="form-control" id="exam_name" name="exam_time" type="text"  placeholder="请输入考试名称">
        </div>
    </div>
    <div>
        <center>
            <p>
                <button type="button" class="btn btn-primary btn-lg">添加展示</button>
            </p>
        </center>
    </div>
</div>


<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/jquery.js"></script>
</body>
</html>
<script>
    $(document).ready(function(){
        $(".btn").click(function(){
            // alert(123);
            var exam_name = $("#exam_name").val();
            if(exam_name == ''){
                alert("请输入内容");
                return false;
            }
            var url = "/admin/exam/exam_add_do";
            $.ajax({
                url  : url,
                type : "post",
                data : {exam_name:exam_name},
                dataType : "json",
                success:function(res){
                    if(res.status == 200){
                        alert(res.msg)
                        location.href = "admin/exam/show"
                    }else{
                        alert(res.msg)
                    }
                }
            })

        });
    });
</script>

