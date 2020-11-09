<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\RightModel;
//权限控制器
class RightController extends Controller
{
    public function show(){
        return view('admin/rbac/right/show');
    }
    public function add(){
        return view('admin/rbac/right/add');
    }
    public function add_do(Request $request)
    {
        $res = $request->all();
        $data = [
            'right_name' => $res['right_name'],
            'right_url' => $res['right_url'],
            "create_time" => time(),
        ];
        if (empty($res['right_name'])) {
            return json_encode(['status' => 00001, 'msg' => '权限名称不能为空']);
        }
        if (empty($res['right_url'])) {
            return json_encode(['status' => 00002, 'msg' => '权限路径不能为空']);
        }

        $res = RightModel::insert($data);
        if($res) {
            return json_encode(['success' => true]);
        }
    }
}
