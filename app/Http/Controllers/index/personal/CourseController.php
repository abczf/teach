<?php

namespace App\Http\Controllers\index\personal;

use App\Http\Controllers\Controller;
use App\models\Usercoursemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

/**
 * 个人中心 (课程)
 */
class CourseController extends Controller
{
    # 课程展示
    public function show(){
        $redis=new Redis();
        $user_id = $redis::get('user_id');
        $a = $redis::flushall();
        # 查询此用户学习中的课程
        $data =Usercoursemodel::leftjoin('teach_course', 'teach_user_course.cou_id', '=', 'teach_course.cou_id')
            ->leftjoin('teach_user', 'teach_user_course.user_id', '=', 'teach_user.user_id')
            ->where(['teach_user_course.user_id'=>$a,'teach_course.cou_status'=>2])
            ->paginate(6);
//        dd($data);

        # 查询此用户已学完的课程
        $completed =Usercoursemodel::leftjoin('teach_course', 'teach_user_course.cou_id', '=', 'teach_course.cou_id')
            ->leftjoin('teach_user', 'teach_user_course.user_id', '=', 'teach_user.user_id')
            ->where(['teach_user_course.user_id'=>$a,'teach_course.cou_status'=>3])
            ->paginate(6);
        return view('index.personal.course.show',['data'=>$data,'completed'=>$completed]);
    }
}
