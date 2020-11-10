<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AnwserCateModel;
/*
题库分类
*/

class AnwserCateController extends Controller
{
    //
	public function show(){
		$where = [
			['is_del','=',1]
		];
		$anwsercate = AnwserCateModel::where($where)->get();
		return view('admin.anwsercate.show',['anwsercate'=>$anwsercate]);
	}

	public function add(){
		return view('admin.anwsercate.add');
	}

	public function store(Request $request){
		$data=request()->all();
        // dd($data);
        $data['add_time']=time();
        $data['is_del']=1;
        $info = AnwserCateModel::insert($data);
        // dd($info);
        if($info){
        $arr=[
            "success"=>200,
            "msg"=>"成功喽！",
            "url"=>"/admin/anwsercate/show",
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

	public function Fdel(Request $request){
		$bank_cate_id = $request->all();
		$res = AnwserCateModel::where($bank_cate_id)->update(['is_del'=>2]);
		  if($res){
            return $message = [
                "code"=>00002,             
                "success"=>true,
            ];
        }
	}

	// 修改
	public function edit($bank_cate_id){
		$anwsercate = AnwserCateModel::where('bank_cate_id',$bank_cate_id)->first();
		return view('admin.anwsercate.edit',['anwsercate'=>$anwsercate]);
	}


    // 修改执行
    public function update(Request $request){
    	$bank_cate_id= request()->bank_cate_id;
        $data = request()->except('bank_cate_id');
        $info = AnwserCateModel::where('bank_cate_id','=',$bank_cate_id)->update($data);
       
         if($info!==false){
        $arr=[
            "success"=>200,
            "msg"=>"修改成功",
            "url"=>"/admin/anwsercate/show",
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
