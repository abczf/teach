<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 资讯详情
 */
class ConsultInfoController extends Controller
{
    # 展示
    public function show(){
    	return view('index.consultInfo.show');
    }
}
