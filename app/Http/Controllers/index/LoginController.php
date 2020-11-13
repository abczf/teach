<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\UserModel; 
class LoginController extends Controller
{
    //渲染登录页面
    public function login(){
        return view("index/login");
    }

    public function LoginDo(Request $request){
    	$user_name = $request->post('user_name');
        $user_pwd  = $request->post('user_pwd');
        $where = [
            ['user_name', '=', $user_name]
        ];
        $data = UserModel::where($where)->first();
        // dd($data);
         if(empty($data)){
            return $this->json_en(100,"登录失败---");
        } else if(md5($user_pwd) != $data['user_pwd']){
           return $this->json_en(100,"登录失败---");
        }else {
            session(['user_id' => $data->user_id]);
            session(['user_name' => $data->user_name]);
            $request->session()->save();
           return $this->json_en(200,"登录成功---");
        }
    }
     public function json_en($sta,$msg){
        return json_encode(['status' => $sta, 'msg' => $msg]);
    }
}
