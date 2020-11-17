<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 课程分类
 */
class BaCateModel extends Model
{
    # 表名
    protected $table = 'teach_bcate';

    # 主键
    protected $primaryKey = 'bcate_id';

    # 黑名单
    protected $guarded = ['price'];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
