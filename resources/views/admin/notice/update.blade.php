<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑公告</title>

</head>
<body>
<center>
    <h1>编辑公告</h1>
</center>
<div class="form-horizontal">
    <div class="form-group">
        <input type="hidden" value="{{$data['notice_id']}}" name="notice_id">
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">课程公告内容</label>
        <div class="col-sm-10">
            <input class="form-control" id="notice_desc" name="notice_desc" type="text" value="{{$data['notice_desc']}}"  placeholder="请输入课程公告内容...">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">课程ID</label>
        <div class="col-sm-10">

            <select class="form-control" name="cou_name">

                <option value="">---请选择---</option>
                @foreach($res as $k => $v)
                    <option value="{{$v['cou_id']}}" @if($v['cou_id'] == $data['cou_id']) selected @endif>{{$v['cou_name']}}</option>
                @endforeach
            </select>

        </div>
    </div>


    <div>
        <center>
            <p>
                <button type="button" class="btn btn-primary btn-lg">编辑内容</button>
                <button type="button" class="btn-default btn-lg"><a href="/admin/notice/show">返回列表</a></button>
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
            data.notice_id   = $("input[name = 'notice_id']").val();
            data.notice_desc = $("input[name = 'notice_desc']").val();
            data.cou_name    = $("select[name = 'cou_name']").val();
            if(data.notice_desc == ''){
                alert("请输入公告内容");
                return false;
            }
            var url = "update";
            $.ajax({
                url  : url,
                type : "post",
                data : data,
                dataType : "json",
                success:function(res){
                    if(res.code == 200){
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
