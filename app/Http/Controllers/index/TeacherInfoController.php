<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 讲师详情模板
 */
class TeacherInfoController extends Controller
{
    /**
     * 列表
     */
    public function show(){
    	return view('index.teacherInfo.show');
    }
}
