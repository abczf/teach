<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourselistController extends Controller
{
    // 渲染课程列表页面
    public function courselist(){
        return view("index/course/list");
    }
}
