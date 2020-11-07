<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/*
题库模块
*/
class BankController extends Controller
{
    //
    public function show(){
    	return view('admin.bank.show');
    }

    //
    public function add(){
    	return view('admin.bank.add');
    }
}
