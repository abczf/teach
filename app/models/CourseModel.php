<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    // 课程
    // 表名
    protected $table = "teach_course";
    // 主键ID
    protected $primaryKey = "cou_id";
    //
    public $timestamps = false;
    //
    protected $guarded = [];
}
