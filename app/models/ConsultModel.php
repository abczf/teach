<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/*
资讯的model
*/ 
class ConsultModel extends Model
{
    protected $table="teach_information";
	protected $primarykey='infor_id';
    public $timestamps=false;

     //黑名单
    protected $guarded=[];
}
