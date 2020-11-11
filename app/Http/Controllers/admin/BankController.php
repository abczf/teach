<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\BankModel;
use App\models\AnwserCateModel;
use App\models\CourseModel;
/*
题库模块
*/
class BankController extends Controller
{
    //题库展示
    public function show(Request $request){
        //搜索        
        $bank_title=request()->bank_title ? request()->bank_title : '';
        $where=[
            ['teach_bank.is_del','=',1]
        ];
        if(!empty($bank_title)){
          $where[]=['bank_title','like',"%$bank_title%"];
        }
        // dd($bank_title);
        $bank = BankModel::where($where)->paginate(3);
         foreach ($bank as $v) {
            $bank = BankModel::select('teach_bank.*', 'cou_name', 'bank_cate_name')
                ->leftjoin('teach_course', 'teach_bank.cou_id', '=', 'teach_course.cou_id')
                ->leftjoin('teach_bank_category', 'teach_bank.bank_cate_id', '=', 'teach_bank_category.bank_cate_id')
                ->where($where)
                ->paginate(3);
            foreach ($bank as $v) {
                $v->goods_img = explode(',', $v->goods_img);
            }
            // ajax分页
            if(request()->ajax()){
                return view('admin.bank.ajaxindex',['bank'=>$bank,'bank_title'=>$bank_title]);
            }
            return view('admin.bank.show',['bank'=>$bank,'bank_title'=>$bank_title]);
        }
         
    }


    //题库添加
    public function add(){
        // 查询课程id
        $course=CourseModel::where(['is_del'=>1])->get();
    	//查询题库分类
        $anwsercate=AnwserCateModel::where(['is_del'=>1])->get();
    	return view('admin.bank.add',['anwsercate'=>$anwsercate,'course'=>$course]);
    }

    // 添加执行
     public function store(Request $request){
        // dd(123);
        $data=request()->all();
        $data['add_time']=time();
        $data['is_del']=1;
        $info = BankModel::insert($data);
        // dd($info);
        if($info){
        $arr=[
            "success"=>200,
            "msg"=>"成功喽！",
            "url"=>"/admin/bank/show",
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
        // echo 123;die;
        $bank_id = $request->all();
        $res = BankModel::where($bank_id)->update(['is_del'=>2]);
        if($res){
            return $message=[
                "code"=>00002,
                "success"=>true,
            ];
        }
    }

    // 修改
    public function edit($bank_id){
        // 查询课程id
        $course=CourseModel::where(['is_del'=>1])->get();
        // dd($course);
        //查询题库分类
        $anwsercate=AnwserCateModel::where(['is_del'=>1])->get();
        $bank = BankModel::where('bank_id',$bank_id)->first();
        return view('admin.bank.edit',['bank'=>$bank,'anwsercate'=>$anwsercate,'course'=>$course]);
    }

    // 修改执行
    public function update(Request $request){
        $bank_id= request()->bank_id;
        $data = request()->except('bank_id');
        $info = BankModel::where('bank_id','=',$bank_id)->update($data);
       
         if($info!==false){
        $arr=[
            "success"=>200,
            "msg"=>"修改成功",
            "url"=>"/admin/bank/show",
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
