<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\CourseModel;
use Illuminate\Http\Request;
use App\models\ConsultModel;

/**
 * 资讯详情
 */
class ConsultInfoController extends Controller
{
    # 展示
    public function show(Request $request){
        $post = $request -> all();

        $desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();
        $consult = ConsultModel::leftjoin('teach_info_cate','teach_information.cate_id','=','teach_info_cate.cate_id')
            ->where(['is_del'=>1,'is_hot'=>1])
            ->where('teach_information.infor_id',$post['infor_id'])
            ->first();

        $data = ConsultModel::where(['is_hot'=>1])->orderby('infor_id','desc')->limit(5)->get();
        foreach($data as $v){
            $v->infor_title=mb_substr($v['infor_title'],0,12)."...";
        }

    	return view('index.consultInfo.show',['desc'=>$desc,'consult'=>$consult,'data'=>$data]);
    }
}
