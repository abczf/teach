<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\NavModel;

class NavController extends Controller
{
    public function show()
    {
        $name=request()->name;
        $where=[];
        $where[] = ['is_del','=',1];
        if(!empty($name)){
            $where[]=['nav_name','like',"%$name%"];
        }
        $model = new NavModel();
        $res = $model->where($where)->paginate(2);

        if(request()->ajax()){
            return view("admin.nav.showajax",["data"=>$res,"name"=>$name]);
        }
        return view('admin.nav.show',['data'=>$res,"name"=>$name]);
    }
    public function add(){
        return view('admin.nav.add');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $post = [
            'nav_name' => $data['name'],
            'nav_url' => $data['url'],
            'is_del' => 1,
            'add_time' => time()
        ];
        $model = new NavModel();
        $res = $model->create($post);
        if($res){
            $arr = [
                "status" => 200,
                "msg"     => "添加成功",
            ];
        } else {
            $arr = [
                "status" => 100,
                "msg"     => "添加失败",
            ];
        }
        return json_encode($arr);

    }

    public function edit(Request $request)
    {
        $id = $request->all();
        $model = new NavModel();
        $data = $model->where($id)->update(['is_del'=>2]);
        if($data){
            $res = [
                'code' => 200,
                'msg'  => "删除成功",
                'success' => true,
            ];
        }
        return json_encode($res);
    }

    public function update(Request $request)
    {
        $post = $request -> all();
        $data = NavModel::where('nav_id', '=', $post['nav_id'])->first();
        return view("admin/nav/update",['data'=>$data]);
    }

    public function upd(Request $request)
    {
        $id = request()->all();
        $data = [
            'nav_name' => $id['nav_name'],
            'nav_url'  => $id['nav_url'],
            'add_time' => time(),
        ];

        $model = NavModel::where('nav_id',$id['nav_id'])->update($data);
        if($model == true){
            $arr = [
                'status' => 200,
                'msg'    => "修改成功",
                'success'=> true,
            ];
        } else {
            $arr = [
                'status' => 100,
                'msg'    => "修改失败",
                'success'=> true,
            ];
        }
        return json_encode($arr);
    }
}
