<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/*
课程管理
*/
class CourseController extends Controller
{
    //
    public function show(){
    	return view('admin.course.course');
    }

    public function add(){
    	return view('admin.course.add');
    }
}
