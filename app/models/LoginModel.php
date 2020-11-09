<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    // 后台登录
    // 表名
    protected $table = "teach_admin";
    // 主键id
    protected $primaryKey = "admin_id";
    //
    public $timestamps = false;
    protected $guarded = [];
}
