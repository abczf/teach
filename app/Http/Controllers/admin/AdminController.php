<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\AdminModel;
use Illuminate\Http\Request;
//用户
class AdminController extends Controller
{
    public function show(){
        $res = AdminModel::where("is_del",1)->paginate(2);
        return view('admin.rbac.admin.show',['data'=>$res]);
    }
    public function add(){
        return view('admin.rbac.admin.add');
    }
    public function add_do(){
        $res  =request()->all();
        $data = [
            'admin_name'=>$res['admin_name'],
            'password'=>md5($res['password']),
            "create_time"=>time(),
        ];
        if(empty($res['admin_name'])){
            return json_encode(['status'=>00001,'msg'=>'管理员名称不能为空']);
        }
        if(empty($res['password'])){
            return json_encode(['status'=>00002,'msg'=>'管理员密码不能为空']);
        }
        $res = AdminModel::insert($data);
        // dd($res);
        if($res){
            return json_encode(['success'=>true]);
        }
    }
    public function del(Request $request){
        $admin_id = $request->all();
//        dd($admin_id);
        $res = AdminModel::where("admin_id",$admin_id['admin_id'])->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00003,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
    // 修改
    public function upd(Request $request){
        $admin_id = $request -> all();
        $res = AdminModel::where('admin_id',$admin_id['admin_id'])->first();
        return view("admin.rbac.admin.update",['res'=>$res]);
    }
    public function upddo(){
        $admin_id= request()->admin_id;
        $ta = request()->all();
//        print_r($ta);die;
        $data = [
            'admin_name'=>$ta['admin_name'],
            "create_time"=>time(),
        ];


        $res =AdminModel::where("admin_id",$admin_id)->update($data);
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
