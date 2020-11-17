<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\models\PaperModel;
use App\models\BankModel;
use App\models\ExamModel;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function show(){
        $exam = PaperModel::leftjoin('teach_exam','teach_paper.exam_id','=','teach_exam.exam_id')->where(['teach_paper.is_del'=>1])->get();
        return view('admin.exam.show',['exam'=>$exam]);
    }

    //考试的题库
    public function info($id){
        $exam_info=PaperModel::where(['exam_id'=>$id,'is_del'=>1])->first();
        $bank_id=explode(',',$exam_info->bank_id);
        //空数组 存储题库数据
        $bank_info=[];
        //查询当前考试的题库
        foreach($bank_id as $k=>$v){
            $bank_info[]=BankModel::where(['bank_id'=>$v,'is_del'=>1])->value('bank_id');
        }
        $bank=BankModel::where('is_del','1')->paginate(10);
        //渲染视图
        return view('admin/exam/info',compact('bank','bank_info','id'));
    }
    public function exam_add(){
        return view('admin.exam.examadd');
    }
    public function exam_add_do(){
        $data = request()->all();
//        dd($data);
        $post = [
            'exam_name' => $data['exam_name'],
            'create_time' =>time()+10,
            'over_time' => time()+3600,
            'add_time' => time()
        ];
        $res = ExamModel::insert($post);
        if($res){
            $arr = [
                "status" => 200,
                "msg"     => "添加成功",
            ];
        } else {
            $arr = [
                "status" => 100,
                "msg"     => "添加失败",
            ];
        }
        return json_encode($arr);

    }
    public function add(){
        //查询考试表
        $exam=ExamModel::where(['is_del'=>1])->get();
        return view('admin.exam.add',['exam'=>$exam]);
    }
    public function add_do(){
        // dd(123);
        $data=request()->all();
//        dd($data);
        $data['add_time']=time();
        $data['is_del']=1;
        $info = PaperModel::insert($data);
//         dd($info);
        if($info){
            $arr=[
                "success"=>200,
                "msg"=>"添加成功！",
                "url"=>"/admin/exam/show",
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
    public function del(Request $request){
        $post = $request -> all();
        $paper = PaperModel::where('paper_id',$post['paper_id'])->update(['is_del'=>2]);
        if($paper){
            return json_encode(['status'=>200,'msg'=>"OK"]);
        }
    }
    public function edit(Request $request){
        $post = $request -> all();
        $exam =ExamModel::where('is_del',1)->get();
        $paper = PaperModel::where('paper_id',$post['paper_id'])->first();
        return view('admin.exam.update',['exam'=>$exam,'paper'=>$paper]);
    }
    public function update(Request $request){
        $post = $request -> all();

        $data = [
            'parper_num' => $post['parper_num'],
            'exam_id' => $post['exam_id']
        ];
        $paper = PaperModel::where('paper_id',$post['paper_id']) -> update($data);

        if($paper){
           return json_encode(["success"=>200,"msg"=>"修改成功"]);
        }else{
            return json_encode(["success"=>1,"msg"=>"修改修改"]);
        }
    }
}
