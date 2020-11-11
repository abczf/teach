<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
/*
题库model
*/
class BankModel extends Model
{
    //
     //
    protected $table="teach_bank";
	protected $primarykey='bank_id';
    public $timestamps=false;

     //黑名单
    protected $guarded=[];
}
