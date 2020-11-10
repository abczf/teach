<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\NavModel;

class NavController extends Controller
{
    public function show(){
        $model = new NavModel();
        $data = $model->all();
        return view ('admin.nav.show',['data'=>$data]);
    }
    public function add(){
        return view('admin.nav.add');
    }

    public function create(Request $request){
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
}
