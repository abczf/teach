<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CourseModel;
use App\models\NoticeModel;
use App\models\UserModel;
use App\models\UserCourseModel;
use Illuminate\Support\Facades\Redis;

/**
 * 课程模块
 */
class CoursecontController extends Controller
{
    /**
     * 详情
     */
    public function coursecont(Request $request){
        $cou_id = $request -> cou_id;
        $course = CourseModel::leftjoin('teach_lect','teach_course.lect_id','=','teach_lect.lect_id')
            ->where('cou_id',$cou_id)
            ->first();
//        dd($course);
        //条数
        $count = CourseModel::leftjoin('teach_catalog','teach_course.catalog_id','=','teach_catalog.catalog_id')
            -> leftjoin('teach_cataloginfo','teach_catalog.catalog_id','=','teach_cataloginfo.catalog_id')
            -> where(['teach_cataloginfo.is_del'=>1,'teach_course.cou_id'=>$cou_id])
            ->where(['teach_cataloginfo.pid'=>0])
            -> get()->toArray();
//        dd($count);
        $count2=count($count);
        $a=[];
        foreach($count as $k=>$v){
            $a[]=$v['info_id'];
        }

        // 课程公告
        $notice = NoticeModel::leftjoin('teach_course','teach_notice.cou_id','=','teach_course.cou_id')
            ->where(['teach_notice.is_del'=>1,'teach_notice.cou_id'=>$cou_id])
            ->first();

        // 推荐课程
        $desc = CourseModel::where(['is_del'=>1])->orderby('cou_id','desc')->limit(3)->get();

        $catalog = CourseModel::leftjoin('teach_catalog','teach_course.catalog_id','=','teach_catalog.catalog_id')
            ->where(['teach_course.cou_id'=>$cou_id])
            ->get();

        // 判断是否登录
        $redis=new Redis();
        $user_id = $redis::get('user_id');
//      dd($user_id);
        if(empty($user_id)){
            echo "<script>alert('请先去登录~');history.back(-1);</script>";
            exit;
        }else{
            $redis=new Redis();
            $user_id = $redis::get('user_id');
//            $user = UserCourseModel::leftjoin('teach_user','teach_user_course.user_id','=','teach_user.user_id')
//                ->where('teach_user_course.user_id',$user_id)
//                ->first();
//            if(!empty($user)){
//                echo "<script>alert('该课程已经加入学习了，试试其他的课程吧~');history.back(-1);</script>";
//            }else{
                $data = [
                    'user_id' => $user_id,
                    'cou_id' => $cou_id,
                    'add_time' => time()
                ];

                $usercourse = UserCourseModel::insert($data);
//            }
            return view("index/course/cont",['course'=>$course,'count2'=>$count2,'notice'=>$notice,'desc'=>$desc,'catalog'=>$catalog]);

        }
        return view("index/course/cont",['course'=>$course,'count2'=>$count2,'notice'=>$notice,'desc'=>$desc,'catalog'=>$catalog]);
    }
}
