<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\NavModel;

class NavController extends Controller
{
    public function show(){
        $model = new NavModel();
        $data = $model->all();
        return view ('admin.nav.show',['data'=>$data]);
    }
    public function add(){
        return view('admin.nav.add');
    }
}
