<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户课程表
 */
class UserCourseModel extends Model
{
    # 表名
    protected $table = 'teach_user_course';

    # 主键
    protected $primaryKey = 'id';

    # 黑名单
    protected $guarded = ['price'];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
