<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursecontController extends Controller
{
    // 渲染课程详情页面
    public function coursecont(){
        return view("index/course/cont");
    }
}
