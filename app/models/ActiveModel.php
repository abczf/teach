<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
/*
精彩活动表
*/
class ActiveModel extends Model
{
    protected $table="teach_activity";
	protected $primarykey='act_id';
    public $timestamps=false;

     //黑名单
    protected $guarded=[];
}
