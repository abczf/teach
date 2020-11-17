<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CourseModel;

/**
 * 视频模板
 */
class VideoController extends Controller
{
    # 列表
    public function show(){

        $data = CourseModel::where('is_del',1)->first();
//        dd($data);
    	return view('index.video.show',['data' => $data]);
    }
}
