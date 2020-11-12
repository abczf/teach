<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function show(){
        return view('admin.exam.show');
    }
    public function add(){

    }
}
