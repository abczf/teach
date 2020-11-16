<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 回答
 */
class ResponseModel extends Model
{
    // 表名
    public $table = 'teach_response';

    // 主键
    public  $primaryKey = 'r_id';

    // 关闭时间补全
    public  $timestamps = false;

    //黑名单
    protected $guarded=[];
}
