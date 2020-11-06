<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//权限控制器
class RightController extends Controller
{
    public function show(){
        return view('admin/rbac/right/show');
    }
    public function add(){
        return view('admin/rbac/right/add');
    }
}
