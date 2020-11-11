<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>导航栏</title>

</head>
<body>
<center>
    <h1>导航栏修改</h1>
</center>
<div class="form-horizontal">
    <div>
        <input type="hidden" value="{{$data->nav_id}}" id="nav_id">
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">导航栏名</label>
        <div class="col-sm-10">
            <input class="form-control" id="nav_name" name="nav_name" value="{{$data->nav_name}}" type="text"  placeholder="请输入导航栏名...">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">导航栏地址</label>
        <div class="col-sm-10">
            <input class="form-control" id="nav_url" name="nav_url" value="{{$data->nav_url}}" type="text"  placeholder="请输入导航栏地址...">
        </div>
    </div>

    <div>
        <center>
            <p>
                <button type="button" class="btn btn-primary btn-lg">修改展示</button>
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
            var nav_id = $("#nav_id").val();
            var nav_name = $("#nav_name").val();
            var nav_url  = $("#nav_url").val();
            var url = "{{url('/admin/nav/upd')}}";
                $.ajax({
                    url: url,
                    type: "post",
                    data: {nav_id: nav_id, nav_name: nav_name, nav_url: nav_url},
                    dataType: "json",
                    success: function (res) {
                        if (res.status == 200) {
                            alert(res.msg)
                            location.href = "/admin/nav/show"
                        } else {
                            alert(res.msg)
                        }
                    }
                })

        });
    });
</script>
