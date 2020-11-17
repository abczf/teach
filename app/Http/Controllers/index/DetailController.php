<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CourseModel;
use App\models\AccessModel;
use App\models\QuesTionsModel;
use App\models\ResponseModel;
use App\models\UserinfoModel;
use Illuminate\Support\Facades\Redis;


/*
 * 目录详情
 */
class DetailController extends Controller
{
    # 详情 评价展示
    public function info(Request $request){
        $cou_id = $request -> cou_id;
        $course = CourseModel::leftjoin('teach_lect','teach_course.lect_id','=','teach_lect.lect_id')
            -> where('cou_id',$cou_id)
            ->first();
//        dd($course);
        //课程
        $related = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get()->toArray();

        //条数
        $count = CourseModel::leftjoin('teach_catalog','teach_course.catalog_id','=','teach_catalog.catalog_id')
            -> leftjoin('teach_cataloginfo','teach_catalog.catalog_id','=','teach_cataloginfo.catalog_id')
            -> where(['teach_cataloginfo.is_del'=>1,'teach_course.cou_id'=>$cou_id])
            ->where(['teach_cataloginfo.pid'=>0])
            -> get()->toArray();
        $count2=count($count);
        $a=[];
        foreach($count as $k=>$v){
            $a[]=$v['info_id'];
        }
        $count1 = CourseModel::leftjoin('teach_catalog','teach_course.catalog_id','=','teach_catalog.catalog_id')
            -> leftjoin('teach_cataloginfo','teach_catalog.catalog_id','=','teach_cataloginfo.catalog_id')
            -> where(['teach_cataloginfo.is_del'=>1,'teach_course.cou_id'=>$cou_id])
            ->whereIn('teach_cataloginfo.pid',$a)
            -> get()->toarray();
//        print_r($count1);die;

        # 评价
        $access = AccessModel::get();

        # 问答
        $response = QuesTionsModel::get();
        $q_id=[];
        foreach($response as $kk=>$vv){
            $q_id[] = $vv['q_id'];
            $quecount = ResponseModel::leftjoin('teach_questions','teach_response.q_id','=','teach_questions.q_id')
                ->whereIn("teach_response.q_id",$q_id)
                ->count();
        }

        # 最新学员
        $userinfo = UserinfoModel::leftjoin('teach_user','teach_user_details.user_id','=','teach_user.user_id')
            ->get();
        return view('index.detail.info',['course'=>$course,'count'=>$count,'related'=>$related,"count1"=>$count1,"count2"=>$count2,'access'=>$access,'response'=>$response,"quecount"=>$quecount,'userinfo'=>$userinfo]);
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
                $this->getCateInfo($cateInfo,$v['info_id'],$v['level']+1);
            }
        }
        return $info;
    }

    /**
     * 评价的添加
     */
    public function save(Request $request){
        $cou_id = $request -> cou_id;
//        $cou_id = 2;
        $redis=new Redis();
        $user_id = $redis::get('user_id');
//        $user_id = 1;
        $post = $request -> all();

        $data = [
            'e_desc' => $post['e_desc'],
            'cou_id' => $cou_id,
            'user_id' => $user_id,
            'add_time' => time()
        ];
        $access = AccessModel::insert($data);
    }

    /**
     * 问题的添加
     */
    public function ask(Request $request){
        $cou_id = $request -> cou_id;
//        $cou_id = 2;
//        $user_id = 1;
        $redis=new Redis();
        $user_id = $redis::get('user_id');
        $post = $request -> all();
        if(empty($post['q_title'])){
            return json_encode(['status'=>000001,'msg'=>'数据不能为空']);
        }
        $data1 = [
            'cou_id' => $cou_id,
            'user_id' => $user_id,
            'q_title' => $post['q_title'],
            'add_time' => time()
        ];
        $ques = QuesTionsModel::insert($data1);
        if($ques){
            return json_encode(['status'=>200,'msg'=>'OK']);
        }
    }

    /**
     * 回答
     */
    public function answer(Request $request){
        $cou_id = $request -> cou_id;
//        $user_id = 1;
//        $cou_id = 2;
        $redis=new Redis();
        $user_id = $redis::get('user_id');
        $post = $request -> all();
        $data = [
            'user_id' => $user_id,
            'cou_id' => $cou_id,
            'r_content' => $post['r_content'],
            'q_id' => $post['q_id'],
            'add_time' => time()
        ];
        $res = ResponseModel::insert($data);
    }

    /**
     * 回答
     */
    public function show(Request $request,$q_id){
//        $cou_id = $request -> cou_id;
//        dd($cou_id);
//        $cou_id = 2;
        $course = CourseModel::leftjoin('teach_lect','teach_course.lect_id','=','teach_lect.lect_id')
            ->first();
        $related = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get()->toArray();

        //条数
        $count = CourseModel::leftjoin('teach_catalog','teach_course.catalog_id','=','teach_catalog.catalog_id')
            -> leftjoin('teach_cataloginfo','teach_catalog.catalog_id','=','teach_cataloginfo.catalog_id')
            -> where(['teach_cataloginfo.is_del'=>1])
            -> where(['teach_cataloginfo.pid'=>0])
            -> get()->toArray();
        $count2=count($count);
        $a=[];
        foreach($count as $k=>$v){
            $a[]=$v['info_id'];
        }

        $res = ResponseModel::leftjoin('teach_questions','teach_response.q_id','=','teach_questions.q_id')
            ->where("teach_response.q_id",$q_id)
            -> get();
        $quecount = ResponseModel::leftjoin('teach_questions','teach_response.q_id','=','teach_questions.q_id')
            ->where("teach_response.q_id",$q_id)
            -> count();
        # 最新学员
        $userinfo = UserinfoModel::leftjoin('teach_user','teach_user_details.user_id','=','teach_user.user_id')
            ->get();
        return view('index.detail.show',['course'=>$course,'count2'=>$count2,'related'=>$related,'res'=>$res,'q_id'=>$q_id,'quecount'=>$quecount,'userinfo'=>$userinfo]);
    }
}
