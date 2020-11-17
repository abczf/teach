<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\BankModel;
use App\models\CourseModel;
/*
题库
*/

class BankController extends Controller
{
    //题库列表展示
    public function show(){
    	// 课程
    	$course = CourseModel::get();
    	 // 推荐课程
        $desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
    	// 题库
		$bank = BankModel::leftjoin('teach_course','teach_bank.cou_id','=','teach_course.cou_id')
            ->paginate(5);
        // dd($bank);
        return view('index.bank.show',['course'=>$course,'bank'=>$bank,'desc'=>$desc]);
    }

    // 试题详情页面
    public function bankinfo(Request $request){
    	$bank_id = $request->bank_id;
    	// 课程
    	$course = CourseModel::get();
    	 // 推荐课程
        $desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
    	// 题库
		$bank = BankModel::leftjoin('teach_course','teach_bank.cou_id','=','teach_course.cou_id')
            ->paginate(5);

        // 试题详情通过id传数据
        $bank1 = BankModel::leftjoin('teach_course','teach_bank.cou_id','=','teach_course.cou_id')
        	->where('bank_id',$bank_id)
            ->first();
            // dd($bank);
    	return view('index.bank.bankinfo',['course'=>$course,'desc'=>$desc,'bank'=>$bank,'bank1'=>$bank1]);
    }


    // php课程的试题
    public function php(){
    	$course = CourseModel::get();
    	$desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
		$bank = BankModel::leftjoin('teach_course','teach_bank.cou_id','=','teach_course.cou_id')
            ->paginate(5);
        $php = BankModel::where(['cou_id'=>1])->paginate(4);
    	return view('index.bank.php',['course'=>$course,'bank'=>$bank,'desc'=>$desc,'php'=>$php]);
    }

    // Java课程的试题
    public function java(){
    	$course = CourseModel::get();
    	// 推荐课程
    	$desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
		$bank = BankModel::leftjoin('teach_course','teach_bank.cou_id','=','teach_course.cou_id')
            ->paginate(5);
        $java = BankModel::where(['cou_id'=>2])->paginate(4);
    	return view('index.bank.java',['course'=>$course,'desc'=>$desc,'bank'=>$bank,'java'=>$java]);
    }

    // python课程的试题
    public function python(){
    	$course = CourseModel::get();
    	// 推荐课程
    	$desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
		$bank = BankModel::leftjoin('teach_course','teach_bank.cou_id','=','teach_course.cou_id')
            ->paginate(5);
        $python = BankModel::where(['cou_id'=>3])->paginate(4);
    	return view('index.bank.python',['course'=>$course,'desc'=>$desc,'bank'=>$bank,'python'=>$python]);
    }

    // C课程的试题
    public function c(){
    	$course = CourseModel::get();
    	// 推荐课程
    	$desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
		$bank = BankModel::leftjoin('teach_course','teach_bank.cou_id','=','teach_course.cou_id')
            ->paginate(5);
        $c = BankModel::where(['cou_id'=>5])->paginate(4);
    	return view('index.bank.c',['course'=>$course,'desc'=>$desc,'bank'=>$bank,'c'=>$c]);
    }

    // c++课程的试题
    public function cc(){
    	$course = CourseModel::get();
    	// 推荐课程
    	$desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
		$bank = BankModel::leftjoin('teach_course','teach_bank.cou_id','=','teach_course.cou_id')
            ->paginate(5);
        $cc = BankModel::where(['cou_id'=>6])->paginate(4);
    	return view('index.bank.cc',['course'=>$course,'desc'=>$desc,'bank'=>$bank,'cc'=>$cc]);
    }
}
