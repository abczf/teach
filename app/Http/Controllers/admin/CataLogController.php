<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\CateLogModel;
use Illuminate\Http\Request;

/*
课程目录
*/

class CataLogController extends Controller
{
    // 列表
    public function show(Request $request)
    {
        $where = [];
        $where[] = ['is_del', '=', '1'];
        $infor_title = request()->infor_title ? request()->infor_title : '';
        if($request->ajax()) {
            if (!empty($infor_title)) {
                $where[] = [
                    'catalog_name', 'like', "%$infor_title%"
                ];
            }
            $data = CateLogModel::where($where)->paginate(4);
            $count = CateLogModel::where($where)->count();
            return view('admin.catalog.ajaxPage', ['data' => $data, 'count' => $count, 'infor_title' => $infor_title]);
        }
        $data = CateLogModel::where($where)->paginate(4);
        $count = CateLogModel::where($where)->count();
        return view('admin.catalog.show', ['data' => $data, 'count' => $count,'infor_title'=>$infor_title]);
    }

    // 添加
    public function add()
    {
        return view('admin.catalog.add');
    }

    //执行添加
    public function save(Request $request)
    {
        $post = $request->all();
        if (empty($post['catalog_name'])) {
            return json_encode(['status' => 000001, 'msg' => '目录名称不能为空']);
        }
        if (empty($post['catalog_desc'])) {
            return json_encode(['status' => 000001, 'msg' => '目录描述不能为空']);
        }

        $data = [
            'catalog_name' => $post['catalog_name'],
            'catalog_desc' => $post['catalog_desc'],
            'add_time' => time()
        ];

        $res = CateLogModel::insert($data);

        if ($res) {
            return json_encode(['status' => 200, 'msg' => 'OK']);
        } else {
            return json_encode(['status' => 1, 'msg' => 'NO']);
        }
    }

    # 删除
    public function del(Request $request)
    {
        $post = $request->all();
        $data = CateLogModel::where('catalog_id', $post['catalog_id'])->update(['is_del' => 2]);
        if ($data) {
            return json_encode(['status' => 200, 'msg' => 'OK']);
        }
    }

    # 修改
    public function edit(Request $request)
    {
        $post = $request->all();
        $data = CateLogModel::where('catalog_id', $post['catalog_id'])->first();
        return view('admin.catalog.edit', ['data' => $data]);
    }

    # 执行修改
    public function update(Request $request)
    {
        $post = $request->all();

        $data = [
            'catalog_name' => $post['catalog_name'],
            'catalog_desc' => $post['catalog_desc'],
            'add_time' => time()
        ];

        $res = CateLogModel::where('catalog_id', $post['catalog_id'])->update($data);
        if ($res) {
            return json_encode(['status' => 200, 'msg' => 'OK']);
        }
    }
}
