<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/*
课程目录
*/
class CataLogController extends Controller
{
    //
    public function show(){
    	return view('admin.catalog.show');
    }

    public function add(){
    	return view('admin.catalog.add');
    }
}
