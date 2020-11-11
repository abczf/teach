<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AdminroleModel extends Model
{
    // 表名
    public $table = 'teach_admin_role';

    // 主键
    public  $primaryKey = 'admin_role_id';

    // 关闭时间补全
    public  $timestamps = false;
}
