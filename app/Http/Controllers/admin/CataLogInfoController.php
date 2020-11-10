<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CateLogModel;
use App\models\CateLogInfoModel;
/*
目录详情
*/
class CataLogInfoController extends Controller
{
    /**
     * 列表
     */
    public function show(Request $request){
        $cate = CateLogModel::where(['is_del'=>1])->get();
        $cateinfo = CateLogInfoModel::leftjoin('teach_catalog','teach_cataloginfo.catalog_id','=','teach_catalog.catalog_id')
            ->where(['teach_cataloginfo.is_del'=>1])
            ->get();
        $info = $this -> getCateInfo($cateinfo);
        $count = CateLogInfoModel::where(['is_del'=>1])->count();
    	return view('admin.cataloginfo.show',['info'=>$info,'cate'=>$cate,'count'=>$count]);
    }

    /**
     * 添加
     */
    public function add(){
        $catelog = CateLogModel::where(['is_del'=>1])->get();
        $cateinfo = CateLogInfoModel::where(['is_del'=>1]) -> get();
        $info = $this -> getCateInfo($cateinfo);
    	return view('admin.cataloginfo.add',['catelog'=>$catelog,'info'=>$info]);
    }

    /**
     * 执行添加
     */
    public function save(Request $request){
        $post = $request -> all();
        $data = [
            'info_name' => $post['info_name'],
            'catalog_id' => $post['catalog_id'],
            'pid' => $post['pid'],
            'info_desc' => $post['info_desc'],
            'add_time' => time(),
            'is_del' => 1
        ];
        $cateinfo = CateLogInfoModel::insert($data);

        if($cateinfo){
            return json_encode(['status'=>200,'msg'=>'OK']);
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
                $this->getCateInfo($cateInfo,$v['info_id'],$v['level']+1);
            }
        }
        return $info;
    }

    /**
     * 删除
     */
    public function del(Request $request){
        $post = $request -> all();
        $cata = CateLogInfoModel::where('info_id',$post['info_id'])->update(['is_del'=>2]);
        if($cata){
            return json_encode(['status'=>200,'msg'=>'OK']);
        }
    }

    /**
     * 编辑
     */
    public function edit(Request $request){
        $post = $request -> all();
        $cate = CateLogModel::where(['is_del'=>1])->get();
        $cateinfo = CateLogInfoModel::where(['is_del'=>1]) -> get();
        $info = $this -> getCateInfo($cateinfo);
        $cata = CateLogInfoModel::where('info_id',$post['info_id'])->first();
        return view('admin.cataloginfo.edit',['cata'=>$cata,'cate'=>$cate,'info'=>$info]);
    }

    /**
     * 执行编辑
     */
    public function update(Request $request){
        $post = $request -> all();
        $data = [
            'info_name' => $post['info_name'],
            'info_desc' => $post['info_desc'],
            'pid' => $post['pid'],
            'catalog_id' => $post['catalog_id']
        ];

        $cate = CateLogInfoModel::where('info_id',$post['info_id'])->update($data);
        if($cate){
            return json_encode(['status'=>200,'msg'=>'OK']);
        }
    }
}
