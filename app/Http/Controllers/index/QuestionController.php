<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\QuesTionsModel;
use App\models\ResponseModel;
use Illuminate\Http\Request;
//问答模块
class QuestionController extends Controller
{
    public function add(){
        $question = QuesTionsModel::paginate(9);
//        dd($question);
        $que = QuesTionsModel::limit(5)->get();
//        dd($question);
        return view('index.question.add',['question'=>$question,'que'=>$que]);
    }
    public function response(Request $request){
        $q_id = $request->q_id;
        $arr = QuesTionsModel::get();
        $que = QuesTionsModel::limit(5)->get();
//        dd($arr);
       $response = ResponseModel::leftjoin('teach_questions','teach_response.q_id','=','teach_questions.q_id')
           ->where('teach_response.q_id',$q_id)->get();
//       dd($response);
        return view('index.question.response',['response'=>$response,'arr'=>$arr,'q_id'=>$q_id,'que'=>$que]);
    }





}
