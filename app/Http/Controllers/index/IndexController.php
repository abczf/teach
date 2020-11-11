<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 前台首页
    public function index(){
        return view("index/index");
    }
    public function show(){

    }
}
