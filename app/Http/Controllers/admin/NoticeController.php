<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*
课程公告
*/


class NoticeController extends Controller
{
    //
	public function show(){
		return view('admin.notice.show');
	}
	public function add(){
		return view('admin.notice.add');
	}
}
