<?php

namespace App\Http\Middleware;

use App\models\AdminModel;
use App\models\AdminroleModel;
use App\models\RightModel;
use App\models\RolerightModel;
use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = session('admin_id');
        if (empty($user)) {
            return redirect('/admin/login');
        }
        $user1 = AdminModel::where(['is_del' => 1, 'admin_id' => $user])->first();
        $user2 = AdminroleModel::orderBy('create_time', 'desc')->where('admin_id', $user)->first();
        if (empty($user1)) {
            echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
            exit;
        }
        if ($user1->admin_name == '张非') {
            return $next($request);
        }
        if (empty($user2)) {
            echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
            exit;

        }
        $user2_arr = explode(',', trim($user2->role_id, ','));
//            dd($user2);
        $role_arr = RolerightModel::where('is_del', 1)->whereIn('role_id', $user2_arr)->get()->toArray();
        if (empty($role_arr)) {
            echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
            exit;
        }
        $url = $request->path();
        $url2=explode('/',trim($url,'/'));
        $url3=array_pop($url2);
        if(is_numeric($url3)){
            $url=implode('/', $url2);
        }else{
            $url=$url;
        }
        $arr3=[];
        foreach ($role_arr as $k => $v) {
            $right_id = explode(',', trim($v['right_id'], ','));
            asort($right_id);
            $arr = RightModel::where('is_del', 1)->whereIN('right_id', $right_id)->get('right_url')->toArray();
            foreach ($arr as $k1 =>$v1) {
                $arr3[]=$v1['right_url'];
            }
        }
        if (in_array($url,$arr3) || $url == 'admin') {
            return $next($request);
        } else {
            echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
            exit;
        }
    }

}
