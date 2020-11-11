<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\TeacherModel;

/**
 * 讲师模块
 */
class TeacherController extends Controller
{
    /**
     * 列表
     */
    public function show(){
        $teacher = TeacherModel::where(['is_del'=>1])->get();
    	return view('index.teacher.show',['teacher'=>$teacher]);
    }
}
