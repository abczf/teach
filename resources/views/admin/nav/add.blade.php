<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>导航栏</title>

</head>
<body>
<center>
        <h1>导航栏添加</h1>
</center>
<div class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">导航栏名</label>
        <div class="col-sm-10">
            <input class="form-control" id="nav_name" name="nav_name" type="text"  placeholder="请输入导航栏名...">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">导航栏地址</label>
        <div class="col-sm-10">
            <input class="form-control" id="nav_url" name="nav_url" type="text"  placeholder="请输入导航栏地址...">
        </div>
    </div>

    <div>
        <center>
        <p>
            <button type="button" class="btn btn-primary btn-lg">添加展示</button>
            <button type="button" class="btn-default btn-lg"><a href="/admin/nav/show">导航栏列表</a></button>
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
            var data = {};
            data.name = $("input[name = 'nav_name']").val();
            data.url = $("input[name = 'nav_url']").val();
            var url = "create";
            $.ajax({
                url  : url,
                type : "post",
                data : data,
                dataType : "json",
                success:function(res){
                    if(res.status == 200){
                        alert(res.msg)
                        location.href = "show"
                    }else{
                        alert(res.msg)
                    }
                }
            })

        });
    });
</script>
