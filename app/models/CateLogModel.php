<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 课程目录
 */
class CateLogModel extends Model
{
    # 表名
    protected $table = 'teach_catalog';

    # 主键
    protected $primaryKey = 'catalog_id';

    # 黑名单
    protected $guarded = ['price'];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
