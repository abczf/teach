<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//用户角色
class AdminroleController extends Controller
{
   public function add(){
       return view('admin.rbac.adminrole.add');
   }
}
