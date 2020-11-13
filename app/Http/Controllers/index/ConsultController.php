<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\CourseModel;
use Illuminate\Http\Request;
use App\models\ConsultModel;
use App\models\ConsultCateModel;

/**
 * 资讯模块
 */
class ConsultController extends Controller
{
    /**
     * 展示
     */
    public function show(){
        $cate = ConsultCateModel::get();

        $consult = ConsultModel::leftjoin('teach_info_cate','teach_information.cate_id','=','teach_info_cate.cate_id')
            ->where(['is_del'=>1])
            ->paginate(4);
        $hot = ConsultModel::where(['is_hot'=>1])->orderby('infor_id','desc')->limit(5)->get();
        foreach($hot as $v){
            $v->infor_title=mb_substr($v['infor_title'],0,12)."...";
        }

        $desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
//        dd($desc);
        return view('index.consult.show',['consult'=>$consult,'hot'=>$hot,'cate'=>$cate,'desc'=>$desc]);
    }

    /**
     * 热门咨讯
     */
    public function hot(Request $request){
        $cate = ConsultCateModel::get();

        $consult = ConsultModel::leftjoin('teach_info_cate','teach_information.cate_id','=','teach_info_cate.cate_id')
            ->where(['is_del'=>1,'teach_info_cate.cate_id'=>2])
            ->paginate(4);

        $hot = ConsultModel::where(['is_hot'=>1])->orderby('infor_id','desc')->limit(5)->get();
        foreach($hot as $v){
            $v->infor_title=mb_substr($v['infor_title'],0,12)."...";
        }
        $desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
        return view('index.consult.hot',['consult'=>$consult,'hot'=>$hot,'cate'=>$cate,'desc'=>$desc]);
    }

    /**
     * 精彩活动
     */
    public function move(){
        $cate = ConsultCateModel::get();

        $consult = ConsultModel::leftjoin('teach_info_cate','teach_information.cate_id','=','teach_info_cate.cate_id')
            ->where(['is_del'=>1,'teach_info_cate.cate_id'=>3])
            ->paginate(4);

        $hot = ConsultModel::where(['is_hot'=>1])->orderby('infor_id','desc')->limit(5)->get();
        foreach($hot as $v){
            $v->infor_title=mb_substr($v['infor_title'],0,12)."...";
        }
        $desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
        return view('index.consult.move',['consult'=>$consult,'hot'=>$hot,'cate'=>$cate,'desc'=>$desc]);
    }

    /**
     * 考试指导
     */
    public function exam(){
        $cate = ConsultCateModel::get();

        $consult = ConsultModel::leftjoin('teach_info_cate','teach_information.cate_id','=','teach_info_cate.cate_id')
            ->where(['is_del'=>1,'teach_info_cate.cate_id'=>4])
            ->paginate(4);

        $hot = ConsultModel::where(['is_hot'=>1])->orderby('infor_id','desc')->limit(5)->get();
        foreach($hot as $v){
            $v->infor_title=mb_substr($v['infor_title'],0,12)."...";
        }
        $desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
        return view('index.consult.exam',['consult'=>$consult,'hot'=>$hot,'cate'=>$cate,'desc'=>$desc]);
    }
}
