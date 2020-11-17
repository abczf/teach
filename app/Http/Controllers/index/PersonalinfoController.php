<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\UserinfoModel;
use App\models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
class PersonalinfoController extends Controller
{
    public function add(){
        return view('index.personal.userinfo.add');
    }
    public function add_do(Request $request)
    {
//        echo 123;die;
        $redis=new Redis();
        $user_id = $redis::get('user_id');
        $post = $request->all();
//        dd($post);
        $user = UserinfoModel::where('details_name',$post['details_name'])->first();
        if($user){
            return ['status'=>'000001','msg'=>'该用户名已存在'];
        }
        $data = [
            'details_name' => $post['details_name'],
            'details_sex' => $post['details_sex'],
            'details_age' => $post['details_age'],
            'details_head' => $post['details_head'],
            'add_time' => time(),
            'user_id' => $user_id
        ];
        $res = UserinfoModel::insert($data);
        if ($res) {
            return "/index/personal/personalinfo/add";
        }
    }

    public function addimg(Request $request){
//        $a=$request->sess;
//        session_start();
//        $as=$request->sess;
//        dd($a);
        //接参数
        $fileCharater = $_FILES["Filedata"];
        //赋变量
        $name =  $fileCharater["tmp_name"];
        //截取后缀名
        $ext = explode('.',$fileCharater["name"])[1];
        //重新赋变量
        $newfileName = MD5(time()).".".$ext;
        //拼接
        $newfilePath = "uploads/".$newfileName;
        // 函数将上传的文件移动到新位置
        move_uploaded_file($name,$newfilePath);
        //返回参数
        echo $newfilePath;
    }
    //修改页面
    public function update(){
//         echo 123;die;
        $redis=new Redis();
        $user_id = $redis::get('user_id');
        $a = $redis::flushall();
//        dd($user_id);
        $myinfo = UserinfoModel::where(['user_id'=>$a])->first();
        if(!empty($myinfo)){
            return view('index.personal.userinfo.update',['myinfo'=>$myinfo]);
        }

    }
    //执行修改
    public function doupdate(Request $request){
        $id= request()->details_id;
        $post = $request->all();
//        dd($post);
        $data = [
            'details_name' => $post['details_name'],
            'details_sex' => $post['details_sex'],
            'details_head' => $post['details_head'],
            'details_age' => $post['details_age'],
        ];

//        dd($data);
        $res = UserinfoModel::where('details_id',$id)->update($data);
        if ($res!==false) {
            return "/index/personal/personalinfo/show";
        }
    }

}
