<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CourseModel;

/**
 * 课程模块
 */
class CoursecontController extends Controller
{
    /**
     * 详情
     */
    public function coursecont(){
        $course = CourseModel::leftjoin('teach_lect','teach_course.lect_id','=','teach_lect.lect_id')->get();
//        dd($course);
        return view("index/course/cont",['course'=>$course]);
    }
}
