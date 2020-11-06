<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*
 * 目录详情
 */
class DetailController extends Controller
{
    # 详情
    public function info(){
    	return view('index.detail.info');
    }
}
