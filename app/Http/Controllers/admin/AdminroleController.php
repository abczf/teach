<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\AdminModel;
use App\models\AdminroleModel;
use App\models\RoleModel;
use Illuminate\Http\Request;
//用户角色
class AdminroleController extends Controller
{
   public function add(Request $request,$id){
       $admin =new AdminroleModel;
        $arr = AdminModel::where(['is_del'=>1,'admin_id'=>$id])->first();
        $all =RoleModel::where('is_del',1)->get();
        $where = [
            ['is_del','=',1],
            ['admin_id','=',$id]
        ];
        $obj =$admin::orderBy('create_time','desc')->where($where)->first();
       $role=[];
       if(!empty($obj)){
           $role_id=trim($obj->role_id,',');
           $role=explode(',',$role_id);
       }
       return view('admin.rbac.adminrole.add',['arr'=>$arr,'all'=>$all,'role'=>$role]);
   }
   public function add_do(Request $request){
       $arr = $request->all();
       $admin_id = $arr['admin_id'];
//       var_dump($admin_id);die;
       $role_id = $arr['role_id'];

       $arr  = '';
       foreach ( $role_id as $v ){
           $arr .= $v.',';
       }
       $arr=trim($arr,',');
       $data = [];
       $data['admin_id'] = $admin_id;
       $data['role_id'] = $arr;
       $data['is_del']=1;
       $data['create_time'] = time();
       $bol = AdminroleModel::insert($data);
       if ($bol) {
           $returnDate = [];
           $returnDate['success'] = true;
           $returnDate['url'] = "/";
           $returnDate['msg'] = "添加成功";
           return json_encode($returnDate);
       } else {
           $returnDate = [];
           $returnDate['success'] = false;
           $returnDate['url'] = '';
           $returnDate['msg'] = "系统出现问题";
           return json_encode($returnDate);
       }
   }
}
