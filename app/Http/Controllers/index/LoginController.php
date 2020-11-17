<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\UserModel;
use Illuminate\Support\Facades\Redis;

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
//         dd($data);
         if(empty($data)){
            return $this->json_en(100,"登录失败---");
        } else if(md5($user_pwd) != $data['user_pwd']){
           return $this->json_en(100,"登录失败---");
        }else {
//             session_start();
//             $user=$data->user_id;
//             session(['user_id'=>$user]);
//             $request->session()->save();
//             dd(session('user_id'));
             $redis=new Redis();
             $user=$data->user_id;
             $redis::setex('user_id',1800,$user);
           return $this->json_en(200,"登录成功---");
        }
    }
     public function json_en($sta,$msg){
        return json_encode(['status' => $sta, 'msg' => $msg]);
    }
}
