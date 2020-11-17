<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserinfoModel extends Model
{
    # 表名
    protected $table = 'teach_user_details';

    # 主键
    protected $primaryKey = 'details_id';

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
