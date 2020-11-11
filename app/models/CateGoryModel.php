<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 课程分类
 */
class CateGoryModel extends Model
{
    # 表名
    protected $table = 'teach_category';

    # 主键
    protected $primaryKey = 'cate_id';

    # 黑名单
    protected $guarded = ['price'];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
