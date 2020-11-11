<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * 短信验证码
 */
class CodeModel extends Model
{
    # 表名
    protected $table = 'teach_code';

    # 主键
    protected $primaryKey = 'code_id';

    # 黑名单
    protected $guarded = ['price'];

    # 关闭laravel自带的时间戳
    public $timestamps = false;
}
