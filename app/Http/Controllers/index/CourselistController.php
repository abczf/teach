<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CourseModel;
use App\models\CateGoryModel;

class CourselistController extends Controller
{
    // 渲染课程列表页面
    public function courselist(){
        $data = CourseModel::where(['is_del'=>1])->get();

        $cate = CateGoryModel::where(['is_del'=>1])->get();
        $cateInfo = $this -> getCateInfo($cate);
//dd($cateInfo);
        return view("index/course/list",['data' => $data , 'cate' => $cate,'cateInfo'=>$cateInfo]);
    }

    /**
     * 无限极分类
     */
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
}
