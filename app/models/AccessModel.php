<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 评价
 */
class AccessModel extends Model
{
    # 表名
    protected $table = 'teach_evaluate';

    # 主键
    protected $primaryKey = 'e_id';

    # 黑名单
    protected $guarded = ['price'];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
