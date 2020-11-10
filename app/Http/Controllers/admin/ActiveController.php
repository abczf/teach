<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ActiveModel;
/*
精彩活动
*/

class ActiveController extends Controller
{
    // 展示 
	public function show(Request $request){
        //搜索        
        $act_title=request()->act_title ? request()->act_title : '';
        $where=[
            ['is_del','=',1]
        ];
        if(!empty($act_title)){
          $where[]=['act_title','like',"%$act_title%"];
        }
		$where =[
			['is_del','=',1]
		];
		$active = ActiveModel::where($where)->paginate(3);
        // ajax分页
        if(request()->ajax()){
             return view('admin.active.ajaxindex',['active'=>$active,'act_title'=>$act_title]);
        }
		return view('admin.active.show',['active'=>$active,'act_title'=>$act_title]);
	}

	// 添加页面
	public function add(){
		return view('admin.active.add');
	}

	// 添加执行
	 public function store(Request $request){
        // dd(123);
        $data=request()->all();
        // dd($data);
        $data['add_time']=time();
        $data['is_del']=1;
        $info = ActiveModel::insert($data);
        // dd($info);
        if($info){
        $arr=[
            "success"=>200,
            "msg"=>"成功喽！",
            "url"=>"/admin/active/show",
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
    //删除
    public function Fdel(Request $request){
    	// echo 123;die;
    	$act_id = $request->all();
    	$res = ActiveModel::where($act_id)->update(['is_del'=>2]);
    	if($res){
    		return $message=[
    			"code"=>00002,
                "success"=>true,
    		];
    	}
    }

    // 修改页面
    public function edit($act_id){
        $active = ActiveModel::where('act_id',$act_id)->first();
    	return view('admin.active.edit',['active'=>$active]);
    }

    // 修改执行
    public function update(Request $request){
    	$act_id= request()->act_id;
        $data = request()->except('act_id');
        $info = ActiveModel::where('act_id','=',$act_id)->update($data);
       
         if($info!==false){
        $arr=[
            "success"=>200,
            "msg"=>"修改成功",
            "url"=>"/admin/active/show",
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
