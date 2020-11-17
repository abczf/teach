<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 问题
 */
class QuesTionsModel extends Model
{
    // 表名
    public $table = 'teach_questions';

    // 主键
    public  $primaryKey = 'q_id';

    // 关闭时间补全
    public  $timestamps = false;

    //黑名单
    protected $guarded=[];
}
