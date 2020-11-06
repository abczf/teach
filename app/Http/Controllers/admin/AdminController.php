<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//用户
class AdminController extends Controller
{
    public function show(){
        return view('admin.rbac.admin.show');
    }
    public function add(){
        return view('admin.rbac.admin.add');
    }
}
