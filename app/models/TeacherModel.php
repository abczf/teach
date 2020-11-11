<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    # 表名
    protected $table = 'teach_lect';

    # 主键
    protected $primaryKey = 'lect_id';

    # 黑名单
    protected $guarded = ['price'];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
