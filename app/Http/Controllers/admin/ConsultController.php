<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ConsultModel;
/**
 * 咨询模块
 */
class ConsultController extends Controller
{
    /**
     * 列表
     */
    public function show(Request $request){
        //搜索        
        $infor_title=request()->infor_title ? request()->infor_title : '';
        $where=[
            ['is_del','=',1]
        ];
        if(!empty($infor_title)){
          $where[]=['infor_title','like',"%$infor_title%"];
        }

        $consult = ConsultModel::where($where)->paginate(8);
        // dd($consult);
        // ajax分页
        if(request()->ajax()){
             return view('admin.consult.ajaxindex',['consult'=>$consult,'infor_title'=>$infor_title]);
        }
        return view('admin.consult.show',['consult'=>$consult,'infor_title'=>$infor_title]);
    }

    /**
     * 添加
     */
    public function create(){
        return view('admin.consult.create');
    }

    /*
    执行添加
    */
    public function store(Request $request){
        // dd(123);
        $data=request()->all();
        // dd($data);
        $data['add_time']=time();
        $data['is_del']=1;
        $info = ConsultModel::insert($data);
        // dd($info);
        if($info){
        $arr=[
            "success"=>200,
            "msg"=>"成功喽！",
            "url"=>"/admin/consult/show",
        ];
      }else{
        $arr=[
            "success"=>1000,
            "msg"=>"添加失败",
            "url"=>"",
        ];
      }
      echo json_encode($arr);
    }

    // 删除
    public function Fdel(Request $request){
        $infor_id = $request->all();
        // dd($infor_id);
        $res = ConsultModel::where($infor_id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00002,
                
                "success"=>true,
            ];
        }
    }

    // 修改
    public function edit($infor_id){
        $consult=ConsultModel::where('infor_id',$infor_id)->first();
        return view('admin.consult.edit',['consult'=>$consult]);
    }

    //执行修改
    public function update(Request $request){
        $infor_id= request()->infor_id;
        $data = request()->except('infor_id');
        $info = ConsultModel::where('infor_id','=',$infor_id)->update($data);
        // $foot_name = request()->post('foot_name');
         if($info!==false){
        $arr=[
            "success"=>200,
            "msg"=>"修改成功",
            "url"=>"/admin/consult/show",
        ];
      }else{
        $arr=[
            "success"=>1000,
            "msg"=>"修改失败",
            "url"=>"",
        ];
      }
      echo json_encode($arr);
}


}