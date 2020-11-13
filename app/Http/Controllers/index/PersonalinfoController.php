<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalinfoController extends Controller
{
    public function show(){
        return view('index.personal.userinfo.show');
    }
    
}
