<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户
 */
class UserModel extends Model
{
    # 表名
    protected $table = 'teach_user';

    # 主键
    protected $primaryKey = 'user_id';

    # 黑名单
    protected $guarded = ['price'];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
