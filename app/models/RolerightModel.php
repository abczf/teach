<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RolerightModel extends Model
{
    // 表名
    public $table = 'teach_role_right';

    // 主键
    public  $primaryKey = 'role_right_id';

    // 关闭时间补全
    public  $timestamps = false;
}
