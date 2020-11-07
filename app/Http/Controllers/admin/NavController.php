<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function show(){
        return view ('admin.nav.show');
    }
    public function add(){
        return view('admin.nav.add');
    }
}
