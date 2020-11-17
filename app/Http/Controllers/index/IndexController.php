<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\SlideModel;
use App\models\CateGoryModel;
use App\models\NavModel;
use App\models\CourseModel;

class IndexController extends Controller
{
    // 前台首页
    public function index(){
        $slide = SlideModel::get()->toArray();
        $data=CourseModel::where("is_del",1)->get();
        return view("index/index",['slide'=> $slide , 'data' => $data]);

    }

}

