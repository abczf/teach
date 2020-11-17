<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 课程公告
 */
class NoticeModel extends Model
{
    // 表名
    protected $table = "teach_notice";
    // 主键ID
    protected $primaryKey = "notice_id";
    //
    public $timestamps = false;
    //
    protected $guarded = [];
}
