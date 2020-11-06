<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // 渲染注册视图
    public function register(){
        return view("index/register");
    }
}
