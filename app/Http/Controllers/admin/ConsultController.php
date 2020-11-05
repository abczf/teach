<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 咨询模块
 */
class ConsultController extends Controller
{
    public function show(){
        return view('admin.consult.show');
    }
}
