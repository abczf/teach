<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\NavModel;

class IndexController extends Controller
{
    // 前台首页
    public function index(){
        $nav=NavModel::where("is_del",1)->get();
        return view("index/index");
    }
}
