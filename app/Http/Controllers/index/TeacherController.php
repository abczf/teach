<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 讲师模块
 */
class TeacherController extends Controller
{
    /**
     * 列表
     */
    public function show(){
    	return view('index.teacher.show');
    }
}
