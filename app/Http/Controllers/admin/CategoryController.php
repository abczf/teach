<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/*
课程分类
*/
class CategoryController extends Controller
{
    //
    public function show(){
    	return view('admin.category.show');
    }

    public function add(){
    	return view('admin.category.add');
    }
}
