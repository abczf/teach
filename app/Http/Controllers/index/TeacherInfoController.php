<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\CourseModel;
use App\models\TeacherModel;
use Illuminate\Http\Request;

/**
 * 讲师详情模板
 */
class TeacherInfoController extends Controller
{
    /**
     * 列表
     */
    public function show(Request $request){
        $post = $request -> all();
        $course = TeacherModel::leftjoin('teach_course','teach_lect.lect_id','=','teach_course.lect_id')
            -> where(['teach_lect.is_del'=>1,'teach_course.lect_id'=>$post['lect_id']])
            -> first();
//dd($course);
        $data = CourseModel::leftjoin('teach_lect','teach_course.lect_id','=','teach_lect.lect_id')
            -> leftjoin('teach_catalog','teach_course.catalog_id','=','teach_catalog.catalog_id')
            -> where(['teach_course.is_del'=>1,'teach_course.lect_id'=>$post['lect_id']])
            -> get();
//        dd($data);
    	return view('index.teacherInfo.show',['course'=>$course,'data'=>$data]);
    }
}
