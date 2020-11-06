<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //渲染登录页面
    public function login(){
        return view("index/login");
    }
}
