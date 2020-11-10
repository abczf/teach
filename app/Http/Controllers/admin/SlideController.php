<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    //
    public function slide(){
    	return view('admin.slide.show');
    }
    public function add(){
    	return view('admin.slide.add');

	}
	public function store(Request $Request){
		echo 123;
	}


}