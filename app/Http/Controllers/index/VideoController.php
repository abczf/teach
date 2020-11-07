<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 视频模板
 */
class VideoController extends Controller
{
    # 列表
    public function show(){
    	return view('index.video.show');
    }
}
