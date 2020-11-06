<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/*
目录详情
*/
class CataLogInfoController extends Controller
{
    //
    public function show(){
    	return view('admin.cataloginfo.show');
    }

    public function add(){
    	return view('admin.cataloginfo.add');
    }
}
