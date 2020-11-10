<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RightModel extends Model
{
    // 表名
    public $table = 'teach_right';

    // 主键
    public  $primaryKey = 'right_id';

    // 关闭时间补全
    public  $timestamps = false;
}
