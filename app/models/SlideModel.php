<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SlideModel extends Model
{
    //
    protected $table="teach_slide";
	protected $primarykey='slide_id';
    public $timestamps=false;

     //黑名单
    protected $guarded=[];
}
