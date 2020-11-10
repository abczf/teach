<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class NavModel extends Model
{
    // 导航栏
    // 表名
    protected $table = "teach_nav";
    // 主键id
    protected $primaryKey = "nav_id";
    public $timestamps = false;
    protected $guarded = [];
}
