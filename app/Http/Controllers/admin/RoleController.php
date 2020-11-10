<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\AdminModel;
use Illuminate\Http\Request;
use App\models\RoleModel;
class RoleController extends Controller
{
    public function show(){
        $res = RoleModel::where("is_del",1)->paginate(2);
        return view('admin/rbac/role/show',['data'=>$res]);
    }
    public function add(){
        return view('admin/rbac/role/add');
    }
    public function add_do(){
        $res  =request()->all();
        $data = [
            'role_name'=>$res['role_name'],
            "create_time"=>time(),
        ];
        if(empty($res['role_name'])){
            return json_encode(['status'=>00001,'msg'=>'管理员名称不能为空']);
        }
        $res = RoleModel::insert($data);
        // dd($res);
        if($res){
            return json_encode(['success'=>true]);
        }
    }
    public function del(Request $request){
        $role_id = $request->all();
//        dd($role_id);
        $res = RoleModel::where("role_id",$role_id['role_id'])->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00003,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
    public function upd(Request $request){
        $res = $request ->all();
        $data = RoleModel::where('role_id',$res['role_id'])->first();
        return view("admin.rbac.role.update",['res'=>$data]);
    }
    public function upd_do(){
        $role_id= request()->role_id;
        $ta = request()->all();
//        print_r($ta);die;
        $data = [
            'role_name'=>$ta['role_name'],
            "create_time"=>time(),
        ];
        $res =RoleModel::where("role_id",$role_id)->update($data);
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
