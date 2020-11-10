<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\PerssionModel;
use App\models\RightModel;
use App\models\RoleModel;
use App\models\RolepermissionModel;
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
}
