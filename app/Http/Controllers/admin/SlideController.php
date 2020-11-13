<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\SlideModel;
class SlideController extends Controller
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
    public function slide(){
        $slide = SlideModel::where("is_del","1")->paginate(3);
        if(request()->ajax()){
            return view("admin.slide.showajax",["slide"=>$slide]);
        }
    	return view('admin.slide.show',["slide"=>$slide]);
    }
    //渲染
    public function add(){
    	return view('admin.slide.add');
    }
    //添加
    public function addDo(){
        $name = request()->post();
        $SlideModel = new SlideModel();
        $SlideModel->slide_url =$name["slide_url"];
        $SlideModel->slide_weight =$name["slide_weight"];
        $SlideModel->slide_img =$name["slide_img"];
        $SlideModel->add_time =time();
        $data = $SlideModel->save();
        if($data){
            return "/admin/slide/slide";
        }
    }
    //删除
    public function del($id){
        $slide = SlideModel::where("slide_id",$id)->update(["is_del"=>2]);
        if($slide){
            return redirect("/admin/slide/slide");
        }
    }
    //编辑
    public function upd($id){
        $slide = SlideModel::where("slide_id",$id)->first();
        return view("admin.slide.upd",["slide"=>$slide]);
    }
    //修改
    public function updDo($id){
        $name = request()->post();
        $data=[
            "slide_url" => $name["slide_url"],
            "slide_weight" => $name["slide_weight"],
            "slide_img" => $name["slide_img"],
            "add_time" => time(),
        ];
        $slide = SlideModel::where("slide_id",$id)->update($data);
        if($slide){
            return "/admin/slide/slide";
        }
    }
}
