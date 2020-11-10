<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\RoleModel;
use Illuminate\Http\Request;
use App\models\RightModel;
//权限控制器
class RightController extends Controller
{
    public function show(){
        $res = RightModel::where("is_del",1)->paginate(2);
        return view('admin/rbac/right/show',['data'=>$res]);
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
    public function del(Request $request){
        $right_id = $request->all();
//        dd($role_id);
        $res = RightModel::where("right_id",$right_id['right_id'])->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00003,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
    public function upd(Request $request){
        $res = $request->all();
//        dd($res);
        $data = RightModel::where('right_id',$res['right_id'])->first();
        return view("admin.rbac.right.update",['res'=>$data]);
    }
    public function upd_do(){
        $right_id= request()->right_id;
        $ta = request()->all();
//        print_r($ta);die;
        $data = [
            'right_name'=>$ta['right_name'],
            "create_time"=>time(),
        ];
        $res =RightModel::where("right_id",$right_id)->update($data);
//        print_r($res);die;
//        状态码未修改是0，修改了是0
        if($res){
            return json_encode(['success'=>true]);
        }
        if($res==0){
            return json_encode(['success'=>false]);
        }

    }
}
