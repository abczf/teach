<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//问答模块
class QuestionController extends Controller
{
    public function add(){
        return view('index.question.add');
    }
}
