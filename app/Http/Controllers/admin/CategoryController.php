<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CateGoryModel;

/*
课程分类
*/
class CategoryController extends Controller
{
    // 列表
    public function show(Request $request){
        $where = [];
        $where[] = ['is_del', '=', '1'];
        $cate_name = request()->cate_name ? request()->cate_name : '';
        if($request->ajax()) {
            if (!empty($cate_name)) {
                $where[] = [
                    'cate_name', 'like', "%$cate_name%"
                ];
            }
            $cateinfo = CateGoryModel::where($where) -> get();
            $count = CateGoryModel::where($where)->count();
            return view('admin.category.ajaxshow',['info'=>$cateinfo,'count'=>$count]);
        }
        $cateinfo = CateGoryModel::where($where) -> get();
        $info = $this -> getCateInfo($cateinfo);
        $count = CateGoryModel::where($where)->count();
    	return view('admin.category.show',['info'=>$info,'count'=>$count]);
    }

    // 添加
    public function add(Request $request){
        $cateinfo=CateGoryModel::where(['is_del'=>1])->get();
        $info=$this->getCateInfo($cateinfo);
        return view('admin.category.add',['info'=>$info]);
    }

    // 执行添加
    public function save(Request $request){
        $post =$request->all();
        $data=[
            "cate_name"=>$post['cate_name'],
            "pid"=>$post['pid'],
            'add_time' => time()
        ];
        $res=CateGoryModel::insert($data);
        if($res){
            return json_encode(['status' => 200, 'msg' => 'OK']);
        }
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

    /**
     * 删除
     */
    public function del(Request $request){
        $post = $request -> all();
        $cateInfo = CateGoryModel::where('cate_id',$post['cate_id'])->update(['is_del'=>2]);
        if($cateInfo){
            return json_encode(['status'=>200,'msg'=>'OK']);
        }
    }

    /**
     * 编辑
     */
    public function edit(Request $request){
        $post = $request -> all();
        $cateInfo = CateGoryModel::where('is_del',1) -> get();
        $cate = $this -> getCateInfo($cateInfo);
        $data= CateGoryModel::where('cate_id',$post['cate_id'])->first();
        return view('admin.category.edit',['data'=>$data,'cate'=>$cate]);
    }

    /**
     * 执行编辑
     */
    public function update(Request $request){
        $post = $request -> all();
        $data = [
            'cate_name' => $post['cate_name'],
            'pid' => $post['pid']
        ];
        $cate = CateGoryModel::where('cate_id',$post['cate_id'])->update($data);
        if($cate){
            return json_encode(['status'=>200,'msg'=>'OK']);
        }
    }
}
