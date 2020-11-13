<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
    // 表名
    public $table = 'teach_bank';

    // 主键
    public  $primaryKey = 'bank_id';

    // 关闭时间补全
    public  $timestamps = false;
}
