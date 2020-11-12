<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\NoticeModel as NoticeModel;
use App\models\CourseModel as CourseModel;

/*
课程公告
*/


class NoticeController extends Controller
{

	public function show()
    {
        $name = request()->name;
        $where = [];
        $where[] = ['is_del', '=', 1];
        if(!empty($name))
        {
            $where[] = ['notice_desc' , 'like' , "%$name%"];
        }

	    $data = NoticeModel::where($where)->paginate(2);
	    if(request()->ajax()){
            return view("admin/notice/ajaxshow",['data' => $data , 'name' => $name]);
        }
	    return view('admin.notice.show',['data' => $data , 'name' => $name]);


	}
	public function add()
    {
	    $data = CourseModel::all();
		return view('admin.notice.add',['data' => $data]);
	}

	public function create(Request $request)
    {
        $name = $request->all();
        $post = [
            "notice_desc" => $name['notice_desc'],
            "cou_id"      => $name['cou_name'],
            "add_time"    => time(),
            "is_del"      => 1,
        ];
        $res = NoticeModel::create($post);
        if(!empty($res)){
            return $this->json_cre(200 , '添加成功---' ,true);
        } else {
            return $this->json_cre(100 , '添加失败---' , false);
        }

    }

    public function json_cre($code,$msg,$succ)
    {
        return json_encode(['code' => $code, 'msg' => $msg, 'succ' => $succ]);
    }

    public function del(Request $request)
    {
        $id = $request->all();
        $data = NoticeModel::where($id)->update(['is_del' => 2]);
        if($data)
        {
            return $this->json_del(200 , '删除成功！');
        } else {
            return $this->json_del(100 , "删除失败！");
        }
    }

    public function json_del($code, $msg)
    {
        return json_encode(['code' => $code , 'msg' => $msg]);
    }

    public function upd(Request $request)
    {
        $id = $request->all();
        $data = NoticeModel::where('notice_id' , '=' , $id['id'])->first();
        $res  = CourseModel::all();
        return view("admin/notice/update",['data' => $data , 'res' => $res]);
    }

    public function update(Request $request)
    {
        $id = $request->all();
        $post = [
            'notice_desc' => $id['notice_desc'],
            'cou_id'      => $id['cou_name'],
            'add_time'    => time(),
        ];
        $data = NoticeModel::where('notice_id' , '=' , $id['notice_id'])->update($post);
        if($data == true){
            return $this->json_upd(200 , "修改成功");
        } else {
            return $this->json_upd(100 , "添加失败");
        }

    }

    public function json_upd($code,$msg)
    {
        return json_encode(['code' => $code , 'msg' => $msg]);
    }
}
