<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 目录详情
 */
class CateLogInfoModel extends Model
{
    # 表名
    protected $table = 'teach_cataloginfo';

    # 主键
    protected $primaryKey = 'info_id';

    # 黑名单
    protected $guarded = ['price'];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
