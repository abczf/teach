<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\RightModel;
use App\models\RoleModel;
use App\models\RolerightModel;
use Illuminate\Http\Request;

class RolerightController extends Controller
{
   public function add(Request $request){
        $arr =RoleModel::where('is_del',1)->get();
        $all =RightModel::where('is_del',1)->get();
       return view('admin.rbac.roleright.add',['arr'=>$arr,'all'=>$all]);
   }
   public function add_do(Request $request){
       $arr = $request->all();
//        var_dump($arr);die;
       $role_id = $arr['role_id'];
       $right_id = $arr['right_id'];


       $arr_str  = '';
       foreach ( $right_id as $v ){
           $arr_str .= $v.',';
       }
       $arr_str=trim($arr_str,',');
       $data = [];
       $data['role_id'] = $role_id;
       $data['right_id'] = $arr_str;
       $data['create_time'] = time();
       $data['is_del']=1;
       $bol = RolerightModel::insert($data);
       if ($bol) {
           $returnDate = [];

           $returnDate['success'] = true;
           $returnDate['url'] = "";
           $returnDate['msg'] = "";
           echo json_encode($returnDate);
           die;
       } else {
           $returnDate = [];
           $returnDate['success'] = false;
           $returnDate['url'] = '';
           $returnDate['msg'] = "系统出现问题";
           echo json_encode($returnDate);
           die;
       }
   }
   public function show(){
       $admin_role = RolerightModel::where('is_del',1)->get();
       foreach($admin_role as $v){
           $v->role_id=RoleModel::where('role_id',$v->role_id)->value('role_name');
           $v->right_id = trim($v->right_id,',');
           $v->right_id = explode(',',$v->right_id);
           $per=RightModel::whereIn('right_id',$v->right_id)->select(['right_name'])->get();
           $v->right_id =$per;
       }
       return view('/admin/rbac/roleright/show',['role_data'=>$admin_role]);
   }
    public function del(Request $request){
        $id=$request->role_right_id;
//        dd($id);
        $per=new RolerightModel;
        $del=$per::where('role_right_id',$id)->update(['is_del'=>2]);
        if($del){
            return ['code'=>200,'msg'=>'OK','data'=>[]];
        }else{
            return ['code'=>1000,'msg'=>'NO','data'=>[]];
        }
    }
    public function edit(Request $request){
        $arr = RoleModel::where("is_del",1)->get();
        $all = RightModel::where("is_del",1)->get();
        $id=$request->role_right_id;
        $info=RolerightModel::where('role_right_id',$id)->first();
        if(!$info){
            return ['code'=>1000,'msg'=>'缺少参数'];
        }
        $info->right_id = trim($info->right_id,',');
        $info->right_id = explode(',',$info->right_id);
        $per= RightModel::whereIn('right_id',$info->right_id)->select(['right_id'])->get();
        foreach ($per as $v1) {
            $arr2[]=$v1->right_id;
        }
        $info->right_id=$arr2;
        return view('/admin/rbac/roleright/update',['arr'=>$arr,'all'=>$all,'info'=>$info]);
    }
    public function edit2(Request $request){
        $data=$request->all();
        $right_id=$data['right_id'];
        $role_id=$data['role_id'];
//        print_r($role_id);die;
        $right_id2='';
        foreach ($right_id as $v) {
            $right_id2.=$v.',';
        }
        $data2['right_id']=$right_id2;
        $per=new RolerightModel;
        $up=$per::where('role_id',$role_id)->update($data2);
        if($up!==false){
            return ['code'=>200,'msg'=>'OK','data'=>[]];
        }else{
            return ['code'=>1000,'msg'=>'NO','data'=>[]];
        }
    }
}
