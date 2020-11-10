<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
/*
题库分类
*/
class AnwserCateModel extends Model
{
    //
    protected $table="teach_bank_category";
	protected $primarykey='bank_cate_id';
    public $timestamps=false;

     //黑名单
    protected $guarded=[];
}
