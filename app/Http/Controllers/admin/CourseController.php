<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\LectModel;
use App\models\CateLogModel;
use App\models\CateGoryModel;
use App\models\CourseModel;
/*
课程管理
*/
class CourseController extends Controller
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
    //视频
    public function video(){
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
        $cou_name=request()->cou_name;
        $where=[];
        if(!empty($cou_name)){
            $where[]=['cou_name','like',"%$cou_name%"];
        }
        $course = CourseModel::orderBy('cou_id','asc')->select('teach_course.*','lect_name','cate_name','catalog_name')->where('teach_course.is_del',1)->where($where)
            ->leftjoin('teach_lect','teach_lect.lect_id','=','teach_course.lect_id')
            ->leftjoin('teach_category','teach_category.cate_id','=','teach_course.cate_id')
            ->leftjoin('teach_catalog','teach_catalog.catalog_id','=','teach_course.catalog_id')
            ->paginate(2);
        if(request()->ajax()){
            return view("admin.course.showajax",["course"=>$course,"cou_name"=>$cou_name]);
        }
    	return view('admin.course.course',compact('course','cou_name'));
    }
    //渲染
    public function add(){
        $lect = LectModel::where('is_del',1)->get();
        $cate = CateGoryModel::where('is_del',1)->get();
        $cate = $this -> getCateInfo($cate);
        $cata = CateLogModel::where('is_del',1)->get();
        return view('admin.course.add',compact("lect","cate","cata"));
    }
    // 无限极分类
    function getCateInfo($cateInfo,$pid=0,$level=1){
        static $info=[];
        foreach($cateInfo as $k=>$v){
            if($v['pid']==$pid){
                $v['level']=$level;
                $info[]=$v;
                $this->getCateInfo($cateInfo,$v['cate_id'],$v['level']+1);
            }
        }
        return $info;
    }
    //添加
    public function addDo(){
        $name = request()->post();
        $CourseModel = new CourseModel();
        $CourseModel->cou_name =$name["cou_name"];
        $CourseModel->cou_status =$name["cou_status"];
        $CourseModel->lect_id =$name["lect_id"];
        $CourseModel->cate_id =$name["cate_id"];
        $CourseModel->catalog_id =$name["catalog_id"];
        $CourseModel->cou_img =$name["cou_img"];
        $CourseModel->cou_video =$name["cou_video"];
        $CourseModel->add_time =time();
        $data = $CourseModel->save();
        if($data){
            return "/admin/course/show";
        }
    }
    //删除
    public function del($id){
        $course = CourseModel::where("cou_id",$id)->update(["is_del"=>2]);
        if($course){
            return "/admin/course/show";
        }
    }
    //编辑
    public function upd($id){
        $lect = LectModel::where('is_del',1)->get();
        $cate = CateGoryModel::where('is_del',1)->get();
        $cate = $this -> getCateInfo($cate);
        $cata = CateLogModel::where('is_del',1)->get();
        $course = CourseModel::where("cou_id",$id)->first();
        return view('admin.course.upd',compact("course","lect","cate","cata"));
    }
    //修改
    public function updDo($id){
        $name = request()->post();
        $data=[
            "cou_name" => $name["cou_name"],
            "cou_status" => $name["cou_status"],
            "lect_id" => $name["lect_id"],
            "cate_id" => $name["cate_id"],
            "lect_id" => $name["lect_id"],
            "catalog_id" => $name["catalog_id"],
            "cou_img" => $name["cou_img"],
            "cou_video" => $name["cou_video"],
            "add_time" => time(),
        ];
        $course = CourseModel::where("cou_id",$id)->update($data);
        if($course){
            return "/admin/course/show";
        }
    }
}
