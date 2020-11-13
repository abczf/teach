<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\LoginModel; 

class LoginController extends Controller
{
    public function login(){
    	return view('admin.login');
    }

    public function Do(Request $request){
        $name = $request->post('name');
        $pwd  = $request->post('pwd');
        $where = [
            ['admin_name', '=', $name]
        ];
        $model = new LoginModel();
        $data  = $model->where($where)->first();

        if(empty($data)){
            return $this->json_en(100,"登录失败---");
        } else if(md5($pwd) != $data['password']){
           return $this->json_en(100,"登录失败---");
        }else {
            session(['admin_id' => $data->admin_id]);
            session(['admin_name' => $data->admin_name]);
            $request->session()->save();
           return $this->json_en(200,"登录成功---");
        }

    }
    public function json_en($sta,$msg){
        return json_encode(['status' => $sta, 'msg' => $msg]);
    }
}
