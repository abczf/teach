<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\LectModel;
/*
讲师管理
*/
class LectController extends Controller
{
    //图片
    public function img(){
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
    //展示
    public function show(){
        $lect = LectModel::where("is_del","1")->paginate(3);
        return view('admin.lect.show',["lect"=>$lect]);
    }
    //渲染
    public function add(){
        return view('admin.lect.add');
    }
    //添加
    public function addDo(){
        $name = request()->post();
        $LectModel = new LectModel();
        $LectModel->lect_name =$name["lect_name"];
        $LectModel->lect_style =$name["lect_style"];
        $LectModel->lect_img =$name["lect_img"];
        $LectModel->lect_resume =$name["lect_resume"];
        $LectModel->add_time =time();
        $data = $LectModel->save();
        if($data){
            return "/admin/lect/show";
        }
    }
    //删除
    public function del($id){
        $lect = LectModel::where("lect_id",$id)->update(["is_del"=>2]);
        if($lect){
            return redirect("/admin/lect/show");
        }
    }
    //编辑
    public function upd($id){
        $lect = LectModel::where("lect_id",$id)->first();
        return view("admin.lect.upd",["lect"=>$lect]);
    }
    //修改
    public function updDo($id){
        $name = request()->post();
//        dd($name);
        $data=[
            "lect_name" => $name["lect_name"],
            "lect_style" => $name["lect_style"],
            "lect_img" => $name["lect_img"],
            "lect_resume" => $name["lect_resume"],
            "add_time" => time(),
        ];
        $lect = LectModel::where("lect_id",$id)->update($data);
        if($lect){
            return "/admin/lect/show";
        }
    }
}
