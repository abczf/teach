<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CodeModel;
use App\models\UserModel;

/**
 * 注册模块
 */
class RegisterController extends Controller
{
    /**
     * 注册
     */
    public function register(){
        return view("index/register");
    }

    /**
     * 执行注册
     */
    public function save(Request $request){
        $post = $request -> all();
        $user = UserModel::where('user_name',$post['user_name'])->first();
        if($user){
            return [
                'status' => 000001,
                'msg' => '用户名已存在'
            ];
        }
        if($post['user_pwd'] != $post['user_repwd']){
            return [
                'status' => 000001,
                'msg' => '两次密码不一致'
            ];
        }

        $code = CodeModel::where('code',$post['code'])->first();
        if(time()-$code['over_time']>=0){
            return [
                'status' => 10001,
                'msg' => '验证码已过期'
            ];
        }else{
            $data = [
                'user_name' => $post['user_name'],
                'user_pwd' => md5($post['user_pwd']),
                'add_time' => time()
            ];
            $obj = UserModel::create($data);
            if($obj){
                return [
                    'status' => 000000,
                    'msg' => '注册成功'
                ];
            }
        }
    }

    /**
     * 验证码
     */
    public function sendSmsCode(Request $request){
        $user_tel = $request -> user_tel;
        if(empty($user_tel)){
            return [
                'status' => 10001,
                'msg' => '手机号不能为空'
            ];
        }elseif(strlen($user_tel)!=11){
            return [
                'status' => 10001,
                'msg' => '手机号必须为11位'
            ];
        }elseif(is_numeric($user_tel) == false){
            return [
                'status' => 10001,
                'msg' => '手机号必须为数字'
            ];
        }

        $str = CodeModel::where('user_tel',$user_tel)->first();
        if($str){
            return [
                'status' => 10001,
                'msg' => '手机号已存在'
            ];
        }

        $rand_code = rand(100000,999999);
//        dd($rand_code);
        # 调用短信验证码接口
        $code = $this -> code($user_tel,$rand_code);
        if($code != true){
            return [
                'status' => 000001,
                'msg' => '验证码发送失败'
            ];
        }

        $data = [
            'user_tel' => $user_tel,
            'code' => $rand_code,
            'add_time' => time(),
            'over_time' => time()+60
        ];
        $obj = CodeModel::create($data);
        if($obj['code'] == $rand_code){
            return [
                'status' => 000000,
                'msg' => '验证码发送成功'
            ];
        }
    }

    /**
     * 短信验证码接口
     */
    public function code($user_tel,$rand_code){
        return true;
        $host = "http://dingxin.market.alicloudapi.com";
        $path = "/dx/sendSms";
        $method = "POST";
        $appcode = "4bb24886c9b045bb8e3c67cf2f875ee0";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "mobile=".$user_tel."&param=code%3A".$rand_code."&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        $curl_result = curl_exec($curl);
//        dump($curl_result);
        $curl_arr = json_decode( $curl_result , true );
//        dd($curl_arr);
        if( !empty( $curl_arr ) && $curl_arr['return_code'] == '00000' ){
            return true;
        }else{
            return false;
        }
    }
}
