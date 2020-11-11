<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    // 表名
    public $table = 'teach_course';

    // 主键
    public  $primaryKey = 'cou_id';

    // 关闭时间补全
    public  $timestamps = false;
}
