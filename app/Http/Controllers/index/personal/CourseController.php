<?php

namespace App\Http\Controllers\index\personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 个人中心 (课程)
 */
class CourseController extends Controller
{
    # 课程展示
    public function show(){
        return view('index.personal.course.show');
    }
}
