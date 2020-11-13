<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\TeacherModel;
use App\models\CourseModel;

/**
 * 讲师模块
 */
class TeacherController extends Controller
{
    /**
     * 列表
     */
    public function show(){
        $course = TeacherModel::leftjoin('teach_course','teach_lect.lect_id','=','teach_course.lect_id')
            -> where(['teach_lect.is_del'=>1])
            -> get();
    	return view('index.teacher.show',['course'=>$course]);
    }
}
