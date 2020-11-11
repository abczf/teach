<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
/*
课程model
*/
class CourseModel extends Model
{
    //
     protected $table="teach_course";
	protected $primarykey='cou_id';
    public $timestamps=false;

     //黑名单
    protected $guarded=[];
}
