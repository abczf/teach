<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\SlideModel;
use App\models\CateGoryModel;

class IndexController extends Controller
{
    // 前台首页
    public function index(){
        $slide = SlideModel::get()->toArray();
        return view("index/index",['slide'=> $slide]);
    }
    public function show(){

    }
}

