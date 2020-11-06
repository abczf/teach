<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 咨询模块
 */
class ConsultController extends Controller
{
    /**
     * 列表
     */
    public function show(){
        return view('admin.consult.show');
    }

    /**
     * 添加
     */
    public function create(){
        return view('admin.consult.create');
    }
}
