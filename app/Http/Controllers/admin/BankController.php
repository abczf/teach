<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/*
题库模块
*/
class BankController extends Controller
{
    //题库展示
    public function show(){
    	return view('admin.bank.show');
    }

    //题库添加
    public function add(){
    	return view('admin.bank.add');
    }

    // 添加执行
    public function store(Request $request){
    	
    }
}
