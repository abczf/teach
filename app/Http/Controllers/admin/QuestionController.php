<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//问答模块
class QuestionController extends Controller
{
  public function show(){
      return view('admin.question.show');
  }
}
