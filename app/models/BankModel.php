<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
/*
题库model
*/
class BankModel extends Model
{
    // 表名
    public $table = 'teach_bank';

    // 主键
    public  $primaryKey = 'bank_id';

    // 关闭时间补全
    public  $timestamps = false;

     //黑名单
    protected $guarded=[];
}
