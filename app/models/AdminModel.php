<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    // 表名
    public $table = 'teach_admin';

    // 主键
    public  $primaryKey = 'admin_id';

    // 关闭时间补全
    public  $timestamps = false;
}
