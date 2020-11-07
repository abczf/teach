<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 资讯模块
 */
class ConsultController extends Controller
{
    /**
     * 展示
     */
    public function show(){
        return view('index.consult.show');
    }
}
