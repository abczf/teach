<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show(){
        return view('admin/rbac/role/show');
    }
    public function add(){
        return view('admin/rbac/role/add');
    }
}
